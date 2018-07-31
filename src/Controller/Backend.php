<?php
namespace AlaskaBlog\Controller;

use AlaskaBlog\Model\Manager;

if (!class_exists('\AlaskaBlog\Model\Manager')) {
    require APP . 'Model' . DS . 'Manager.php';
}
if (!class_exists('\AlaskaBlog\Model\ChapterManager')) {
    require APP . 'Model' . DS . 'ChapterManager.php';
}
if (!class_exists('\AlaskaBlog\Model\CommentManager')) {
    require APP . 'Model' . DS . 'AdminManager.php';
}

/**
 * Class Backend
 *
 * @package Alaska\Blog\Controller
 */
class Backend extends Manager
{

    public function listChaptersBackend()
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $chapters = $chapterManager->findAll();

        include VIEWS . 'Backend' . DS . 'Chapters' . DS . 'index.php';
    }

    public function chapterBackend()
    {
        $id = $_GET['id'];
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $chapter = $chapterManager->findWithComments($id);

        include VIEWS . 'Backend' . DS . 'Chapters' . DS . 'view.php';
    }

    /**
     * @param string $title
     * @param string $content
     * @throws \Exception
     */
    public function addChapter($title, $content)
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $affectedLines = $chapterManager->create($title, $content);
        if ($affectedLines === true) {
            $this->setFlash('Chapitre ajouté');
        } else {
            $this->setFlash('Impossible d\'ajouter le chapitre !', 'danger');
        }
        $this->redirect('?action=dashboard');
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $content
     * @throws \Exception
     */
    public function modifyChapter($id, $title, $content)
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $affectedLines = $chapterManager->update($id, nl2br(htmlspecialchars($title)), nl2br(htmlspecialchars($content)));

        if ($affectedLines === false) {
            throw new \Exception('Impossible de modifier ce chapitre !');
        } else {
            $this->redirect('?action=dashboard');
        }
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function deleteChapter($id)
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $deleteChapter = $chapterManager->delete($id);

        if ($deleteChapter > 0) {
            $this->setFlash('Chapitre supprimé');
        } else {
            $this->setFlash('Impossible de supprimer ce chapitre !', 'danger');
        }
        $this->redirect('?action=dashboard');

    }

    /**
     * @param int|bool $id
     */
    public function commentBackend($id)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $comment = $commentManager->get($id);

        include VIEWS . 'Frontend' . DS . 'comment.php';
    }

    public function signalCommentBackend()
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $comments = $commentManager->findAllSignaled();

        include VIEWS . 'Backend' . DS . 'Comments' . DS . 'signal.php';
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function deleteComment($id)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $deleteComment = $commentManager->delete($id);

        if ($deleteComment > 0) {
            $this->redirect('?action=commentSignal');
        } else {
            throw new \Exception('Impossible de supprimer ce commentaire !');
        }
    }

    /**
     * @param int $id
     * @throws \Exception
     */
    public function approveComment($id)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $commentApprove = $commentManager->approve($id);

        if ($commentApprove > 0) {
            $this->redirect('?action=commentSignal');
        } else {
            throw new \Exception('Impossible d\'approuver ce commentaire !');
        }
    }

    public function logOut()
    {
        session_destroy();
        session_start();
        $this->setFlash('Vous êtes à présent déconnecté', 'info');
        $this->redirect();
    }
}
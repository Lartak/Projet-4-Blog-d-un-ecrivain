<?php
namespace AlaskaBlog\Controller;

use AlaskaBlog\Model\Manager;

if (!class_exists('Manager')) {
    require APP . 'Model' . DS . 'Manager.php';
}
if (!class_exists('\AlaskaBlog\Model\AdminManager')) {
    require APP . 'Model' . DS . 'AdminManager.php';
}
if (!class_exists('\AlaskaBlog\Model\ChapterManager')) {
    require APP . 'Model' . DS . 'ChapterManager.php';
}
if (!class_exists('\AlaskaBlog\Model\CommentManager')) {
    require APP . 'Model' . DS . 'CommentManager.php';
}

/**
 * Class Frontend
 *
 * @package Alaska\Blog\Controller
 */
class Frontend extends Manager
{

    /**
     * @param string $login
     * @param string $password
     */
    public function checkLogin($login, $password)
    {
        $adminManager = new \AlaskaBlog\Model\AdminManager();
        $adminInfo = $adminManager->getLogin($login, $password);

        if ($adminInfo) {
            $_SESSION['administrateur'] = true;
            $_SESSION['login'] = $adminInfo['login'];
            $this->setFlash('Vous êtes à présent connecté', 'info');
            $this->redirect('?action=dashboard');
        } else {
            $this->setFlash('Identifiants incorrects', 'warning');
        }
        include VIEWS . 'Frontend' . DS . 'connexion.php';
    }

    public function listChapters()
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $chapters = $chapterManager->findAll();

        //include VIEWS . 'Frontend' . DS . 'Chapters' . DS . 'index.php';
        include VIEWS . 'Frontend' . DS . 'home.php';
    }

    /**
     * @param int $id
     */
    public function chapter($id)
    {
        $chapterManager = new \AlaskaBlog\Model\ChapterManager();
        $chapter = $chapterManager->findWithComments($id);
        include VIEWS . 'Frontend' . DS . 'Chapters' . DS . 'view.php';
    }

    /**
     * @param $chapterId
     * @param $author
     * @param $comment
     * @throws \Exception
     */
    public function addComment($chapterId, $author, $comment)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();

        $affectedLines = $commentManager->create($chapterId, $author, $comment);

        if ($affectedLines === false) {
            $this->setFlash('Impossible d\'ajouter le commentaire !', 'warning');
        } else {
            $this->setFlash('Votre commentaire a bien été ajouté');
        }
        $this->redirect("?action=chapter&id={$chapterId}");
    }

    /**
     * @param int $id
     */
    public function comment($id)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $comment = $commentManager->get($id);

        include VIEWS . 'Frontend' . DS . 'comment.php';
    }

    /**
     * @param int $commentId
     */
    public function signalComment($commentId)
    {
        $commentManager = new \AlaskaBlog\Model\CommentManager();
        $signal = $commentManager->signal($commentId);
        if ($signal > 0) {
            $this->setFlash('Votre signalement nous est bien parvenu');
            $this->redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->setFlash('Ce commentaire est en attente de modération, je me dépêche ;)', 'info');
        }

        include VIEWS . 'Frontend' . DS . 'comment.php';
    }
}
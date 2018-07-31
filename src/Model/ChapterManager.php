<?php

namespace AlaskaBlog\Model;

/**
 * Class ChapterManager
 *
 * @package AlaskaBlog\Model
 */
class ChapterManager extends Manager
{
    /**
     * @return bool|\PDOStatement
     */
    public function findAll()
    {
        return $this
            ->getPdo()
            ->query('SELECT chapters.id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM chapters ORDER BY creation_date');
    }

    /**
     * @param $id
     * @return \stdClass
     */
    public function findWithComments($id)
    {
        $chapter = $this->get($id);
        $chapter->comments = (new CommentManager())->findAllByChapter($id)->fetchAll();
        return $chapter;
    }

    /**
     * @param $chapterId
     * @return mixed
     */
    public function get($chapterId)
    {
        $req = $this->getPdo()->prepare('SELECT chapters.id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, COUNT(comments.id) AS comments_count FROM chapters INNER JOIN comments ON comments.chapter_id = chapters.id WHERE chapters.id = ?');
        $req->execute([$chapterId]);
        return $req->fetch();
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $content
     * @return bool
     */
    public function update($id, $title, $content)
    {
        $req = $this->getPdo()->prepare('UPDATE chapters SET title= :newTitle, content= :newContent WHERE id = :id');
        $req->bindValue(':id', $_GET['id'], \PDO::PARAM_INT);
        $req->bindValue(':newTitle', $_POST['title'], \PDO::PARAM_STR);
        $req->bindValue(':newContent', $_POST['content'], \PDO::PARAM_STR);
        return $req->execute([':id' => $id, ':newTitle' => $title,':newContent' => $content]);
    }

    /**
     * @param string $title
     * @param string $content
     * @return bool
     */
    public function create($title, $content)
    {
        $chapter = $this->getPdo()->prepare('INSERT INTO chapters(title, content, creation_date) VALUES(?, ?, NOW())');
        return $chapter->execute([$title, $content]);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $comment = $this->getPdo()->prepare('DELETE FROM comments WHERE chapter_id = ?');
        $comment->execute([$id]);
        $req = $this->getPdo()->prepare('DELETE FROM chapters WHERE id = ? LIMIT 1');
        $req->execute([$id]);
        return $req->rowCount();
    }
}

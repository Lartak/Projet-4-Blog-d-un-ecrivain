<?php

namespace AlaskaBlog\Model;

/**
 * Class CommentManager
 *
 * @package AlaskaBlog\Model
 */
class CommentManager extends Manager
{
    /**
     * @param int $chapterId
     * @return bool|\PDOStatement
     */
    public function findAllByChapter($chapterId)
    {
        $comments = $this->getPdo()->prepare('SELECT id, author, comment, signal_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, chapter_id FROM comments WHERE chapter_id = ? ORDER BY comment_date DESC');
        $comments->execute([$chapterId]);

        return $comments;
    }

    /**
     * @param int $commentId
     * @return mixed
     */
    public function get($commentId)
    {
        $req = $this->getPdo()->prepare('SELECT comments.id, author, comment, signal_comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr, chapters.id AS chapter_id, chapters.title AS chapter FROM comments INNER JOIN chapters ON chapter_id = chapters.id WHERE comments.id = ?');
        $req->execute([$commentId]);
        return $req->fetch();
    }

    /**
     * @param int $chapterId
     * @param string $author
     * @param string $comment
     * @return bool
     */
    public function create($chapterId, $author, $comment)
    {
        $comments = $this->getPdo()->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        return $comments->execute([$chapterId, $author, $comment]);
    }

    /**
     * @param int $commentId
     * @return int
     */
    public function signal($commentId)
    {
        $req = $this->getPdo()->prepare('UPDATE comments SET signal_comment = 1 WHERE id = ?');
        $req->execute([$commentId]);
        return $req->rowCount();
    }

    /**
     * @return bool|\PDOStatement
     */
    public function findAllSignaled()
    {
        return $this->getPdo()->query('SELECT comments.id, chapters.title, comments.chapter_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS date_fr FROM comments INNER JOIN chapters ON chapters.id = comments.chapter_id WHERE signal_comment = 1 ORDER BY comment_date DESC');
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute([$id]);
        return $req->rowCount();
    }

    /**
     * @param int $id
     * @return int
     */
    public function approve($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signal_comment = 0 WHERE id = ?');
        $req->execute([$id]);
        return $req->rowCount();
    }
}
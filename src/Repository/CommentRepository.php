<?php

namespace App\Repository;

use App\Models\Comment;
use DateTime;

class CommentRepository extends AbstractRepository
{
    // public function findByArticleId($id)
    // {
    //     $pdoStatement = $this->database->request("SELECT * FROM {$this->getTableName()} WHERE id = :id", [':id' => $id]);
    //     $pdoStatement = $this->database->request(

    //        "SELECT c.id AS comment_id,
    //        c.content AS comment_content,
    //        u.id AS user_id,
    //        u.pseudo AS user_pseudo
    //        FROM {$this->getTableName()} AS c
    //        INNER JOIN user AS u ON c.user_id = u.id
    //        WHERE c.id = :id", [':id' => $id]

    //     );

    //     return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, Comment::class);        
    // }

    
    public function findCommentsByArticleWithUserInformations(int $id)
    {
        $pdoStatement = $this->database->request(

            "SELECT u.id AS user_id,
            u.pseudo AS user_pseudo,
            c.id AS comment_id,
            c.content AS comment_content,
            c.date AS comment_date
            FROM {$this->getTableName()} AS c
            INNER JOIN user AS u ON u.id = c.user_id
            INNER JOIN article AS a ON a.id = c.article_id
            WHERE a.id = :id
            AND c.is_valid = true
            ORDER BY c.date DESC", 
            [':id' => $id]

        );

        return $pdoStatement->fetchall();
    }

    public function findAll()
    {
        $pdostatement = $this->database->request("SELECT * FROM {$this->getTableName()}");

        return $pdostatement->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function createComment(array $dataSubmitted, array $user, int $articleId)
    {
        $query = "INSERT INTO comment (user_id, article_id, content, is_valid, `date`) VALUES (:user_id, :article_id, :content, :is_valid, NOW())";

        return $this->database->request(
            $query,
            [
                ':user_id' => $user['id'],
                ':article_id' => $articleId,
                ':content' => $dataSubmitted['content'],
                ':is_valid' => false,
                // ':date' => (new DateTime())->format('Y-m-d h-i-s')
            ]
        );
    }

    public function editComment($content)
    {
        $query = "UPDATE comment SET content = :content, `date` = `:date`";

        return $this->database->request(
            $query,
            [
                ':content' => $content,
                ':date' => (new DateTime())->format('Y-m-d h-i-s')
            ]
        );
    }

    public function deleteComment($id)
    {
        $query = "DELETE FROM comment WHERE id =:id";

        return $this->database->request(
            $query,
            [
                ':id' => $id
            ]
        );
    }

    protected function getTableName(): string
    {
        return 'comment';
    }

}
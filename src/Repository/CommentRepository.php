<?php

namespace App\Repository;

use App\Models\Comment;
use DateTime;

class CommentRepository extends AbstractRepository
{
    public function findByArticleId($id)
    {
        $pdoStatement = $this->database->request("SELECT * FROM {$this->getTableName()} WHERE id = :id", [':id' => $id]);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, Comment::class);        
    }

    public function findAll()
    {
        $pdostatement = $this->database->request("SELECT * FROM {$this->getTableName()}");

        return $pdostatement->fetchAll(\PDO::FETCH_CLASS, Comment::class);
    }

    public function createComment(array $datasubmitted)
    {
        $query = "INSERT INTO comment (user_id, article_id, content, is_valid, `date`) VALUES (:user_id, :article_id, :content, :is_valid, ':date')";

        return $this->database->request(
            $query,
            [
                ':user_id' => $datasubmitted['user_id'],
                ':article_id' => $datasubmitted['article_id'],
                ':content' => $datasubmitted['content'],
                ':is_valid' => false,
                ':date' => (new DateTime())->format('Y-m-d h-i-s')
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
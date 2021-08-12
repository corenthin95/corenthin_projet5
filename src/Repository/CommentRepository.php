<?php

namespace App\Repository;

use App\Models\Comment;

class CommentRepository extends AbstractRepository
{
    public function findByArticleId($id)
    {
        $pdoStatement = $this->database->request("SELECT * FROM {$this->getTableName()} WHERE id = :id", [':id' => $id]);

        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, Comment::class);        
    }

    protected function getTableName(): string
    {
        return 'comment';
    }

}
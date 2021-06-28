<?php

namespace App\Repository;

use App\Models\Article;

class ArticleRepository extends AbstractRepository 
{
    public function findAll()
    {
        $pdoStatement = $this->database->request("SELECT * FROM {$this->getTableName()}");
        
        return $pdoStatement->fetchAll(\PDO::FETCH_CLASS, Article::class);
    }

    public function findById(int $id)
    {
        $pdoStatement = $this->database->request("SELECT * FROM {$this->getTableName()} WHERE id = :id", [':id' => $id]);

        return $pdoStatement->fetch();
    }

    protected function getTableName(): string
    {
        return 'article';
    }
}
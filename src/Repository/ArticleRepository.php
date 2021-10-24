<?php

namespace App\Repository;

use App\Models\Article;
use DateTime;

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

    public function createArticle(array $dataSubmited, array $user)
    {
        $query = "INSERT INTO article (title, lead_paragraph, content, user_id, `last_update`) VALUES (:title, :lead_paragraph, :content, :user_id, :last_update)";

        return $this->database->request(
            $query,
            [
                ':title' => $dataSubmited['title'],
                ':lead_paragraph' => $dataSubmited['leadParagraph'],
                ':content' => $dataSubmited['content'],
                ':user_id' => $user['id'],
                ':last_update' => (new DateTime())->format('Y-m-d H:i:s')
            ]
        );
    }

    public function editArticle($id, $title, $leadParagraph, $content)
    {
        $query = "UPDATE article SET title = :title, lead_paragraph = :lead_paragraph, content = :content, last_update = :date WHERE id = :id";

        return $this->database->request(
            $query,
            [
                ':id' => $id,
                ':title' => $title,
                ':lead_paragraph' => $leadParagraph,
                ':content' => $content,
                ':date' => (new DateTime())->format('Y-m-d H:i:s')
            ]
        );
    }

    public function deleteArticle($id)
    {
        $query = "DELETE FROM article WHERE id =:id";

        return $this->database->request(
            $query,
            [
                ':id' => $id
            ]
        );
    }

    protected function getTableName(): string
    {
        return 'article';
    }
}
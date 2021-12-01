<?php

namespace App\Repository;

use App\Models\User;

class UserRepository extends AbstractRepository
{
    public function findAll()
    {
        $query = "SELECT * FROM {$this->getTableName()}";
        $statement = $this->database->request($query);

        return $statement->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function findByEmail(string $email)
    {
        $query = "SELECT * FROM {$this->getTableName()} WHERE email = :email";
        $statement = $this->database->request($query, [':email' => $email]);

        return $statement->fetch();
    }

    public function createUser(array $dataSubmitted)
    {
        $query = "INSERT INTO user (pseudo, name, firstname, email, password) VALUES (:pseudo, :name, :firstname, :email, :password)";

        return $this->database->request(
            $query,
            [
                ':pseudo' => $dataSubmitted['pseudo'],
                ':name' => $dataSubmitted['name'],
                ':firstname' => $dataSubmitted['firstname'],
                ':email' => $dataSubmitted['email'],
                ':password' => $dataSubmitted['password']
            ]
        );
    }

    protected function getTableName(): string
    {
        return 'user';
    }
}
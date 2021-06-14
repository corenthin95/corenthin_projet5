<?php

namespace App\Repository;

use App\Application\Database\PDODatabase;

abstract class AbstractRepository
{
    protected PDODatabase $database;

    public function __construct()
    {
        try {
            $this->database = new PDODatabase(
                'mysql:host=127.0.0.1;dbname=corenthinprojet5;charset=utf8',
                'corenthinprojet5',
                'corenthinprojet5',
            );
        } catch (\Exception $e) {

        }
    }

    abstract protected function getTableName(): string;
}
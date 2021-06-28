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
                'mysql:host=127.0.0.1;dbname=corenthin_projet5;charset=utf8',
                'corenthin_projet5',
                'corenthin_projet5'
            );
        } catch (\Exception $e) {

        }
    }

    abstract protected function getTableName(): string;
}
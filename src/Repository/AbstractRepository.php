<?php

namespace App\Repository;

use App\Application\Database\PDODatabase;

abstract class AbstractRepository
{
    protected $database;

    public function __construct()
    {
        try {
            $this->database = new PDODatabase(
                'mysql:host=127.0.0.1;dbname=corenthin_projet5;charset=utf8',
                'root',
                ''
            );
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }
    }

    abstract protected function getTableName(): string;
}
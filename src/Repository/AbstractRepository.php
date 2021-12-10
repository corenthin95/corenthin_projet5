<?php

namespace App\Repository;

use App\Application\Database\PDODatabase;

abstract class AbstractRepository
{
    protected $database;

    public function __construct()
    {
        $configDatabase = require(__DIR__.'/../../config/database/config_database.php');
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $configDatabase['host'], $configDatabase['dbname']);
       
        try {
            $this->database = new PDODatabase(
                $dsn,
                $configDatabase['username'],
                $configDatabase['password']
            );
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }
    }

    abstract protected function getTableName(): string;
}
<?php

namespace App\Application\Database;

class PDODatabase extends \PDO
{
    const TYPE_FIELD_SUPPORT = [
        'integer' => parent::PARAM_INT,
        'boolean' => parent::PARAM_BOOL
    ];

    public function __construct(string $dsn, string $username, string $password, array $options = [])
    {
        parent::__construct($dsn, $username, $password, $options);
        parent::setAttribute(parent::ATTR_DEFAULT_FETCH_MODE, parent::FETCH_ASSOC);
        parent::setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_EXCEPTION);
    }

    public function request(string $statement, array $params = [])
    {
        $statement = $this->prepare($statement);
        foreach ($params as $name => $param) {
            $paramType = gettype($param);
            $bindType = parent::PARAM_STR;
            if ($param instanceof \DateTime) {
                $param = $param->format('Y-m-d H:i:s');
            } elseif (array_key_exists($paramType, self::TYPE_FIELD_SUPPORT)) {
                $bindType = self::TYPE_FIELD_SUPPORT[$paramType];
            } elseif (is_null($param)) {
                $bindType = parent::PARAM_NULL;
            }

            $statement->bindValue($name, $param, $bindType);
        }

        $statement->execute();

        return $statement;
    }
}
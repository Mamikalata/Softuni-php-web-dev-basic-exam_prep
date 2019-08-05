<?php

namespace Database;


class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function query(string $query) : StatementInterface
    {
        $statement = $this->pdo->prepare($query);
        return new PDOPreparedStatement($statement);
    }

    public function lastInsertId():int{
        return $this->pdo->lastInsertId();
    }

}
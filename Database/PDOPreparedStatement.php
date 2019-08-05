<?php
/**
 * Created by PhpStorm.
 * User: Legion
 * Date: 7/10/2019
 * Time: 9:00 PM
 */

namespace Database;


class PDOPreparedStatement implements StatementInterface
{

    private $pdoStatement;

    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function execute(array $params = []) : ResultSetInterface
    {
        $this->pdoStatement->execute($params);
        return new PDOResultSet($this->pdoStatement);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Legion
 * Date: 7/10/2019
 * Time: 8:54 PM
 */

namespace Database;


interface DatabaseInterface
{
    public function query(string $query) : StatementInterface;
}
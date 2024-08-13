<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    function __construct($config, $username = 'root', $password = '')
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    function query($query, $parames = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($parames);

        return $this;
    }

    function find()
    {
        return $this->statement->fetch();
    }

    function findOrFail()
    {
        $result = $this->find();
        if (!$result)
            abort();

        return $result;
    }

    function get()
    {
        return $this->statement->fetchAll();
    }
}

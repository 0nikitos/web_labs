<?php

$PDO;

// подключение к базе

try {
    $config = include_once 'config/database.php';

    $PDO = new \PDO(
        "mysql:dbname={$config['name']};host={$config['host']}",
        $config['user'],
        $config['password'],
        [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_LOCAL_INFILE => true
        ]
    );
} catch (\PDOException $exc) {
    die($exc->getMessage());
}

// подключение функций для работы с базой
include_once 'database.php';
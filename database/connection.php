<?php

$config = include_once 'config.php';

$dsn = "mysql:host={$config['host']};dbname={$config['database']}";

$options = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

try {
    return new PDO($dsn, $config['username'], $config['password'], $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
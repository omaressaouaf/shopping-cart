<?php

function connect_to_database(): PDO
{
    try {
        $dsn = 'mysql:host=localhost;dbname=ensa-shopping-cart';
        $username = 'root';
        $password = '';

        return new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

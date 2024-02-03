<?php

function connect_to_database(): PDO
{
    try {
        $dsn = 'mysql:host=localhost;dbname=ensa-shopping-cart';
        $username = 'root';
        $password = '';

        $pdo = new PDO($dsn, $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

function fetch_products(): array
{
    try {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM products");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Fetching products failed: ' . $e->getMessage());
    }
}

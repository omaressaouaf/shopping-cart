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

function fetch_cart_items(): array
{
    try {
        global $pdo;

        if (empty($_SESSION['cart'])) {
            return [];
        }

        $cart = $_SESSION['cart'];

        $product_ids = array_keys($cart);

        $placeholders = rtrim(str_repeat('?,', count($product_ids)), ',');

        $query = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");

        $query->execute($product_ids);

        $products = $query->fetchAll(PDO::FETCH_ASSOC);

        $cart_items = [];

        foreach ($products as $product) {
            $cart_items[] = [
                ...$product,
                'quantity' => $cart[$product['id']]
            ];
        }

        return $cart_items;
    } catch (PDOException $e) {
        die('Fetching cart items failed: ' . $e->getMessage());
    }
}

function add_to_cart(int $product_id): void
{
    $_SESSION['cart'][$product_id] = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id] + 1 : 1;
}

function remove_from_cart(int $product_id): void
{
    unset($_SESSION['cart'][$product_id]);
}

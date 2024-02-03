<?php

require_once "../shared/functions.php";

$pdo = connect_to_database();

function product_factory(string $name, float $price, string $image): void
{
    global $pdo;

    $query = $pdo->prepare("INSERT INTO products (name, price, image) VALUES (:name, :price, :image)");

    $query->bindParam(':name', $name);
    $query->bindParam(':price', $price);
    $query->bindParam(':image', $image);

    $query->execute();
}

product_factory("Nike T-shirt", 25, "https://www.invog.ma/cdn/shop/products/326890-00-d-683341_394x.jpg?v=1679569624");

product_factory("Sneakers", 15, "https://static.nike.com/a/images/t_default/a3e7dead-1ad2-4c40-996d-93ebc9df0fca/dunk-low-retro-mens-shoes-87q0hf.png");

echo "Products scaffolded successfully!\n";

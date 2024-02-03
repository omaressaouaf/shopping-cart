<?php
require "./functions.php";

session_start();

$pdo = connect_to_database();

if (isset($_GET['cart_action']) && $_GET['cart_action'] == 'add' && isset($_GET['product_id'])) {
    add_to_cart($_GET['product_id']);
}

if (isset($_GET['cart_action']) && $_GET['cart_action'] == 'remove' && isset($_GET['product_id'])) {
    remove_from_cart($_GET['product_id']);
}

$cart_items = fetch_cart_items();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="./styles/cart.css">
</head>

<body>
    <h2>Shopping Cart</h2>

</body>

</html>

<?php

require_once "./shared/functions.php";

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

    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php require_once "./shared/nav.php" ?>

    <h2>Shopping Cart</h2>

    <?php foreach ($cart_items as $cart_item) : ?>
        <div class="cart-item">
            <img src="<?= $cart_item['image'] ?>" alt="<?= $cart_item['name'] ?>">
            <p><?= $cart_item['name'] ?></p>
            <p>$<?= $cart_item['price'] ?></p>
            <a href="cart.php?cart_action=remove&product_id=<?= $cart_item['id'] ?>" class="remove-from-cart">Remove from Cart</a>
        </div>
    <?php endforeach; ?>
</body>

</html>

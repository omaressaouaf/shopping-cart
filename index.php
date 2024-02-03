<?php

require "./functions.php";

$pdo = connect_to_database();

$products = fetch_products();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <h2>Product List</h2>

    <?php foreach ($products as $product) : ?>
        <div class="product">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <p><?= $product['name'] ?></p>
            <p>$<?= $product['price'] ?></p>
            <a href="cart.php?action=add&id=<?= $product['id'] ?>" class="add-to-cart">Add to Cart</a>
        </div>
    <?php endforeach; ?>
</body>

</html>

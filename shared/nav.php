<nav>
    <a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Product List</a>
    <a href="cart.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'cart.php') ? 'class="active"' : ''; ?>>Shopping Cart</a>
</nav>

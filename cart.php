<?php
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');

$items = [
    1 => ['name' => 'mens T-Shirt', 'price' => 1000],
    2 => ['name' => 'mens Shoes', 'price' => 3000],
    3 => ['name' => 'mens Watch', 'price' => 1500]
    4 => ['name' => 'mens wallet' => 4000],
    5 => ['name' => 'prada eyewear' => 2000],
    6 => ['name' => 'sauvage' => 16000],
];

$cart = $_SESSION['cart'] ?? [];

if (isset($_POST['remove'])) {
    unset($_SESSION['cart'][$_POST['remove']]);
    header('Location: cart.php');
}
?>

<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Cart is empty.</p>
<?php else: ?>
    <form method="post">
    <ul>
        <?php foreach ($cart as $id => $qty): ?>
            <li><?= $items[$id]['name'] ?> - Qty: <?= $qty ?> - 
                Price: <?= $items[$id]['price'] * $qty ?> 
                <button type="submit" name="remove" value="<?= $id ?>">Remove</button>
            </li>
        <?php endforeach; ?>
    </ul>
    </form>
    <a href="checkout.php">Go to Checkout</a>
<?php endif; ?>
<a href="home.php">Back to Home</a>
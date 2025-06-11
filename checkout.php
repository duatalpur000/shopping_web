<?php
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');

$items = [
    1 => ['name' => 'men T-Shirt', 'price' => 1000],
    2 => ['name' => ' mens Shoes', 'price' => 3000],
    3 => ['name' => 'mens Watch', 'price' => 1500],
    4 => ['name' => 'mens wallet' => 4000],
    5 => ['name' => 'prada eyewear' => 2000],
    6 => ['name' => 'sauvage' => 16000],

];

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<h2>Checkout</h2>
<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cart as $id => $qty): 
            $price = $items[$id]['price'] * $qty;
            $total += $price;
        ?>
            <li><?= $items[$id]['name'] ?> - Rs. <?= $price ?> (x<?= $qty ?>)</li>
        <?php endforeach; ?>
    </ul>
    <h3>Total Bill: Rs. <?= $total ?></h3>
    <form method="post">
        <button name="checkout">Place Order</button>
    </form>
<?php endif; ?>

<?php
if (isset($_POST['checkout'])) {
    unset($_SESSION['cart']);
    echo "<p>Thank you for shopping! Your order has been placed.</p>";
}
?>
<a href="home.php">Shop More</a>
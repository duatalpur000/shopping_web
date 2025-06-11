<?php
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');

$items = [
    1 => ['name' => 'T-Shirt', 'price' => 1000],
    2 => ['name' => 'Shoes', 'price' => 3000],
    3 => ['name' => 'Watch', 'price' => 1500],
    4 => ['name' => 'mens wallet' => 4000],
    5 => ['name' => 'prada eyewear' => 2000],
    6 => ['name' => 'sauvage' => 16000],
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['item_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header('Location: cart.php');
}
?>

<h2>Welcome, <?= $_SESSION['user'] ?></h2>
<h3>Items</h3>
<form method="post">
<?php foreach ($items as $id => $item): ?>
    <p><?= $item['name'] ?> - Rs. <?= $item['price'] ?>
        <button type="submit" name="item_id" value="<?= $id ?>">Add to Cart</button>
    </p>
<?php endforeach; ?>
</form>
<a href="cart.php">Go to Cart</a>
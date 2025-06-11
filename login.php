<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == 'admin' && $pass == '123') {
        $_SESSION['user'] = $user;
        header('Location: home.php');
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<form method="post">
    <h2>Login</h2>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<?php if (isset($error)) echo $error; ?>

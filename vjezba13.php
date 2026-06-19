<?php
session_start();
$admin = 'admin';
$pass = 'loz123';

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($user === $admin && $password === $pass) {
        $_SESSION['login'] = $user;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $msg = 'Pogrešan korisnik ili lozinka';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Login</h3>

<?php if ($msg): ?>
  <p><?php echo $msg; ?></p>
<?php endif; ?>

<?php if (!isset($_SESSION['login'])): ?>
    <form method="POST">
        <label>Korisnik:</label><br>
        <input type="text" name="user" required><br><br>

        <label>Lozinka:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Prijava</button>
    </form>

    <p><b>Admin: </b>admin | loz123</p>

<?php else: ?>
    <p>Prijavljeni ste kao: <b><?php echo $_SESSION['login']; ?></b></p>
    <a href="?logout=1">Odjava</a>
<?php endif; ?>

</body>
</html>

<!-- Naziv datoteke: vjezba13.php -->
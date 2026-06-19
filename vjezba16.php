<?php
$msg = "";
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = new PDO(
            "mysql:host=localhost;dbname=databaza;charset=utf8mb4",
            "root",
            ""
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $email     = $_POST['email'];
        $username  = $_POST['username'];
        $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $country   = $_POST['country'];
 
        $query = "
            INSERT INTO korisnici (firstname, lastname, email, username, password, country)
            VALUES (:firstname, :lastname, :email, :username, :password, :country)
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname'  => $lastname,
            ':email'     => $email,
            ':username'  => $username,
            ':password'  => $password,
            ':country'   => $country,
        ]);
 
        $msg = "Korisnik je registriran.";
 
    } catch (PDOException $e) {
        $msg = "Greška: " . $e->getMessage();
    }
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
    <h3>Registracija</h3>
 
<?php if ($msg): ?>
    <p><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>
 
<form method="POST" action="">
 
    <label>First name:</label><br>
    <input type="text" name="firstname" placeholder="Your name..." required><br><br>
 
    <label>Last name:</label><br>
    <input type="text" name="lastname" placeholder="Your last name..." required><br><br>
 
    <label>E-mail:</label><br>
    <input type="email" name="email" placeholder="Your e-mail..." required><br><br>
 
    <label>Username (min 5, max 10 znakova):</label><br>
    <input type="text" name="username" placeholder="Username..." minlength="5" maxlength="10" required><br><br>
 
    <label>Password (min 4 znaka):</label><br>
    <input type="password" name="password" placeholder="Password..." minlength="4" required><br><br>
 
    <label>Country:</label><br>
    <select name="country">
        <option value="">odaberite</option>
        <option value="HR">Hrvatska</option>
        <option value="DE">Njemačka</option>
        <option value="US">SAD</option>
    </select><br><br>
 
    <input type="submit" value="Submit">
 
</form>
</body>
</html>

<!-- Naziv datoteke: vjezba16.php -->
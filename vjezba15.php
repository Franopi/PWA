<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <label>Upiši ime ili prezime</label>
        <input type="text" name="rijec" required>
        <button type="submit">Traži</button>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rijec = trim($_POST["rijec"]);
    $con = mysqli_connect("localhost", "root", "", "databaza");
    if (!$con) die("DB error");
    $sql = "SELECT name, lastname, username
        FROM users
        WHERE name LIKE ? OR lastname LIKE ?
        ORDER BY lastname ASC
        LIMIT 50";

    $stmt = mysqli_prepare($con, $sql);

    $like = "%".$rijec."%";
    mysqli_stmt_bind_param($stmt, "ss", $like, $like);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $name, $lastname, $username);
    
    echo "<h3>Rezultati:</h3>";
    $found = false;

    while (mysqli_stmt_fetch($stmt)) {
        $found = true;

        echo "<p>";
        echo "Ime: " . htmlspecialchars($name) . "<br>";
        echo "Prezime: " . htmlspecialchars($lastname) . "<br>";
        echo "Username: " . htmlspecialchars($username);
        echo "<hr>";
    }

    if (!$found) {
        echo "<p>Nema korisnika</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
</body>
</html>

<!-- Naziv datoteke: vjezba15.php -->
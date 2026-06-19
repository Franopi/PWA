<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = (3 * $a - $b) / 2;
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

<form method="post">
    Vrijednost a: <input type="number" name="a" required><br><br>
    Vrijednost b: <input type="number" name="b" required><br><br>
    <input type="submit" value="Pošalji"><br>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<br>a = $a";
    echo "<br>b = $b";
    echo "<br>c = (3*$a - $b)/2 = $c";
}
?>

</body>
</html>

<!-- Naziv datoteke: vjezba2-4.php -->
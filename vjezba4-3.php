<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Ulazni niz</h3>

<form method="post">
    <textarea name="recenica" cols="100"></textarea>
    <br><br>
    <input type="submit" value="Prebroji">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $recenica = $_POST["recenica"];
    $brojRijeci = str_word_count($recenica);

    echo "<p><b>Ulazni niz:</b> $recenica</p>";
    echo "<p><b>Broj riječi:</b> $brojRijeci</p>";
}
?>
</body>
</html>

<!-- Naziv datoteke: vjezba4-3.php -->
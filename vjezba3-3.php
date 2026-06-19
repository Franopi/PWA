<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p>Ocjene</p>
<form method="post">
        <label for="a"><b>Ocjena I kolokvija:</b></label>
        <input type="number" id="a" name="a" min="1" max="5" required><br>
        <label for="b"><b>Ocjena II. kolokvija:</b></label>
        <input type="number" id="b" name="b" min="1" max="5" required><br><br>
        <input type="submit" value="Pošalji">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ocjene = array(
        "a" => $_POST['a'],
        "b" => $_POST['b']
    );

    $a = (int)$ocjene["a"];
    $b = (int)$ocjene["b"];

    echo "<hr><br>";

    $prosjek = ($a + $b) / 2;
    $konacna = round($prosjek);

    echo "Ocjena I. kolokvija: $a<br>";
    echo "Ocjena II. kolokvija: $b<br><br>";
    if ($a == 1 || $b == 1) {
        echo "Konačna ocjena: 1";
    }
    else{
        echo "Prosjek: $prosjek<br>";
        echo "Konačna ocjena: $konacna";
    }
}
?>

</body>
</html>

<!-- Naziv datoteke: vjezba3-3.php -->
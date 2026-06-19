<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Odaberi jedno vozilo</p>

<form method="post">

    <?php
    $cars = array("Audi", "BMW", "Renault", "Citroen");
    foreach ($cars as $car) {
        echo "<input type='radio' name='vozilo' value='$car'> $car <br>";
    }
    ?>

    <br>
    <input type="submit" value="Pošalji">
    <br><br>

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["vozilo"])) {
        $odabranoVozilo = $_POST["vozilo"];
        echo "Odabrali ste: <b>$odabranoVozilo</b>";
    } else {
        echo "Odaberi vozilo";
    }
}
?>

</body>
</html>

<!-- Naziv datoteke: vjezba4-1.php -->
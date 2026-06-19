<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Igra (pogodi broj)</p>
    <form method="POST">
        <label><b>Upiši broj od 1 do 9:</b></label>
        <input type="number" name="broj" min="1" max="9" required autofocus><br><br>
    </form>

<?php
if (isset($_POST['broj'])) {
    $broj = (int)$_POST['broj'];
    $rand_broj = rand(1, 9);

    if ($broj == $rand_broj) {
        echo "<div style='background:green; color:white; padding:10px; display:inline-block; border-radius:5px;'>
                Pogodak, probaj ponovno!
              </div><br><br>";
    } else {
        echo "<div style='background:red; color:white; padding:10px; display:inline-block; border-radius:5px;'>
                Krivo, probaj ponovno!
              </div><br><br>";
    }

    echo "Zamišljeni broj je $rand_broj";
}
?>
</body>
</html>

<!-- Naziv datoteke: vjezba3-1.php -->
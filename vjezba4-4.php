<?php
function prost($broj) {
    if ($broj <= 1) {
        return false;
    }

    for ($i = 2; $i < $broj; $i++) {
        if ($broj % $i == 0) {
            return false;
        }
    }

    return true;
}

echo "<h3>Prosti brojevi manji od 100:</h3>";

for ($i = 2; $i < 100; $i++) {
    if (prost($i)) {
        echo $i . " ";
    }
}

?>

<!-- Naziv datoteke: vjezba4-4.php -->
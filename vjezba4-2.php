<?php
function ducan($stanje = "otvoren") {
    echo "Dućan je <b>$stanje</b>";
}

$sat = date("G");
$dan = date("N"); 

if ($dan >= 1 && $dan <= 5) {
    if ($sat >= 8 && $sat < 20) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
} elseif ($dan == 6) {
    if ($sat >= 9 && $sat < 14) {
        ducan("otvoren");
    } else {
        ducan("zatvoren");
    }
} else {
    ducan("zatvoren");
}

echo "<p>Trenutni dan: " . date("l") . "</p>";
echo "<p>Trenutni sat: " . date("H:i") . "</p>";
?>

<!-- Naziv datoteke: vjezba4-2.php -->
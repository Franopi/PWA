<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>Kalkulator (switch naredba)</p>
    <form method="POST">
        <label><b>Upiši prvi broj:</b></label>
        <input type="number" name="broj1" required value="<?php echo $_POST['broj1'] ?? ''; ?>"><br><br>
        <label><b>Upiši drugi broj:</b></label>
        <input type="number" name="broj2" required value="<?php echo $_POST['broj2'] ?? ''; ?>"><br>

    <p>Rezultat:
<?php
    if (isset($_POST['broj1'], $_POST['broj2'])) {

        $a = (float) $_POST['broj1'];
        $b = (float) $_POST['broj2'];
        $gumb = $_POST['gumb'] ?? '+';

        switch ($gumb) {
            case '+': $rez = $a + $b; break;
            case '-': $rez = $a - $b; break;
            case '*': $rez = $a * $b; break;
            case '/': $rez = ($b != 0) ? $a / $b : "Dijeljenje s nulom"; break;
            default:  $rez = $a + $b;
        }

        echo $rez;
    }
?>
    </p>
        
    <button type="submit" name="gumb" value="+">+</button>
    <button type="submit" name="gumb" value="-">-</button>
    <button type="submit" name="gumb" value="*">*</button>
    <button type="submit" name="gumb" value="/">/</button>
    </form>

</body>
</html>

<!-- Naziv datoteke: vjezba3-2.php -->
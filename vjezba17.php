<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Popis korisnika</h3>

<?php
try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=databaza;charset=utf8mb4",
        "root",
        ""
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "
        SELECT
            users.id,
            users.firstname,
            users.lastname,
            COALESCE(country.country_name, 'nepoznato') AS country_name
        FROM users
        LEFT JOIN country ON country.country_code = users.country
        ORDER BY users.firstname ASC
    ";

    $stmt = $conn->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Greška: " . $e->getMessage());
}
?>

<?php if (empty($users)): ?>
    <p>Nema korisnika u bazi.</p>
<?php else: ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= htmlspecialchars($user['firstname']) ?>
                <?= htmlspecialchars($user['lastname']) ?>
                (<?= htmlspecialchars($user['country_name']) ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>

<!-- Naziv datoteke: vjezba17.php -->
<?php

session_start();

if (isset($_SESSION["user_id"])){
    $pdo = require __DIR__ . "/database.php";

    $sql = "SELECT*FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $pdo->query($sql);

    $user = $result->fetch (PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heml</title>
</head>
<body>

    <h1>Hem</h1>

    <?php if (isset($user)): ?>

        <p>Välkommen, <?= htmlspecialchars($user["name"]) ?></p>
        <p><a href="logout.php">Logga Ut</a></p>

    <?php else: ?>

        <p><a href="login.php">Logga In</a> eller <a href="signup.html">Registrera Dig</a></p>

        <?php endif; ?>

    </body>
    </html>
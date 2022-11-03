<?php

$is_invalid = false;
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $pdo = require __DIR__ . "/database.php";

        $sql = sprintf("SELECT*FROM user WHERE email = '%s'", $_POST["email"]);

        $result = $pdo->query($sql);
        $user = $result->fetch (PDO::FETCH_ASSOC);

        if($user){
            
            if (password_verify($_POST["password"], $user["password_hash"])){
                
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("Location: index.php");
                exit;
            }
        }
        $is_invalid = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga In - Hälsans Vårdcentral</title>
</head>
<body>

    <h1>Logga In - Hälsans Vårdcentral</h1>

        <?php if ($is_invalid): ?>
        <em>Fel Inloggningsuppgifter</em> <br>
        <?php endif; ?>

    <form method="post">
        <label for ="email">email</label>
        <input type="email" name="email" id="email">

        <label for ="password">password</label>
        <input type="password" name="password" id="password">

        <button type="submit">Logga In</button>
    </form>

</body>
</html>
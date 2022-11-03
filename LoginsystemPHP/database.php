<?php

try{
$pdo = new PDO('mysql:dbname=grupp2;host=localhost', 'sqllab', 'Hare#2022');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    $error=$e->getMessage();
}

if (isset($pdo)){

    echo "Ansluten";
} else {
    echo "Ej ansluten";
}

return $pdo;
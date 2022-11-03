<?php

if(empty($_POST["name"])){
    die("Namn kan inte vara tomt");
}

if(empty($_POST["telefon"])){
    die("Telefonnummer kan inte vara tomt");
}

if(empty($_POST["pnr"])){
    die("Personnummer kan inte vara tomt");
}

if(strlen($_POST["password"]) < 8){
    die("Lösenordet måste innehålla minst 8 tecken");
}

if($_POST["password"] !== $_POST["password_confirmation"]){
    die("Lösenorden matchar inte");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$pdo = require __DIR__ . "/database.php";


$querystring = "INSERT INTO user (name, email, telefon, pnr, password_hash) VALUES (:name, :email, :telefon, :pnr, :password_hash)";
$stmt = $pdo->prepare($querystring);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':telefon', $_POST['telefon']);
$stmt->bindParam(':pnr', $_POST['pnr']);
$stmt->bindParam(':password_hash', $password_hash);


if ($stmt->execute()){
    header("Location:signup-success.html");
    exit;
} else {
    echo "Någonting gick snett";
}





// print_r($_POST);
// var_dump($password_hash);



<?php 
session_start();

if(empty($_SESSION)) {
    session_destroy();
    header("Location: /login/");
}

$email= $_SESSION['email'];
$password = $_SESSION['password'];

$query = $con->prepare("SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password'");
$query -> execute();
$check = $query->fetch(PDO::FETCH_ASSOC);

if (empty($check)) {
    session_destroy();
    header("Location: /login/?login=failed");
}
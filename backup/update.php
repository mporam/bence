<?php

if (empty($_POST)) {
    header('Location: /account/update');
    exit;
}

if
(
    empty($_POST['name'])
    || empty($_POST['email'])
    || empty($_POST['company'])
    || empty($_POST['address1'])
    || empty($_POST['address2'])
    || empty($_POST['address3'])
    || empty($_POST['postcode'])
    || empty($_POST['phone'])
) {
    header('Location: /account/update/?update=incomplete');
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');

session_start();
$id = $_SESSION['id'];

$name = $_POST['name'];
$email = $_POST['email'];

$company = $_POST['company'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$address3 = $_POST['address3'];
$address4 = (empty($_POST['address4']) ? null : $_POST['address4']);
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$mobile = (empty($_POST['mobile']) ? null : $_POST['mobile']);

if (!empty($_POST['password'])) {

    $query = $con->prepare("SELECT `salt` FROM users WHERE `email` = '$email'");
    $query -> execute();
    $salt = $query->fetchColumn();
    $password = $_POST['password'];

    $password = sha1($password . $salt);

    $query = $con->prepare("UPDATE users SET `name`='$name', `email`='$email', `password`='$password', `company`='$company', 
`address1`='$address1', `address2`='$address2', `address3`='$address3', `address4`='$address4', `postcode`='$postcode', `phone`='$phone', `mobile`='$mobile' WHERE `id`='$id'; ");

} else {

    $query = $con->prepare("UPDATE users SET `name`='$name', `email`='$email', `company`='$company', 
`address1`='$address1', `address2`='$address2', `address3`='$address3', `address4`='$address4', `postcode`='$postcode', 
`phone`='$phone', `mobile`='$mobile' WHERE `id`='$id'; ");

}

try {	
    $query->execute();
			
} catch (PDOException $e) {
    header('Location: /account/update/?update=error');
    exit;
}

// update the $_SESSION before returning
$query = $con->prepare("SELECT * FROM users LEFT JOIN regions ON users.region=regions.r_id WHERE users.id = '$id'");
$query -> execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$_SESSION = array_merge($_SESSION, $result);

header('Location: /account/update/?update=success');
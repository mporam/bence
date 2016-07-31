<?php
// file for saving promo selection
if (empty($_GET['promo'])) {
    header('Location: /account/');
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');
session_start();

$promo = $_GET['promo'];
$id = $_GET['user'];

$query = $con->prepare("UPDATE users SET `promo`='$promo' WHERE `accNo`='$id';");

try {
    $query -> execute();
} catch(PDOException $e) {
    header('Location: /account/?promo=error');
    exit;
}
$query = $con->prepare("SELECT `title` FROM promotions2015 WHERE `id` = '$promo'");
$query -> execute();
$promoTitle = $query -> fetchColumn();

$_SESSION['promo'] = $promo;

$message = "Hi Admin,

" . $_SESSION['name'] . " has requested their promo: " . $promoTitle . ".

You can contact them here: " . $_SESSION['email'] . "

Company: " . $_SESSION['company'] . "

Their contact number is: " . $_SESSION['phone'] . "

Their Account number is: " . $_SESSION['accNo'] . "

Many thanks,

BSS Promotions Website
";

$Cmessage = "Hi " . $_SESSION['name'] . ",

You have selected the following promotion: 
" . $promoTitle . ". 

If you would like to change your promotion before the closing date please log into your account and select a different promotion from those available.

We will be in touch after the closing date with further details.

Many thanks,

BSS Promotions
0117 951 4050
info@bss-promotions.co.uk
";

require($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Host     = "mailout.one.com"; // SMTP server
$mail->SetFrom("no-reply@bss-promotions.co.uk", 'BSS Promotions');
$mail->AddAddress('info@bss-promotions.co.uk');
$mail->Subject  = 'Promotions Booking';
$mail->Body     = $message;
$mail->WordWrap = 78;

$Cmail = new PHPMailer();
$Cmail->IsSMTP();  // telling the class to use SMTP
$Cmail->Host     = "mailout.one.com"; // SMTP server
$Cmail->SetFrom("no-reply@bss-promotions.co.uk", 'BSS Promotions Booking');
$Cmail->AddAddress($_SESSION['email']);
$Cmail->Subject  = 'BSS Promotions Booking';
$Cmail->Body     = $Cmessage;
$Cmail->WordWrap = 78;

if($mail->Send() && $Cmail->Send()) {
	header('Location: /account/?user=' . $id . '&promo=success');
	exit;
} else {
    header('Location: /account/?user=' . $id . '&promo=error');
    exit;
}

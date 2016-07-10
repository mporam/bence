<?php 
if(!empty($_POST['email']) || !empty($_COOKIE['tp-promotions'])) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');

    if(!empty($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $con->prepare("SELECT `salt` FROM users WHERE `email` = '$email'");
        $query->execute();
        $salt = $query->fetchColumn();

        if (empty($salt)) {
            header("Location: /login/?login=failed");
            exit;
        }

        $password = sha1($password . $salt);

    } else {
        $auth = json_decode($_COOKIE['tp-promotions']);

        $email = $auth->email;
        $password = $auth->password;
    } 

    $query = $con->prepare("SELECT * FROM users LEFT JOIN regions ON users.region=regions.r_id WHERE users.email= '$email' AND users.password = '$password'");
    $query -> execute();
    session_start();
    $_SESSION = $query->fetch(PDO::FETCH_ASSOC);

    if (empty($_SESSION)) {
        session_destroy();
		header("Location: /login/?login=failed");
        exit;
    }

    if ($_SESSION['verified'] != 1) {
        session_destroy();
		header("Location: /login/?login=unverified");
        exit;
    }
	
    $accNo = $_SESSION['accNo'];

    $query = $con->prepare("SELECT * FROM `limits2015` WHERE `accNo` = '$accNo'");
    $query -> execute();
    $limits = $query->fetch(PDO::FETCH_ASSOC); // get users limits
    if (!empty($limits)) {
        $_SESSION = $_SESSION + $limits; // adds limits to session
    }

    if ($_POST['remember']) {
        $value = array(
            'email' => $_SESSION['email'],
            'password' => $_SESSION['password']
        );
        $expiry = time()+(365 * 24 * 60 * 60);
        setcookie("tp-promotions", json_encode($value), $expiry, '/');
     }

    $query = $con->prepare("SELECT * FROM `expenses2015` WHERE `accNo` = '$accNo'");
    $query -> execute();
    $expenses = $query->fetch(PDO::FETCH_ASSOC); // get users expenses

    $null = array_shift($expenses); // remove accNo from array

    $_SESSION['expenses'] = $expenses;

    $_SESSION['expenses']['Total'] = intval(array_sum($_SESSION['expenses'])); // calculate the total client expenses

    $_SESSION['expenses']['teir1'] = false;
    $_SESSION['expenses']['teir2'] = false;
	$_SESSION['expenses']['teir3'] = false;
    if ($_SESSION['expenses']['Total'] >= $_SESSION['t1limit']) { $_SESSION['expenses']['teir1'] = true; } // allow user to see teir1
    if ($_SESSION['expenses']['Total'] >= $_SESSION['t2limit']) { $_SESSION['expenses']['teir2'] = true; } // allow user to see teir2
	if ($_SESSION['expenses']['Total'] >= $_SESSION['t3limit']) { $_SESSION['expenses']['teir3'] = true; } // allow user to see teir3
	
	$_SESSION['access'] = (int)$_SESSION['access'];

    header("Location: /account/");

} else {
    header("Location: /login/?login=false");
}
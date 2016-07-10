<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');
if (!empty($_POST['email'])) {
	$email = $_POST['email'];

	$query = $con->prepare("SELECT * FROM users WHERE `email` = '$email';");
	$query -> execute();
	$user = $query->fetch();

	if (!empty($user)) {
		
		$resetKey = sha1($user['email'] . time());
		$query = $con->prepare("UPDATE users SET pwreset='$resetKey' WHERE `email`='$email';");
		try {	
			$query->execute();	
		} catch (PDOException $e) {
			header('Location: passwordreset?user=error');
			exit;
		}
		
		require($_SERVER['DOCUMENT_ROOT'] . "/includes/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP();  // telling the class to use SMTP
		$mail->Host     = "mailout.one.com"; // SMTP server
		
$message = "Hi " . $user['name'] . ",

You have requested a password reset, click the link below to reset your password. If you did not request this please discard this email.

http://www.bss-promotions.co.uk/login/passwordreset.php?id=" . $resetKey . "

Many Thanks,

BSS Promotions Team
0117 9527740";
		
		$mail->SetFrom("no-reply@bss-promotions.co.uk", 'BSS Promotions');
		$mail->AddAddress($email);
		$mail->Subject  = 'BSS Promotions Password Reset';
		$mail->Body     = $message;
		$mail->WordWrap = 78;
		
		if($mail->Send()) { ?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
            <head>
                <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
                <meta name="description" content="" />
                <meta name="keywords" content="" />
                <meta name="author" content="Finders Keepers Ltd" />
                <link rel="stylesheet" type="text/css" href="/css/style.css" title="1024px style" media="screen,projection" />
                <title>BSS Reward Scheme 2015 | Powered by Finders Keepers Ltd</title>
            </head>

            <body>
            <div id="wrap">

                <div id="header">
                    <p id="toplinks">
                        <?php
                        session_start();
                        echo (empty($_SESSION['accNo'])) ? "<a href='/login/'>Login</a>&nbsp;&nbsp;&nbsp;" : "<a href='/account/'>Account</a> | <a href='/account/logout.php'>Logout</a>&nbsp;&nbsp;&nbsp;";
                        ?></p>
                    <h1>&nbsp;</h1>
                    <p id="slogan">&nbsp;</p>
                </div>
                <div id="content">
                    <h2>Thank you</h2>
                    <p>Your password reset email has been sent. Please close this page and click the link in your email.</p>
                    <p><br />
                        <br />
                    </p>
                </div>

                <div id="sidebar">
                    <h2>&nbsp;</h2>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>

                <div id="footer">
                    <p><a href="/contact">Contact us | </a><a href="/terms">Terms and Conditions</a> | <a href="/privacy">Privacy policy </a>| <a href="/access">Access Statement </a>|<a href="/conditions"> Conditions of use </a>| <a href="#header">Back to top</a> <br />
                        &copy; 2014 Finders Keepers Ltd | Design by <a href="http://www.finderskeepersuk.com/" target="_new">Finders Keepers Sports and Marketing Ltd<br />
                        </a></p>
                    <div><strong>Registered office:</strong> Lodge Way House,&nbsp;&nbsp;Lodge Way,&nbsp;&nbsp;Harlestone Road,&nbsp;&nbsp;Northampton&nbsp;&nbsp;NN5 7UG</div>
                    <p>Registered in England No: 00824821 VAT registration number: 408556737</p>
                    <p></p>
                    <p><a href="http://www.finderskeepersuk.com/" target="_new"></a></p>
                </div>

            </div>
            </body>
            </html>
		<?php }
		
		
	} else {
		header('Location: passwordreset.php?user=incorrect');
	}
} else if (!empty($_POST['password']) && !empty($_GET['user'])) {
	$password = $_POST['password'];
	$user = $_GET['user'];
	$query = $con->prepare("SELECT * FROM users WHERE `pwreset` = '$user'");
	$query -> execute();
	$user = $query->fetch();
	$password = sha1($password . $user['salt']);
	$id = $user['id'];
	
	$query = $con->prepare("UPDATE users SET pwreset=null, password='$password' WHERE `id`='$id';");
	try {	
		$query->execute();	
	} catch (PDOException $e) {
		header('Location: passwordreset?user=error');
		exit;
	}
	
	header('Location: /login/?reset=success');
	
} else {
	header('Location: passwordreset.php');
	exit;
}
?>

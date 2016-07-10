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
    <p id="toplinks"><a href="/index.php">Home&nbsp;</a></p>
    <h1>&nbsp;</h1>
    <p id="slogan">&nbsp;</p>
  </div>
  <div id="content">

<?php
if (!empty($_GET['id'])) { ?>
	<h2>Change Password</h2>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');
	$userKey = $_GET['id'];
	
	$query = $con->prepare("SELECT * FROM users WHERE `pwreset` = '$userKey';");
	$query -> execute();
	$user = $query->fetch();
	
	if (!empty($user)) { ?>
    <p>Use the below form to reset your password.</p>
	<form action="sendreset.php?user=<?php echo $_GET['id']; ?>" method="POST">
    	<label>New Password:</label>
    	<input type="password" name="password" id="password">
        <input type="submit" value="Change Password">
    </form>
    
    <?php
	} else { ?>
	
    <p>That reset ID does not exist or has expired, please click the link provided in the email. If you are sure the link is correct please request a new <a href="passwordreset.php">password reset</a>.</p>
    
<?php } } else { 
 
	if (!empty($_GET['user']) && $_GET['user'] == "incorrect") {
		echo "<p>There is no user registered with that email address. Please try again.</p>";
	} 
	if (!empty($_GET['user']) && $_GET['user'] == "error") {
		echo "<p>There has been an unexpected error. Please try again.</p>";
	}
	?>
    
    <h2>Password Reset Request</h2>
	
        	<div style="float: right; width: 50%;">
		<h3 style="margin-top: 0px;">Forgotten Your Password?</h3>
		<p>Forgotten your password? Use the form to send a forgotten password request. You should receive your email within 5 mins.</p>
		<h3>Still not got the email?</h3>
		<p>If not check your Spam/Junk folder. If you still don't receive your email, please contact us at <a href="mailto:info@bss-promotions.co.uk">info@bss-promotions.co.uk</a>.</p>
	</div>
	<p>If you've forgotten your password, please enter your email in the box below and press send.</p>
	<p>
	
    <form action="sendreset.php" method="POST">
    	<label><strong>Email:</strong></label>
    	<input type="email" name="email" id="email" size="35" style="width: 300px; height: 25px;"><BR /><BR />
        <input type="submit" value="Send" style="width: 50px; height: 25px;">
    </form>
	</p>
<?php } ?>

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
<p>&nbsp;</p>
<p><a href="http://www.finderskeepersuk.com/" target="_new"></a></p>
</div>

</div>
</body>
</html>
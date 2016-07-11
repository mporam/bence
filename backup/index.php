<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/sql/db_con.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/account/verify.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/class/breadcrumbs.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/class/account.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/userPermissions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/class/stat.class.php');

$account = new Account();

$stat = new Stat($con);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>BSS Reward Scheme 2014 | Powered by Finders Keepers Ltd</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Finders Keepers Ltd" />

<link rel="stylesheet" type="text/css" href="/css/style.css"  />

<link rel="stylesheet" href="/css/lytebox.css" type="text/css" media="screen" /> 
<script type="text/javascript" language="javascript" src="/css/lytebox.js"></script> 
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery.knob.js" type="text/javascript"></script>
<script src="/js/jquery.leanModal.min.js" type="text/javascript"></script>


<link rel="stylesheet" href="/themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script>

    $(function() {
		$("a[rel*=leanModal]").leanModal({ closeButton: ".modal_close" });
        $(".dial").knob({
			draw: function () {
				$(this.i).val(this.cv + '%') //Puts a percent after values
			}
		});
    });
	
	function nivoslider(nivoclass) {
		$(nivoclass).nivoSlider({
			effect:'fade',
			animSpeed:200,
			pauseTime:3000,
			directionNav:true, //Next & Prev
			controlNav:false, //1,2,3...
			pauseOnHover:true, //Stop animation while hovering
		});
	}
	
</script>

</head>
<body>
<div id="wrap">
<div id="header">
<p id="toplinks"><a href="/account/logout.php">Logout</a></p>
<h1>&nbsp;</h1>
<p id="slogan" style="text-align: right; color: #FFF;">Tel: <span style="color: #FFFFFF;"> 0117 9527740 </span><BR /><strong>Email: </strong><a href="mailto: info@bss-promotions.co.uk">info@bss-promotions.co.uk</a></p>
</div>



<div id="content">
  <h2>Account Details</h2>
  
	<?php
	$breadcrumbs = new Breadcrumbs();
	echo $breadcrumbs->showBreadcrumbs($curUser, $_SESSION, $user4, $user3, $user2);
	?>
<br />
<?php if($_SESSION['name'] == $curUser['name']){
echo "Hello, " . $_SESSION['name'];
} ?>




    <?php if (!empty($_GET['promo']) && $_GET['promo'] == 'error') { ?>
   		<div class="error">There has been an unexpected error, please try again later.</div>
    <?php } else if (!empty($_GET['promo']) && $_GET['promo'] == 'success') { ?>
        <div class="warning">Your promotion selection has been updated.</div>
    <?php }
	
	echo $account->showDetails($curUser); ?>

    <?php if ($curUser['access'] == 5) { // super admin ?>
<div>
            <h2>Administration Tools</h2>
            <a href="/account/notifications/">Email Notifications Centre</a><br />
            <a href="/admin/findActivated.php">View Activated / Non-Activated Users</a><br />
            <a href="/account/import/index.php">Import Data</a>
        </div>

	<?php } 
			if($curUser['access'] == 2){
				echo "<h2>Customers</h2>";
				echo "<p>Below are your current Customers and their targets for the 2015 promotion. Click a customers name or click view details to see more information of the customer and their progress.</p>";
			} else if($curUser['access'] == 3){
				echo "<h2>Branch Managers</h2>";
				echo "<p>Below are your Branch Managers for the region and the corresponding branch name. Click their name or 'View Branch' to see more details and their customers.</p>";
			} else if($curUser['access'] == 4){
				echo "<h2>Region Managers</h2>";
				echo "<p>Below are your Regional Managers for BSS. Click their name to see more information about each of their branches and customers.</p>";
			}?>
			<br /><span style="font-size: 13px;"> <?echo $account->showUsers($curUser['access'], $users); ?> </span>
<br />
<?php
	if($curUser['access'] > 1){
	?>
	<h2>Statistics</h2>
		<?php
			$tier = $stat->getTierCompletedByRegion($curUser['accNo']);
			$allTier = $stat->getRegions();


			if($tier[1] == 0){
				$percent1 = 0;
			} else {
				$percent1 = floor(($tier[1] / $tier[3]) * 100);
			}

			if($tier[2] == 0){
				$percent2 = 0;
			} else {
				$percent2 = floor(($tier[2] / $tier[3]) * 100);
			}

		?><div style="width: 280px; float: left;">
		<p><div style="float: left; width: 130px; height: 140px; display: block; margin: 0 3px 0 3px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 24px; line-height: normal; font-family: Arial; text-align: center; color: #F01238;">
				<span style="margin-bottom: 3px; ">Gold</span>
				<input type="text" value="<?php echo $percent1 ?>" class="dial" data-readOnly="true" data-fgColor="#011949" data-thickness=".1" data-width="100">
			</div></p>
		<p><div style="float: left; width: 130px; height: 140px; display: block; margin: 0 3px 0 3px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 24px; line-height: normal; font-family: Arial; text-align: center; color: #F01238;">
				<span style="margin-bottom: 3px; ">Platinum</span>
				<input type="text" value="<?php echo $percent2 ?>" class="dial" data-readOnly="true" data-fgColor="#011949" data-thickness=".1" data-width="100">
			</div></p></div>

			<div style="float: right; width: 470px;"><?php if($tier[1] == 0){ echo "<b>0</b>"; } else { echo "<b>" . $tier[1] . "</b>"; } ?> customers have completed gold tier and <?php if($tier[2] == 0){ echo "<b>0</b>"; } else { echo "<b>" . $tier[2] . "</b>"; } ?> customers have completed platinum tier out of <?php echo "<b>" . $tier[3] . "</b>" ?> customers overall.</div>

			<div style="clear: both;"></div><br /><br />

		<?php if ($curUser['access'] > 3) {
			}}?>


    <?php

	if ($curUser['access'] < 2) {
	?>

        <h2>2015 Double Tier Promotion</h2>
		<?php echo $account->showIntro($curUser['access'], $curUser['r_startDate'], $curUser['r_endDate']); ?>
		<BR /><BR />
		<h2>Targets</h2>
        <?php if (!empty($curUser['t1limit'])) { ?>
            <h3>Target for Gold Tier = <?php echo '&pound;' . number_format($curUser['t1limit'], 2, '.', ','); ?></h3>
            <h3>Target for Platinum Tier = <?php echo '&pound;' . number_format($curUser['t2limit'], 2, '.', ','); ?></h3>
            <?php if (!empty($curUser['t3limit'])) { ?>
                <h3>Target for Tier 3 = <?php echo '&pound;' . number_format($curUser['t3limit'], 2, '.', ','); ?></h3>
            <?php } ?>
        <?php } else { ?>
            <p>We have not set up your tier targets yet, please check back later.</p>
        <?php } ?>
<BR />
        <h2>Monthly spend excluding VAT <span style="color: #000; font-size: 12px"></span></h2>
        <?php if (!empty($curUser['expenses']['Total'])) { ?>
            <table class="expenses" width="100%" border="0" cellspacing="0">
                <?php
                $i=0;
                    foreach($curUser['expenses'] as $key => $value) { 
						$i++; 
						if ($i < 4) continue;
						if ($i > 9) break;
						?>
                    <tr bgcolor="<?php if($i % 2 == 0){ echo '#E3E3E3'; } ?>">
                        <th width="15%"><?php $time = strtotime($key); echo date('F', $time); ?></th>
                        <td><?php echo '&pound;' . number_format($value, 2, '.', ','); ?></td>
					</tr>
                 <?php }
                ?>
                    <tr>
                        <th class="total"></th>
                        <td style="text-align: right; font-size: 20px; padding-top: 2px;"><strong>Total</strong> <?php echo '&pound;' . number_format($curUser['expenses']['Total'], 2, '.', ','); ?></td>
                    </tr>
            </table>
			<?php } else {
                // message to display if the user has no expenses yet
                echo '<p>We do not currently have any spend data for your account. Please check back later.</p>';
            } ?>
		<span class="divide"></span>
	<?php
	}
        if (!empty($selectedPromo)) { ?>

    <?php }
	if ($curUser['access'] < 2) {
        // this is the promotions file
        include($_SERVER['DOCUMENT_ROOT'] . '/account/promotions/index.php');
	}
?>
<?php if($curUser['access'] > 2 && $curUser['access'] < 5){ ?>
<h2>Administration Tools</h2>
<a href="/admin/findActivated.php">View Activated / Non-Activated Users</a><br /><br />
<? } ?>
</div>
<div id="sidebar">
  <h2>Useful Links</h2>
  <ul>
	<li>» <a href="/contact">Contact us</a></li>
	<li>» <a href="/testimonials">Testimonials</a></li>
  </ul>
  <p>&nbsp;</p>
</div>
<div id="footer">
<p><a href="/contact">Contact us | </a><a href="/terms">Terms and Conditions</a> | <a href="/privacy">Privacy policy </a>| <a href="/access">Access Statement </a>|<a href="/conditions"> Conditions of use </a>| <a href="#header">Back to top</a> <br />
&copy; 2015 Finders Keepers Ltd | Design by <a href="http://www.finderskeepersuk.com/" target="_new">Finders Keepers Sports and Marketing Ltd</a><br />
</p>
<div><strong>Registered office:</strong> Lodge Way House,&nbsp;&nbsp;Lodge Way,&nbsp;&nbsp;Harlestone Road,&nbsp;&nbsp;Northampton&nbsp;&nbsp;NN5 7UG</div>

<p>Registered in England No: 00824821 VAT registration number: 408556737</p>

<p></p>

<p>&nbsp; </p>

</div>
</div>

</body>
</html>
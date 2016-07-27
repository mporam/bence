<?php // finish later

if (!empty($_GET['user'])) {
	$userAccNo = $_GET['user'];
	$query = $con->prepare("SELECT * FROM `users` LEFT JOIN `regions` ON users.region=regions.r_id WHERE users.accNo = '$userAccNo';");
	$query -> execute();
	$curUser = $query->fetch(PDO::FETCH_ASSOC);
	
	if ($curUser['access'] > $_SESSION['access']) {
		$curUser = $_SESSION;
	}
	
	if ($_SESSION['access'] > 1 && $curUser['access'] < $_SESSION['access'] && !empty($curUser['related'])) {
		$user2AccNo = $curUser['related'];
		$query = $con->prepare("SELECT * FROM `users` WHERE `accNo` = '$user2AccNo';");
		$query -> execute();
		$user2 = $query->fetch(PDO::FETCH_ASSOC);
		
		if ($user2['access'] < $_SESSION['access'] && !empty($user2['related'])) {
			$user3AccNo = $user2['related'];
			$query = $con->prepare("SELECT * FROM `users` WHERE `accNo` = '$user3AccNo';");
			$query -> execute();
			$user3 = $query->fetch(PDO::FETCH_ASSOC);
			
			if ($user3['access'] < $_SESSION['access'] && !empty($user3['related'])) {
				$user4AccNo = $user3['related'];
				$query = $con->prepare("SELECT * FROM `users` WHERE `accNo` = '$user4AccNo';");
				$query -> execute();
				$user4 = $query->fetch(PDO::FETCH_ASSOC);
			}
			
		}
		
	}
		
} else {	
	$curUser = $_SESSION;
}

if ((int)$curUser['access'] > 1) {
	$accNo = $curUser['accNo'];
	$query = $con->prepare("SELECT *, IFNULL(users.accNo, limits2015.accNo) AS accNo FROM `users` LEFT JOIN `regions` ON users.region = regions.r_id LEFT JOIN limits2015 ON users.accNo = limits2015.accNo WHERE users.related = '$accNo';");
	$query -> execute();
	$users = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    $promoID = $curUser['promo'];
    $query = $con->prepare("SELECT `Title` FROM promotions WHERE `id` = '$promoID';");
    $query->execute();
    $selectedPromo = $query->fetchColumn();

    $accNo = $curUser['accNo'];

    $query = $con->prepare("SELECT * FROM limits2015 WHERE `accNo` = '$accNo'");
    $query->execute();
    $limits = $query->fetch(PDO::FETCH_ASSOC); // get users limits
    if (!empty($limits)) {
        $curUser = $curUser + $limits; // adds limits to $curUser
    }

    $query = $con->prepare("SELECT * FROM expenses2015 WHERE `accNo` = '$accNo'");
    $query->execute();
    $expenses = $query->fetch(PDO::FETCH_ASSOC); // get users expenses

    $null = array_shift($expenses); // remove accNo from array

    $curUser['expenses'] = $expenses;

    $curUser['expenses']['Total'] = intval(array_sum($curUser['expenses'])); // calculate the total client expenses

    $curUser['expenses']['teir1'] = false;
    $curUser['expenses']['teir2'] = false;
    if ($curUser['expenses']['Total'] >= $curUser['t1limit']) { // allow user to see teir1
        $curUser['expenses']['teir1'] = true;
    }
    if ($curUser['expenses']['Total'] >= $curUser['t2limit']) { // allow user to see teir2
        $curUser['expenses']['teir2'] = true;
    }
}

//class UserPermissions extends Account {
//
//	public $curUser;
//
//	public function __construct($get) {
//
//		if (!empty($get['user'])) {
//			$userAccNo = $get['user'];
//			$query = $con->prepare("SELECT * FROM `users` LEFT JOIN `regions` ON users.region=regions.r_id WHERE users.accNo = '$userAccNo';");
//			$query->execute();
//			$this->curUser = $query->fetch(PDO::FETCH_ASSOC);
//
//			if ($this->curUser['access'] > $_SESSION['access']) {
//				$this->curUser = $_SESSION;
//			}
//		} else {
//			$this->curUser = $_SESSION;
//		}
//
//	}
//
//	public function getCurUser($get) {
//
//	}
//}
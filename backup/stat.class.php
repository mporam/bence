<?php


	class Stat {
		public $con;

		function __construct($connection) {
			   $this->con = $connection;
		}

	public function getUserCountByRegion($region){
		if($region == 13){
			$query = $this->con->prepare("SELECT * FROM users WHERE `access` = 1");
		} else {
			$query = $this->con->prepare("SELECT * FROM users WHERE `related` = '$region' AND `access` = 1");
		}
		$query->execute();

		$results = $query->fetchAll(PDO::FETCH_ASSOC);


		return $query->rowCount();
	}

	public function getTierCompletedByRegion($region){
		$completed[1] = 0;
		$completed[2] = 0;

		if($region == "BSSRM1" || $region == "BSSRD1" || $region == "FK123"){
			$query = $this->con->prepare("SELECT * FROM users LEFT JOIN `limits2015` ON users.accNo=limits2015.accNo WHERE users.access = 1");
		} else {
			$query = $this->con->prepare("SELECT * FROM users LEFT JOIN `limits2015` ON users.accNo=limits2015.accNo WHERE users.related = '$region' AND users.access = 1");
		}
		$query -> execute();
		$users = $query->fetchAll(PDO::FETCH_ASSOC);
		$completed[3] = $query->rowCount();


		foreach($users as $k => $user) {
				$accNo = $user['accNo'];
				$query = $this->con->prepare("SELECT * FROM expenses2015 WHERE `accNo` = '$accNo'");
				$query -> execute();
				$expenses = $query->fetch(PDO::FETCH_ASSOC);
				if(!empty($expenses)){
					$users[$k] = array_merge($users[$k], $expenses);
				}

				if (!empty($users[$k]['t2limit']) && $users[$k]['Total'] >= $users[$k]['t2limit']){
					$completed[2] += 1;
				}
				if (!empty($users[$k]['t1limit']) && $users[$k]['Total'] >= $users[$k]['t1limit']) {
					$completed[1] += 1;
				}




		}


		return $completed;
	}

	public function getRegions(){
		$query = $this->con->prepare("SELECT * FROM users LEFT JOIN `limits2015` ON users.accNo=limits2015.accNo WHERE users.access = 1");
		$query -> execute();
		$users = $query->fetchAll(PDO::FETCH_ASSOC);

		foreach($users as $k => $user) {
				$accNo = $user['accNo'];
				$rID = $user['related'];
				$query = $this->con->prepare("SELECT * FROM expenses2015 WHERE `accNo` = '$accNo'");
				$query2 = $this->con->prepare("SELECT r_name FROM regions WHERE `r_id` = '$rID'");
				$query3 = $this->con->prepare("SELECT * FROM users WHERE `related` = '$rID' AND `access` = 1");
				$query -> execute();
				$query2 -> execute();
				$query3 -> execute();
				$expenses = $query->fetch(PDO::FETCH_ASSOC);
				$region = $query2->fetch(PDO::FETCH_ASSOC);

				if(!empty($expenses)){
					$completed[$users[$k]['region']][0] = $region['r_name'];
					$completed[$users[$k]['region']][3] = $query3->rowCount();
					$users[$k] = array_merge($users[$k], $expenses);

				}

				if (!empty($users[$k]['t2limit']) && $users[$k]['Total'] >= $users[$k]['t2limit']){

					$completed[$users[$k]['region']][2] += 1;
				}
				if (!empty($users[$k]['t1limit']) && $users[$k]['Total'] >= $users[$k]['t1limit']) {
					$completed[$users[$k]['region']][1] += 1;
				}


				$query -> execute();
		}

		return $completed;
	}

}
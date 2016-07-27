<?php 
class Account {

    private $expense;

    public function __construct() {
        $this->expense = false;
    }

	public function showIntro($access, $r_startDate, $r_endDate) {
		if ($access == 1 || empty($access)) {
			
			$startDate = date('jS F',strtotime($r_startDate));
			$endDate = date('jS F Y', strtotime($r_endDate));
			
			return "
Welcome to the Double Tier Promotion 2015!<br /><br />

In this promotion you have been set two obtainable targets over a 6 month period from the 1st April to
30th September. All sales including hire purchases at all branches will be tracked throughout the promotion
period. You will be updated every month via your registered email address on what you have spent, allowing
you to login in to your personalised account page and monitor your progress.
Figures that are displayed on your account pages on the website and in any email communications will be
excluding VAT.<br /><br />

Once you have achieved your target spend for Gold Tier, you will have a choice of five rewards from the Tier 1
promotions. Once the target for Platinum Tier has been achieved, you will then have the choice of any one of the
ten promotions on offer. Only one reward can be chosen with final figures calculated after the 30th
September.
<br />

Rewards can be chosen as soon as the targets have been achieved. However selections must be chosen
by the 31st December 2015 to guarantee your reward.
<br/><br/>If you have any queries on any aspect of the promotion please do not hesitate to contact the BSS Promotions
Team on any of the following details:<br/><br/>
Tel: <span class='fake-link'>0117 9527740</span><br/>
Email: <a href='mailto: info@bss-promotions.co.uk'>info@bss-promotions.co.uk</a><br/>
Website Contact Form:<a href='www.bss-promotions.co.uk/contact'>www.bss-promotions.co.uk/contact</a><br/>
			
			";
		 }
	}
	
	public function showDetails($curUser) {
		$details = '
	    <h3>Your details:<span style="float: right; color: #000; font-size: 12px; font-weight: normal;"><a href="/account/update/">Update Your Details</a></span></h3>
		<div class="float-container">
	         <div class="left">   
	            <div>
	                <span>Full Name:' . $curUser['name'] . '</span>
	            </div>
	            <div>
	               <span>Company Name: ' . $curUser['company'] . '</span>
	            </div>
	            <div>
	               <span>Account Number: ' . str_pad($curUser['accNo'],4,"0",STR_PAD_LEFT) . '</span>
	            </div> 
	            <div>
	                <span>Address:<br />
	                ' . $curUser['address1'] . '<br />
	                ' . $curUser['address2'] . '<br />
	                ' . $curUser['address3'] . '<br />
	              	' . $curUser['address4'] . '</span>
	            </div>
	            <div>
	               <span>Postcode: ' . $curUser['postcode'] . '</span>
	            </div>
	        </div>
	      <div class="left">   
	            <div>
	                <span>Email: ' . $curUser['email'] . '</span>
	            </div>';
				
				if (!empty($curUser['emailSecondary'])) { 
		            $details .= '<div>
		                <span>Secondary Email: ' . $curUser['emailSecondary'] . '</span>
		            </div>';
				}
				
	            $details .= '<div>
	                <span>Phone: ' . $curUser['phone'] . '</span>
	            </div>
	            <div>
	                <span>Mobile: ' . $curUser['mobile'] . '</span>
	            </div>
	            <div>
	                <span>Region: ' . $curUser['r_name'] . '</span>
	            </div>
	      </div>
		</div>';
		
		return $details;
	}
	
	public function showUsers($access, $users, $expense = false) {
		$result = '';
        $this->expense = $expense;
		if (!empty($users)) { 
            switch($users[0]['access']) {
            	case 4:
					$result = $this->showDirectors($users);
					break;
	            case 3:
					$result = $this->showRegions($users);
					break;
	            case 2:
					$result = $this->showBranches($users);
					break;
				default:
					$result = $this->showCustomers($users);
            }
		} else if ($access > 1) {
			$result = '<p>No users have been registered for ' . date('Y') . ' yet, please check back later.</p>';
            if ($this->expense) {
                $result = '<p>No users have been registered for ' . $_GET['year'] . ' yet, please check back later.</p>';
            }
		}
		return $result;
	}
	
	private function showCustomers($users) {
		$table = '
        <table style="margin-bottom: 5px;" width="748" border="0" cellspacing="0" class="region-table">
        	<thead>
            	<tr>
                	<th width="120"><h3>Customer <br />Name</h3></th>
                	<th width="150"><div align="left"><h3><br />Company <br /></h3></div></th>
                    <th width="74"><br /><h3>Acc. No<br /> </h3></th>
                    <th width="81"><h3>Gold<br />Target</h3></th>
                    <th width="80"><h3>Platinum Target</h3></th>
                    <th><h3>Activated Online</h3></td>
                    <th width="113"></th>
                </tr>
            </thead>
            <tbody>';
			$i = 0;
            foreach($users as $user) {
				
                $link = '?user=' . $user['accNo'];

                if ($this->expense) {
                    $link .= '&year=' . $_GET['year'];
                }

                if($user['password'] == null){
                	$activated = '<td style="text-align: center; color:#000;">Not Activated</td>';
                } else {
                	$activated = '<td style="text-align: center; color:#000;">Activated</td>';
                }
				
				if(($i % 2) != 0){
					$colour = '#E3E3E3';
				} else {
					$colour = '#FFFFFF';
				}
				
				$table .= '<tr bgcolor="' . $colour . '">
            			<td><a href="' . $link  . '">' . $user['name'] . '</a></td>
                        <td>' . $user['company'] . '</td>
                        <td>' . $user['accNo'] . '</td>
                        <td>&pound;' . number_format($user['t1limit'], 2, '.', ',') . '</td>
                        <td>&pound;' . number_format($user['t2limit'], 2, '.', ',') . '</td>
                        ' . $activated . '
                        <td><a href="' . $link . '">View Details &gt;</a></td>
                    </tr>';
					$i++;
				}
            $table .= '</tbody>
        </table>';
		
		return $table;	
	}
	
	private function showBranches($users) {
		$i = 0;
		$colour = "#FFFFFF";
		
		$table = '
      	      <table width="100%" cellspacing="0" class="region-table">
                <thead>
                    <tr>
                        <th width="235"><div align="left"><h3 style="">Branch Managers Name</h3></div></th>
                        <th width="291"><div align="left"><h3 style="">Branch</h3></div></th>
                    </tr>
                </thead>
                <tbody>';
         foreach($users as $user) {
			if(($i % 2) != 0){
				$colour = '#E3E3E3';
			} else {
				$colour = '#FFFFFF';
			}
             $link = '?user=' . $user['accNo'];
             if ($this->expense) {
                 $link .= '&year=' . $_GET['year'];
             }
                        $table .= '<tr bgcolor="' . $colour . '">
                            <td><a href="' . $link .'">' . $user['name'] . '</a></td>
                            <td>' . $user['company'] . '</td>
							<td style="text-align: right;"><a href="' . $link . '">View Branch ></a></td>
                        </tr>';
						$i++;
		}
        $table .= '</tbody>
            </table>';
		
		return $table;
	}
	
	private function showRegions($users) {
			$i = 0;
			$colour = "#FFF";
			$table = '<table width="100%" cellspacing="0" class="region-table">
                <thead>
                    <tr>
                        <th width="237"><div align="left"><h3 style="">Regional Managers Name</h3></div></th>
                        <th width="239"><div align="left"><h3 style="">Region</h3></div></th>
                    </tr>
                </thead>
                <tbody>';
             foreach($users as $user) {
				if(($i % 2) != 0){
					$colour = '#E3E3E3';
				} else {
					$colour = '#FFFFFF';
				}
                 $link = '?user=' . $user['accNo'];
                 if ($this->expense) {
                     $link .= '&year=' . $_GET['year'];
                 }
                        $table .= '<tr bgcolor="' . $colour . '">
                            <td><a href="' . $link . '">' . $user['name'] . '</a></td>
                            <td>' . $user['r_name'] . '</td>
                        </tr>';
				$i++;
			}
            $table .= '</tbody>
            </table>';
		return $table;
	}
	
	private function showDirectors($users) {
        $table = '
			<table>
                <thead>
                    <tr>
                        <th>Users</th>
                    </tr>
                </thead>
                <tbody>';
          foreach($users as $user) {
              $link = '?user=' . $user['accNo'];
              if ($this->expense) {
                  $link .= '&year=' . $_GET['year'];
              }
                        $table .= '<tr>
                            <td><a href="' . $link . '">' . $user['name'] . '</a></td>
                        </tr>';
		   }
                $table .= '</tbody>
            </table>';
		return $table;
	}
}
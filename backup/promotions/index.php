<?php
    $pregion = $curUser['region'];
	$year = date('Y');
    $query = $con->prepare("SELECT * FROM promotions$year WHERE `region` = $pregion;");
    $query -> execute();
    $allPromos = $query->fetchAll(PDO::FETCH_ASSOC);
	$tiers = 2;
	$selectedPromo = "";
	
	if (empty($allPromos)) { ?>
		<div id="teirs">
			<h3>Promotions</h3>
			<p>There are currently no promotions available, please check back soon.</p>
	<?php
	} else {
	
	?>
		<h2>2015 Promotions</h2>
		<?php  ?>
	<?php
		foreach($allPromos as $thisPromo) {
			$promos[$thisPromo['tier']][$thisPromo['id']] = $thisPromo;
			if($curUser['promo'] == $thisPromo['id']){
				$selectedPromo = $thisPromo['title'];
			}
			
		}
		if($selectedPromo != ""){
			echo "<div class=\"warning\">Registered Promotion: You have selected <strong>'" . $selectedPromo . "'</strong> as your chosen&nbsp;reward. </div>";
		}
		?>
		    <div id="teirs">
		<?php
		
		$i = 0;
		foreach($promos as $promo){
			$i++;
			$locked = "unlocked";
			$now = floor((100 / $curUser["t" . $i . "limit"]) * $curUser['expenses']['Total']);
			if($curUser['expenses']['Total'] > $curUser["t" . $i . "limit"]){
				$now = 100;
			}
			?>
			<div style="float: left; width: 130px; height: 140px; display: block; margin: 0 3px 0 3px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 24px; line-height: normal; font-family: Arial; text-align: center; color: rgb(25, 90, 69);">
				<span style="margin-bottom: 3px; color: <?php if($i == 1){ echo '#F5B112'; } else { echo '#A8A8A8'; } ?>;"><?php if($i == 1){ echo "Gold Tier"; } else { echo "Platinum Tier"; } ?></span>
				<input type="text" value="<?php echo $now ?>" class="dial" data-readOnly="true" data-fgColor="<?php if($i == 1){ echo '#F5B112'; } else { echo '#A8A8A8'; } ?>" data-thickness=".1" data-width="120"><br />
				<p style="color: #011949; margin-top: -50px;">

					<?php
						if($curUser['expenses']['Total'] < $curUser["t" . $i . "limit"]){

							echo "£" . number_format($curUser["t" . $i . "limit"] - $curUser['expenses']['Total'], 2, '.', ',') . " To Go!";

						} else {

							echo "Tier Unlocked!";

						}

					?>
				</p>
			</div>
			
			<?php

			foreach($promo as $item){
				?>  
				
				
			<!-- Select Enabled promo box -->
			<a style="" id="go" rel="leanModal" name="test" href="#<?php echo $item['id']; ?>" rel="leanModal">
				<div class="promo-container">
					<div class="promo-box" style="background: url('<?php echo $item['thumb']; ?>');">
                    
					</div>

					<div class="promo-title"><?php echo substr($item['title'],0,50) . "..."; ?></div>
				</div>
			</a>   
			
			<!-- Promo Modal -->
			<div id="<?php echo $item['id']; ?>" class="modalbox" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -330px; top: 200px;">
				<h2 style="padding: 10px;"><?php echo $item['title']; ?></h2><a class="modal_close" href="#">Close</a>
				<img src="<?php echo $item['image1']; ?>">
				<p class="modal-content"><?php echo $item['desc']; ?></p>
				<? if(($curUser["t" . $i . "limit"] - $curUser['expenses']['Total'] >= 0) == false){ ?>
                    <?php if ($curUser['promo'] == $item['id']) { ?>
                        <div style="text-align: center;"><img src="/images/promo_selected.png" alt="This Promotion is selected" style="margin: 3px;" /></div>
                    <?php } else { ?>
				        <div style="text-align: center;"><a style="margin: 3px;" href="book-promo.php?promo=<?php echo $item['id']; ?>&user=<?php echo $curUser['accNo']; ?>"><img src="/images/select_promo.png" alt="Select this Promotion" /></a></div>
                    <?php } }?>
                    <br />
			</div>
				
				<?php
			}
			
			?>
				<div style="clear: both; width: 750px; height: 25px; border-bottom: 4px solid #dadada;"></div>
			<BR/>
			<?php }?>
		
 

	<?php }?>
	

	</div>
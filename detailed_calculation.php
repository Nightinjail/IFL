<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<meta charset="UTF-8">
  	<meta name="description" content="Free Web tutorials">
  	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
  	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"> -->
    <meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">

<head>
<link rel="stylesheet" href="project.css" type="text/css">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	
<title>International Football Law</title>
</head>
    

<body>

<div id="wrapper">

	<?php
		include_once "header.php";
		
		// Session variables
		$name = $_SESSION['name'];
		$birthday = $_SESSION['birthday'];
		$nationality = $_SESSION['nationality'];
		
		$first = $_SESSION['first'];
		$tffee = $_SESSION['tffee'];
		$currency = $_SESSION['currency'];
		
		$lastDate = new DateTime($_SESSION['lastdate']);

		$nr = $_SESSION['nr'];
		
		$outOfAreaMessage = "";
		for($x = 1; $x <= $nr; $x++){
			if(isset($_SESSION['lastdate']) && (new DateTime($_SESSION['regStart'.$x]) >= $lastDate || new DateTime($_SESSION['regEnd'.$x]) >= $lastDate)){
				$outOfAreaMessage = "Contribution period ends at ".$_SESSION['lastdate'].". Any dates outside of the solidarity contribution period will not be acounted for in calculations.";
			}
			// Also initiate club registration days in season variables
			$_SESSION['clubDays'.$x] = array(0,0,0,0,0,0,0,0,0,0,0,0);
		}
	?>		
    	
    <div id="contentwrap" style="z-index:0;">
    	<div id="sccfield">
        	<div style="width:96%; float:left;">
            	<u>The start date of the season of player's 12th birthday, <?php echo $first; ?>, marks the start of the contribution period.</u>
                <br />
                <br />
                <br />
                SEASON INFORMATION:
                <br />
                <br />
                <?php
                	for($x = 1; $x <= 12; $x++){
						echo 'Season of player\'s '.($x+11);
						if($x <= 9){
							echo 'th birthday: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						}
						else if($x == 10){
							echo 'st birthday: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
						}
						else if($x == 11){
							echo 'nd birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						}
						else if($x == 12){
							echo 'rd birthday: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						}
						echo $_SESSION['seasonStartDate'][$x].' &nbsp;&nbsp; - &nbsp;&nbsp; '.$_SESSION['seasonEndDate'][$x].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.
							$_SESSION['daysInSeason'][$x-1].' days in season &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ';
							
						if($x <= 4){
							echo ' 5% of Solidarity Contribution or 0.25% of Transfer fee';
						}
						else{
							echo '10% of Solidarity Contribution or 0.5% of Transfer fee';
						}
						echo '<br />';
						// By here one complete row is printed out
						
						// Check if any OT's occur in this season
						$startDate = new DateTime($_SESSION['seasonStartDate'][$x]);
						$endDate = new DateTime($_SESSION['seasonEndDate'][$x]);
						$nrOfOTs = 0;
						$OTmessage = "";
						// For this specific season, look through all the OT's and see if any of them occur within it
						for($i = 0; $i < count($_SESSION['OT']); $i++){
							$OT = new DateTime($_SESSION['OT'][$i]);
							if($startDate <= $OT && $OT <= $endDate){
								$nrOfOTs++;
								// Here we do have an OT. Now we have 2 diffrent scernarios.
								// 1. OT, no rollback.
								if($_SESSION['daysInSeason'][$x-1] != 365 && $_SESSION['daysInSeason'][$x-1] != 366){
									if($nrOfOTs == 1){
										$OTmessage = '
										<div style="width:94%; margin-left:2%;">
											Due to an overlapping season transfer that occurred on the '.$_SESSION['OT'][$i].', transfering from a former season division, '
											.$_SESSION['oldSeason'][$i].', to a new season division, '.$_SESSION['newSeason'][$i].', and since the player\'s birthday is on the '
											.substr($birthday, 0, 5).', this season will instead contain '.$_SESSION['daysInSeason'][$x-1].' days in accordance to FIFA\'s current guidelines.
										</div>';
										$OTmessage1 = '
										<div style="width:94%; margin-left:2%;">
											Due to an overlapping season transfer that occurred on the '.$_SESSION['OT'][$i].', transfering from a former season division, '
											.$_SESSION['oldSeason'][$i].', to a new season division, '.$_SESSION['newSeason'][$i].', the number of days in this season will be adjusted 
											in accordance to FIFA\'s current guidelines.
										</div>';
									}
									else{
										$OTmessage1 = $OTmessage1.'
										<div style="width:94%; margin-left:2%; padding-top:0px;">
											Due to an overlapping season transfer that occurred on the '.$_SESSION['OT'][$i].', transfering from a former season division, '
											.$_SESSION['oldSeason'][$i].', to a new season division, '.$_SESSION['newSeason'][$i].', the number of days in this season will yet again be adjusted 
											in accordance to FIFA\'s current guidelines.
										</div>';
										$OTmessage2 = '
										<div style="width:94%; margin-left:2%; padding-top:0px;">
											Considdering the overlapping season transfers mentioned above and that the player\'s birthday is on the '.substr($birthday, 0, 5).', FIFA\'s current 
											guidelines dictates that this season will instead contain '.$_SESSION['daysInSeason'][$x-1].' days.
										</div>';
										$OTmessage = $OTmessage1.$OTmessage2;
									}
								}
								// 2. OT, rollback. 
								else{
									// The definition of a rollback occurring is that the season contains an even number of OT's and the number of days in the season are 365 or 366.
									// Only even number of OT's can occur here.
									if($nrOfOTs%2 == 1){
										echo '
										<div style="width:94%; margin-left:2%;">
											Due to an overlapping season transfer that occurred on the '.$_SESSION['OT'][$i].', this season should contain an adjusted amount of days 
											according to FIFA\'s current guidelines.<br />
										';
									}
									else if($nrOfOTs%2 == 0){
										echo '
											However, since yet another overlapping season transfer occurs on the '.$_SESSION['OT'][$i].' reverting the season division back to the former 
											before the new season is fully completed, the effect of the two transfers cancel eachother out and this season will after all contain 
											a full '.$_SESSION['daysInSeason'][$x-1].' days.
										</div>
										';
									}
								}
							}
						}
						// Still within the season here
						echo $OTmessage;
						
						// For each club, add their number of days within this season
						for($i = 1; $i <= $nr; $i++){
							$countingDate = new DateTime($_SESSION['regStart'.$i]);
							$regEndDate = new DateTime($_SESSION['regEnd'.$i]);
							
							while($countingDate <= $regEndDate){
								if($startDate <= $countingDate && $countingDate <= $endDate){
									$_SESSION['clubDays'.$i][$x-1] = $_SESSION['clubDays'.$i][$x-1] + 1;
								}
								$countingDate->modify('+1 day');
							}
						}
					}
				?>
                <br />
                <br />
                <br />
                CLUB INFORMATION:
                <br />
                <?php
					for($i = 1; $i <= $nr; $i++){
						if(!empty($_SESSION['regStart'.$i]) && !empty($_SESSION['regEnd'.$i]) && !empty($_SESSION['days'][$i])){
							$club = "Club ".$i;
							$sum = 0;
							$sumRow = "Sum: &nbsp;&nbsp; ";
							
							if(!empty($_SESSION['club'.$i])){
								$club = $_SESSION['club'.$i];
							}
							echo '
							<div style="width:25%; float:left; padding:0; margin-top:30px;">'
								.$club.'
							</div>
							
							<div style="width:70%; float:left; padding:0; margin-top:30px;">
								Registration days: &nbsp;&nbsp; '.$_SESSION['regStart'.$i].' &nbsp;&nbsp; - &nbsp;&nbsp; '.$_SESSION['regEnd'.$i].'
							</div>
							
							<div style="width:96%; float:left;  border:1px solid #FFF; border-radius:3px;">';
								for($x = 0; $x <= 11; $x++){
									if($x <= 8){
										$sufix = "th";
									}
									else if($x == 9){
										$sufix = "st";
									}
									else if($x == 10){
										$sufix = "nd";
									}
									else if($x == 11){
										$sufix = "rd";
									}
									
									if($x <= 3){
										$feeRate = 5;
									}
									else{
										$feeRate = 10;
									}
									
									// Print out
									if($_SESSION["clubDays".$i][$x] != 0){
										echo $_SESSION["clubDays".$i][$x].' days within the season of player\'s '.($x+12).$sufix.' birthday at a daily worth of '.$feeRate.'% / '.
										$_SESSION['daysInSeason'][$x].' = '.($feeRate / $_SESSION['daysInSeason'][$x]).'% per day<br />';
										
										$sum = $sum + ($_SESSION["clubDays".$i][$x] * $feeRate / $_SESSION['daysInSeason'][$x]);									
										$sumRow = $sumRow.$_SESSION["clubDays".$i][$x]." x ".$feeRate."% / ".$_SESSION['daysInSeason'][$x]." + ";
									}
								}
								// Remove the two last chars from $sumRow
								$sumRow = substr($sumRow, 0, -2);
								echo $sumRow.'= '.$sum.'% of the Solidarity Contribution
							</div>
							';
						}
					}
				?>
            </div>
        </div>
	</div>	
</div>


</body>
</html>
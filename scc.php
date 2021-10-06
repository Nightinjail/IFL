<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<meta charset="UTF-8">
  	<meta name="description" content="Free Web tutorials">
  	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width" />
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

<script>
	function whenReload(nr, club, regStart, regEnd, season){
		var n = nr;
		var c = club;
		var rs = regStart;
		var re = regEnd;
		var s = season;
	
		document.getElementById("row" + n).style.display='';
		
		document.getElementById("add" + n).style.display='';
		if(n != 1){
			document.getElementById("remove" + n).style.display='';
		}
		document.getElementById("add" + (n - 1)).style.display='none';
		document.getElementById("remove" + (n - 1)).style.display='none';
		
		document.getElementById("club" + n).value=c;
		document.getElementById("start" + n).value=rs;
		document.getElementById("end" + n).value=re;
		document.getElementById("season" + n).value=s;
		
		document.getElementById("nr").value=n;
		document.getElementById("add20").style.visibility='hidden';
	}
</script>
    

<body>

<div id="wrapper" onClick="blurActiveInput()">

	<?php
		include_once "header.php";
		
		// Session variables
		$test = $_SESSION['test'];
		
		$lastDate = new DateTime($_SESSION['lastdate']);
		
		$warning = $_SESSION['warning'];
		$mode = $_SESSION['mode'];
		
		if(isset($_SESSION['nr'])){
			$nr = $_SESSION['nr'];
		}
		else{
			$nr = 1;
		}
			
		$name = $_SESSION['name'];
		$birthday = $_SESSION['birthday'];
		$nationality = $_SESSION['nationality'];
	
		$first = $_SESSION['first'];
		$tffee = $_SESSION['tffee'];
		$currency = $_SESSION['currency'];
		
		$club1 = $_SESSION['club1'];
		$regStart1 = $_SESSION['regStart1'];
		$regEnd1 = $_SESSION['regEnd1'];
		$season1 = $_SESSION['season1'];
		
		$summaryMessage = "";
		$displaymsg = false;
		if($_SESSION['CalculationDone']){
			$firstDate = new DateTime($first);
			for($x = 1; $x <= $nr; $x++){
				if(isset($_SESSION['regStart'.$x]) && !empty($_SESSION['regStart'.$x]) && new DateTime($_SESSION['regStart'.$x]) < $firstDate){
					$displaymsg = true;
				}
				if(isset($_SESSION['regStart'.$x]) && !empty($_SESSION['regStart'.$x]) && new DateTime($_SESSION['regStart'.$x]) > $lastDate){
					$displaymsg = true;
				}
				if(isset($_SESSION['regEnd'.$x]) && !empty($_SESSION['regEnd'.$x]) && new DateTime($_SESSION['regEnd'.$x]) < $firstDate){
					$displaymsg = true;
				}
				if(isset($_SESSION['regEnd'.$x]) && !empty($_SESSION['regEnd'.$x]) && new DateTime($_SESSION['regEnd'.$x]) > $lastDate){
					$displaymsg = true;
				}
			}
			$summaryMessage = 'Note!<br />'; 
			if($_SESSION['mode'] != ""){
				$summaryMessage = $summaryMessage.$_SESSION['mode'].'<br />';
			}
			$summaryMessage = $summaryMessage.'Contribution period starts at '.$first.' and ends at '.$_SESSION['lastdate'].'.';
			
			if($displaymsg){
				$summaryMessage = $summaryMessage.'<br /><font color="#FFCC66">Any dates outside of the solidarity contribution period will not be acounted for in calculations.</font>';
			}
		}
		if(strpos($warning, 'dateformat')){
			$summaryMessage = '<font color="#FF6666">Invalid date or date format!</font>';
		}
	?>		
    	
    <div id="contentwrap" style="z-index:0;">
    	<div id="sccfield">
        	<form action="includes/calculate-inc.php" method="POST">
            
				<input type="text" id="nr" name="nr" style="display:none;" value="1">
				
                <div id="textpanel" style="width:96%; float:left; padding-bottom:60px;">
                    FIFA Solidarity Mechanism<br />
                    The end of all difficult and timewasting excel sheets.<br />
                    It is the calculator that all football clubs involved in international transfers with a fee needs.<br />
                    <br />
                    <br />
                    How to use the Solidarity Contribution Calculator, SCC.<br />
                    Put in the minimum required data. That means the start of the season of the players 12th birthday and the exact registrations dates in any club and press the calculate 
                    solidarity contribution button.<br />
                    The result will show in percent of the solidarity contribution, SC, and in percent of the transfer fee, TF.<br />
                    Fill in the transfer fee and the amount due as solidarity contribution will show as well.<br />
                    If there is a transfer between two clubs with different seasons you fill in the seasons for all clubs and the date of birth of the player, the SCC will then take into account
                    the FIFA jurisprudence for this special situation.<br />
                    You can use the SCC for one club if you want to calculate just what is due to that club.<br />
                    You can also use the SCC if you are the club responsible for the calculation and distribution to all clubs that has contributed to the training of the player.<br />
                    Just add as many clubs you like.<br />
                    Note that it is crucial that the data that you put in is correct to rely on the result.<br />
                    In the official Players Passport, you can find all data.<br />
                    Feel free to simulate different scenarios in the SCC.
                </div>
                
                <div id="namepanel" style="width:19%; float:left; min-width:165px; max-width:230px; min-height:138px;">
                    <label for="name">Name</label>
                    <br />
                    <input type="text" id="name" name="name" style="width:95%;" value="<?php echo $name; ?>" autocomplete="off">
                    <br />
                    <label for="birthday">Date of Birth</label>
                    <br />
                    <input type="text" id="birthday" name="birthday" style="width:95%;<?php if(strpos($warning, ':0:')){
                    	echo 'background:#FF9999;border-color:#FF6666;';} ?>" value="<?php echo $birthday; ?>" autocomplete="disabled">
                    <br />
                    <label for="nationality">Nationality</label>
                    <br />
                    <input type="text" id="nationality" name="nationality" style="width:95%;" value="<?php echo $nationality; ?>" autocomplete="disabled">
                </div>

                <div id="startpanel" style="width:35%; float:left; min-width:254px; max-width:302px; min-height:138px;">
                	<div style="width:100%; float:left; padding:0;">
                        <label for="first" style="width:100%; float:left;">Start of the Season of Player's 12th Birthday</label>
                        
                        <input type="text" id="first" name="first" style="width:98%; float:left; <?php if(strpos($warning, 'first') || strpos($warning, ':1:')){
                            echo 'background:#FF9999;border-color:#FF6666;';} ?>" value="<?php echo $first; ?>" <?php if(strpos($warning, 'first')){echo ' placeholder="Mandatory field!" ';} ?>
                            autocomplete="disabled">
                    </div>
                    <div style="width:60%; float:left; padding:0;">
                        <label for="tffee" style="width:90%; float:left;">Known Transfer Fee</label>
                        
                        <input type="text" id="tffee" name="tffee" style="width:93%; float:left;" value="<?php if(number_format($tffee, 0, ".", " ") == 0){
                            echo "";}else{echo number_format($tffee, 0, ".", " ");} ?>" autocomplete="disabled">
                    </div>
                    <div style="width:40%; float:left; padding:0;">
                        <label for="currency" style="width:90%; float:left;">Currency</label>
                        
                        <input type="text" id="currency" name="currency" style="width:95%; float:left;" value="<?php echo $currency; ?>" autocomplete="disabled">
                    </div>
                    <input type="submit" id="calcbutton" name="calculate" value=" Calculate Solidarity Contribution " style="margin-top:20px;">
                </div>
                
                <div id="clearPanel" style="float:left;">
                	<?php 
                        if($_SESSION['CalculationDone'] || strpos($warning, 'first')){
                            echo '<input type="button" id="reset" name="reset" value="Clear All" onClick="clearAll()" style="margin-bottom:10px;margin-top:25px;"><br />';
                        }
						if($_SESSION['CalculationDone']){
                            echo '<a href="detailed_calculation.php" id="detailedcalc">See detailed calculation here</a>';
                        }
                    ?>
                    <div id="hoverdiv" style="margin-top:10px; font-size:12px;"></div>
                </div>

                <div style="float:left; width:96%; padding-top:1%; padding-bottom:1%;">
                	<label>
						<?php  
                            if($summaryMessage != ""){
                                echo $summaryMessage;
                            }
                        ?>
                    </label>
                </div>

                <div style="width:96%; float:left;">
                	<div id="row1" class="row" style="width:100%; float:left; padding:0; padding-bottom:3px;">
                    	<div id="clubpanel" style="padding:0;">
                        	<label for="club1" style="width:100%;float:left;">Club</label>

                            <input type="text" id="club1" name="club1" style="margin-top:3px;" value="<?php echo $club1; ?>" autocomplete="disabled">
                        </div>
                 		
                        <div id="regpanel" style="padding:0;">
                        	<label for="start1" style="width:100%;float:left;">Exact Registration Dates</label>
                            
                            <input type="text" id="start1" name="start1" placeholder="Start of reg." <?php 
								if((isset($_SESSION['lastdate']) && new DateTime($regStart1) > $lastDate) || (isset($firstDate) && new DateTime($regStart1) < $firstDate)){
									echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
								}
								if(strpos($warning, ':2:')){
                    				echo ' style="background:#FF9999;border-color:#FF6666;" ';
								}?> value="<?php echo $regStart1; ?>"
                            	autocomplete="disabled">
                                
                            <label id="firstuntil1" style="color:white;">-</label>
                            
                            <input type="text" id="end1" name="end1" placeholder="End of reg." <?php 
								if((isset($_SESSION['lastdate']) && new DateTime($regEnd1) > $lastDate) || (isset($firstDate) && new DateTime($regEnd1) < $firstDate)){
									echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
								}
								if(strpos($warning, ':3:')){
                    				echo ' style="background:#FF9999;border-color:#FF6666;" ';
								}?> value="<?php echo $regEnd1; ?>"
                            	autocomplete="disabled"
                                onChange="dateForNext(this.value, 1)">
                        </div>
                        
                        <div id="seasonpanel" style="padding:0;">
                        	<label for="season1" style="width:100%;float:left;">Season</label>
                            
                            <input type="text" class="season" id="season1" name="season1" placeholder="Season start" value="<?php echo $season1; ?>" style="margin-top:3px;"
                                autocomplete="disabled">
                        </div>
                        
                        <div id="resultpanel" style="padding:0;">
                        	<div style="float:left; width:14%; padding:0;">
                            	<label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['label1']; ?></label>
                                <label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['days'][1];?><label>
                            </div>
                            <div style="float:left; width:20%; padding:0;">
                            	<label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['label2']; ?></label>
                                <label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['SCpercent'][1];?><label>
                            </div>
                            <div style="float:left; width:20%; padding:0;">
                            	<label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['label3']; ?></label>
                                <label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['TFpercent'][1];?><label>
                            </div>
                            <div style="float:left; width:46%; padding:0;">
                            	<label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['label4']; ?></label>
                                <label style="width:100%;float:right;text-align:right;"><?php echo $_SESSION['value'][1];?><label>
                            </div>
                        </div>
                    </div>
					<input type="button" class="add" id="add1" name="add1" value=" Add Club " onClick="addRow()" style="margin-top:3px;">
					<input type="button" class="add" id="remove1" name="remove1" value=" Remove Club " onClick="removeRow()" style="display:none;">

                    <?php
					for($i = 2; $i <= 20; $i++) {
						echo '
						<div id="row'.$i.'" class="row" style="width:100%; float:left; padding:0; padding-bottom:3px; display:none;">
							<div id="clubpanel" style="padding:0;">
								<label for="club'.$i.'" class="lowreslabel" style="width:100%;float:left;">Club</label>
								
								<input type="text" id="club'.$i.'" name="club'.$i.'" style="margin-top:3px;" autocomplete="disabled">
							</div>
							
							<div id="regpanel" style="padding:0;">
								<label for="start'.$i.'" class="lowreslabel" style="width:100%;float:left;">Exact Registration Dates</label>
								
								<input type="text" id="start'.$i.'" name="start'.$i.'" placeholder="Start of reg." ';
									if(isset($_SESSION['lastdate']) && isset($_SESSION['regStart'.$i]) && !empty($_SESSION['regStart'.$i]) 
										&& new DateTime($_SESSION['regStart'.$i]) > $lastDate){
										echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
									}
									else if(isset($firstDate) && isset($_SESSION['regStart'.$i]) && !empty($_SESSION['regStart'.$i]) 
										&& new DateTime($_SESSION['regStart'.$i]) < $firstDate){
										echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
									}
									if(strpos($warning, ':'.(2 * $i).':')){
										echo ' style="background:#FF9999;border-color:#FF6666;" ';
									} echo '
									autocomplete="disabled">
									
								<label id="firstuntil'.$i.'" style="color:white;">-</label>
								
								<input type="text" id="end'.$i.'" name="end'.$i.'" placeholder="End of reg." '; 
									if(isset($_SESSION['lastdate']) && isset($_SESSION['regEnd'.$i]) && !empty($_SESSION['regEnd'.$i]) && new DateTime($_SESSION['regEnd'.$i]) > $lastDate){
										echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
									}
									else if(isset($firstDate) && isset($_SESSION['regEnd'.$i]) && !empty($_SESSION['regEnd'.$i]) 
										&& new DateTime($_SESSION['regEnd'.$i]) < $firstDate){
										echo ' style="background:#FFCC99;border-color:#FFCC66;" ';
									}
									if(strpos($warning, ':'.((2 * $i) + 1).':')){
										echo ' style="background:#FF9999;border-color:#FF6666;" ';
									} echo '
									autocomplete="disabled"
									onChange="dateForNext(this.value, '.$i.')">
							</div>
							
							<div id="seasonpanel" style="padding:0;">
                        		<label for="season'.$i.'" class="lowreslabel" style="width:100%;float:left;">Season</label>
								
								<input type="text" class="season" id="season'.$i.'" name="season'.$i.'" placeholder="Season start" style="margin-top:3px;"
									autocomplete="disabled">
							</div>
							
							<div id="resultpanel" style="padding:0;">
								<div style="float:left; width:14%; padding:0;">
									<label class="lowreslabel" style="width:100%;float:right;text-align:right;">';
									if($i <= $nr){
										echo $_SESSION['label1'];
									}
									echo '</label>
                                	<label id="resultDays'.$i.'" style="width:100%;float:right;text-align:right;">'.$_SESSION['days'][$i].'<label>
								</div>
								<div style="float:left; width:20%; padding:0;">
									<label class="lowreslabel" style="width:100%;float:right;text-align:right;">';
									if($i <= $nr){
										echo $_SESSION['label2'];
									}
									echo '</label>
                                	<label id="resultSC'.$i.'" style="width:100%;float:right;text-align:right;">'.$_SESSION['SCpercent'][$i].'<label>
								</div>
								<div style="float:left; width:20%; padding:0;">
									<label class="lowreslabel" style="width:100%;float:right;text-align:right;">';
									if($i <= $nr){
										echo $_SESSION['label3'];
									}
									echo '</label>
                                	<label id="resultTF'.$i.'" style="width:100%;float:right;text-align:right;">'.$_SESSION['TFpercent'][$i].'<label>
								</div>
								<div style="float:left; width:46%; padding:0;">
									<label class="lowreslabel" style="width:100%;float:right;text-align:right;">';
									if($i <= $nr){
										echo $_SESSION['label4'];
									}
									echo '</label>
                                	<label id="resultValue'.$i.'" style="width:100%;float:right;text-align:right;">'.$_SESSION['value'][$i].'<label>
								</div>
							</div>
						</div>
						<input type="button" class="add" id="add'.$i.'" name="add'.$i.'" value=" Add Club " onClick="addRow()" style="display:none;">
						<input type="button" class="add" id="remove'.$i.'" name="remove'.$i.'" value=" Remove Club " onClick="removeRow()" style="display:none;">
							';
						}
						// Sumrow
						if($_SESSION['CalculationDone']){
						echo '<div id="sumrow" style="padding:0; float:right; width:37%; border-top:1px solid #FFF;">
								<div style="float:left; width:14%; padding:0;">
                                	<label style="width:100%;float:right;text-align:right;">'.$_SESSION['totaldays'].'<label>
								</div>
								<div style="float:left; width:20%; padding:0;">
                                	<label style="width:100%;float:right;text-align:right;">'.(float)$_SESSION['totalsc'].'<label>
								</div>
								<div style="float:left; width:20%; padding:0;">
                                	<label style="width:100%;float:right;text-align:right;">'.(float)$_SESSION['totaltf'].'<label>
								</div>
								<div style="float:left; width:46%; padding:0;">
                                	<label style="width:100%;float:right;text-align:right;">'.$_SESSION['totalamount'].'<label>
								</div>
							</div>';
						}
				echo '
				</div>
      		</form>
     	</div>';
					
				// Now that all the fields are created we have to display the proper amount of them.
				for($i = 1; $i <= $nr; $i++){
					$club = $_SESSION['club'.$i];
					$regStart = $_SESSION['regStart'.$i];
					$regEnd = $_SESSION['regEnd'.$i];
					$season = $_SESSION['season'.$i];
					echo "<script> whenReload('$i', '$club', '$regStart', '$regEnd', '$season'); </script>";
				}
		?>
	</div>	
</div>

<script>
	function displayText(text){
		document.getElementById("hoverdiv").textContent = text;
		
		if(document.getElementById("hoverdiv").textContent != ""){
			document.getElementById("hoverdiv").style.border = "1px solid #FFF";
			document.getElementById("hoverdiv").style.borderRadius = '3px'; // standard
			document.getElementById("hoverdiv").style.MozBorderRadius = '3px'; // Mozilla
			document.getElementById("hoverdiv").style.WebkitBorderRadius = '3px'; // WebKit
		}
		else {
			document.getElementById("hoverdiv").style.border = "none";
		}
	}
	var i = parseInt(document.getElementById("nr").value);
	function addRow(){
		i++;
		document.getElementById("nr").value=i;
		
		document.getElementById("row" + i).style.display='';
		
		document.getElementById("add" + i).style.display='';
		document.getElementById("remove" + i).style.display='';
		document.getElementById("add" + (i - 1)).style.display='none';
		document.getElementById("remove" + (i - 1)).style.display='none';
		
		if(document.getElementById("end" + (i - 1)).value == '') {
			document.getElementById("start" + i).value='';
		}
		else {
			// Make extra sure the new reg start has a set value
			var date = document.getElementById("end" + (i - 1)).value;
			
			if(date.includes("-")) {
				var dateArray = date.split("-");
			}
			else if(date.includes(".")) {
				var dateArray = date.split(".");
			}
			else if(date.includes("/")) {
				var dateArray = date.split("/");
			}
			
			if(dateArray[0].length == 4) {
				var year = parseInt(dateArray[0]);
				if(dateArray[1].length == 2 && 1 <= parseInt(dateArray[1]) && parseInt(dateArray[1]) <= 12) {
					var month = parseInt(dateArray[1]) - 1;
					var day = parseInt(dateArray[2]) + 2;
				}
				else {
					var month = parseInt(dateArray[2]) - 1;
					var day = parseInt(dateArray[1]) + 2;
				}
			}
			else if(dateArray[2].length == 4) {
				var year = parseInt(dateArray[2]);
				if(dateArray[1].length == 2 && 1 <= parseInt(dateArray[1]) && parseInt(dateArray[1]) <= 12) {
					var month = parseInt(dateArray[1]) - 1;
					var day = parseInt(dateArray[0]) + 2;
				}
				else {
					var month = parseInt(dateArray[0]) - 1;
					var day = parseInt(dateArray[1]) + 2;
				}
			}
			
			var startDate = new Date(year, month, day);
			var dateString = ("0" + startDate.getUTCDate()).slice(-2) + "-" + ("0" + (startDate.getUTCMonth()+1)).slice(-2) + "-" + startDate.getUTCFullYear();
	
			document.getElementById("start" + i).value = dateString;
		}
		
		document.getElementById("add20").style.visibility='hidden';
	}
	function removeRow(){
		document.getElementById("row" + i).style.display='none';
		
		document.getElementById("add" + i).style.display='none';
		document.getElementById("remove" + i).style.display='none';
		document.getElementById("add" + (i - 1)).style.display='';
		document.getElementById("remove" + (i - 1)).style.display='';
		
		document.getElementById("club" + i).value='';
		document.getElementById("end" + i).value='';
		document.getElementById("season" + i).value='';
		
		document.getElementById("resultDays" + i).textContent = '';
		document.getElementById("resultSC" + i).textContent = '';
		document.getElementById("resultTF" + i).textContent = '';
		document.getElementById("resultValue" + i).textContent = '';
		
		i--;
		
		document.getElementById("nr").value=i;
		document.getElementById("remove1").style.display='none';
	}
	function clearAll() {
		document.getElementById("nr").value=1;
		
		document.getElementById("name").value='';
		document.getElementById("birthday").value='';
		document.getElementById("nationality").value='';
		
		document.getElementById("first").value='';
		document.getElementById("tffee").value='';
		document.getElementById("currency").value='';
		
		document.getElementById("club1").value='';
		document.getElementById("start1").value='';
		document.getElementById("end1").value='';		
		document.getElementById("season1").value='';
		
		document.getElementById("calcbutton").click();
		event.preventDefault();
	}
	function dateForNext(date, nr) {

		if(date.includes("-")) {
			var dateArray = date.split("-");
		}
		else if(date.includes(".")) {
			var dateArray = date.split(".");
		}
		else if(date.includes("/")) {
			var dateArray = date.split("/");
		}
		
		if(dateArray[0].length == 4) {
			var year = parseInt(dateArray[0]);
			if(dateArray[1].length == 2 && 1 <= parseInt(dateArray[1]) && parseInt(dateArray[1]) <= 12) {
				var month = parseInt(dateArray[1]) - 1;
				var day = parseInt(dateArray[2]) + 2;
			}
			else {
				var month = parseInt(dateArray[2]) - 1;
				var day = parseInt(dateArray[1]) + 2;
			}
		}
		else if(dateArray[2].length == 4) {
			var year = parseInt(dateArray[2]);
			if(dateArray[1].length == 2 && 1 <= parseInt(dateArray[1]) && parseInt(dateArray[1]) <= 12) {
				var month = parseInt(dateArray[1]) - 1;
				var day = parseInt(dateArray[0]) + 2;
			}
			else {
				var month = parseInt(dateArray[0]) - 1;
				var day = parseInt(dateArray[1]) + 2;
			}
		}
		
		var startDate = new Date(year, month, day);
		var dateString = ("0" + startDate.getUTCDate()).slice(-2) + "-" + ("0" + (startDate.getUTCMonth()+1)).slice(-2) + "-" + startDate.getUTCFullYear();

		document.getElementById("start" + (nr + 1)).value = dateString;	
	}
	function blurActiveInput() {
		if (!this.platform.is("iOS")) return;
	
		var activeElement = document.activeElement;
		if(activeElement.tagName == "INPUT" || activeElement.tagName == "TEXTAREA") {
			activeElement.blur();
		}
	}
	$(document).ready(function() {
    	$("#birthday").datepicker({
			dateFormat:"dd-mm-yy",
			monthNamesShort:["January","February","March","April","May","June","July","August","September","October","November","December"],
			dayNamesMin:["","","","","","",""],
			changeMonth: true,
			changeYear: true,
			nextText: ">",
			prevText: "<",
			yearRange: "-37:+nn",
			firstDay: 1,
		});
		$("#first").datepicker({
			dateFormat:"dd-mm-yy",
			monthNamesShort:["January","February","March","April","May","June","July","August","September","October","November","December"],
			dayNamesMin:["","","","","","",""],
			changeMonth: true,
			changeYear: true,
			nextText: ">",
			prevText: "<",
			yearRange: "-37:+nn",
			firstDay: 1,
		});
		<?php
		for($x = 1; $x <= 20; $x++) {
		echo '
		$("#season'.$x.'").datepicker({
			dateFormat:"yy-mm-dd",
			dayNamesMin:["","","","","","",""],
			monthNamesShort:["January","February","March","April","May","June","July","August","September","October","November","December"],
			changeMonth: true,
			nextText: ">",
			prevText: "<",
			defaultDate:"2018-07-01",
			firstDay: 1,
			onChangeMonthYear: function (year, month, inst) {
				var y = 2000;
				var m = "01";
				var d = "01";
				if (month == 1) {y = 2018; m = "01";};
				if (month == 2) {y = 2014; m = "02";};
				if (month == 3) {y = 2014; m = "03";};
				if (month == 4) {y = 2014; m = "04";};
				if (month == 5) {y = 2014; m = "05";};
				if (month == 6) {y = 2014; m = "06";};
				if (month == 7) {y = 2000; m = "07";};
				var durur = y + "-" + m + "-" + d;
      		},
			onSelect: function (dateText, inst) {
				var date = new Date(dateText);
				var displayDate1 = date.toDateString().substring(8,10)+" "+date.toDateString().substring(4,7);
				date.setDate(date.getDate() - 1);
				var displayDate2 = date.toDateString().substring(8,10)+" "+date.toDateString().substring(4,7);
				
				document.getElementById("season'.$x.'").value = displayDate1 + " - " + displayDate2;
			},
			beforeShow: function (input, inst) {
                inst.dpDiv.addClass("season");
            },
            onClose: function(dateText, inst){
                inst.dpDiv.removeClass("season");
            }
		});
		$("#start'.$x.'").datepicker({
			dateFormat:"dd-mm-yy",
			monthNamesShort:["January","February","March","April","May","June","July","August","September","October","November","December"],
			dayNamesMin:["","","","","","",""],
			changeMonth: true,
			changeYear: true,
			nextText: ">",
			prevText: "<",
			yearRange: "-37:+nn",
			firstDay: 1,
		});
		$("#end'.$x.'").datepicker({
			dateFormat:"dd-mm-yy",
			monthNamesShort:["January","February","March","April","May","June","July","August","September","October","November","December"],
			dayNamesMin:["","","","","","",""],
			changeMonth: true,
			changeYear: true,
			nextText: ">",
			prevText: "<",
			yearRange: "-37:+nn",
			firstDay: 1,
		});
		';
		}
		?>
		
  	});
</script>
</body>
</html>
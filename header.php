<?php
	session_start();
?>

<script src="project.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>

<style>
#langselec {
	width:calc(400px + 5vw);
	height:11%;
	margin-right:3%;
	margin-top:1%;
	float:right;
}

#langselec a {
	font-size:calc(15px + 0.9vw);
	color:#FFF;
	float:right;
	margin-right:8%;
	text-decoration:none;
}

#langselec a:hover {
	color:#06F;
}
#logologo {
	position:absolute;
	margin-top:0px;
	margin-left:0px;
	z-index:200;
	background-image:url(img/ifl_test1.png);
	background-position:center;
	background-size: cover;
	transform:scale(0.9);
	max-height:300px;
	max-width:350px;
}
</style>

<div id="header">
    	<div id="logologo" onclick="location.href = '../';" style="cursor:pointer;width:calc(50px + 18vw);height:calc(42px + 15.12vw);margin-left:0;margin-top:0;transform:scale(0.9);"></div>
		<div id="langselec">
        <?php
		if(isset($_SESSION['user'])){
			echo '
				<a href="contacts">contacts</a>
            	<a href="includes/logout-inc.php">logout</a>
				<a href="login">login</a>
				<a href="scc.php">scc</a>
			';
		}
		else {
			echo '
				<a href="contacts">contacts</a>
            	<a href="scc.php">scc</a>
				<a href="../">home</a>
			';
		}
		?>
            <!-- <a href="#"><img src="img/flag-eng.png"></a>
            <a href="#"><img src="img/flag-ger.png"></a>
            <a href="#"><img src="img/flag-swe.png"></a> -->    
    	</div>
    
			<!--
            <div id="menu">
    		<a href="#" id="menu-icon"></a>
			<ul>
            <?php
			/*
			if(isset($_SESSION['user'])) {
				echo '<li class="active"><a href="index.php">Home</a></li>
           				<li><a href="#">News</a></li>
           				<li><a href="#">Services</a></li>
            			<li><a href="#">Expertise</a></li>
					';
			}
			*/
			?>
            </ul>
			</div>
        -->
</div> 
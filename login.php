<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<meta charset="UTF-8">
  	<meta name="description" content="Free Web tutorials">
  	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="project.css" type="text/css">
<title>International Football Law</title>
</head>
<style>
input {
    -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
    -moz-box-sizing: border-box;    /* Firefox, other Gecko */
    box-sizing: border-box;         /* Opera/IE 8+ */
}
</style>


<body>

<div id="wrapper">
	
    <?php
		include_once "header.php";
	?>	 		
    	
    <div id="contentwrap" style="z-index:0;">
    	<div id="picfield" style="z-index:100;width:calc(120px + 20vw);height:calc(60px + 12.5vw);">
        	<form action="includes/login-inc.php" method="POST">
            	<div style="padding-top:20%;">
                <input type="text" name="user" placeholder="E-mail" style="width:100%;height:calc(22px + 1vw);padding-left:10px;border-radius:100vw; border-color:#009; outline-style:none;">
				<input type="password" name="pwd" placeholder="Password" style="margin-top:1%;width:100%;height:calc(22px + 1vw);padding-left:10px;border-radius:100vw; border-color:#009; outline-style:none;">

				<input type="submit" name="login" id="loginknapp" value="Login" style="margin-top:3%;width:100%;height:calc(22px + 1vw); border-radius:100vw; cursor: pointer;">
                </div>
			</form>
		</div>
					
		<video style="z-index:0;" autoplay muted loop id="myvideo"><source src="img/soccer_training.mp4" type="video/mp4"></video>
	</div>	
</div>

</body>
</html>
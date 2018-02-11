<?php
include 'modules/config.php';
include 'modules/time.php';
include 'modules/main.php';
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ragnarok Online</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
var target_date = new Date("<?php echo OPEN_DATE; ?>").getTime();
var days, hours, minutes, seconds;
var countdown = document.getElementById("countdown");
var d = document.getElementById("days");
var h = document.getElementById("hours");
var m = document.getElementById("minutes");
var s = document.getElementById("seconds");
setInterval(function () {
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
	
	
	if( days < 10 ){
		days = "0" + days;	
	}
	
	if( hours < 10 ){
		hours = "0" + hours;	
	}
	
	if( minutes < 10 ){
		minutes = "0" + minutes;	
	}
	
	if( seconds < 10 ){
		seconds = "0" + seconds;	
	}
	
	
    if( seconds_left > 0 ){
    // format countdown string + set tag value
    //countdown.innerHTML = days + "&nbsp;" + hours + "&nbsp;" + minutes + "" + seconds;  
		d.innerHTML = days + ' DAYS,';
		h.innerHTML = hours + ' HRS,';
		m.innerHTML = minutes + ' MINS,';
		s.innerHTML = seconds + ' SECS';
	} else {
		countdown.innerHTML = "Welcome!";
	}
	
}, 1000);

});
</script>
</head>
<body>

<div id="errorWrapper">
<?php
  if ( $error ) 
  {
	echo '<div class="message error">' . $message . '</div>';
  } else {
	if( $message ) echo '<div class="message success">' . $message . '</div>';
  }
?>       
</div>

<div class="bgtop">
	
	<div class="top">
		
		<div class="server-status">
			<?php echo $status ?>
		</div>

		<div class="player-online">
			<?php echo $online ?>
		</div>

		<div class="server-time">
			<?php echo $time; ?>
		</div>
		
		<div class="server-count">
			<?php echo $pcount; ?>
		</div>
		

	</div>

</div>

<div class="container">
	
	<div class="lpane">
		
		<div class="logo">
			<a href="<?php echo MAIN ?>"><img src="img/logo.png"></a>
		</div>

		<div class="register">
			
			<div id="registerForm">
		       <form action="" method="POST">
			   
					   <table cellspacing="0" cellpadding="0" id="form" border="0" width="100%">
						   <tr>
							   <td width="115">Username</td>
							   <td><input type="text" name="username" size="20" /></td>
						   </tr>
						   <tr>
								<td width="90">Password</td>
							   <td><input type="password" name="pasword" size="20"/></td>
						   </tr>
						   <tr>
							   <td width="90">Confirm Password</td>
							   <td> <input type="password" name="cpasword" size="20"/></td>
						   </tr>
						   <tr>
								<td width="90">Email Address</td>
							   <td style="height:34px;"><input type="text" name="email" /></td>
						   </tr>
						   
						   <tr>
								<td width="90">Date of Birth</td>
							   <td style="height: 25px;">
							   <select id="monthdropdown" name="month">
								</select> 
							   <select id="daydropdown" name="day">
								</select>
								<select id="yeardropdown" name="yr">
								</select> 
							   </td>
						   </tr>
						   
						   <tr>
								<td style="padding-top: 10px;" width="90">Gender</td>
							   <td style="padding-left: 5px;">
								   <input type="radio" name="sex" id="sex" value="M" checked="checked" /><label for="sex" class="css-label">Male</label>
								   <input type="radio" name="sex" id="sex1" value="F" /><label for="sex1" class="css-label">Female</label> 
							   </td>
						   </tr> 
						   <tr>
								<td width="90">Security Code</td>
							   <td style="height:60px;"><img src="modules/captcha2.php" width="150" height="50"/></td>
						   </tr>
							<tr>
								<td></td>	
							   <td><input type="text" name="captcha" size="20" value=""></td>
						   </tr>
					   </table>
					   
					   <center>
					   	<input type="submit" name="submit" value=" " id="btnreg" />
					   </center>
		                             
				</form>
			 </div>

		</div>

	</div>

	<div class="rpane">
		
		<div class="content">

			<div class="countdown">
				<div class="timer">

					<span id="days"></span>
					<span id="hours"></span>
					<span id="minutes"></span>
					<span id="seconds"></span>

				</div>
			</div>

			<div class="video">
				<iframe width="416" height="254" src="<?php echo EMBED_YOUTUBE ?>?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
			</div>

			<div class="downloadpc">
				<a href="<?php echo DOWNLOAD_PC ?>"><img src="img/btndownloadpc.png" class="btnanimate"></a>
			</div>

			<div class="downloadcp">
				<a href="<?php echo DOWNLOAD_CP ?>"><img src="img/btndownloadcp.png" class="btnanimate"></a>
			</div>

			<div class="vote">
				<a href="<?php echo VOTE ?>"><img src="img/btnvote.png" class="btnanimate"></a>
			</div>

			<div class="socials">
				<div class="twitch"><a href="<?php echo TWITCH ?>"><img src="img/btntwitch.png" class="btnanimate"></a></div>
				<div class="youtube"><a href="<?php echo YOUTUBE ?>"><img src="img/btnyoutube.png" class="btnanimate"></a></div>
				<div class="facebook"><a href="<?php echo FACEBOOK ?>"><img src="img/btnfacebook.png" class="btnanimate"></a></div>
				<div class="twitter"><a href="<?php echo TWITTER ?>"><img src="img/btntwitter.png" class="btnanimate"></a></div>
			</div>
				
		</div>
	
	</div>	

</div>

<div class="clearfix"></div>

<div class="footer">
	
	<div class="sitemap">
		<ul>
			<li><a href="<?php echo MAIN ?>">Visit our Website</a> | </li>
			<li><a href="<?php echo DOWNLOAD_PC ?>">PC Installer</a> | </li>
			<li><a href="<?php echo DOWNLOAD_CP ?>">Android Installer</a> | </li>
			<li><a href="<?php echo VOTE ?>">Vote Now</a> | </li>
			<li><a href="<?php echo TWITCH ?>">Twitch</a> | </li>
			<li><a href="<?php echo YOUTUBE ?>">Youtube</a> | </li>
			<li><a href="<?php echo FACEBOOK ?>">Facebook</a> | </li>
			<li><a href="<?php echo TWITTER ?>">Twitter</a></li>
		</ul>
	</div>

	<div class="copyright">
		<a href="<?php echo MAIN ?>"><img src="img/flogo.png"></a> <br/>
		&copy; Copyright 2016 Your Ragnarok Online. <br/>
		Ragnarok Online and all related contents are all property of Gravity.
	</div>

</div>


</body>
</html>
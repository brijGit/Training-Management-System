<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();

if ('Assistant Head'==($_SESSION['status']))
  {		
  	 echo"		
		Welcome {$_SESSION['user_id']}! you entered as {$_SESSION['status']}
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='style1' href=\"logout.php\">Logout</a>";
	}
 else
  {
     echo"
		<div id='main'>";
		echo"You are not authorized to access the page";
		exit;
		echo"</div>";
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trainer Page for Attendance</title>
<link href="mycss.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.4.2.min.js" type="text/javascript"></script>	
<script src="menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
    
 </div>
 <h3 align = "center">Assistant Login</h3>
  <div id="sidebar1">
<ul class="menu">
		
		<li>
			<a href="#">Training</a>
			<ul class="acitem">
	            <li><a href="nominations.php">Nominations</a></li>
         	</ul>
         </li>
         <li>
			<a href="#">Site Visit</a>
			<ul class="acitem">
	            <li><a href="request.php">Request</a></li>
                <li><a href="r_update.php">Request Update</a></li>
         	</ul>
         </li>
         <li>
        	<a href="logout.php">Logout</a>
        </li>
      </ul>         
  </div>
	<br class="clearfloat" />
  <div id="footer">
     </div>
</div>
</body>
</html>

<?php

	if(isset($_POST['submit']))
		{
		if(trim($_POST['tno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Training Number.');</script>";
	exit;
			}
	
		$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	
	$insert=  "insert into trainer
		values('$_POST[tno]')";
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Training Number Accepted Successfully. Forwarded for Attendance.');</script>";
		echo "<script language='javascript'>document.location.href='attendance.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='trainer.php';</script>";
			}
			
?>
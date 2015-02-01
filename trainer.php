<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();

if ('Trainer'==($_SESSION['status']))
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
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
    
 </div>
 <h2 align = "center">Trainer Page</h2>
  <div id="sidebar1">
   

    <form id="form1" name="form1" method="post" action="">
      <p>Training Number: 
        <label>
          <input type="text" name="tno" id="tno" />
        </label>
        <label>
          <input type="submit" name="submit" id="submit" value="Submit"/>
        </label>
        
      </p>
    </form>
    
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
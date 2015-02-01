<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
   
if ('Admin'==($_SESSION['status']))
  {
  	 echo"
	 Welcome {$_SESSION['user_id']}! you entered as {$_SESSION['status']}...
		
		
		<a class='style1' href=\"logout.php\">Logout</a>";
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

<title>Home - Contract Management System</title>
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
<h2 align = "center">Admin Page</h2>
<div id="sidebar1">
 <ul class="menu">
		
		<li>
			<a href="#">Master Details</a>
		  <ul class="acitem">
		    <li><a href="cdetails.php">Company Details</a></li>
		    <li><a href="contractdetails.php">Contract Details</a></li>
            <li><a href="training schedule.php">Contract Duration Bifurcation</a></li>
             <li><a href="lwc.php">Center Details</a></li>
		    <li><a href="updatelogin.php">New User ID Creation</a></li>
		    </ul>
      </li>
		<li>
			<a href="#">Training</a>
		  <ul class="acitem">
				<li><a href="tnumber.php">Training Details</a></li>
                 <li><a href="sallocation.php">Seat Allocation</a></li>
                <li><a href="filteringf.php">Finalization</a></li>
                <li><a href="final_reporting.php">Participation</a></li>
			</ul>
		</li>
         
        <li>
			<a href="#">Reports</a>
			<ul class="acitem">
	            <li><a href="test.php">Training Status</a></li>
			</ul>
		</li>
        <li>
        	<a href="logout.php">Logout</a>
        </li>


	</ul>
 </div>
  <div id="mainContent">
    
  </div>
<br class="clearfloat" />
  <div id="footer">
  
  </div>
</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();

if ('Admin'==($_SESSION['status']))
  {
  	 echo"
		
		
		Welcome..{$_SESSION['user_id']}! you entered as {$_SESSION['status']}
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
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database of Training Schedule</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4>
  </div>
  <h3 align = "center">Database of Contract Bifurcation Schedule</h3>
  <table align="center" cellpadding="0" bgcolor="#FFFFFF" width="900" border="2">
  <tr>
    <td>
    <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM tschedule";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"1\" width=\"70%\">
		<tr>
		<th>Contract Number</th><th>Contract Date From</th><th>Contract Date To</th><th>Training Registration</th><th>Status</th></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[0]."</td><td>".$result[1]."/".$result[2]."/".$result[3]."</td><td>".$result[4]."/".$result[5]."/".$result[6]."</td><td>".$result[7]."</td><td>".$result[8]."</td></tr>";
	} echo "</table>";
	
	 
	 ?>


 </td></tr></table>
 <div id="footer">
	<h4 align="center"><a href="training schedule.php" title="Go Back" target="_parent">Go Back</a><br />
    
  </div>
   
</div>

</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$abbr=$_SESSION['abbr'] ;
$cfyy=$_SESSION['cfyy'] ;
$ctyy=$_SESSION['ctyy'] ;
$stat=$_SESSION['stat'] ;

if ('Assistant Head'==($_SESSION['status']))
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
<title>Site Visit Report</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Back to homepage" >Home</a></h4> 
  </div>
  
  <div id="mainContent">
    <h3 align = "center">Site Visit Report Details</h3><br />
<?php

	
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$select=  "SELECT * from request WHERE flag='1' AND abbr='".$abbr."'AND cfyy='".$cfyy."' AND ctyy='".$ctyy."' AND stat='".$stat."'";
		 $resource=mysql_query($select,$con);
		  echo "
		<table align=\"center\" border=\"1\" width=\"90%\">
		<tr>
		<th>Contract Type</th><th>Abbreviation</th><th>Domain</th><th>Location</th><th>Work Center</th><th>Contract Number</th><th>Contract Year From</th><th>Contract Year To</th><th>Contact Person</th><th>Proposed Date</th><th>Problem</th><th>Request Number</th></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>".$result[5]."</td><td>".$result[6]."/".$result[7]."/".$result[8]."</td><td>".$result[9]."/".$result[10]."/".$result[11]."</td><td>".$result[12]."</td><td>".$result[13]."/".$result[14]."/".$result[15]."</td><td>".$result[16]."</td><td>".$result[26]."</td></tr>";
	} echo "</table>";
	
	 
		
?>    
  </div>  
   <br class="clearfloat" />
  <div id="footer">
 <h4 align="center"><a href="site.php" title="Back" >Go Back</a></h4> 
  </div>
</body>
</html>


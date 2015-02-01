<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
    <h2>Show Training Details</h2>
    <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4> 
  </div>
<?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM tnumber where flag='1'";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"1\" width=\"70%\">
		<tr>
		<th>Company's Abbr.</th><th>Domain</th><th>Software</th><th>Instructor's name</th><th>Contract No.</th><th>Contract Year From</th><th> Contract Year To</th><th>Training From</th><th>Training To</th><th>Venue</th><th>Status</th></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>".$result[5].$result[6].$result[7]."</td><td>".$result[8].$result[9].$result[10]."</td><td>".$result[11].$result[12].$result[13]."</td><td>".$result[14].$result[15].$result[16]."</td><td>".$result[17]."</td><td>".$result[18]."</td></tr>";
	} echo "</table>";
	
	
	 ?>
      <br class="clearfloat" />
  <div id="footer">
  <p align="center"><h4 align="center"><a href="tnumber.php" title="Go Back" target="_parent">Go Back</a></h4>
  </div>
     </div>
</body>
</html>
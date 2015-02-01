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
<title>Database of Training Details</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4>  
  </div>
  
  <h3 align="center"> Training Details</h3>
  <div id="table">
  <table align="center" cellpadding="0" bgcolor="#FFFFFF" width="950" border="3">
  <tr>
    <td>
    <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM tnumber where flag='1'";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"left\" border=\"1\" width=\"100%\">
		<tr><th>Training No.</th><th>Company's Abbr.</th><th>Domain</th><th>Software</th><th>Contract No.</th><th>Contract Year From</th><th> Contract Year To</th><th>Training From</th><th>Training To</th><th>Venue</th><th>Status</th>
			</tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[20]."</td><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[4]."</td><td>".$result[5].'/'.$result[6].'/'.$result[7]."</td><td>".$result[8].'/'.$result[9].'/'.$result[10]."</td><td>".$result[11].'/'.$result[12].'/'.$result[13]."</td><td>".$result[14].'/'.$result[15].'/'.$result[16]."</td><td>".$result[17]."</td><td>".$result[18]."</td><td>
	<a href=\"show tdetails.php?tno=".$result[20]."\"><img border=\"0\" src=\"images/cooltext457952800.png\" onmouseover=\"this.src='images/cooltext457952800MouseOver.png';\" onmouseout=\"this.src='images/cooltext457952800.png';\" /></a>
	</td></tr>";
	} echo "</table>";
	
	 
	 ?>


 </td></tr></table>
 </div>
<div id="footer">
	<h4 align="center"><a href="tnumber.php" title="Go Back" target="_parent">Go Back</a></h4>
     </div>
</div>

   
</body>
</html>


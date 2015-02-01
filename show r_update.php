<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();

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
<title>Database of Training Details</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
  <h4 align="right"><a href="Assistant Head.php" title="Back to homepage">Home</a></h4>   
  </div>
  <h3 align="center"> Training Details</h3>
  <table align="center" cellpadding="0" bgcolor="#FFFFFF" width="1100" border="3">
  <tr>
    <td>
	<?php 
	 $id=$_REQUEST['rno']; 
	 
	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="UPDATE request SET flag='0' WHERE rno='".$id."'";
		
		  if(!mysql_query($query,$link))
		  {die ("An unexpected error occured while <b>deleting</b> the record, Please try again!");}
		  else
		 {
		  echo "<script language='javascript'>alert('Problem details deleted');</script>";}
	 ?>
    <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM request where flag='1'";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"1\" width=\"100%\">
		<tr>
		<th>Contract Type</th><th>Location</th><th>Work Center</th><th>Contract Number</th><th>Problem</th><th>Problem Attended From</th><th>Problem Attended To</th><th>Visiting Person</th><th>Action</th><th>Status</th><th>Request Number</th></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[0]."</td><td>".$result[3]."</td><td>".$result[4]."</td><td>".$result[5]."</td><td>".$result[16]."</td><td>".$result[17]."/".$result[18]."/".$result[19]."</td><td>".$result[20]."/".$result[21]."/".$result[22]."</td><td>".$result[23]."</td><td>".$result[24]."</td><td>".$result[25]."</td><td>".$result[26]."</td><td>
	<a href=\"show r_update.php?rno=".$result[26]."\"><img border=\"0\" src=\"images/cooltext457952800.png\" onmouseover=\"this.src='images/cooltext457952800MouseOver.png';\" onmouseout=\"this.src='images/cooltext457952800.png';\" /></a>
	</td></tr>";
	} echo "</table>";
	
	 
	 ?>


 </td></tr></table>
<div id="footer">
	<h4 align="center"><a href="tnumber.php" title="Go Back" target="_parent">Go Back</a></h4>
  </div>
</div>

   
</body>
</html>


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
  <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4>  
  </div>
  <h3 align="center">Details of Trainings</h3>
  <table align="center" cellpadding="0" bgcolor="#FFFFFF" width="700" border="3">
  <tr>
    <td>
<?php
$date = date("j M y");
$d = strtotime($date);
echo "Today :" .$date;
$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("ongc2", $con) or die("cannot connect to db");
		 $query="SELECT * FROM tschedule";
		 $result=mysql_query($query) or die("cannot fetch data");
		
 echo "
		<table align=\"center\" border=\"1\" width=\"100%\">
		<tr><th>Company's Abbr.</th><th>Contract Number</th><th>Training Status</th>
			</tr> ";
		while($row = mysql_fetch_row($result))
		 {
		
		
$date1 = $row[1]." ".$row[2]." ".$row[3]	;
$date2 = $row[4]." ".$row[5]." ".$row[6]	;
$d1 = strtotime($date1);
$d2 = strtotime($date2);

			
			


	

if(($d1 < $d)&&($d<$d2))
{

$cno = $row[0];
$result1 = mysql_query("Select * from contractdetails where cno = $cno") or die("cannot ");
$result2 = mysql_fetch_row($result1);

echo "<tr><td>".$result2[3]."</td><td>".$row[0]."</td><td>".$row[8]."</td></tr>";
}
 
}
echo "</table>";
?>
</td></tr></table>
<div id="footer">
	
  </div>
</div>

   
</body>
</html>

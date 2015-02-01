<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();

$t=$_SESSION['tno'] ;
		$c=		$_SESSION['code'] ;
		
if  ('Center Head'==($_SESSION['status']))
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
<title>Approved Candidates</title>
<link href="head.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

 <div id="header">
     <h4 align="right"><a href="center head.php" title="Back to homepage" >Home</a></h4> 
  </div>
 
  

    <?php
  

	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

$sql="SELECT * FROM nominations where tno='".$t."' AND code='".$c."' AND flag='1'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

?>
  
   
 <table align="center" width="500" border="0" cellspacing="1" cellpadding="0">
  <tr>
<td>
<form name="form1" method="post" action="approval1.php">
<table align="center" width="500" border="2" cellpadding="2" cellspacing="0" bgcolor="#CCCCCC">
<tr>

<td align="center" colspan="11" bgcolor="#FFFFFF"><strong>Nomination approval</strong> </td>
</tr>
<tr>

<td align="center" bgcolor="#FFFFFF"><strong>Training Number</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>CPF Number</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Designation</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Location</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Work Center</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Mobile Number</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Mail ID</strong></td>

<td align="center" bgcolor="#FFFFFF"><strong>Approval</strong></td>

</tr>

<?php
while($rows=mysql_fetch_array($result))
{

?>
<tr>



<td bgcolor="#FFFFFF"><?php echo $rows['1']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['2']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['3']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['4']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['5']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['6']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['7']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['8']; ?></td>


<td bgcolor="#FFFFFF">
<?php

if(!$rows['9'])
 {
echo '<span class="style1" >Not Approved</span>';
} 
elseif($rows['9'])
{
echo '<span class="style2">Approved</span>';
}
?>
</tr>
<?php
}//while close
?>


</form>


</td>
</tr>
</table>
</div>
<div id="pdf">
<p align="justify">you can print the CONFIRMATION LETTER of approved candidats by clicking on the following link<br />
<a href="ex.php">view CONFIRMATION LETTER of approved candidats....</a>
</p>
</div>
<br class="clearfloat" />
  <div id="footer">
 	</div>
</div>
</body>
</html>

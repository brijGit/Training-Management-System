<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$t=$_SESSION['tno'] ;
?>
<?php 		
if  ('Admin'==($_SESSION['status']))
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
<title>Approval</title>
<link href="head.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

 <div id="header">
   <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4> 
  </div>
 <h2 align="center">Final Reporting</h2>
  

    <?php
  

	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

$sql="SELECT * FROM nominations where tno='".$t."' AND flag='1'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

?>
  
   
 <table align="center" width="500" border="2" cellspacing="0" cellpadding="2">
  <tr>
<form name="form1" method="post" action="final1.php">
<tr>
<td colspan="11" bgcolor="#FFFFFF"><strong>Nomination approval</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Training Number</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>CPF Number</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Designation</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Location</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Work Center</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Mobile no.</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Mail ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Approval</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Reporting</strong></td>
</tr>

<?php
while($rows=mysql_fetch_array($result))
{

?>
<tr>

<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>">

</td>

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
?></td>
<td bgcolor="#FFFFFF">
<?php

if(!$rows['10'])
 {
echo '<span class="style1" >----------</span>';
} 
elseif($rows['10'])
{
echo '<span class="style2">Reported</span>';
}
?></td>
</tr>
<?php
}//while close
?>


<tr>
<td colspan="14" align="center" bgcolor="#FFFFFF"><input name="submit" type="submit" id="delete" value="Repoted At Center"></td>
</tr>
<tr>
<td colspan="14" align="center" bgcolor="#FFFFFF"><a href="pdetails.php">New Entry At Time Of Reporting</a></td>
</tr>
</form>

<?php

if(isset($_POST['submit']))
{
	
for($i=0;$i<$count;$i++)
{
$del_id = $_POST['checkbox'][$i];
$sql="INSERT INTO reported(id,tno,code,name,desig,cpf,loc,mob,mid)select id,tno,code,name,desig,cpf,loc,mob,mid  from nominations 
WHERE id='".$del_id."'";
$result = mysql_query($sql);
$s="UPDATE nominations SET flag1='1' WHERE id='".$del_id."'";

$result = mysql_query($s);
}


if($result)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=final1.php\">";
}
mysql_close($con) ;
}

?>

</td>
</tr>
</table>


<br class="clearfloat" />
  <div id="footer">
   <h4 align="center"><a href="final_reporting.php" title="Go Back" target="_parent">Go Back</a></h4>
  </div>
</div>
</body>
</html>

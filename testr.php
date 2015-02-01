<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>9lessons Registration Demo</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js.js"></script>


</head>

<body>
<div id="form">
<h2>REG</h2>

<form method="post" action="testr.php" >


<label>Email: </label><br/> 
<input type="text" name="email" id="email" />
<span class="error"></span>

<label>Username: </label><br/> 
<input type="text" name="name" id="username" />
<span class="error"></span>
<label>Password: </label><br/> 
<input type="password" name="password" id="password" />
<span class="error"></span>

<input type="submit" value=" Register "  name="submit" id='submit'/>

</form>
</div>
</body>
</html>
<?php

	if(isset($_POST['submit']))
		{
			
			$s1= $_POST['email'];
			
			
$sql="SELECT * FROM registration where email='$s1'";
$result=mysql_query($sql);

$count=mysql_fetch_row($result)or die("cannot find");
echo $count;
if($result)
			{

	echo "<script language='javascript'>alert('Thank you.');</script>";
	exit();
}
else
{
			
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("fest", $con) or die ("cannot connect to db");
	
	$insert=  "insert into registration
		values('$_POST[email]','$_POST[name]','$_POST[password]')";
		$result=mysql_query($insert) or die("Error in insertion");
		
		mysql_close($con); 
		echo "<script language='javascript'>alert('Thank you.');</script>";
		echo "<script language='javascript'>document.location.href='index.html';</script>";
		}
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='contact_techgeeksevolution.php';</script>";
			}
			
?>


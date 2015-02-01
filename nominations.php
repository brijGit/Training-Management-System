<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();

if ('Assistant Head'==($_SESSION['status']))
  {
  	 echo"		
		Welcome {$_SESSION['user_id']}! you entered as {$_SESSION['status']}...
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='style1' href=\"logout.php\">Logout</a>";
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
<title>Enter the Nominations</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Main page">Home</a></h4>  
  </div>
   <h2 align ="center">Training Nominations</h2>
    <form id="form1" name="form1" method="post" action="">
    <div align="center">
      <table width="50%" border="2">
        <td height="63" colspan="8"><p>Training Number: 
          
              <label>
<input type="text" name="tno" id="tno" value="<?php
  echo (isset($_POST['tno'])) ?
htmlspecialchars($_POST['tno']) : '';
  ?> " />               </label>
        </p>
          </td>
  </tr>
  <tr>
  <td width="1%"><p>S.No.</p></td>
  <td width="23%"><p align="center">CPF No.</p></td>
  <td width="20%"><p align="center">Name</p></td>
  <td width="23%"><p>Designation</p></td>
  <td width="25%" height="60"><p align="center">Location</p></td>
  <td width="25%" height="60"><p align="center">Work Center</p></td>
  <td width="25%" height="60"><p align="center">Mobile Number</p></td>
  <td width="25%" height="60"><p align="center">Mail ID</p></td>
  </tr>
  <tr>
  <td height="63">1</td>
  <td height="63"><input name="cpf[]" type="text" id="cpf[]" size="15" value="<?php echo (isset($_POST['cpf[]'])) ? htmlspecialchars($_POST['cpf[]']) : ''; ?> " />
  <td height="63"><input name="name[]" type="text" id="name[]" size="15"  value="<?php
  echo (isset($_POST['name[]'])) ?
htmlspecialchars($_POST['name[]']) : '';
  ?> " />
  <td height="63"><input name="desig[]" type="text" id="desig[]" size="15" value="<?php
  echo (isset($_POST['desig[]'])) ?
htmlspecialchars($_POST['desig[]']) : '';
  ?> " />
  <td height="63"><input name="loc[]" type="text" id="loc[]" size="15" value="<?php
  echo (isset($_POST['loc[]'])) ?
htmlspecialchars($_POST['loc[]']) : '';
  ?> " />
  <td height="63"><input name="code[]" type="text" id="code[]" size="15" value="<?php
  echo (isset($_POST['code[]'])) ?
htmlspecialchars($_POST['code[]']) : '';
  ?> " />
  <td height="63"><input name="mob[]" type="text" id="mob[]" size="15" value="<?php
  echo (isset($_POST['mob[]'])) ?
htmlspecialchars($_POST['mob[]']) : '';
  ?> " />
  <td height="63"><input name="mid[]" type="text" id="mid[]" size="15" value="<?php
  echo (isset($_POST['mid[]'])) ?
htmlspecialchars($_POST['mid[]']) : '';
  ?> " />
  </tr>
  <tr>
  <td height="63">2</td>
   <td height="63"><input name="cpf[]" type="text" id="cpf[]" size="15" value="<?php echo (isset($_POST['cpf[]'])) ? htmlspecialchars($_POST['cpf[]']) : ''; ?> " />
  <td height="63"><input name="name[]" type="text" id="name[]" size="15"  value="<?php
  echo (isset($_POST['name[]'])) ?
htmlspecialchars($_POST['name[]']) : '';
  ?> " />
  <td height="63"><input name="desig[]" type="text" id="desig[]" size="15" value="<?php
  echo (isset($_POST['desig[]'])) ?
htmlspecialchars($_POST['desig[]']) : '';
  ?> " />
  <td height="63"><input name="loc[]" type="text" id="loc[]" size="15" value="<?php
  echo (isset($_POST['loc[]'])) ?
htmlspecialchars($_POST['loc[]']) : '';
  ?> " />
  <td height="63"><input name="code[]" type="text" id="code[]" size="15" value="<?php
  echo (isset($_POST['code[]'])) ?
htmlspecialchars($_POST['code[]']) : '';
  ?> " />
  <td height="63"><input name="mob[]" type="text" id="mob[]" size="15" value="<?php
  echo (isset($_POST['mob[]'])) ?
htmlspecialchars($_POST['mob[]']) : '';
  ?> " />
  <td height="63"><input name="mid[]" type="text" id="mid[]" size="15" value="<?php
  echo (isset($_POST['mid[]'])) ?
htmlspecialchars($_POST['mid[]']) : '';
  ?> " />
  </tr>
  <tr>
  <td height="63">3</td>
   <td height="63"><input name="cpf[]" type="text" id="cpf[]" size="15" value="<?php echo (isset($_POST['cpf[]'])) ? htmlspecialchars($_POST['cpf[]']) : ''; ?> " />
  <td height="63"><input name="name[]" type="text" id="name[]" size="15"  value="<?php
  echo (isset($_POST['name[]'])) ?
htmlspecialchars($_POST['name[]']) : '';
  ?> " />
  <td height="63"><input name="desig[]" type="text" id="desig[]" size="15" value="<?php
  echo (isset($_POST['desig[]'])) ?
htmlspecialchars($_POST['desig[]']) : '';
  ?> " />
  <td height="63"><input name="loc[]" type="text" id="loc[]" size="15" value="<?php
  echo (isset($_POST['loc[]'])) ?
htmlspecialchars($_POST['loc[]']) : '';
  ?> " />
  <td height="63"><input name="code[]" type="text" id="code[]" size="15" value="<?php
  echo (isset($_POST['code[]'])) ?
htmlspecialchars($_POST['code[]']) : '';
  ?> " />
  <td height="63"><input name="mob[]" type="text" id="mob[]" size="15" value="<?php
  echo (isset($_POST['mob[]'])) ?
htmlspecialchars($_POST['mob[]']) : '';
  ?> " />
  <td height="63"><input name="mid[]" type="text" id="mid[]" size="15" value="<?php
  echo (isset($_POST['mid[]'])) ?
htmlspecialchars($_POST['mid[]']) : '';
  ?> " />
  </tr>
  <tr>
  <td height="63">4</td>
   <td height="63"><input name="cpf[]" type="text" id="cpf[]" size="15" value="<?php echo (isset($_POST['cpf[]'])) ? htmlspecialchars($_POST['cpf[]']) : ''; ?> " />
  <td height="63"><input name="name[]" type="text" id="name[]" size="15"  value="<?php
  echo (isset($_POST['name[]'])) ?
htmlspecialchars($_POST['name[]']) : '';
  ?> " />
  <td height="63"><input name="desig[]" type="text" id="desig[]" size="15" value="<?php
  echo (isset($_POST['desig[]'])) ?
htmlspecialchars($_POST['desig[]']) : '';
  ?> " />
  <td height="63"><input name="loc[]" type="text" id="loc[]" size="15" value="<?php
  echo (isset($_POST['loc[]'])) ?
htmlspecialchars($_POST['loc[]']) : '';
  ?> " />
  <td height="63"><input name="code[]" type="text" id="code[]" size="15" value="<?php
  echo (isset($_POST['code[]'])) ?
htmlspecialchars($_POST['code[]']) : '';
  ?> " />
  <td height="63"><input name="mob[]" type="text" id="mob[]" size="15" value="<?php
  echo (isset($_POST['mob[]'])) ?
htmlspecialchars($_POST['mob[]']) : '';
  ?> " />
  <td height="63"><input name="mid[]" type="text" id="mid[]" size="15" value="<?php
  echo (isset($_POST['mid[]'])) ?
htmlspecialchars($_POST['mid[]']) : '';
  ?> " />
  </tr>
  <tr>
  <td height="63">5</td>
   <td height="63"><input name="cpf[]" type="text" id="cpf[]" size="15" value="<?php echo (isset($_POST['cpf[]'])) ? htmlspecialchars($_POST['cpf[]']) : ''; ?> " />
  <td height="63"><input name="name[]" type="text" id="name[]" size="15"  value="<?php
  echo (isset($_POST['name[]'])) ?
htmlspecialchars($_POST['name[]']) : '';
  ?> " />
  <td height="63"><input name="desig[]" type="text" id="desig[]" size="15" value="<?php
  echo (isset($_POST['desig[]'])) ?
htmlspecialchars($_POST['desig[]']) : '';
  ?> " />
  <td height="63"><input name="loc[]" type="text" id="loc[]" size="15" value="<?php
  echo (isset($_POST['loc[]'])) ?
htmlspecialchars($_POST['loc[]']) : '';
  ?> " />
  <td height="63"><input name="code[]" type="text" id="code[]" size="15" value="<?php
  echo (isset($_POST['code[]'])) ?
htmlspecialchars($_POST['code[]']) : '';
  ?> " />
  <td height="63"><input name="mob[]" type="text" id="mob[]" size="15" value="<?php
  echo (isset($_POST['mob[]'])) ?
htmlspecialchars($_POST['mob[]']) : '';
  ?> " />
  <td height="63"><input name="mid[]" type="text" id="mid[]" size="15" value="<?php
  echo (isset($_POST['mid[]'])) ?
htmlspecialchars($_POST['mid[]']) : '';
  ?> " />
  </tr>
  </table>
      
    </div>
    
<p align="center">

<input type="submit" name="submit" id="Submit" value="Submit" />
<label>
  <input type="reset" name="submit1" id="Clear" value="Clear" />
</label>
</p>
<p align="center">
        <label>
          <input type="submit" name="view" id="view" value="View" />
        </label>
      </p>
  </form>
   
    <div id="footer">
   
  </div>
</div>
	<br class="clearfloat" />
  
</body>
</html>

<?php 
if(isset($_POST['submit']))
		{
			if(trim($_POST['tno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Training Number.');</script>";
	exit;
			}
			if(trim($_POST['cpf'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the CPF Number.');</script>";
	exit;
			}
			if(trim($_POST['name'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Name.');</script>";
	exit;
			}
			if(trim($_POST['desig'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Designation.');</script>";
	exit;
			}
			if(trim($_POST['loc'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Location.');</script>";
	exit;
			}
			if(trim($_POST['code'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Work Center.');</script>";
	exit;
			}
			if(trim($_POST['mob'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Mobile Number.');</script>";
	exit;
			}
			if(trim($_POST['mid'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Mail ID.');</script>";
	exit;
			}
			
			
$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

$tno=$_REQUEST['tno'];

foreach($_POST['cpf'] as $row=>$Act) 
{ 
$cpf=$Act; 
$name=$_POST['name'][$row];
$desig=$_POST['desig'][$row];  
$loc=$_POST['loc'][$row];
$code=$_POST['code'][$row];
$mob=$_POST['mob'][$row];
$mid=$_POST['mid'][$row];
} 


//enter rows into database 
foreach($_POST['cpf'] as $row=>$Act) 
{ 
$cpf=mysql_real_escape_string($Act); //to prevent frm sqlinjection
$name=mysql_real_escape_string($_POST['name'][$row]);
$desig=mysql_real_escape_string($_POST['desig'][$row]);  
$loc=mysql_real_escape_string($_POST['loc'][$row]);
$code=mysql_real_escape_string($_POST['code'][$row]);
$mob=mysql_real_escape_string($_POST['mob'][$row]); 
$mid=mysql_real_escape_string($_POST['mid'][$row]); 
 $tno = trim($tno);
$cpf = trim($cpf);
	$name = trim($name);
	$desig = trim($desig);
	$loc = trim($loc);
	$code = trim($code);
	$mob = trim($mob);
	$mid = trim($mid);

$insert = "INSERT INTO nominations
VALUES (' ','$tno','$cpf','$name','$desig','$loc','$code','$mob','$mid','0','0','0')"; 
$result=mysql_query($insert) or die("Error in insertion.");

}
echo "<script language='javascript'>alert('Nominations Entered Successfully');</script>";

mysql_close($con) ;

}
elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='nominations.php';</script>";
			}
?>
<?php 
if(isset($_POST['submit']))
		{
			$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

			$q="DELETE FROM nominations WHERE cpf=' '";
$res=mysql_query($q);
mysql_close($con) ;
		}
		if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete nomi.php';</script>";
		}

		?>

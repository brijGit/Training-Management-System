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
<title>Company Details Entry</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4> 
  </div>
  
  <div id="mainContent">
    <h3 align = "center">Company Details
    </h3><br />
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="471" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="235">Company name:</td>
          <td width="226"><label>
 <input type="text" name="cname" id="cname" value="<?php
  echo (isset($_POST['cname'])) ?
htmlspecialchars($_POST['cname']) : '';
  ?> " />          </label></td>
        </tr>
        
         <tr>
          <td>Company's Abbreviation:</td>
          <td><label>
 <input type="text" name="abbr" id="abbr" value="<?php
  echo (isset($_POST['abbr'])) ?
htmlspecialchars($_POST['abbr']) : '';
  ?> " />          </label></td>
        </tr>
        <tr>
          <td>Software:</td>
          <td><label>
 <input type="text" name="sw" id="sw" value="<?php
  echo (isset($_POST['sw'])) ?
htmlspecialchars($_POST['sw']) : '';
  ?> " />          </label></td>
        </tr>
        <tr>
          <td>Module:</td>
          <td><label>
 <input type="text" name="mod" id="mod" value="<?php
  echo (isset($_POST['mod'])) ?
htmlspecialchars($_POST['mod']) : '';
  ?> " />          </label></td>
        </tr>
      </table>
         <p align="center">
        <label>
          <input type="submit" name="submit" id="submit" value="Submit" />
        </label>
        <label>
           <input type="reset" name="submit1" id="clear" value="Clear" />
        </label>
      </p>
      <p align="center">
        <label>
          <input type="submit" name="view" id="view" value="View" />
        </label>
      </p>
    </form>
  </div>
	<br class="clearfloat" />
  <div id="footer">
  </div>
</div>
</body>
</html>

<?php

	if(isset($_POST['submit']))
		{
		if(trim($_POST['cname'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Company Name.');</script>";
	exit;
			}
		
	elseif(trim($_POST['abbr'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Company's Abbreviation.');</script>";
	exit;
			}
			
	elseif(trim($_POST['sw'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Software.');</script>";
	exit;
			}
	
	elseif(trim($_POST['mod'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Module.');</script>";
	exit;
			}
	
			
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$abbr = trim($_POST[abbr]);
	$sw = trim($_POST[sw]);
	$cname = trim($_POST[cname]);
	$mod = trim($_POST[mod]);
	$insert=  "insert into cdetails
		values(' ','$cname','$abbr','$sw','$mod','1')";
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Company Details Entered Successfully');</script>";
		echo "<script language='javascript'>document.location.href='cdetails.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='cdetails.php';</script>";
			}
		if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete cdetails.php';</script>";
			}
?>
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
<title>Center Details Entry</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
  <img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
    <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4> 
  </div>
  
  <div id="mainContent">
    <h3 align = "center">Center Details</h3>
    <br />
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="471" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="235">Location :</td>
          <td width="226"><label>
 <input type="text" name="loc" id="loc" value="<?php
  echo (isset($_POST['loc'])) ?
htmlspecialchars($_POST['loc']) : '';
  ?> " />          </label></td>
        </tr>
        
         <tr>
          <td>Work Center :</td>
          <td><label>
 <input type="text" name="code" id="code" value="<?php
  echo (isset($_POST['code'])) ?
htmlspecialchars($_POST['code']) : '';
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
		if(trim($_POST['loc'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Location.');</script>";
	exit;
			}
		
	elseif(trim($_POST['code'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter thr Work Center.');</script>";
	exit;
			}
			
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$loc = trim($_POST[loc]);
	$code = trim($_POST[code]);
	$insert=  "insert into lwc
		values('$loc','$code')";
		$result=mysql_query($insert) or die("<script language='javascript'>alert('Center Details Already Exists');</script>");
		echo "<script language='javascript'>alert('Center Details Entered Successfully');</script>";
		 echo "<script language='javascript'>document.location.href='lwc.php';</script>";

		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='lwc.php';</script>";
			}
			if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete lwc.php';</script>";
			}
?>
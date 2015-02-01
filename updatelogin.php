<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCity(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>

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
<title>New User Entry</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
  <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4>
  </div>

  <div id="mainContent">
    
    </div>
	<h3 align="center">New User ID Creation</h3>
	<form id="form1" name="form1" method="post" action="">
	  <div align="center">
	    <table width="364" border="0" cellspacing="2" cellpadding="1">
         <tr>
	        <td>CPF Number:</td>
	        <td><label>
<input type="text" name="cpf" id="cpf" value="<?php
  echo (isset($_POST['cpf'])) ?
htmlspecialchars($_POST['cpf']) : '';
  ?> " />             </label></td>
          </tr>
	      <tr>
	        <td width="183">Username:</td>
	        <td width="171"><label>
<input type="text" name="usernm" id="usernm" value="<?php
  echo (isset($_POST['usernm'])) ?
htmlspecialchars($_POST['usernm']) : '';
  ?> " />             </label></td>
          </tr>
	      <tr>
	        <td>Password:</td>
	        <td><label>
	          <input type="password" name="passd" id="passd" />
            </label></td>
          </tr>
          <tr>
	        <td>Re-Enter Password:</td>
	        <td><label>
	          <input type="password" name="passd1" id="passd" />
            </label></td>
          </tr>
	      <tr>
	        <td>Status:</td>
	        <td><label>
	          <select name="status" id="status">
              <option value=''>Select</option>
              <option value="Admin">Admin</option>
                <option value="Center Head">Center Head</option>
                <option value="Assistant Head">Assistant Head</option>
              </select>
            </label></td>
          </tr>
           <tr>
	        <td>Designation:</td>
	        <td><label>
<input type="text" name="desig" id="desig" value="<?php
  echo (isset($_POST['desig'])) ?
htmlspecialchars($_POST['desig']) : '';
  ?> " />             </label></td>
          </tr>
           <tr>
	        <td>Contact Number:</td>
	        <td><label>
<input type="text" name="mob" id="mob" value="<?php
  echo (isset($_POST['mob'])) ?
htmlspecialchars($_POST['mob']) : '';
  ?> " />             </label></td>
          </tr>
           <tr>
	        <td>Mail - ID:</td>
	        <td><label>
<input type="text" name="mid" id="mid" value="<?php
  echo (isset($_POST['mid'])) ?
htmlspecialchars($_POST['mid']) : '';
  ?> " />             </label></td>
          </tr>
           <tr>
          <td width="230">Location :</td>
          <td width="195">
          <label><select id="loc" name="loc" onChange="getCity('findcenter.php?country='+this.value)"><option>Select</option>

<?php
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('ongc2') or die ('Unable to select database!');
$query = 'SELECT distinct loc FROM lwc';
$result = mysql_query($query) or die ('Error in query');
if (mysql_num_rows($result) > 0)
{
while($row = mysql_fetch_row($result))
{
echo'<option>'
. $row[0].'</option>';


}
}
else
{
echo'No Company Entered Yet';
}
mysql_free_result($result);
mysql_close($connection);

?></select>

          </label></td>
        </tr>
 <tr style="">
    <td>Center</td>
    <td ><div id="citydiv"><select name="center">
	<option>Select</option>
        </select></div></td>
  </tr>
        </table>
      </div>
	  <p align="center">
	    <label>
	      <input type="submit" name="submit" id="submit" value="Submit" />
        </label>
		<label>
          <input type="reset" name="submit1" id="cancel" value="Clear" />
        </label>
	  </p>
  </form>
	<form id="form2" name="form2" method="post" action="">
	  <label>
	    <div align="center">
	      <input type="submit" name="view" id="view" value="View" />
        	    </div>
	  </label>
  </form>
	<br class="clearfloat" />
  <div id="footer">
    
  </div>
</div>
</body>
</html>

<?php

	if(isset($_POST['submit']))
		{
		if(trim($_POST['cpf'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter CPF Number.');</script>";
	exit;
			}
		if(trim($_POST['usernm'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter New Username.');</script>";
	exit;
			}
	elseif(trim($_POST['passd'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Password.');</script>";
	exit;
			}
	elseif(trim($_POST['passd1'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Re-Confirmation of Password.');</script>";
	exit;
			}		
			
	elseif(trim($_POST['status'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter the Status.');</script>";
	exit;
			}
		elseif(trim($_POST['desig'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Designation.');</script>";
	exit;
			}
		elseif(trim($_POST['mob'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contact Number.');</script>";
	exit;
			}
			elseif(trim($_POST['mid'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Mail ID.');</script>";
	exit;
			}
	$pass=$_REQUEST['passd'];
	$pass1=$_REQUEST['passd1'];
	if($pass==$pass1)
	{   $con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$cpf = trim($_POST[cpf]);
	$usernm = trim($_POST[usernm]);
	$passd = trim($_POST[passd]);
	$desig = trim($_POST[desig]);
	$mob = trim($_POST[mob]);
	$mid = trim($_POST[mid]);
	$insert=  "insert into users
		values('','$cpf','$usernm','$passd','$_POST[status]','$desig','$mob','$mid','1','$_POST[center]','$_POST[loc]')";
		$result=mysql_query($insert) or die("<script language='javascript'>alert('CPF Number already exists');</script>");
		echo "<script language='javascript'>alert('New Username Created Successfully');</script>";
		echo "<script language='javascript'>document.location.href='updatelogin.php';</script>";	
		mysql_close($con); 
	
	}
	else
	{
		echo "<script language='javascript'>alert('Passwords Do Not Match. Please try again!');</script>";
	}
		}
	if(isset($_POST['view']))
	{ 
	echo "<script language='javascript'>document.location.href='updatelogin db.php';</script>";	
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
    
  </div>
  
  <div id="mainContent1">
    <p align="justify"><h4>UPDATE(alert)</h4></p>
    <p align="justify">All the ONGC centers are here by informed that there is training regarding <b>xyz</b> on <b>abc</b> software so the nominations are required from your centers.The more information regarding that is in enclosed link </p>
    <p><a href="HTML-CSS.pdf" target="_new"> click here for more information...</a></p>
	</div>
  
  <div id="sidebar" >
  <h4>Sign in : </h4>
    <form id="form1" name="form1" method="post" action="index.php">
      <table width="279" border="0" cellspacing="2" cellpadding="1">
        <tr>
          <td width="107">Username:</td>
          <td width="162"><label>
            <input type="text" name="username" id="username" />
          </label></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><label>
            <input type="password" name="pass" id="password" />
          </label></td></tr>

<tr>
<td width="107">Status:</td>
<td><label><select name="status" >
                <option value=''>--select--</option>
                <option value="Admin">Admin</option>
                <option value="Center Head">Center Head</option>
				<option value="Assistant Head">Assistant Head</option>
                </select></label>
</td></tr>


      </table>
      <p>
        <label>
             <input type="submit" name="submit" id="sign in" value="Sign in" />
        </label>
        <label>
          <input type="submit" name="submit1" id="cancel" value="Cancel" />
        </label>
      </p>
    </form>
    <h3>&nbsp;</h3>
  </div>
   <div id="footer1">
  <p align="center" >All rights reserved &copy;ONGC Ltd.</p>
    <p>&nbsp;</p>
 </div>
</div>
<?php

	if(isset($_POST['submit']))
		{
		if(trim($_POST['status'])=='')
			{
	echo "<script language='javascript'>alert('Enter Your Status.');</script>";
	exit;
			}
		elseif(trim($_POST['username'])=='')
			{
	echo "<script language='javascript'>alert('Enter Your Username.');</script>";
	exit;
			}
	 elseif(trim($_POST['pass'])=='')
		 {
		 echo"<script langugae='javascript'>alert('Please enter password.');</script>";
		 exit;
		 }
		$pass=$_POST['pass'];		
	    $pass1=trim($_POST['username']);
		$pass2=$_POST['status'];
	 
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("ongc2") or die ("cannot connect to db");
		
	$validate=sprintf("select *
								from users 
								where  status='%s' && pass='%s'&& username='%s' && flag='1'",mysql_real_escape_string($pass2),mysql_real_escape_string($pass),mysql_real_escape_string($pass1))or die("cannot find");
	
	$validate1=mysql_query($validate)or die("cannot find");
			
			$page=$_POST['status'].'.php';
				
		
			if(mysql_num_rows($validate1)>0)
			{
				session_start();
				$_SESSION['user_id'] =$_POST['username'];
				$_SESSION['status'] =$_POST['status'];
				$row1 = mysql_fetch_row($validate1);
				$_SESSION['center']	= $row1[9];
				$_SESSION['loc'] = $row1[10];
				 header("Location: $page");
					 exit();
			}
			
			
		   
			
				
										
					 echo"<script langugae='javascript'>alert('Sorry..!! Try again with correct password and username. ');</script>";
					 
					exit;
				}	
		   
		   
		   
		
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='index.php';</script>";
			}
			
			
?>


</body>
</html>
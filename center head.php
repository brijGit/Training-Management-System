<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();

if ('Center Head'==($_SESSION['status']))
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
<title>Center head Page</title>
<link href="mycss.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.4.2.min.js" type="text/javascript"></script>	
<script src="menu.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
  
    
</div>
<div id="sidebar1">
<ul class="menu">
		
		<li>
			<a href="#">Nominations</a>
			<ul class="acitem">
	            <li><a href="approve.php">Approval Of Nominations</a></li>
				<li><a href="approval.php">Check Nominations Approved By Administartor</a></li>
         	</ul>
         </li>
         <li>
        	<a href="logout.php">Logout</a>
        </li>
      </ul>
</div>
  
   
 
   

<div id="footer1">
   
 	</div>
</div>
</body>
</html>

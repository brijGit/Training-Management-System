<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();

 if  ('Assistant Head'==($_SESSION['status']))
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
<title>Approve Details</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Back to homepage" >Home</a></h4> 
  </div>
 <div id="mainContent">
 <h3 align="center">Request Update Details</h3>
  <form id="form2" name="form2" method="post" action="r_update.php">
  <table align="center" width="438" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="230">Request Number: </td>
     <td width="195"><label>
       <input type="text" name="rno" id="rno" />
     </label></td></tr>
          
      </table>
     <p align="center">
        <label>
       <input type="submit" name="submit2" id="submit2" value="Submit" />
     </label>
	  <label>
          <input type="reset" name="submit1" id="cancel" value="Clear" />
        </label>
   </p>
  </form>
 </div>
 <div id="footer">

 </div>
</div>
</body>
</html>
  <?php
  
if(isset($_POST['submit2']))
{
if(trim($_POST['rno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Request Number.');</script>";
	exit;
			}
			

$r=$_POST['rno'];
echo $r;

	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

$sql="SELECT * FROM request where rno='".$r."' ";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
if($result)
			{
				session_start();
				$_SESSION['rno'] =$r;
				
								 
				  echo "<script language='javascript'>document.location.href='r_update1.php';</script>";
					 exit();
			}
			
	}

?>



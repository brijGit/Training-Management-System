<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$r=$_SESSION['rno'] ;
if ('Assistant Head'==($_SESSION['status']))
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
<title>Problem Details</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Back to homepage">Home</a></h4> 
  </div>
  
  <div id="mainContent">
   <h3 align = "center">Problem Details    </h3>
   <form id="form1" name="form1" method="post" action="">
      <p>
        <?php 
	 	 $link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	
	 mysql_select_db("ongc2",$link) or die ("Cannot select the database!");
	 $query="SELECT * FROM request WHERE flag='1' AND rno='".$r."'";
		
		  $resource=mysql_query($query,$link);
		  echo "
		<table align=\"center\" border=\"1\" width=\"70%\">
		<tr>
		<th>Abbreviation</th><th>Domain</th><th>Problem</th><th>Contact Person</th><th>Request Number</th></tr> ";
while($result=mysql_fetch_array($resource))
	{ 
	echo "<tr><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[16]."</td><td>".$result[12]."</td><td>".$result[26]."</td></tr>";
	} echo "</table>";
	
	 
	 ?>
      </br>
    
      <table align="center" width="524" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="277">Problem Attended From:</td>
          <td width="234"><label>
            <select name="pfdd" id="pfdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
            <select name="pfmm" id="pfmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select>
            <select name="pfyy" id="pfyy"><option>yyyy</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Problem Attended To:</td>
          <td><label>
            <select name="ptdd" id="ptdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
            <select name="ptmm" id="ptmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select>
            <select name="ptyy" id="ptyy"><option>yyyy</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Visiting Person:</td>
          <td><label>
             <input type="text" name="vp" id="vp" value="<?php
  echo (isset($_POST['vp'])) ?
htmlspecialchars($_POST['vp']) : '';
  ?> " />            </label></td>
        </tr>
        <tr>
          <td height="29">Action:</td>
          <td><label>
            <textarea name="act" id="act"></textarea>
          </label></td>
        </tr>
        <tr>
          <td>Status:</td>
          <td><label>
            <select name="stat" id='stat'><option>Select</option><option>Proposed</option><option>Completed</option><option>Postpone</option><option>Discarded</option>
            </select>
            </label></td>
        </tr>
      </table>
      <p align="center">
        <label> 
          <input type="submit" name="submit" id="submit" value="Submit" />
        </label>
        <label>
          <input type="reset" name="submit1" id="cancel" value="Clear" />
        </label>
      </p>
      <p align="center">
        <label>
          <input type="submit" name="view" id="view" value="View" />
        </label>
      </p>
      <p align="center">(Display the Database)</p>
    </form>

  </div>
	<br class="clearfloat" />
  <div id="footer">
  <h4 align="center"><a href="r_update.php" title="Back">Go Back</a></h4>   
  </div>
</div>
</body>
</html>

<?php

	if(isset($_POST['submit']))
		{
	if(trim($_POST['pfdd'])=='dd' )
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Date.');</script>";
	exit;
			}
			
			elseif(trim($_POST['pfmm'])=='mm' )
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Month.');</script>";
	exit;
			}
			
			elseif(trim($_POST['pfyy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Year.');</script>";
	exit;
			}
elseif(trim($_POST['ptdd'])=='dd' )
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Date.');</script>";
	exit;
			}
			
			elseif(trim($_POST['ptmm'])=='mm' )
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Month.');</script>";
	exit;
			}
			
			elseif(trim($_POST['ptyy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Problem Attended Year.');</script>";
	exit;
			}

elseif(trim($_POST['vp'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Name of Visiting Person.');</script>";
	exit;
			}
			elseif(trim($_POST['act'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Action.');</script>";
	exit;
			}
		elseif(trim($_POST['stat'])=='--Select--')
			{
	echo "<script language='javascript'>alert('Please Enter the Status.');</script>";
	exit;
			}
	$pfdd=$_POST['pfdd'];
	$pfmm=$_POST['pfmm'];
	$pfyy=$_POST['pfyy'];
	$ptdd=$_POST['ptdd'];
	$ptmm=$_POST['ptmm'];
	$ptyy=$_POST['ptyy'];
	$vp=$_POST['vp'];
	$act=$_POST['act'];
	$stat=$_POST['stat'];
	
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$update= "UPDATE request set pfdd='".$pfdd."', pfmm='".$pfmm."', pfyy='".$pfyy."', ptdd='".$ptdd."', ptmm='".$ptmm."', ptyy='".$ptyy."', vp='".$vp."', act='".$act."', stat='".$stat."' WHERE rno='".$r."'";
		$result=mysql_query($update) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Details Entered Successfully');</script>";
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='r_update1.php';</script>";
			}
			elseif(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='site.php';</script>";
			}
?>
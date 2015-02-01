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
<title>Contract Details Entry</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4> 
  </div>
  
  <div id="mainContent">
   <h3 align = "center">Contract Details</h3>
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="524" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="277">Contract Type:</td>
          <td width="234"><label>
            <select name="ctype" id="ctype"><option selected="selected">--Select--</option><option>Corporate</option><option>Site Specific</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Contract number:</td>
          <td> <input type="text" name="cno" id="cno" value="<?php
  echo (isset($_POST['cno'])) ?
htmlspecialchars($_POST['cno']) : '';
  ?> " /></td>
        </tr>
        <tr>
          <td>Contract File Number:</td>
          <td><label>
            <input type="text" name="fno" id="fno" value="<?php
  echo (isset($_POST['fno'])) ?
htmlspecialchars($_POST['fno']) : '';
  ?> " />
          </label></td>
        </tr>
        <tr>
          <td>Company Abbrevation:</td>
          <td><label>
             <select name="cname" id="cname"  /><option>Select</option>
			 <?php
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('ongc2') or die ('Unable to select database!');
$query = 'SELECT * FROM cdetails';
$result = mysql_query($query) or die ('Error in query');
if (mysql_num_rows($result) > 0)
{
while($row = mysql_fetch_row($result))
{
echo'<option>'
. $row[2] .'</option>';


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
        <tr>
          <td>Signed on:</td>
          <td><label>
            <select name="sdd" id="sdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="smm" id="smm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="syy" id="syy"><option>yyyy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Contract Duration From:</td>
          <td><label>
            <select name="cfdd" id="cfdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="cfmm" id="cfmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="cfyy" id="cfyy"><option>yyyy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Contract Duration To:</td>
          <td><label>
            <select name="ctdd" id="ctdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="ctmm" id="ctmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="ctyy" id="ctyy"><option>yyyy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Training Days(per year):</td>
          <td><label>
             <input type="text" name="tdays" id="tdays" value="<?php
  echo (isset($_POST['tdays'])) ?
htmlspecialchars($_POST['tdays']) : '';
  ?> " />            </label></td>
        </tr>
        <tr>
          <td height="29">Number of Site Visits(per year):</td>
          <td><label>
            <select name="svisit" id="svisit"><option>--Select--</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option>
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
        <input type="submit" name="view" id="view" value="View" />
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
		if(trim($_POST['ctype'])=='--Select')
			{
	echo "<script language='javascript'>alert('Please Enter Contract type.');</script>";
	exit;
			}
			
	elseif(trim($_POST['cno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Number.');</script>";
	exit;
			}
			
	elseif(trim($_POST['fno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract File Numbber.');</script>";
	exit;
			}
			
	elseif(trim($_POST['cname'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Company Name.');</script>";
	exit;
			}
	
	elseif(trim($_POST['sdd'])=='dd' )
			{
	echo "<script language='javascript'>alert('Please Enter the Signed Date.');</script>";
	exit;
			}
			
			elseif(trim($_POST['smm'])=='mm' )
			{
	echo "<script language='javascript'>alert('Please Enter the Signed Month.');</script>";
	exit;
			}
			
			elseif(trim($_POST['syy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Signed Year.');</script>";
	exit;
			}
			
	elseif(trim($_POST['cfdd'])=='dd')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Date.');</script>";
	exit;
			}
			elseif(trim($_POST['cfmm'])=='mm')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Month.');</script>";
	exit;
			}
			elseif(trim($_POST['cfyy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Year.');</script>";
	exit;
			}
			elseif(trim($_POST['ctdd'])=='dd')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Date.');</script>";
	exit;
			}
			elseif(trim($_POST['ctmm'])=='mm')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Month.');</script>";
	exit;
			}
			elseif(trim($_POST['ctyy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Year.');</script>";
	exit;
			}
	
	elseif(trim($_POST['tdays'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Number of Training Days.');</script>";
	exit;
			}
			
		elseif(trim($_POST['svisit'])=='--Select--')
			{
	echo "<script language='javascript'>alert('Please Enter the Number of Site Visits.');</script>";
	exit;
			}
			
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$cno = trim($_POST[cno]);
	$ctype = trim($_POST[ctype]);
	$fno = trim($_POST[fno]);
	$cname = trim($_POST[cname]);
	$tdays = trim($_POST[tdays]);
	$svisit = trim($_POST[svisit]);
	$insert=  "insert into contractdetails
		values('$ctype','$cno','$fno','$cname','$_POST[sdd]','$_POST[smm]','$_POST[syy]','$_POST[cfdd]','$_POST[cfmm]','$_POST[cfyy]','$_POST[ctdd]','$_POST[ctmm]','$_POST[ctyy]','$tdays','$svisit','1')";
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Contract Details Entered Successfully');</script>";
		echo "<script language='javascript'>document.location.href='admin.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='contractdetails.php';</script>";
			}
			if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete contractdetails.php';</script>";
			}
			
?>
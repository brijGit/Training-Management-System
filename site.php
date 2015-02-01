<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();

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
<title>Site Visit Report</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Back to homepage" >Home</a></h4> 
  </div>
  
  <div id="mainContent">
    <h3 align = "center">Site Visit Report 
    </h3><br />
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="471" border="0" cellspacing="3" cellpadding="1">
        
         <tr>
          <td width="235">Company's Abbreviation:</td>
          <td width="226"><label>
 <input type="text" name="abbr" id="abbr" value="<?php
  echo (isset($_POST['abbr'])) ?
htmlspecialchars($_POST['abbr']) : '';
  ?> " />          </label></td>
        </tr>
        <tr>
          <td>Contract Duration From:</td>
          <td><label>
            <select name="cfdd" id="cfdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
            <select name="cfmm" id="cfmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select>
            <select name="cfyy" id="cfyy"><option>yyyy</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Contract Duration To:</td>
          <td><label>
            <select name="ctdd" id="ctdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
            <select name="ctmm" id="ctmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select>
            <select name="ctyy" id="ctyy"><option>yyyy</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Status:</td>
          <td><label>
            <select name="stat" id='status'><option>Select</option><option>Proposed</option><option>Completed</option><option>Postpone</option><option>Discarded</option>
            </select>
          </label></td>
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
	
	$abbr=$_POST['abbr'];
	$cfyy=$_POST['cfyy'];
	$ctyy=$_POST['ctyy'];
	$stat=$_POST['stat'];
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	$sql="SELECT * FROM request WHERE flag='1' AND abbr='".$abbr."'AND cfyy='".$cfyy."' AND ctyy='".$ctyy."' AND stat='".$stat."'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
if($result)
			{
				session_start();
				$_SESSION['abbr'] =$abbr;
				$_SESSION['cfyy'] =$cfyy;
				$_SESSION['ctyy'] =$ctyy;
				$_SESSION['stat'] =$stat;
				
								 
				  echo "<script language='javascript'>document.location.href='show site.php';</script>";
					 exit();
			}
			
	}

?>



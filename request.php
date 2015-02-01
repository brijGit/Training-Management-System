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
		function getCity1(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv1').innerHTML=req.responseText;						
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
<title>Site Visit</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
   <h4 align="right"><a href="Assistant Head.php" title="Back to homepage" >Home</a></h4> 
  </div>
  
  <div id="mainContent">
    <h3 align = "center">Request Entry
    </h3><br />
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="500" border="0" cellspacing="3" cellpadding="2">
        <tr>
          <td width="235">Contract type:</td>
           <td width="234"><label>
            <select name="ctype" id="ctype"><option selected="selected">Select</option><option>Corporate</option><option>Site Specific</option>
            </select>
          </label></td>
        </tr>
         <tr><td>Company's Abbreviation:</td>
      <td><label>
            <select name="abbr" id="abbr">
            <option>Select</option>

<?php
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('ongc2') or die ('Unable to select database!');
$query = 'SELECT * FROM manualtab';
$result = mysql_query($query) or die ('Error in query');
if (mysql_num_rows($result) > 0)
{
while($row = mysql_fetch_row($result))
{
echo'<option>'
. $row[1] .'</option>';


}
}
else
{
echo'No Company Entered Yet';
}
mysql_free_result($result);
mysql_close($connection);

?></select>

          </label>
            <br />
          </label></td>
      </tr>
        <tr>
          <td>Domain:</td>
          <td><label>
            <select name="dom" id="domain"><option>Select</option><option>Processing</option><option>Interpretation</option><option>System</option><option>Reservoir</option><option>Others</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Location:</td>
          <td>
                    <label><select id="abbr" name="abbr" onChange="getCity1('findcenter.php?country='+this.value)"><option>Select</option>

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
        <tr>
          <td>Work Center:</td>
          <td ><div id="citydiv1"><select name="code">
	<option>Select</option>
        </select></div></td>
		</tr>
        <tr>
          <td>Contract Number:</td>
          <td><label>
 <input type="text" name="cno" id="cno" value="<?php
  echo (isset($_POST['cno'])) ?
htmlspecialchars($_POST['cno']) : '';
  ?> " />          </label></td>
        </tr>
         <td>Contract Year From:</td>
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
          <td> Contract Year To:</td>
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
          <td>Contact Person:</td>
          <td><label>
 <input type="text" name="cper" id="cper" value="<?php
  echo (isset($_POST['cper'])) ?
htmlspecialchars($_POST['cper']) : '';
  ?> " />          </label></td>
        </tr>
         <tr>
          <td>Proposed Date:</td>
          <td><label>
            <select name="pdd" id="pdd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
            <select name="pmm" id="pmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select>
            <select name="pyy" id="pyy"><option>yyyy</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Problem(s):</td>
          <td><label>
            <textarea name="prob" id="prob"><?php
  echo (isset($_POST['prob'])) ?
htmlspecialchars($_POST['prob']) : '';
  ?> 
            </textarea>
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
  </div>
</div>
</body>
</html>

<?php

	if(isset($_POST['submit']))
		{ 
		if(trim($_POST['ctype'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter Company's Abbreviation.');</script>";
	exit;
			}
		if(trim($_POST['abbr'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter Company's Abbreviation.');</script>";
	exit;
			}
		elseif(trim($_POST['dom'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter the Domain.');</script>";
	exit;
			}
			elseif(trim($_POST['loc'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Location.');</script>";
	exit;
			}
	elseif(trim($_POST['code'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Work Center.');</script>";
	exit;
			}
			
	elseif(trim($_POST['cno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Number.');</script>";
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
			elseif(trim($_POST['cper'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contact Person.');</script>";
	exit;
			}
			elseif(trim($_POST['pdd'])=='dd')
			{
	echo "<script language='javascript'>alert('Please Enter the Proposed Date.');</script>";
	exit;
			}
			elseif(trim($_POST['pmm'])=='mm')
			{
	echo "<script language='javascript'>alert('Please Enter the Proposed Date.');</script>";
	exit;
			}
			elseif(trim($_POST['pyy'])=='yyyy')
			{
	echo "<script language='javascript'>alert('Please Enter the Proposed Date.');</script>";
	exit;
			}
			elseif(trim($_POST['prob'])=='prob')
			{
	echo "<script language='javascript'>alert('Please Enter the Problem.');</script>";
	exit;
			}
			
	$ctype=$_REQUEST['ctype'];
	$abbr=$_REQUEST['abbr'];
	$dom=$_REQUEST['dom'];
	$loc=$_REQUEST['loc'];
	$code=$_REQUEST['code'];
	$cno=$_REQUEST['cno'];
	$cfdd=$_REQUEST['cfdd'];
	$cfmm=$_REQUEST['cfmm'];
	$cfyy=$_REQUEST['cfyy'];
	$ctdd=$_REQUEST['ctdd'];
	$ctmm=$_REQUEST['ctmm'];
	$ctyy=$_REQUEST['ctyy'];
	$cper=$_REQUEST['cper'];
	$pdd=$_REQUEST['pdd'];
	$pmm=$_REQUEST['pmm'];
	$pyy=$_REQUEST['pyy'];
	$prob=$_REQUEST['prob'];
	$yr=substr($cfyy,2,3).substr($ctyy,2,3);
	
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
	 mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	 
$resource=mysql_query("SELECT sno FROM manualsite where abbr='".$abbr."' AND year='".$yr."'");
while($result=mysql_fetch_array($resource))
	{ 
		$sno=$result['sno'];
	}
		$rno=$abbr.'-'.substr($dom,0,1).'-'.$yr.'-'.$sno;
		echo $rno;
	
	$insert= "insert into request values('$ctype','$abbr','$dom','$loc','$code','$cno','$cfdd','$cfmm','$cfyy','$ctdd','$ctmm','$ctyy','$cper','$pdd','$pmm','$pyy','$prob','0','0','0','0','0','0','0','0','0','$rno','1')"; 
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Request Details Entered Successfully.');</script>";
		echo "<script language='javascript'>alert('Request number genereted is $rno.');</script>";
		
		$sno=$sno+1;
		$updquery="UPDATE manualsite set sno=$sno WHERE abbr='".$abbr."'"." and year='".$yr."'";
		$updation=mysql_query($updquery) or die("Error in Updation in manualtab");
		
		mysql_close($con); 

		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='request.php';</script>";
			}
			if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='show request.php';</script>";
			}
			
			
?>
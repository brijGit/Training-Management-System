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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Training Details Entry</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
     <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4>   
  </div>
 
  <div id="mainContent">
  <h3 align="center"> Training Details</h3>
    <form id="form1" name="form1" method="post" action="">
      <table align="center" width="438" border="0" cellspacing="3" cellpadding="1">
        <tr>
          <td width="230">Company's Abbreviation:</td>
          <td width="195">
          <label><select id="abbr" name="abbr" onChange="getCity('findcity.php?country='+this.value)"><option>Select</option>

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
. $row[2].'</option>';


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
          <td>Domain:</td>
          <td><label>
            <select name="dom" id="domain"><option>Select</option><option>Processing</option><option>Interpretation</option><option>System</option><option>Reservoir</option><option>Others</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Software:</td>
          <td><label>
            <input type="text" name="sw" id="software" />
          </label></td>
        </tr>
        <tr>
          <td>Instructor Name:</td>
          <td><label>
            <input type="text" name="ins" id="instructor" />
          </label></td>
        </tr>
        
       
         <tr style="">
    <td>Select Contract No:</td>
    <td ><div id="citydiv"><select name="cno">
	<option>Select</option>
        </select></div></td>
  </tr>

        <tr>
          <td>Contract Year From:</td>
          <td><label>
            <select name="fdd" id="dd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="fmm" id="mm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="fyy" id="yy"><option>yy</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option>
            </select>
          </label></td>
        </tr>
        <tr>
          <td>Contract Year To:</td>
          <td><label>
            <select name="tdd" id="dd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select>
          </label>
            <label>
              <select name="tmm" id="tmm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
              </select>
          </label>
            <label>
              <select name="tyy" id="tyy"><option>yy</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option>
              </select>
          </label></td>
        </tr>
        <tr>
          <td>Training From:</td>
          <td><label>
            <select name="tfdd" id="dd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="tfmm" id="mm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="tfyy" id="yy"><option>yy</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option>
            </select>
          </label></td>
        </tr>

		        <tr>
          <td>Training To:</td>
          <td><label>
            <select name="ttdd" id="dd"><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
            </select></label><label>
            <select name="ttmm" id="mm"><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </select></label><label>
            <select name="ttyy" id="yy"><option>yy</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option>
            </select>
          </label></td>
        </tr>

		 <tr>
          <td>Venue:</td>
          <td><label>
<input type="text" name="venue" id="venue" value="<?php
  echo (isset($_POST['venue'])) ?
htmlspecialchars($_POST['venue']) : '';
  ?> " />           </label></td>
        </tr>
        <tr>
          <td>Status:</td>
          <td><label>
            <select name="stat" id='status'><option>None</option><option>Proposed</option><option>Completed</option><option>Postpone</option><option>Discarded</option>
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
      <label><p align="center">
        <input type="submit" name="view" id="view" value="View" />
      </p>
      <p align="center">(Press View to Display the Database)</p>
      </label>
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
		if(trim($_POST['abbr'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter Company's Abbreviation.');</script>";
	exit;
			}
			
	elseif(trim($_POST['venue'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Venue.');</script>";
	exit;
			}
			elseif(trim($_POST['sw'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Software.');</script>";
	exit;
			}
	elseif(trim($_POST['ins'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Instructor's Name.');</script>";
	exit;
			}
			
	elseif(trim($_POST['cno'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Number.');</script>";
	exit;
			}
	elseif(trim($_POST['fdd'])=='dd')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Date.');</script>";
	exit;
			}
			elseif(trim($_POST['fmm'])=='mm')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Month.');</script>";
	exit;
			}
			elseif(trim($_POST['fyy'])=='yy')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Year.');</script>";
	exit;
			}
			elseif(trim($_POST['tdd'])=='dd')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Date.');</script>";
	exit;
			}
			elseif(trim($_POST['tmm'])=='mm')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Month.');</script>";
	exit;
			}
			elseif(trim($_POST['tyy'])=='yy')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Duration Year.');</script>";
	exit;
			}
			
	elseif(trim($_POST['dom'])=='None')
			{
	echo "<script language='javascript'>alert('Please Enter the Domain.');</script>";
	exit;
			}
			
	elseif(trim($_POST['stat'])=='None')
			{
	echo "<script language='javascript'>alert('Please Enter the Status.');</script>";
	exit;
			} 
	$abbr=$_REQUEST['abbr'];
	$venue=trim($_REQUEST['venue']);
	$sw=trim($_REQUEST['sw']);
	$ins=trim($_REQUEST['ins']);
	$cno=$_REQUEST['cno'];
	$fdd=$_REQUEST['fdd'];
	$fmm=$_REQUEST['fmm'];
	$fyy=$_REQUEST['fyy'];
	$tdd=$_REQUEST['tdd'];
	$tmm=$_REQUEST['tmm'];
	$tyy=$_REQUEST['tyy'];
	$tfdd=$_REQUEST['tfdd'];
	$tfmm=$_REQUEST['tfmm'];
	$tfyy=$_REQUEST['tfyy'];
	$ttdd=$_REQUEST['ttdd'];
	$ttmm=$_REQUEST['ttmm'];
	$ttyy=$_REQUEST['ttyy'];
	$dom=$_REQUEST['dom'];
	$stat=$_REQUEST['stat'];
	$yr=$fyy.$tyy;
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
	 mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	 
$resource=mysql_query("SELECT no FROM manualtab where abbr='".$abbr."' AND year='".$yr."'");
while($result=mysql_fetch_array($resource))
	{ 
		$no=$result['no'];
	}
	$no=$no+1;
		$tno=$abbr.'-'.substr($dom,0,1).'-'.$yr.'-'.$no;
		$d = substr($dom,0,1);
	
	$insert=  "insert into tnumber
values('$abbr','$dom','$sw','$ins','$cno','$fdd','$fmm','$fyy','$tdd','$tmm','$tyy','$tfdd','$tfmm','$tfyy','$ttdd','$ttmm','$ttyy','$venue','$stat','1','$tno')"; 
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Training Details Entered Successfully - $tno');</script>";
		
		
		$updquery="UPDATE manualtab SET no='$no' WHERE abbr='".$abbr."'"." and year='".$yr."'";
		$updation=mysql_query($updquery) or die("Error in Updation in manualtab");
		mysql_close($con); 

		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='tnumber.php';</script>";
			}
			if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete tdetails.php';</script>";
			}
			
			
?>
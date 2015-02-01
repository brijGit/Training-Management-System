<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/DTD/xhtml1-transitional.dtd">
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
<title>Training Schedule's Details</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>
  <div id="header">
        <h4 align="right"><a href="admin.php" title="Back to homepage">Home</a></h4> 
  </div>
  
  <div id="mainContent">
   <h3 align="center"> Scheduling Details</h3>
    <form id="form1" name="form1" method="post" action="">
    <div align="center">
      <table width="97%" cellpadding="2" border="2">
          <tr><td>Company's Abbreviation:</td>
      <td><label>
            <select id="abbr" name="abbr" onChange="getCity('findcity.php?country='+this.value)"><option>select</option>

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

          </label>
          </label></td>
      
	  
    <td>Select Contract No</td>
    <td ><div id="citydiv"><select name="cno">
	<option>Select</option>
        </select></div></td>
  </tr>
	<tr>
  <td width="9%"><p align="center">S.No.</p></td>
  <td width="23%"><p align="center">Contract Year From</p></td>
  <td width="24%"><p align="center">Contract Year To</p></td>
  <td width="16%" height="60"><p align="center">Training Registered</p></td>
  <td width="16%" height="60"><p align="center">Status</p></td>
  
  </tr>
  <tr>
  <td height="63">1</td>
  <td height="63"><label>
           <select name="cfdd[]" id="cfdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="cfmm[]" id="cfmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="cfyy[]" id="cfyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
         </label></td>
  <td height="63"><label>
            <select name="ctdd[]" id="ctdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="ctmm[]" id="ctmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="ctyy[]" id="ctyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
       
          </label></td>
  <td height="63"><label>
    <select name="tr[]" id="tr[]"><option>--select--</option><option>Yes</option><option>No</option>
    </select></label></td>
  <td height="63"><select name="stat[]" id="stat[]"><option>--select--</option><option>Completed</option><option>Proposed</option><option>Pending</option><option>Discarded</option></select></td>
   </tr>
  <tr>
  <td height="63">2</td>
  <td height="63"><label> <select name="cfdd[]" id="cfdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="cfmm[]" id="cfmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="cfyy[]" id="cfyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
         </label></td>
  <td height="63"><label>
            <select name="ctdd[]" id="ctdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="ctmm[]" id="ctmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="ctyy[]" id="ctyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
       
          </label></td> 
   <td height="63"><label>
    <select name="tr[]" id="tr[]"><option>--select--</option><option>Yes</option><option>No</option>
    </select></label></td>
  <td height="63"><select name="stat[]" id="stat[]"><option>--select--</option><option>Completed</option><option>Proposed</option><option>Pending</option><option>Discarded</option></select></td>
  </tr>
  <tr>
  <td height="63">3</td>
  <td height="63"><label>
            <select name="cfdd[]" id="cfdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="cfmm[]" id="cfmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="cfyy[]" id="cfyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
         </label></td>
  <td height="63"><label>
            <select name="ctdd[]" id="ctdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="ctmm[]" id="ctmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="ctyy[]" id="ctyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
       
          </label></td>
     <td height="63"><label>
    <select name="tr[]" id="tr[]"><option>--select--</option><option>Yes</option><option>No</option>
    </select></label></td>
    <td height="63"><select name="stat[]" id="stat[]"><option>--select--</option><option>Completed</option><option>Proposed</option><option>Pending</option><option>Discarded</option></select></td>
  </tr>
  <tr>
  <td height="63">4</td>
   <td height="63"><label>
            <select name="cfdd[]" id="cfdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="cfmm[]" id="cfmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="cfyy[]" id="cfyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
         </label></td>
  <td height="63"><label>
         <select name="ctdd[]" id="ctdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="ctmm[]" id="ctmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="ctyy[]" id="ctyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
       
          </label></td>
   <td height="63"><label>
    <select name="tr[]" id="tr[]"><option>--select--</option><option>Yes</option><option>No</option>
    </select></label></td>
  <td height="63"><select name="stat[]" id="stat[]"><option>--select--</option><option>Completed</option><option>Proposed</option><option>Pending</option><option>Discarded</option></select></td>
  </tr>
  <tr>
  <td height="63">5</td>
   <td height="63"><label>
            <select name="cfdd[]" id="cfdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="cfmm[]" id="cfmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="cfyy[]" id="cfyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
         </label></td>
  <td height="63"><label>
            <select name="ctdd[]" id="ctdd[]" size="1"/><option>dd</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option>
           </label>
         <label>
          <select name="ctmm[]" id="ctmm[]" size="1"/><option>mm</option><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Dec</option>
            </label>
          <label>
          <select name="ctyy[]" id="ctyy[]" size="1" /><option>yy</option><option>2007</option><option>2008</option><option>2009</option><option>2010</option><option>2011</option><option>2012</option><option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option><option>2019</option><option>2020</option><option>2021</option>
       
          </label></td>
   <td height="63"><label>
    <select name="tr[]" id="tr[]"><option>--select--</option><option>Yes</option><option>No</option>
    </select></label></td>
  <td height="63"><select name="stat[]" id="stat[]"><option>--select--</option><option>Completed</option><option>Proposed</option><option>Pending</option><option>Discarded</option></select></td>
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
 
</div>
<br class="clearfloat" />
  <div id="footer">
    </div>
</body>
</html>

<?php 
if(isset($_POST['submit']))
		{
			if(trim($_POST['cno'])=='select')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Number.');</script>";
	exit;
			}
			if(trim($_POST['abbr'])=='select')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Number.');</script>";
	exit;
			}
			if(trim($_POST['cfdd'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['cfmm'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['cfyy'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['ctdd'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['ctmm'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['ctyy'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Contract Date.');</script>";
	exit;
			}
			if(trim($_POST['tr'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Training Registration Status.');</script>";
	exit;
			}
			if(trim($_POST['stat'][0])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Status.');</script>";
	exit;
			}
			
$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
$abbr = $_REQUEST['abbr'];
$cno=$_REQUEST['cno'];
foreach($_POST['cfdd'] as $row=>$Act) 
{ 
$cfdd=$Act; 

$cfmm=$_POST['cfmm'][$row];
$cfyy=$_POST['cfyy'][$row];
$ctdd=$_POST['ctdd'][$row];
$ctmm=$_POST['ctmm'][$row];
$ctyy=$_POST['ctyy'][$row]; 
$tr=$_POST['tr'][$row]; 
$stat=$_POST['stat'][$row];
} 


//enter rows into database 
foreach($_POST['cfdd'] as $row=>$Act) 
{ 
$cfdd=mysql_real_escape_string($Act); //to prevent frm sql injection 
$cfmm=($_POST['cfmm'][$row]);
$cfyy=($_POST['cfyy'][$row]);
$ctdd=($_POST['ctdd'][$row]);
$ctmm=($_POST['ctmm'][$row]);
$ctyy=($_POST['ctyy'][$row]); 
$tr=($_POST['tr'][$row]); 
$stat=($_POST['stat'][$row]);
 
 
$yr= substr($cfyy,2,2).substr($ctyy,2,2);

$insert = "INSERT INTO tschedule
VALUES ('$cno','$cfdd','$cfmm','$cfyy','$ctdd','$ctmm','$ctyy','$tr','$stat')"; 
$result=mysql_query($insert) or die("Error in insertion.");
$insert1 = "insert into manualtab values('$abbr','$cno','$yr','')";
mysql_query($insert1) or die("error in insertion");
}
echo "<script language='javascript'>alert('Scheduling Entered Successfully');</script>";

mysql_close($con) ;

}
elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='training schedule.php';</script>";
			}
?>
<?php 
if(isset($_POST['submit']))
		{
			$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");

			$q="DELETE FROM tschedule WHERE cfdd=' '";
$res=mysql_query($q);
mysql_query("delete from manualtab where year = ' '");
mysql_close($con) ;
		}
		?>

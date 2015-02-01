<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seat Allocation</title>
<link href="head.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="container">
<img src="images/ongc1.jpg" align = "left"/>

  <div id="header">
  <h4 align="right"><a href="admin.php" title="Back to homepage" >Home</a></h4>  
  </div>
  
  <div id="mainContent">
  <h3 align ="center">Seat Allocation</h3>
    <form id="form1" name="form1" method="post" action="sallocation.php">
      <table align="center" width="438" border="0" cellspacing="3" cellpadding="1">
	   <tr><td>Company's Abbreviation:</td>
      <td><label>
            <select id="abbr" name="abbr" onChange="getCity('findtno.php?country='+this.value)"><option>select</option>

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
            <br />
          </label></td>
      </tr>  <tr>
          <td>Training number:</td>
          <td ><div id="citydiv"><select name="tno">
	<option>Select</option>
        </select></div></td>
  </tr>

        
        
        <tr>
           <td width="230">Location :</td>
          <td width="195">
                    <label><select id="loc" name="loc" onChange="getCity1('findcenter.php?country='+this.value)"><option>Select</option>

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
          <td>Seat Allocated:</td>
          <td><label>
 <input type="text" name="seat" id="seat" value="<?php
  echo (isset($_POST['seat'])) ?
htmlspecialchars($_POST['seat']) : '';
  ?> " />          </label></td>
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
        <input type="submit" name="view" id="view" value="View" />
      </p>
      <p align="center">
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
	echo "<script language='javascript'>alert('Please Enter Your Abbreviation.');</script>";
	exit;
			}
		if(trim($_POST['tno'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter Your Training Number.');</script>";
	exit;
			}
	elseif(trim($_POST['loc'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter the Location.');</script>";
	exit;
			}
	elseif(trim($_POST['code'])=='Select')
			{
	echo "<script language='javascript'>alert('Please Enter the Code');</script>";
	exit;
			}		
	elseif(trim($_POST['seat'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter the Number of Seats');</script>";
	exit;
			}
	
			
	$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	
	
	$insert=  "insert into sallocation
		values('','$_POST[abbr]','$_POST[tno]','$_POST[loc]','$_POST[code]','$_POST[seat]','1')";
		$result=mysql_query($insert) or die("Error in insertion.");
		echo "<script language='javascript'>alert('Your seat is allocated');</script>";
		echo "<script language='javascript'>document.location.href='admin.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='sallocation.php';</script>";
			}
			if(isset($_POST['view']))	
		{
			echo "<script language='javascript'>document.location.href='delete sallocation.php';</script>";
			}
			
?>

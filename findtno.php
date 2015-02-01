
<?php $country=$_GET['country'];
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('ongc2');
$query="select * from tnumber where abbr='$country'";
$result=mysql_query($query) or die("cannot find");

?>
<select name="tno">
<option>Select </option>
<?php while($row=mysql_fetch_row($result)) {
 echo'<option>'
. $row[20] .'</option>'; } ?>
</select>

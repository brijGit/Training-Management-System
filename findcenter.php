
<?php $country=$_GET['country'];
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('ongc2');
$query="select * from lwc where loc = '$country'";
$result=mysql_query($query) or die("cannot find".$country);
$r = mysql_num_rows($result);
?>
<select name="code">
<option>Select</option>
<?php while($row=mysql_fetch_row($result)) {
 echo'<option>'
. $row[1] .'</option>'; 

} ?>
</select>

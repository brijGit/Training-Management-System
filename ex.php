<?php
require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->SetFont('courier','I',10);
session_start();
$tno = $_SESSION['tno'];
$con = mysql_connect("localhost","root","") or die("Sorry you are not connected to server. Try Again!");
		mysql_select_db("ongc2", $con) or die ("Cannot connect to database.");
	$result=mysql_query("select * from tnumber where tno = '$tno'");
	
	$row2=mysql_fetch_array($result);
	
	$date_start = $row2[11]."-".$row2[12]."-".$row2[13];
	$date_end =  $row2[14]."-".$row2[15]."-".$row2[16];
	$venue = $row2[17];
	


$result=mysql_query("select * from nominations where tno = '$tno'  and flag = 1");
	
	$rows=mysql_num_rows($result);
for($i=0;$i<$rows;$i++)
{
$row=mysql_fetch_array($result);
$pdf->AddPage();
$pdf->Header();
$pdf->WriteHTML('<br><br><br>To,<br>');
$pdf->Cell(10,5,"{$row['3']}");
$pdf->WriteHTML('<br><br><br>This is to inform that you are selected for the Training at ');
$pdf->Cell(10,5,"{$venue}");
$pdf->WriteHTML('      regarding Training No-');
$pdf->Cell(10,5,"{$row['1']}");
$pdf->WriteHTML(' <br>The Training is scheduled between ');
$pdf->Cell(10,5,"{$date_start}");
$pdf->WriteHTML('        to  ');

$pdf->Cell(10,5,"{$date_end}");
$pdf->WriteHTML('         <br><br><br> <p align="left">(R K Verma)<br>Head CS(S/W)<br>GEOPIC, DehraDun</p>');




}
$pdf->Output('approval.pdf','D');

?>

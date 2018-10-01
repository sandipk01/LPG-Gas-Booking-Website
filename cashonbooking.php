<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');

?>
<?php
session_start();
?>
<?php
include "header.php";
?>
<head>
	<style type="text/css">
		.style
		{
			background-color:#F7EAEC;
			font-size:30px;
		}
		.color
    {
      background-color:#FF333C;
      font-weight: bold;
      color: white;
      height: 30px;
      font-style: italic;
   }
    .color:hover
    {
      background-color:white; 
      color: black;
    }
	</style>
</head>
<!--session login user--------------------------------------------------------------------------------------- -->
<?php

if(isset($_SESSION['currentuser']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['currentuser']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;
<br>
<br>
<br>
<br>
<center>
<table>
<tr>
<td></td>
<td>
<fieldset><legend><font color='red'><h2>Booking acknowledgement</h2></font></legend>
<center class='style'>
Mr/Ms/Mrs:<b> ".$_SESSION['currentuser']."</b> Your LPG is Booked.<br>
LPG Booking Date is :<b>".$_SESSION['date']."</b><br>".
"LPG Came ON or Before :<b>".$_SESSION['deliverydate'].
"</b><br>Your Booking Amount is :<b>Rs.550 only</b><br> Thank You For Using Our online service...........</center>
</fieldset>
</td>
<td></td>
</tr>
</table>
<br>
<form action='' method='post'>
<input class='color' type='submit' name='submit' value='OK'></form>
<br>

</center>
";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<?php
if(isset($_POST['submit']))
{
	header('location:homepage2.php');
}
?>
<!-- END session login user End--------------------------------------------------------------------------------------------- -->
<?php
include "footer.php";
?>


<?php
session_start();
?>
<?php
include "header.php";
?>
<!--session login user--------------------------------------------------------------------------------------- -->
<?php
if(isset($_SESSION['currentuser']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['currentuser']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<!-- session login user End--------------------------------------------------------------------------------------------- -->

 <html>
<head>
	<style type='text/css'>
		.scroll
		{
			width: 500px;
			height:200px;
            overflow:auto;
		}
	</style>
</head>
<body>
<br><br>
<br>

<table>
<tr>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<fieldset>

	<legend><h2><font color="#FF333C">Booking History</font></h2></legend>
<div class='scroll'>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<th bgcolor="#F7EAEC">Transaction ID</th>
<th bgcolor="#F7EAEC">Payment Mode</th>
<th bgcolor="#F7EAEC">LPG Booking Date</th>
<th bgcolor="#F7EAEC">LPG Booking Time</th>
<th bgcolor="#F7EAEC">Delivery Date</th>
</tr>

<?php
include "connect.php";
$username = $_SESSION["currentuser"];
   $sql = "SELECT 	TransactionId,PaymentMode,Date,Time,Ddate FROM bookingdata WHERE UserName='$username' ";
   $retval = mysql_query( $sql);
 

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$transactionid=$row['TransactionId'];
    	$paymentmode=$row['PaymentMode'];
    	$date=$row['Date'];
    	$time=$row['Time'];
    	$deliverydate=$row['Ddate'];
   echo"<tr><td><center>$transactionid</center></td>
<td><center>$paymentmode</center></td>
<td><center>$date</center></td>
<td><center>$time</center></td>
<td><center>$deliverydate</center></td>
   </tr>";
}
?>
</table>
</div>
</fieldset>
</td>
<td>



</td>
</tr>
</table>
<br>
<br>
</body>
</html>

<?php
include "footer.php";
?>
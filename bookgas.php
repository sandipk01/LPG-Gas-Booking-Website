<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
$a = strtotime("+5 day", strtotime("$date"));
$date2=date("d-m-y", $a);
?>
<?php
session_start();
?>
<?php
include "header.php";
?>
<head>
	<style type="text/css">
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
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['currentuser']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}

else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}

//display LAST lpg dilevery date variable -------------------------------------------SELECT * FROM bookingdata where UserName='$username' LIMIT 1
include "connect.php";
$username = $_SESSION["currentuser"];
$query_check = "SELECT * FROM bookingdata WHERE UserName='$username' ORDER BY TransactionId DESC limit 1";
 $retval = mysql_query( $query_check);
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$deliverydate=$row['Ddate'];
    	$bookdate=$row['Date'];
           }
//END display LAST lpg dilevery date variable -------------------------------------------

?>
<!--END session login user--------------------------------------------------------------------------------------------- -->

<!-- select payment optio  vai radio button & INSERT Booking Entrys into bookingdata------------------------------------------------------- -->

<?php


if(isset($_POST['book']))
{
	 if ($_POST['Payment'] =="") 
{          
   echo "<script>alert('Please Select Any Payment Mode')</script>";
   header('refresh:0 bookgas.php');
}

	include "connect.php";
	$username = $_SESSION["currentuser"];
   $paymode= $_POST['Payment'];
if ($_POST['Payment'] == "Cash On Delivery") 
{          
  
  if($date<$deliverydate)
{
   echo "<script>alert('Your LPG is Already booked Booking date is $bookdate and delivery date is $deliverydate ')</script>";
}
else
{
$query= "INSERT INTO bookingdata(UserName,PaymentMode,Date,Time,Ddate) VALUES('$username','$paymode','$date','$time','$date2')";
  if(mysql_query($query))
  {
  	$_SESSION['date']=$date;
  	$_SESSION['deliverydate']=$date2;
    header('location:cashonbooking.php');
  }
  else
  {
    echo "<script>alert('registration fails')</script>";
    
  }
}

}
else if($_POST['Payment'] == "Online Payment")
 {
    if($date<$deliverydate)
{
    echo "<script>alert('Your LPG is Already booked Booking date is $bookdate and delivery date is $deliverydate ')</script>"; 
}
  else
  {
     header('location:onlinepay.php');
  }
} 

}
?>
<!--END  select payment optio  vai radio button &INSERT Booking Entrys into bookingdata --------------------------------------------------------------------- -->


<html>
<body>
<br><br>
	<br><br>
	
	<table>
		<tr>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
	<fieldset>
		<legend><font color="#FF333C"><h2>Place Your Order Here</h2></font></legend>
		<br>
		<form action="bookgas.php" method="post">
	          <table cellpadding="5" cellspacing="0" border="1">
		<tr>
		<th bgcolor="#F7EAEC">Product Name</th>
		<th bgcolor="#F7EAEC">Product Description</th>
		<th bgcolor="#F7EAEC">Payment Mode</th>
	    <th bgcolor="#F7EAEC">Payment Amount</th>
		<th bgcolor="#F7EAEC"></th>
		</tr>
		<tr>
		<td>&nbsp;&nbsp;&nbsp;<b>14.2 Kg Cylinder&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<b>LPG Cylinder for domestic use&nbsp;&nbsp;&nbsp;</td>
		<td><input type="radio" name="Payment" value="Cash On Delivery" ><b> Cash On Delivery <br><input type="radio" name="Payment" value="Online Payment"><b>Online Payment&nbsp;&nbsp;&nbsp;</td>
		<td><center><b>Rs:550 only</center></td>
		<td><br><br>&nbsp;&nbsp;&nbsp;<input class="color" type="submit" name="book" value="BOOK">&nbsp;&nbsp;&nbsp;<br><br><br></td>
		</tr>
		</table>
		<br>
		</form>
		   </fieldset>
	      </td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>	
<br>
<br>
<br>
</body>
</html>
<?php
include "footer.php";
?>


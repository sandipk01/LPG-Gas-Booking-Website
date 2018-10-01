<?php
session_start();
?>
<?php
include "adminheader.php";
?>
<head>
<style type="text/css">
	 .color
    {
      background-color:#FF333C;
      font-weight: bold;
      font-style: italic;
      height: 30px;
      color: white;
    }
    .color:hover
    {
      background-color:white; 
      color: black;
    }
     .color1
    {
      background-color:#F7EAEC;
      font-weight: bold;
    }
</style>
</head>
<!--session login user--------------------------------------------------------------------------------------- -->
<?php
if(isset($_SESSION['admin']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['admin']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<!-- session login user End--------------------------------------------------------------------------------------------- -->


<?php
include "connect.php";
   $transactinid="";
	$username="";
	$payment="";
	$date="";
	$time="";
  $ddate="";

if(isset($_POST['submit']))
{
	$transactinid=$_POST['transactinid'];
	$username=$_POST['username'];
	$payment=$_POST['payment'];
	$date=$_POST['date'];
	$time=$_POST['time'];
  $ddate=$_POST['ddate'];

if(strlen($username)<6)
{
	echo "<script>alert('username atleast 6 char!')</script>";

}
else
{


  if($_POST['txtid']=="")
  {
  	$sql="INSERT INTO bookingdata(UserName,PaymentMode,Date,Time,Ddate) VALUES('$username','$payment','$date','$time','$ddate')";
  	$query=mysql_query($sql);
  	if($query)
  	{
  		echo "<script>alert('data inserted successfully')</script>";
  		header('Refresh:0; admin_userhistory.php');
  	}
  	
   }
  else
  {
  	
    $sql="update bookingdata set TransactionId='$transactinid',UserName='$username',PaymentMode='$payment',Date='$date',Time='$time',Ddate='$ddate' where TransactionId='{$_GET['id']}'";
      $query=mysql_query($sql);
    if($query)
    {
    	echo "<script>alert('data Updated successfully')</script>";
      header('Refresh:0; admin_userhistory.php');
    }
   
  }

}
}

//check id for edit
if(isset($_GET['edited']))
{
	$sql="select * from bookingdata where TransactionId='{$_GET['id']}'";
	$query=mysql_query($sql);
	$row=mysql_fetch_object($query);
	$transactinid=$row->TransactionId;
	$username=$row->UserName;
	$payment=$row->PaymentMode;
	$date=$row->Date;
	$time=$row->Time;
  $ddate=$row->Ddate;

}

//che id for delete
if(isset($_GET['deleted']))
{

$sql="delete from bookingdata where TransactionId='{$_GET['id']}'";
	$query=mysql_query($sql);
	if($query)
	{
       header('Refresh:0; admin_userhistory.php');
	}
}
?>

<br>
<br>
<br>
<center>
<table>
<tr>
<td>
</td>
<td>
<fieldset>
<legend><font color="red"><h3>Edit Record</h3></font></legend>
<center>
<form action="" method="post">
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td bgcolor="#F7EAEC">User Name:</td><td><input class="color1" type="text" placeholder="User Name" name="username" value="<?php echo $username ?>" required>
<input type="hidden" name="txtid" value="<?php echo $username ?>">
</td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Consumer No:</td><td><input class="color1" pattern="^[0-9]+$" title="Enter the valid Transaction Id" type="text" placeholder="Transaction Id" name="transactinid" value='<?php echo $transactinid ?>' required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Payment:</td><td><select class="color1" name="payment" required>
     <option value="Cash On Delivery">Cash On Delivery</option>
     <option value="Online Payment">Online Payment</option>
</select></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Register Date:</td><td><input class="color1" type="text" placeholder="Booking Date"  name="date"  value="<?php echo $date ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Register Time:</td><td><input class="color1" type="text" placeholder="Booking Time" name="time" value="<?php echo $time ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Delivery Date:</td><td><input class="color1" type="text" placeholder="Delivery Date" name="ddate" value="<?php echo $ddate ?>" required></td>
</tr>
<tr>
<td></td><td><center><input class="color" type="submit" name="submit" value="Save"></center></td>
</tr>
</table>
</form>
</center>
</fieldset>
</td>
<td></td>
</tr>
</table>
</center>
<br>
<?php
include "adminfooter.php";
?>
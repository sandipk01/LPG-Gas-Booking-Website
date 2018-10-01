<?php
session_start();
?>
<?php
include "adminheader.php";
?>
<!--session login user--------------------------------------------------------------------------------------- -->
<?php
if(isset($_SESSION['admin']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['admin']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<!-- session login user End    --------------------------------------------------------------------------------------------- -->
<html>
<head>	<style type='text/css'>
		.scroll
		{
			width: 1000px;
			height:300px;
            overflow:auto;
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
   .color1
    {
      background-color:#F7EAEC;
      font-weight: bold;
    }

</style>

</head>
<body>
<center>
<br>
<br>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td><center>
<img src="search.ico" height="50" width="50"></center>
</td>
<td>
<center>
<img src="add.gif" height="50" width="50"></center>
</td>
<td>
<center>
<img src="display.png" height="60" width="60"></center>
</td>
<td>
<center>
<img src="cod.png" height="50" width="50"></center>
</td>
<td>
<center>
<img src="ol.png" height="50" width="50"></center>
</td>
<td>
<center>
<img src="grouplpg.PNG" height="50" width="50"></center>
</td>
</tr>
<tr>
<td>
<form action="" method="post">
<strong> SELECT USERNAME : </strong> 
<select class="color1" name="txtusername"> 
       <option value=""> -----------ALL----------- </option> 
     <?php
     include "connect.php";
         $dd_res=mysql_query("Select UserName from bookingdata GROUP BY UserName;");
         while($r=mysql_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[0] </option>";
         }
     ?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<input class="color" type="submit" name="search" value="search">
</form>
</td>
<td bgcolor="#F7EAEC"><a href="admin_newhistory.php">Add New</a></td>
<td bgcolor="#F7EAEC"><a href="admin_userhistory.php">Display All</a></td>
<?php

include "connect.php";
$result = mysql_query("SELECT * FROM bookingdata WHERE PaymentMode='Cash On Delivery'");
$rows = mysql_num_rows($result);
echo "<td bgcolor='#F7EAEC'><font color='blue'>Payment vai COD:</font>"."<font color='red'>". $rows . "</font></td>";

$result = mysql_query("SELECT * FROM bookingdata WHERE PaymentMode='Online Payment'");
$rows = mysql_num_rows($result);
echo "<td bgcolor='#F7EAEC'><font color='blue'>Payment vai Card:</font>"."<font color='red'>". $rows . "</font></td>";

$result1 = mysql_query("SELECT * FROM bookingdata");
$rows1 = mysql_num_rows($result1);
echo "<td bgcolor='#F7EAEC'><font color='blue'>Total No Of lpg Booked:</font>"."<font color='red'>". $rows1 . "</font></td></tr></table>";
?>
<br>
<br>
<fieldset>
<legend><font color="blue"><h2>LPG Booking Data</h2></font></legend>
<div class='scroll'>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<th bgcolor="#F7EAEC">Sr.No</th>
<th bgcolor="#F7EAEC">Transaction ID</th>
<th bgcolor="#F7EAEC">User Name</th>
<th bgcolor="#F7EAEC">Payment Mode</th>
<th bgcolor="#F7EAEC">Register Date</th>
<th bgcolor="#F7EAEC">Register Time</th>
<th bgcolor="#F7EAEC">delivery Date</th>
<th bgcolor="#F7EAEC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>

<!--                        ------------------------------------------------------------>
<?php
include "connect.php";

if(isset($_POST['search']))
{
	$user=$_POST['txtusername'];
$sql="select * from bookingdata where UserName='$user'";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $row->TransactionId; ?></td>
<td><?php echo $row->UserName; ?></td>
<td><?php echo $row->PaymentMode; ?></td>
<td><?php echo $row->Date; ?></td>
<td><?php echo $row->Time; ?></td>
<td><?php echo $row->Ddate; ?></td>
<td>
<center><a href="admin_newhistory.php?edited=1&id=<?php echo $row->TransactionId; ?>">Edit</a>
   <a href="javascript:;" class="item-delete" id="admin_newhistory.php?deleted=1&id=<?php echo $row->TransactionId; ?>">Delete</a> </center> 
</td>
</tr>

<?php
	}
}
}
else
{
?>

<?php

include "connect.php";

$sql="select * from bookingdata";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $row->TransactionId; ?></td>
<td><?php echo $row->UserName; ?></td>
<td><?php echo $row->PaymentMode; ?></td>
<td><?php echo $row->Date; ?></td>
<td><?php echo $row->Time; ?></td>
<td><?php echo $row->Ddate; ?></td>
<td>
<center><a href="admin_newhistory.php?edited=1&id=<?php echo $row->TransactionId; ?>">Edit</a>
    <a href="javascript:;" class="item-delete" id="admin_newhistory.php?deleted=1&id=<?php echo $row->TransactionId; ?>">Delete</a></center> 
</td>
</tr>

<?php
	}
}
}
?>
</table>
</div>
</fieldset>
<script src="js/jquery-1.11.1.js"></script>
<script>
	$(function(){
		$('.item-delete').click(function()
		{
			var id=$(this).attr('id');
			if(confirm('do you want to delete this?'))
			{
				window.location.href=id;
			}
		});
	});
</script>
<br>
</center>
</body>
</html>

<?php
include "adminfooter.php";
?>



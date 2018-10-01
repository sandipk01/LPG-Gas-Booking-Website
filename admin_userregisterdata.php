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
</style>
</head>
<body>
<br>
<br>
<br>
<br>
<center>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='search.ico' height='50' width='50'>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='add.gif' height='50' width='50'>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='display.png' height='50' width='50'>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='totalpeople.png' height='50' width='50'>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='male.png' height='50' width='50'>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src='female.png' height='50' width='50'>
</td>
</tr>
<tr>
<form action="" method="post">
<td><input class="color1" type="text" placeholder="Enter the User Name" name="txtusername">&nbsp;&nbsp;<input class="color" type="submit" name="search" value="search"></td>
<td bgcolor="#F7EAEC">&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin_addnew.php">Add New</a>&nbsp;&nbsp;</td>
<td bgcolor="#F7EAEC">&nbsp;<a href="admin_userregisterdata.php">Display All Records</a>&nbsp;</td>
<?php
// count total no of  users-----------------------------------------------
include "connect.php";
$result = mysql_query("SELECT * FROM userdata");
$rows = mysql_num_rows($result);
echo "<td bgcolor='#F7EAEC'>&nbsp;&nbsp;<font color='blue'>Total No Of Users:</font>"."<font color='red'>". $rows . "</font>&nbsp;&nbsp;</td>";
//  END count total no of  users -----------------------------------------------

$result = mysql_query("SELECT * FROM userdata where Gender='Male'");
$rows = mysql_num_rows($result);
echo "<td bgcolor='#F7EAEC'><font color='blue'>Total No Of Males:</font>"."<font color='red'>". $rows . "</font>&nbsp;&nbsp;</td>";

$result = mysql_query("SELECT * FROM userdata where Gender='Female'");
$rows = mysql_num_rows($result);
echo "<td bgcolor='#F7EAEC'><font color='blue'>Total No Of Females:</font>"."<font color='red'>". $rows . "</font></td></tr></table>";
?>
<br>
</form>
</center>


<fieldset>
<legend><font color="blue"><h2>&nbsp;CUSTOMER DATA&nbsp;</h2></font></legend>
<br>
<center>
<div class='scroll'>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<th bgcolor="#F7EAEC">Sr.No</th>
<th bgcolor="#F7EAEC">Cunsumer Number</th>
<th bgcolor="#F7EAEC">First Name</th>
<th bgcolor="#F7EAEC">Last Name</th>
<th bgcolor="#F7EAEC">Address</th>
<th bgcolor="#F7EAEC">Mobile No</th>
<th bgcolor="#F7EAEC">Adhar no</th>
<th bgcolor="#F7EAEC">Email</th>
<th bgcolor="#F7EAEC">Gender</th>
<th bgcolor="#F7EAEC">User Name</th>
<th bgcolor="#F7EAEC">Password</th>
<th bgcolor="#F7EAEC">Register Date</th>
<th bgcolor="#F7EAEC">Register Time</th>
<th bgcolor="#F7EAEC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>

<!--                        ------------------------------------------------------------>
<?php
include "connect.php";

if(isset($_POST['search']))
{
	$user=$_POST['txtusername'];
$sql="select * from userdata where UserName='$user'";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><center><?php echo $i++; ?></center></td>
<td><center><?php echo $row->CustNo; ?></center></td>
<td><center><?php echo $row->CustFName; ?></center></center></td>
<td><center><?php echo $row->CustLName; ?></center></td>
<td><center><?php echo $row->CustAdd; ?></center></td>
<td><center><?php echo $row->CustMob; ?></center></td>
<td><center><?php echo $row->CustAdhar; ?></center></td>
<td><center><?php echo $row->CustEmail; ?></center></center></td>
<td><center><?php echo $row->Gender; ?></center></td>
<td><center><?php echo $row->UserName; ?></center></td>
<td><center><?php echo $row->CustPass; ?></center></td>
<td><center><?php echo $row->Date; ?></center></td>
<td><center><?php echo $row->Time; ?></center></td>
<td>
<center>
<a href="admin_addnew.php?edited=1&id=<?php echo $row->UserName; ?>">Edit</a>&nbsp;
    <a href="javascript:;" class="item-delete" id="admin_addnew.php?deleted=1&id=<?php echo $row->UserName; ?>">Delete</a>
</center>
</td>
</tr>
</table>
</center>

<?php
	}
}
else
{
	echo "<script>alert('date is not found')</script>";
}
}
else
{
?>



<?php

include "connect.php";

$sql="select * from userdata";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $row->CustNo; ?></td>
<td><?php echo $row->CustFName; ?></td>
<td><?php echo $row->CustLName; ?></td>
<td><?php echo $row->CustAdd; ?></td>
<td><?php echo $row->CustMob; ?></td>
<td><?php echo $row->CustAdhar; ?></td>
<td><?php echo $row->CustEmail; ?></td>
<td><?php echo $row->Gender; ?></td>
<td><?php echo $row->UserName; ?></td>
<td><?php echo $row->CustPass; ?></td>
<td><?php echo $row->Date; ?></td>
<td><?php echo $row->Time; ?></td>
<td>
<center><a href="admin_addnew.php?edited=1&id=<?php echo $row->UserName; ?>">Edit</a>
    <a href="javascript:;" class="item-delete" id="admin_addnew.php?deleted=1&id=<?php echo $row->UserName; ?>">Delete</a> </center> 
</td>
</tr>

<?php

	}
}
}
?>
</table>
</div>
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
</fieldset>
</center>
<br>
<br>
<br>
</body>
</html>

<?php
include "adminfooter.php";
?>



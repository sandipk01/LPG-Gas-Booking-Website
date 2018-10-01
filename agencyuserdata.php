<?php
session_start();
?>
<?php
include "agency_page_header.php";
?>
<!--session login user--------------------------------------------------------------------------------------- -->
<?php
if(isset($_SESSION['agency']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['agency']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
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
</tr>
<tr>
<td>
<form action="" method="post">
<strong> Select Customer No : </strong> 
<select class="color1" name="txtusername"> 
       <option value=""> -----------ALL----------- </option> 
     <?php
     include "connect.php";
         $dd_res=mysql_query("Select CustNo from gas_agency GROUP BY CustNo;");
         while($r=mysql_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[0] </option>";
         }
     ?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<input class="color" type="submit" name="search" value="search">
</form>
</td>
<td bgcolor="#F7EAEC"><a href="agency_home_page.php">Add New</a></td>
<td bgcolor="#F7EAEC"><a href="agencyuserdata.php">Display All</a></td>
</td></tr></table>

<br>
<br>
<fieldset>
<legend><font color="blue"><h2>Customer Records</h2></font></legend>
<div class='scroll'>
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<th bgcolor="#F7EAEC">Customer.No</th>
<th bgcolor="#F7EAEC">First Name</th>
<th bgcolor="#F7EAEC">Last Name</th>
<th bgcolor="#F7EAEC">Address</th>
<th bgcolor="#F7EAEC">Mobile No</th>
<th bgcolor="#F7EAEC">Adhar No</th>
<th bgcolor="#F7EAEC">Gender</th>
<th bgcolor="#F7EAEC">Date</th>
<th bgcolor="#F7EAEC">Time</th>
<th bgcolor="#F7EAEC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>

<!--                        ------------------------------------------------------------>
<?php
include "connect.php";

if(isset($_POST['search']))
{
	$user=$_POST['txtusername'];
$sql="select * from gas_agency where CustNo='$user'";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><?php echo $row->CustNo; ?></td>
<td><?php echo $row->CustFName; ?></td>
<td><?php echo $row->CustLName; ?></td>
<td><?php echo $row->CustADD; ?></td>
<td><?php echo $row->CustMobiNo; ?></td>
<td><?php echo $row->CustAdharNo; ?></td>
<td><?php echo $row->Gender; ?></td>
<td><?php echo $row->Date; ?></td>
<td><?php echo $row->Time; ?></td>
<td>
<center><a href="agencyaddnew.php?edited=1&id=<?php echo $row->CustNo; ?>">Edit</a>
   <a href="javascript:;" class="item-delete" id="agencyaddnew.php?deleted=1&id=<?php echo $row->CustNo; ?>">Delete</a> </center> 
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

$sql="select * from gas_agency";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	$i=1;
	while($row=mysql_fetch_object($query))
	{
         
?>

<tr>
<td><?php echo $row->CustNo; ?></td>
<td><?php echo $row->CustFName; ?></td>
<td><?php echo $row->CustLName; ?></td>
<td><?php echo $row->CustADD; ?></td>
<td><?php echo $row->CustMobiNo; ?></td>
<td><?php echo $row->CustAdharNo; ?></td>
<td><?php echo $row->Gender; ?></td>
<td><?php echo $row->Date; ?></td>
<td><?php echo $row->Time; ?></td>
<td>
<center><a href="agencyaddnew.php?edited=1&id=<?php echo $row->CustNo; ?>">Edit</a>
    <a href="javascript:;" class="item-delete" id="agencyaddnew.php?deleted=1&id=<?php echo $row->CustNo; ?>">Delete</a></center> 
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
include "agency_page_footer.php";
?>



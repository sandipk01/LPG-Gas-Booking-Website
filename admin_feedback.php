<?php
session_start();
?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
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
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['admin']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<!-- session login user End--------------------------------------------------------------------------------------------- -->
<br>
<br>
<br>
<br>
<html>
</body>
<head>	<style type='text/css'>
		.scroll
		{
			width: 500px;
			height:300px;
            overflow:auto;
		}
</style>
</head>
<body>
</html>
<center>
<form action="" method="post">
<strong> SELECT USERNAME : </strong> 
<select class="color1" name="txtusername"> 
       <option  value="" reuired> -----------ALL----------- </option> 
     <?php
     include "connect.php";
         $dd_res=mysql_query("Select UserName from custfeedback GROUP BY UserName;");
         while($r=mysql_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[0] </option>";
         }
     ?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;<input class="color" type="submit" name="search" value="search">
</form>

<table>
<tr>
<td>
<fieldset class="color1">
	<legend><img src="bothfeedback.jpg" height="50" width="50"> </legend>
	<div class='scroll'>	
<?php
include "connect.php";

if(isset($_POST['search']))
{
	$user=$_POST['txtusername'];
$sql="select * from custfeedback where UserName='$user' order by id ASC";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	while($row=mysql_fetch_object($query))
	{
         
?>
<table>
	<tr>
			<td><font color="darkgreen">
			<?php echo $row->id; ?>
            <b>Feedback:</b><?php echo $row->feedback; ?><br>
            <b>Reating:</b><?php echo $row->rating; ?><br>
            <b>Date:</b><?php echo $row->date; ?>&nbsp;<b>Time:</b><?php echo $row->time;?></font>
            <br>
            <br>
			<td></td>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<font color="red">
            <?php echo $row->Response; ?><br>
            <?php echo $row->Responsedate; ?>&nbsp;<?php echo $row->Responsetime;?></font>
			</td>
			</tr>
		</table>

			<?php
	}
}
}
?>
</td>
<td>
</div>
<fieldset>
	<legend>
		<img src="bothfeedback.jpg" height="70" width="70">
	</legend>
	<form action="" method="post">
	<table>
	<tr>
	<td><b>Feedback id:</td><td><input class="color1" type="text" placeholder="Enter The Feedback Id" name="id" required></td></tr>
	<tr>
	<td><b>Send Response:</td><td><textarea class="color1" placeholder="Enter The Response" rows="6" cols="40" name="Response" required></textarea></td>
	</tr>
	<tr>
	<td></td>
	<td><input class="color" type="submit" name="submit" value="SEND">&nbsp;<input class="color" type="submit" name="delete" value="Delete Feedback"></td>
	</tr>
	</table>
	</form>
</fieldset>
</td>
</tr>
	</table>	
	<?php
	if(isset($_POST['submit']))
	{
				include "connect.php";
				$id=$_POST['id'];
				$Response=$_POST['Response'];
				 $sql="update custfeedback set Response='$Response',Responsedate='$date',Responsetime='$time' where id='$id'";
      $query=mysql_query($sql);
    if($query)
    {
    	echo "<script>alert('response send successfully....')</script>";
      header('Refresh:0; admin_feedback.php');
    }
}

if(isset($_POST['delete']))
{
include "connect.php";
$id1=$_POST['id'];
$sql1="delete from custfeedback where id='$id1'";
	$query1=mysql_query($sql1);
	if($query1)
	{
	  echo "<script>alert('$id id feedback deleted successfully...')</script>";
       header('Refresh:0; admin_feedback.php');
	}
}
?>
	<br>
	<br>
</center>
<?php
include "adminfooter.php";
?>


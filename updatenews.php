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
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['admin']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
	echo"<script>alert('you must login this page')</script>";
	header('location:homepage.php');
}
?>
<!-- session login user End--------------------------------------------------------------------------------------------- -->
<head>
	<style type="text/css">
		.color
		{
		  background-color:#FF333C;
		  font-weight: bold;
		  color: white;
		  font-style: italic;
		  height: 30px;
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
<br>
<br>
<table >
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<fieldset>
	<legend><img src="updatenews.png" height="70" width="70"></legend>
	<center>
	<form action="updatenews.php" method="post">
	<table>
	<tr>
	<td><b>Enter The Header News:</td><td><textarea class="color1" placeholder="Enter the news" name="news" cols="50" rows="5"></textarea>
    <br><center><input type="submit" class="color" name="newssub" value="Update"></center>
	</td>
	</tr>
	<tr>
	<td><b>Enter The Announcment:</td><td><textarea class="color1" placeholder="Enter the Content" name="Content" cols="50" rows="7"></textarea>
    <br><center><input type="submit" class="color" name="contentsub" value="Update"></center>
	</td>
	</tr>
	</table>
	</form>
	</center>
</fieldset>
</td>
<td>
<?php
if(isset($_POST['newssub']))
{
	$news1=$_POST['news'];
	include "connect.php";
	$sql="UPDATE newsupdate SET news='$news1' WHERE id='1'";
	$query=mysql_query($sql);
	echo "<script>alert('news is update successfully....')</script>";	
	header("refresh:0 updatenews.php");
}

if(isset($_POST['contentsub']))
{
	$announcment1=$_POST['Content'];
	include "connect.php";
	$sql1="UPDATE newsupdate SET announcement='$announcment1' WHERE id='1'";
	$query1=mysql_query($sql1);
	echo "<script>alert('Announcement is update successfully....')</script>";
	header("refresh:0 updatenews.php");
}

include "connect.php";
$username = $_SESSION["admin"];
   $sql = "SELECT news,announcement FROM newsupdate WHERE id='1' ";
   $retval = mysql_query( $sql);
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$news=$row['news'];
    	$announcement=$row['announcement'];
   echo "<br><br>
   <table>
   <tr><td><fieldset><legend><font color='red'><b><h2>News</h2></font></legend><center><textarea class='color1' name='news' cols='50' rows='7' readonly>$news</textarea></center></fieldset>
   <br>
   <fieldset><legend><font color='red'><b><h2>Announcement</h2></font></legend>
   <center><textarea class='color1' name='content' cols='50' rows='7' readonly>$announcement</textarea></center></fieldset>
   </td></tr>
   </table><br>
   ";
}


?>
</td>
</tr>
</table>
<br>
<?php
include "adminfooter.php";
?>


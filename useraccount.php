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
<br>
<br>
<br>

<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
	<fieldset>
		<legend>
			<h2><font color="red">Setting</font></h2>
		</legend>
		<table cellpadding="5" cellspacing="0" border="1">
		<tr>
		<td>	<a href="userprofile.php">
<img src="userprofile.png" alt="Go to W3Schools!" width="150" height="150" border="0">
</a><br>
<center><b>User Profile</center>
</td>
	
<td>	<a href="user_booking history.php">
<img src="booking history.jpg" alt="Go to W3Schools!" width="150" height="150" border="0">
</a>
<br>
<center><b>LPG Booking History</center>
</td>
		
		<td><a href="changepass.php">
<img src="changepass.ico" alt="Go to W3Schools!" width="150" height="150" border="0"></a>
<br>
<center><b>Change Password</center>
</td>
</tr>
		</table>	
</fieldset>
</td>
<td></td>
</tr>
</table>
<br>
<br>
<br>
<br>
<?php
include "footer.php";
?>


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
<body>
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
<?php
if(isset($_POST['cpass']))
{

include "connect.php";

$oldpass=$_POST['oldPassword'];
$newpass=$_POST['newPassword'];
$repass=$_POST['confirmPassword'];
$username=$_SESSION['currentuser'];

 $sql = mysql_query("SELECT CustPass FROM userdata WHERE UserName='$username'");
   $row = mysql_fetch_assoc($sql);

   $oldPasswordData=$row['CustPass'];
    //check old pass match

   if($oldpass==$oldPasswordData)
   {

//check new password is match with confirm pass
   if($newpass==$repass)
   {
      $sql2=mysql_query("UPDATE userdata SET CustPass='$newpass' WHERE UserName='$username'");
   session_destroy();
   echo "<script>alert('your password change sucessfully')</script>";
   header('refresh:0 homepage.php');
   }
else
{
echo"<script>alert('new password and confirm pass not match!')</script>";  
}
 }
   else
   {
   echo"<script>alert('old password is not match!')</script>";
   }
}

?>
<br>
<br>
<br>
<br>
<br>
<center>
<table>
<tr>
<td></td>
<td>
<fieldset>
<legend><h2><font color="#FF333C">Change Password</font></h2></legend>
<center>
<form action="changepass.php" method="post">
<table>
<tr>
<td>
 <label for="InputPassword2"><b>Old Password:</label>
</td>
<td>
 <input class="color1" type="password" placeholder="Old Password" name="oldPassword" required>
</td>
</tr>
<tr>
<td>
 <label for="InputPassword2"><b>New Password:</label>
</td>
<td>
 <input class="color1" type="password"  placeholder="New Password" name="newPassword" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 characters at least 1 Alphabet and 1 Number" required>
</td>
</tr>
<tr>
<td>
 <label  for="InputPassword3"><b>Confirm New Password:</label>
</td>
<td>
<input class="color1" type="password" placeholder="Confirm Password" name="confirmPassword" required>
</td>
</tr>
<tr>
<td></td>
<td><input class="color" type="submit" name="cpass" value="Change Password"></td>
</tr>
</table>
</form>
</center>
</fieldset>
</td>
<td>
</td>
</tr>
</table>
</body>
</html>

<br>
<br>
<br>
<br>
<br>
<br>

<?php
include "footer.php";
?>


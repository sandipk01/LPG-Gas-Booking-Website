
<?php
session_start();
?>
<head>
<style type="text/css">
  .style
  {
    font-style: italic;
  }
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


<?php
include "connect.php";
$username = $_SESSION["currentuser"];
   $sql = "SELECT 	CustNo,CustFName,CustLName,CustAdd,CustMob,CustAdhar,CustEmail FROM userdata WHERE UserName='$username' ";
   $retval = mysql_query( $sql);
 

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$custno=$row['CustNo'];
    	$fname=$row['CustFName'];
    	$lname=$row['CustLName'];
    	$add=$row['CustAdd'];
    	$mobi=$row['CustMob'];
        $adhar=$row['CustAdhar'];	
    	$email=$row['CustEmail'];
}

?>
<html>
<body>
<br>
<br>
<br>
<center>
<table>
<tr>
<td></td>
<td>
<fieldset>
<legend><h2><font color="#FF333C">Your Profile</font></h2></legend>
<form action="userprofile.php" method="post">
<table class="style" cellpadding="5" cellspacing="0" border="1">
<tr>
<td bgcolor="#F7EAEC"><b>Consumer No:</td><td><?php echo $custno ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>First Name:</td><td><?php echo $fname ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>Last Name:</td><td><?php echo $lname ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>Address:</td><td><?php echo $add ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>Mobile No:</td><td><?php echo $mobi ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>Adhar no:</td><td><?php echo $adhar ?></td>
</tr>
<tr>
<td bgcolor="#F7EAEC"><b>Email:</td><td><input class="color1" type="email" name="txtemail" value='<?php echo $email ?>' required></td>
</tr>
</table>
<br>
<center><input class="color" type="submit" name="submit" value="Update"></center>
</form>
</fieldset>
</td>
<td></td>
</tr>
</table>
</center>
<br><br>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	$email1=$_POST['txtemail'];
	include "connect.php";
$sql2=mysql_query("UPDATE userdata SET CustEmail='$email1' WHERE UserName='$username'");
   echo "<script>alert('updated')</script>";
   header("refresh:0 userprofile.php");
}
?>
<?php
include "adminfooter.php";
?>


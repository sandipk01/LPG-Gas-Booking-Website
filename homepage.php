<?php
session_start();
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
<?php
if(isset($_POST['Login']))
{
	   $username=$_POST['username'];
   $password=$_POST['password'];
   include "connect.php";
$auser="admin";
$apass="admin";
$agencyuser="agency";
$agencypass="agency";

if($username==$agencyuser && $password==$agencypass)
{
  $_SESSION['agency']=$username;
  echo "<script>alert('welcome agency')</script>";
  header('refresh:0; agencyuserdata.php');
  exit();
}
   //admin login ---------------------------------------------------------
if($username==$auser && $password==$apass)
{
	$_SESSION['admin']=$username;
	echo "<script>alert('welcome admin')</script>";
	header('refresh:0; adminpanel.php');
}
//END admin LOgin--------------------------------------------------------------------------

	// user Login--------------------------------------------------------------------------------------------
else
{
   $sql=mysql_query("SELECT * FROM userdata WHERE UserName='".$username."' AND CustPass='".$password."' ");
   if(mysql_num_rows($sql)==1)
   { 
  	echo "<script>alert('Login sucessfull')</script>";
   	$_SESSION['currentuser']=$username;
   	header('Location:homepage2.php');
   }
else
   {
   	echo "<script>alert('accout is Invalid')</script>";
   }
   // END user login-----------------------------------------------------------------------------------
}
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<link rel="stylesheet" type="text/css" href="slider.css">
    </head>
    <body>
 <?php
 include('header.php');
?>
	<html>
	<body>
<br>
<br>
<br>    
<?php
//change news--------------------------------------------------
include "connect.php";
$sql="select news from newsupdate";
  $query=mysql_query($sql);
  $row=mysql_fetch_object($query);
  $news=$row->news;
?>
<hr color="orange"/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="red"><i><b>what is new:</b></i></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<marquee width="800px" onmouseover="this.stop();" onmouseout="this.start();" >
<font color="blue" >
  <?php   echo $news ?>
</font></marquee>&nbsp;&nbsp;&nbsp;&nbsp;<img src="new.gif" height="20" width="30">
<hr color="green"/>
 
<table>
<tr>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<div id="slider">
<figure>
<img src="1.jpg" height="350" width="400">
<img src="2.jpg" height="350" width="400">
<img src="3.jpg" height="350" width="400">
<img src="4.jpg" height="350" width="400">
</figure>
</div>
</td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>
<br>
<hr/ color="red">
<br>
<table>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td>
<?php
//change announcement--------------------------------------------------
include "connect.php";
$sql="select announcement from newsupdate";
  $query=mysql_query($sql);
  $row=mysql_fetch_object($query);
  $anna=$row->announcement;
?>
<fieldset>
<legend>
<h2><font color="orange">Give</font> <font color="blue">Up</font> <font color="green">Subsidy</font></h2></legend>
<marquee direction="up" width="450" height="" bgcolor="#FF333C" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" ><center>
<font color="white">
<?php echo $anna ?>
 </font>
</center>

</marquee>
</fieldset>
</td>
<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>



<fieldset>
<legend><h3><font color="#FF333C">Login Here</font></h3></legend>
<center>
<table>
<form action='homepage.php' method='POST'">
<tr>
<td><b>Username:</td>
<td><input type="text" class="color1" placeholder="User Name" name="username" required ></td></tr>
<tr>
<td><b>Password:</td>
<td><input type="password" class="color1" placeholder="Password" name="password" required ></td></tr>
<tr>
<td></td>
<td><input type="submit" class="color" value="Login" name="Login"></td></tr>
<tr>
<td><a href="register.php">New User</a></td>
<td></td>
</tr>
</center>
</table>
</fieldset>
</td>
</tr>
</table>
<br>
<br>
		</body>
		</html>
 <!-- master page footer     ------------------------------------------------------------------------------------- --> 
 <?php				 
include('footer.php');
?>
  <!-- master page footer End   ------------------------------------------------------------------------------------- -->  
   
   </body>
</html>

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
    <body>

 <?php
				 include('header.php');
?>
	  	<html>
	<body>
<br>
<br>
<br>  
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
    <legend><h2><font color="red">Register Here</font></h2></legend>
	<table>
<form name="myform" action='register.php' method='POST'>
<tr>
<tr>
<td><b>Enter The Consumer Number:</td>
<td><input type="text" class="color1" placeholder="Enter The Customer No" name="txtcno" required></td></tr>
<tr>
<td><b>Enter The Registered Mobile No:</td>
<td><input type="text" class="color1" pattern="[0-9]{10}" title="Enter The Valid Mobile Number" placeholder="Enter The Mobile No" name="txtmno" required></td></tr>
<tr>
<td></td>
<td><input type="submit" class="color" value="Next" name="Login"></td></tr>
</form>
</center>
</table>
</fieldset>
   </td>
    </tr>
    </table>
	</center>
		</body>
		</html>
<br>
<br>
<br><br>
<br>
<br>
       
 <?php				 
include('footer.php');
?>
    </body>
</html>


<?php
session_start();
include "connect.php";
if(isset($_POST['Login']))
{
   $custno=$_POST['txtcno'];
   $custmobi=$_POST['txtmno'];

// required field validation for cust no and mobile no-------------------------------------
   if($custno=="")
   {
    echo"<script>alert('please enter the cunsumer number')</script>";
    exit();
   }
    if($custmobi=="")
   {
    echo"<script>alert('please enter the mobile number')</script>";
    exit();
   }
   // required field validation for cust no and mobile no END-------------------------------------

// Check Customer no already exist or not-------------------------------------
$check_custno="select * from userdata where CustNo='$custno'";
 $run=mysql_query($check_custno);
  if(mysql_num_rows($run)>0)
  {
    echo "<script>alert('$custno this cunsumer no is already Register')</script>";
    exit();
  }
  // Check Customer no already exist or not-------------------------------------

//customer no and mobile no matche the send on next page---------------------------------------- 
   $sql="SELECT * FROM gas_agency WHERE CustNO='".$custno."' AND CustMobiNo='".$custmobi."' LIMIT 1";
   $result=mysql_query($sql);
   if(mysql_num_rows($result)==1)
   {
   	$_SESSION['ID']=$custno;

   	header('location:register2.php');
   	exit();
   }
   else 
   {
   	echo "<script>alert('plase enter the correct Cunsumer Id and mobile no')</script>";
   }
   //customer no and mobile no matche the send on next page----------------------------------------
}

?>
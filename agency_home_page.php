<!-- date and timer variable -------------------------------------------- -->
<?php
session_start();
?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
?>
<!-- date and timer variable ENd --------------------------------------------------- -->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
		<link rel="stylesheet" type="text/css" href="slider.css">
    </head>
    <body>
 <?php
				 
include('agency_page_header.php');

?>
<?php
if(isset($_SESSION['agency']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['agency']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;";
}
else
{
  echo"<script>alert('you must login this page')</script>";
  header('location:homepage.php');
}
?>
<br>
<br>
<br>
<br>
<br>
<br>  

<?php
include "connect.php";
if(isset($_POST['Login']))
{
   $fname=$_POST['cfname'];
   $lname=$_POST['clname'];
   $add=$_POST['cadd'];
   $mobi=$_POST['cmno'];
   $adhar=$_POST['cano'];
   $gender=$_POST['gender'];


//check mobile no alredy exist---------------------------------------------------------------------------------
  $check_mobile="select * from gas_agency where CustMobiNo='$mobi'";
 $run=mysql_query($check_mobile);
  if(mysql_num_rows($run)>0)
  {
    echo "<script>alert(' mobile $mobi is already exist')</script>";
     header('refresh:0 agency_home_page.php');
    exit();
  }
  //check mobile no alredy exist end---------------------------------------------------------------------------------


//check Adhar no alredy exist---------------------------------------------------------------------------------
  $check_adhar="select * from gas_agency where CustAdharNo='$adhar'";

  $run1=mysql_query($check_adhar);
  if(mysql_num_rows($run1)>0)
  {
    echo "<script>alert('adhar $adhar is already exist')</script>";
    header('refresh:0 agency_home_page.php');
    exit();
  }
  //check mobile no alredy exist ENd---------------------------------------------------------------------------------

//insert agency data ------------------------------------------------------------------------------------------------------------------------------
  $query= "INSERT INTO gas_agency(CustFName,CustLName, CustADD, CustMobiNo,CustAdharNo,Gender,Date,Time) VALUES ('$fname','$lname','$add','$mobi','$adhar','$gender','$date','$time')";

  if(mysql_query($query))
  {
    $_SESSION['mobile'] = "$mobi";
    echo "<script>alert('data is inserted successfully')</script>";
   
  }
  else
  {
    echo "<script>alert('fails')</script>";
    
  }

  //insert agency data END ------------------------------------------------------------------------------------------------------------------------------      
}
?>
	<html>
	<body>
  <center>
  <table>
  <tr>
  <td></td>
  <td>
<fieldset>
<legend><h3><font color="#FF333C">ENTER THE CUSTOMER DATA</font></h3></legend>
<center>
<table  cellpadding="5" cellspacing="0" border="1">
<form name="myform" action="agency_home_page.php" method="POST" >
<tr>
<tr>
<td bgcolor="#F7EAEC">CUSTOMER FIRST NAME:</td>
<td><input class="color1" type="text" placeholder="First Name" name="cfname" required></td></tr>
<tr>
<td bgcolor="#F7EAEC">CUSTOMER LAST NAME:</td>
<td><input class="color1" type="text" placeholder="Last Name" name="clname" required></td></tr>
<tr>
<td bgcolor="#F7EAEC">CUSTOMER ADDRESS:</td>
<td><textarea  class="color1" type="text" cols="20" rows="5" placeholder="Address" TextMode="MultiLine" name="cadd" required></textarea></td></tr>

<tr>
<td bgcolor="#F7EAEC">CUSTOMER MOBILE NUMBER:</td>
<td><input class="color1" type="text" placeholder="Mobile Number" name="cmno" pattern="[0-9]{10}" title="please enter the valid mobile number" required></td></tr>
<tr>
<tr>
<td bgcolor="#F7EAEC">CUSTOMER ADHARCARD NUMBER:</td>
<td><input class="color1" type="text" pattern="[0-9]{12}" title="please enter the valid Adhar number" placeholder="Adhar Card Number" name="cano" required></td></tr>

<tr>
<td bgcolor="#F7EAEC">Gender:</td>
<td>
  <select class="color1" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select> 
</td></tr>
<tr>
<td></td>
<td><input class="color" type="submit" value="Save" name="Login"></td></tr>
</center>
</table>
</fieldset>
</td>
<td></td>
</tr>
</table>
</center>
<br>
<br>
	</body>
		</html>
   

       <br>
 <?php				 
include('agency_page_footer.php');

?>
   

   </body>
</html>

  
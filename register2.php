<!-- date timer variable ------------------------------------------------------- -->
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
?>
<!-- date timer variable End ------------------------------------------------------- -->

<html>
<body>

<?php
include("header.php");
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

session_start();
echo '<center>
<br>
<br>
<br>
<br>
<tr><td><b>Customer Number :</td><td></b>&nbsp;'.$_SESSION["ID"].'</td></tr></center>
'; 

$custno = $_SESSION["ID"];

include "connect.php";


 // display data by customer NO-----------------------------------------------------------
   $sql = "SELECT CustFName, CustLName,CustADD,CustMobiNo,CustAdharNo,Gender FROM gas_agency WHERE CustNo='$custno' ";
   $retval = mysql_query( $sql);
 

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$fname=$row['CustFName'];
    	$lname=$row['CustLName'];
    	$add=$row['CustADD'];
    	$mobi=$row['CustMobiNo'];
    	$adhar=$row['CustAdharNo'];
      $gender=$row['Gender'];

    	echo "
      <center>
      <table>
      <tr>
      <td></td>
         <td>
      <fieldset>
      <legend><h3><font color='red'>Your details</font></h3></legend>
      <br>
       <form action='register2.php' method='POST'>
        <table cellpadding='5' cellspacing='0' border='1'>
        <tr>
          <td bgcolor='#F7EAEC'><b>First name:</td><td>$fname</td></tr>
           <tr><td bgcolor='#F7EAEC'><b>Last Name:</td><td>$lname</td></tr>
           <tr><td bgcolor='#F7EAEC'><b>address:</td><td>$add</td></tr>
          <tr><td bgcolor='#F7EAEC'><b>mobile no:</td><td>$mobi</td></tr>
           <tr><td bgcolor='#F7EAEC'><b>adhar No:</td><td>$adhar</td></tr>
           <tr><td bgcolor='#F7EAEC'><b>gender:</td><td>$gender</td></tr>
           <tr><td bgcolor='#F7EAEC'><b>Enter the User Name:</td><td><input placeholder='Enter The UserName' class='color1' type='text' name='username' required></td></tr>
           <tr><td bgcolor='#F7EAEC'><b>Enter the Email address:</td><td><input placeholder='Enter The Email' class='color1' type='email' name='email' required></td></tr>
           <tr><td bgcolor='#F7EAEC'><b>Enter the password:</td><td><input placeholder='Enter The Password' class='color1' pattern='^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$' title='Minimum 8 characters at least 1 Alphabet and 1 Number' type='password' name='txtpass' required></td></tr>
           </table>
           <br>
           <center><input type='submit' class='color' name='submit' value='Register'></center>
            </form>
            </fieldset>
            </td>
            <td></td>
            </tr>
      </table>
        <center>

    	 ";
       }
  // display data by customer NO END-----------------------------------------------------------


if(isset($_POST['submit']))
{

 $user=$_POST['username'];
 //check user name is alredy exist or not-----------------------------------------------------------------------  
   $check_username="select * from userdata where UserName='$user' ";
   $run=mysql_query($check_username);
   if(mysql_num_rows($run)>0)
  {
  	   echo "<script>alert('$user this user name is already Register')</script>";
       echo "<script>window.location.replace('register2.php')</script>";
     exit();
  }


//check user name is alredy exist or not-----------------------------------------------------------------------

  // register user data insert into userdata------------------------------------------------------------------------------------------------------
   $pass=$_POST['txtpass'];
   $email=$_POST['email'];
 $query= "INSERT INTO userdata(CustNo,CustFName,CustLName,CustAdd,CustMob,CustAdhar,CustEmail,Gender,UserName,CustPass,Date,Time) VALUES($custno,'$fname','$lname','$add','$mobi','$adhar','$email','$gender','$user','$pass','$date','$time')";
  if(mysql_query($query))
  {
    echo "<script>alert('welcome $fname your registered Sucessfully login using your username and password')</script>";
    header('refresh:0 homepage.php');
  }
  else
  {
    echo "<script>alert('registration fails')</script>";
    
  }
  // register user data insert into userdata END------------------------------------------------------------------------------------------------------
}
?>

<?php
include("footer.php");
?>
</body>
</html>

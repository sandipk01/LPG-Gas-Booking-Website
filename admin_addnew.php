<?php
session_start();
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


<?php
include "connect.php";
   $username="";
	$conno="";
	$fname="";
	$lname="";
	$add="";
	$mob="";
	$adhar="";
	$email="";
	$gender="";
	$pass="";
	$date="";
	$time="";

if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$conno=$_POST['cno'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$add=$_POST['add'];
	$mob=$_POST['mob'];
	$adhar=$_POST['adhar'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$pass=$_POST['pass'];
	$date=$_POST['date'];
	$time=$_POST['time'];

if(strlen($username)<6)
{
	echo "<script>alert('username atleast 6 char!')</script>";

}
else
{
	//////////////////////////////////

 
  if($_POST['txtid']=="")
  {

      //check user name is alredy exist or not-----------------------------------------------------------------------  
   $check_username="select * from userdata where UserName='$username' ";
   $run=mysql_query($check_username);
   if(mysql_num_rows($run)>0)
  {
  	   echo "<script>alert('$username this user name is already Register')</script>";
       echo "<script>window.location.replace('admin_addnew.php')</script>";
    exit();
  }
//check user name is alredy exist or not-----------------------------------------------------------------------

   //check consumer no is alredy exist or not-----------------------------------------------------------------------  
   $check_userno="select * from userdata where CustNo='$conno'";
   $run1=mysql_query($check_userno);
   if(mysql_num_rows($run1)>0)
  {
  	   echo "<script>alert('$conno this consumer no is already Register')</script>";
       echo "<script>window.location.replace('admin_addnew.php')</script>";
     exit();
  }
//check consumer no is alredy exist or not-----------------------------------------------------------------------

     //check mobile is alredy exist or not-----------------------------------------------------------------------  
   $check_userno="select * from userdata where CustMob='$mob'";
   $run1=mysql_query($check_userno);
   if(mysql_num_rows($run1)>0)
  {
  	   echo "<script>alert('$mob this mobile no is already Register')</script>";
       echo "<script>window.location.replace('admin_addnew.php')</script>";
     exit();
  }
//check mobile no is alredy exist or not-----------------------------------------------------------------------

   //check Adhar no is alredy exist or not-----------------------------------------------------------------------  
   $check_userno="select * from userdata where CustAdhar='$adhar'";
   $run1=mysql_query($check_userno);
   if(mysql_num_rows($run1)>0)
  {
  	   echo "<script>alert('$adhar this Adhar no is already Register')</script>";
       echo "<script>window.location.replace('admin_addnew.php')</script>";
     exit();
  }
//check Adhar no is alredy exist or not-----------------------------------------------------------------------

 //check Adhar no is alredy exist or not-----------------------------------------------------------------------  
   $check_userno="select * from userdata where CustEmail='$email'";
   $run1=mysql_query($check_userno);
   if(mysql_num_rows($run1)>0)
  {
  	   echo "<script>alert('$email this email id is already Register')</script>";
       echo "<script>window.location.replace('admin_addnew.php')</script>";
     exit();
  }
//check Adhar no is alredy exist or not-----------------------------------------------------------------------





  	$sql="INSERT INTO userdata(CustNo,CustFName,CustLName,CustAdd,CustMob,CustAdhar,CustEmail,Gender,UserName,CustPass,Date,Time) VALUES($conno,'$fname','$lname','$add','$mob','$adhar','$email','$gender','$username','$pass','$date','$time')";
  	$query=mysql_query($sql);
  	if($query)
  	{
  		echo "<script>alert('data inserted successfully')</script>";
  	}
  	
   }
  else
  {
  	
    $sql="update userdata set UserName='$username',CustNo='$conno',CustFName='$fname',CustLName='$lname',CustAdd='$add',CustMob='$mob',CustAdhar='$adhar',CustEmail='$email',Gender='$gender',CustPass='$pass',Date='$date',Time='$time' where UserName='{$_GET['id']}'";
      $query=mysql_query($sql);
    if($query)
    {
      header('Refresh:0; admin_userregisterdata.php');
    }
   
  }

}
}

//check id for edit
if(isset($_GET['edited']))
{
	$sql="select * from userdata where UserName='{$_GET['id']}'";
	$query=mysql_query($sql);
	$row=mysql_fetch_object($query);
	$username=$row->UserName;
	$conno=$row->CustNo;
	$fname=$row->CustFName;
	$lname=$row->CustLName;
	$add=$row->CustAdd;
	$mob=$row->CustMob;
	$adhar=$row->CustAdhar;
	$email=$row->CustEmail;
	$gender=$row->Gender;
	$pass=$row->CustPass;
	$date=$row->Date;
	$time=$row->Time;

}

//che id for delete
if(isset($_GET['deleted']))
{
	$sql="delete from userdata where UserName='{$_GET['id']}'";
	$query=mysql_query($sql);
	if($query)
	{
	//  header('Refresh:0; admin_userregisterdata.php');
	}

$sql="delete from bookingdata where UserName='{$_GET['id']}'";
	$query=mysql_query($sql);
	if($query)
	{
       header('Refresh:0; admin_userregisterdata.php');
	}
}
?>


<br>
<br>
<br>
<table>
<tr>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
<fieldset>
<legend><h2><font color="red">Insert Records</h2></legend>
<center>
<form action="" method="post">
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td bgcolor="#F7EAEC">User Name:</td><td><input class="color1" type="text" placeholder="User Name" name="username" value="<?php echo $username ?>" required>
<input type="hidden" name="txtid" value="<?php echo $username ?>">
</td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Consumer No:</td><td><input class="color1" type="text" placeholder="Consumer Name" name="cno" value='<?php echo $conno ?>'  pattern="^[0-9]+$" title="Enter the valid consumer number" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">First Name:</td><td><input class="color1" type="text" placeholder="First Name" name="fname" value='<?php echo $fname ?>' required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Last Name:</td><td><input class="color1" type="text" placeholder="Last Name" name="lname" value="<?php echo $lname ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Address:</td><td><input class="color1" type="text" placeholder="Address" name="add" value="<?php echo $add ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Mobile No:</td><td><input class="color1"  pattern="[0-9]{10}" title="please enter the valid mobile number" type="text" placeholder="Mobile Number" name="mob" value="<?php echo $mob ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Adhar no:</td><td><center><input class="color1" type="email" placeholder="Adhar Number" name="adhar" value="<?php echo $adhar ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Email:</td><td><input class="color1" type="text" placeholder="Email Id" name="email"  value="<?php echo $email ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Gender:</td><td>
	<select class="color1" name="gender">
		<option value="Male">Male</option>
        <option value="Female">Female</option>
	</select>
</td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Password:</td><td><input class="color1" type="password" placeholder="Password" name="pass" value="<?php echo $pass ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Register Date:</td><td><input class="color1" type="date" placeholder="Register Date" placeholder="" name="date"  value="<?php echo $date ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Register Time:</td><td><input class="color1" type="time" placeholder="Register Time" name="time" value="<?php echo $time ?>" required></td>
</tr>
<tr>
<td></td><td><center><input class="color" type="submit" name="submit" value="SAVE"></center></td>
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
<br>
<?php
include "adminfooter.php";
?>
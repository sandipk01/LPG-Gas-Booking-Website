<?php
session_start();
?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
?>

<?php
include "agency_page_header.php";
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
<!-- session login user End--------------------------------------------------------------------------------------------- -->


<?php
include "connect.php";
   $custno="";
	$fname="";
	$lname="";
	$custadd="";
	$custmobi="";
  $custadhar="";
  $gender="";
 

if(isset($_POST['submit']))
{
   $custno=$_POST['cno'];
  $fname=$_POST['cfname'];
  $lname=$_POST['clname'];
  $custadd=$_POST['cadd'];
  $custmobi=$_POST['cmobi'];
  $custadhar=$_POST['cadhar'];
  $gender=$_POST['cgender'];

    $sql="update gas_agency set CustNo='$custno',CustFName='$fname',CustLName='$lname',CustADD='$custadd',CustMobiNo='$custmobi',CustAdharNo='$custadhar',Gender='$gender',Date='$date',Time='$time' where CustNo='{$_GET['id']}'";
      $query=mysql_query($sql);
    if($query)
    {
    	echo "<script>alert('data Updated successfully')</script>";
      header('Refresh:0; agencyuserdata.php');
    }
   }

//check id for edit
if(isset($_GET['edited']))
{
	$sql="select * from gas_agency where CustNo='{$_GET['id']}'";
	$query=mysql_query($sql);
	$row=mysql_fetch_object($query);
	$cno=$row->CustNo;
	$cfname=$row->CustFName;
	$clname=$row->CustLName;
	$cadd=$row->CustADD;
	$cmobi=$row->CustMobiNo;
  $cadhar=$row->CustAdharNo;
  $cgender=$row->Gender;

}

//che id for delete
if(isset($_GET['deleted']))
{

$sql="delete from gas_agency where CustNo='{$_GET['id']}'";
	$query=mysql_query($sql);
	if($query)
	{
       header('Refresh:0; agencyuserdata.php');
	}
}
?>

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
<legend><font color="red"><h3>Edit Record</h3></font></legend>
<center>
<form action="" method="post">
<table cellpadding="5" cellspacing="0" border="1">
<tr>
<td bgcolor="#F7EAEC">Customer No:</td><td><input class="color1" type="text" placeholder="customer no" name="cno" value="<?php echo $cno ?>" required>
<!-- <input type="hidden" name="txtid" value="<?php echo $cno ?>"> -->
</td>
</tr>
<tr>
<td bgcolor="#F7EAEC">First Name:</td><td><input class="color1"  type="text" placeholder="first Name" name="cfname" value='<?php echo $cfname ?>' required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Last Name:</td><td><input class="color1"  type="text" placeholder="Last Name" name="clname" value='<?php echo $clname ?>' required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Gender:</td><td><select class="color1" name="cgender" required>
     <option value="Male">Male</option>
     <option value="Female">Female</option>
</select></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Address:</td><td><textarea class="color1" type="text" placeholder="Address"  name="cadd"  required cols="15" rows="7" ><?php echo $cadd ?></textarea></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Mobile No:</td><td><input class="color1" type="text" placeholder="Mobile Number" name="cmobi" value="<?php echo $cmobi ?>" required></td>
</tr>
<tr>
<td bgcolor="#F7EAEC">Adhar No:</td><td><input class="color1" type="text" placeholder="Adhar No" name="cadhar" value="<?php echo $cadhar ?>" required></td>
</tr>
<tr>
<td></td><td><center><input class="color" type="submit" name="submit" value="Save"></center></td>
</tr>
</table>
</form>
</center>
</fieldset>
</td>
<td></td>
</tr>
</table>
</center>
<br>
<?php
include "agency_page_footer.php";
?>


<?php
if(isset($_POST['submit']))
{
include "connect.php";
$date=new date($_POST['date']);
$time=new time($_POST['time']);

 	$sql="INSERT INTO test(date,time) VALUES('$date','$time')";
  	$query=mysql_query($sql);
  	if($query)
  	{
  		echo "<script>alert('data inserted successfully')</script>";
  	}
  	else
  	{
       echo "<script>alert('fail')</script>";
	}
  }
?>
<form action="test123.php" post="post">
<table>
<tr>
<td>Register Date:</td><td><input type="date" placeholder="Register Date" name="date"></td>
</tr>
<tr>
<td>Register Time:</td><td><input type="time" placeholder="Register Time" name="time" ></td>
</tr>
<tr>
<td></td><td><center><input type="submit" name="submit" value="Save"></center></td>
</tr>
</table>
</form>
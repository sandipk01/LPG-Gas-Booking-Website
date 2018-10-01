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
<!DOCTYPE html>
<html>

	<head>	<style type='text/css'>
		.scroll
		{
			background-color: #F7EAEC;
            width: 500px;
			height:250px;
            overflow:auto;
		}
</style>
</head>

<body>

</body>
</html>
<br>
<br>
<center>
<table>
<tr>
<td>
</td>
<td>
<fieldset>
	<legend><img src="bothfeedback.jpg" height="50" width="50"> </legend>
	<div class='scroll'>	
<?php
include "connect.php";

	$user=$_SESSION['currentuser'];
$sql="select * from custfeedback where UserName='$user' order by id ASC";
$query=mysql_query($sql);
if(mysql_num_rows($query)>0)
{
	while($row=mysql_fetch_object($query))
	{
         
?>
<table>
	<tr>
			<td><font color="darkgreen">
			<?php echo $row->id; ?>
            <b>Feedback:</b><?php echo $row->feedback; ?><br>
            <b>Reating:</b><?php echo $row->rating; ?><br>
            <b>Date:</b><?php echo $row->date; ?>&nbsp;<b>Time:</b><?php echo $row->time;?></font>
            <br>
            <br>
			<td></td>
			</tr>
			<tr>
			<td>
			</td>
			<td>
			<font color="red">
            <?php echo $row->Response; ?><br>
            <?php echo $row->Responsedate; ?>&nbsp;<?php echo $row->Responsetime; ?></font>
			</td>
			</tr>
		</table>

			<?php
	}
}

?>
</td>
<td>
</td>
</tr>
</table>
</div>
</fieldset>

</center>

<?php
include "footer.php";
?>


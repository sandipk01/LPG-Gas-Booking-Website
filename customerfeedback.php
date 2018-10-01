<?php
session_start();
?>
<?php
date_default_timezone_set('Asia/Kolkata');
$date=date('d:m:y');
$time=date('h:i:s');
?>
<?php
include "header.php";
?>
<html>
<body>
	<head>
		<style type="text/css">
			.scroll
		{
			background-color: #F7EAEC;
			width: 400px;
			height:230px;
            overflow:auto;
		}
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
</body>
</html>
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


<center></center>
<br> <br> <br>
<table >
	<tr>
	<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	<td>
	<fieldset>
	<legend><img src="bothfeedback.jpg" height="100" width="100"></legend>
<table >
<form action="" method="post">
	<tr>
<td><b>Comment:<br> <br> <br></td><td><textarea class="color1" placeholder="Enter The Comment" rows="5" cols="50" name="comment"></textarea>
<br> <br> <br>
</td>
	</tr>
		<tr>
<td><b>Rate us:
<br> <br> <br></td>
	<td><input type="radio" name="rat" value="Poor"><b>Poor
         <input type="radio" name="rat" value="Fair" ><b>Fair
         <input  type="radio" name="rat" value="Good" checked><b>Good
         <input  type="radio" name="rat" value="Very good" ><b>Very good
         <input  type="radio" name="rat" value="Excellent" ><b>Excellent
         <br> <br> <br>
	</td>
		</tr>
		<tr>
		<td></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="color" type="submit" name="submit" value="Send"></td>
		</tr>
		</form>
		</table>
		</fieldset>
		<br>
		<br><br>
	</td>
	<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<td>
	<fieldset>
	<legend><img src="bothfeedback.jpg" height="50" width="50"> </legend>
	<div class='scroll'>
	
<?php
include "connect.php";
$username = $_SESSION["currentuser"];
$query_check = "SELECT * FROM custfeedback WHERE username='$username' ORDER BY id DESC limit 1";
 $retval = mysql_query( $query_check);
    while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) 
 {
    	$feedback=$row['feedback'];
    	$Response=$row['Response'];
    	$rating=$row['rating'];
    	$date1=$row['date'];
    	$time1=$row['time'];
    	$Responsedate=$row['Responsedate'];
    	$Responsetime=$row['Responsetime'];
     
  
     ?>
		<table>
			<tr>
			<td><font color="darkgreen"><b>Your Last Feedback:</b><br>
            <?php echo $feedback ?><br>
            <b>Reating:</b><?php echo $rating ?><br>
            <b>Date:</b><?php echo $date1 ?>&nbsp;<b>Time:</b><?php echo $time1 ?></font>
			</td>
			<td></td>
			</tr>
			<tr>
			<td></td>
			<td><font color="red">
            <?php echo $Response; ?><br>
            <?php echo $Responsedate; ?>&nbsp;<?php echo $Responsetime;?></font>
			</td>
			</tr>
		</table>
		<?php
         }
		?>
		</div>
		<br></fieldset>
		<br>
		<center><a href="customerallfeedback.php">Show all Feedback</a></center>
	</td>
		<td>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	</tr>
</table>
</center>
<br><br><br>

<?php
if(isset($_POST['submit']))
{
include "connect.php";
 $username=$_SESSION['currentuser'];
 $feedback=$_POST['comment'];
 $rating=$_POST['rat'];
  	$sql="INSERT INTO custfeedback(username,feedback,rating,date,time) VALUES('$username','$feedback','$rating','$date','$time')";
  	$query=mysql_query($sql);
  	if($query)
  	{
  		echo "<script>alert('your feedback send successfully')</script>";
  		header("refresh:0 customerfeedback.php");
  	}
  	
   } 	

?>

<?php
include "footer.php";
?>


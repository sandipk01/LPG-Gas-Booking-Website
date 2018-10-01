<?php
session_start();
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

<!-- Login session ---------------------------------------------------------------------------------------------------------------------------- -->
<?php
if(isset($_SESSION['currentuser']))
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='red'><b>welecome :"."</b></font><font color='green'>&nbsp;".$_SESSION['currentuser']."</font>"."&nbsp;&nbsp;<a href='logout.php'>Logout</a>"."&nbsp;&nbsp;&nbsp;"."<a href='useraccount.php'>  User Account </a>";
}
else
{
  echo"<script>alert('you must login this page')</script>";
  header('refresh:0; homepage.php');
}
?>
<!-- Login session ----------------------------------------------------------------------------------------------------------------------------- -->

	<html>
	<body>
<br>
<br>
<br>    
<hr color="orange"/>
&nbsp;&nbsp;&nbsp;&nbsp;<font color="red"><i><b>what is new:</b></i></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<marquee width="800px" onmouseover="this.stop();" onmouseout="this.start();" >
<font color="blue" >Offering you the flexibility and 
convenience of booking 
your refill cylinder at anytime, from anywhere, 
when you are on the move, on a holiday or at home through multiple modes</font></marquee>
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
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
<center>
<fieldset>
<legend>
<h2><font color="orange">Give</font> <font color="darkblue">Up</font> <font color="green">Subsidy</font></h2></legend>
<marquee direction="up" width="450" height="" bgcolor="#FF333C" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" ><center>
<font color="white">Come join the GiveItUp movement...

Hon ble Prime Minister Shri Narendra Modi has formally launched GiveItUp movement on 27th of March 2015 in Delhi and appealed to all countrymen who can afford it, to come forward and give-up their LPG subsidy. 

Every consumer who gives up LPG subsidy will help to provide LPG connection to a BPL family. This will truly be a gift of good health to the women and children of these poor families who suffer most from health issues caused by indoor pollution by using fuels like coal, fire wood, crop waste etc. 

Come join the GiveItUp movement. 

We value your involvement and would like to have your permission to put your name in the Scroll of Honour for opting out of Subsidy. </font>
</center>

</marquee>
</fieldset>
</center>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</td>
<td><center>
<h1> <font color="green">BOOK YOUR LPG TO</font></h1><a href="bookgas.php"><img src="booklpg.png" height="50" width="100" border="0" alt="Link to this page"></a> 
</center></td>
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

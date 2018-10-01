
<form action="" method="post">

<textarea rows="4" cols="50" name="comment">
Enter text here...</textarea>
<input type="submit" name="submit">
</form>
<?php
$name=$_POST['comment'];
echo $name;
?>

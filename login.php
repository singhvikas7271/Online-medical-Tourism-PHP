<?php
session_start();
if(isset($_SESSION['aid']))
{
	header("location:admin.php");
}
if(isset($_SESSION['uid']))
{
	header("location:user.php");
}
?>

<style>
body{position:absolute;width:80%;height:100%;background:url('6.jpg');background-size:100%;background-position:right;}
#lgn{position:absolute;top:15%;right:28%;background-color:transparent;background-size:80%;}
</style>

<div id=lgn>
<body>

<form action="check.php" method="POST">
	enter email:<input type="text" name="e"><br><br>
	enter password:<input type="password" name="p"><br><br>
<input type="submit" name="s">
</form>
</div>
</body>

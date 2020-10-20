<?php
session_start();
if($_SESSION['aid']!=session_id())
{
	header("location:login.php");
}
?>
<a href="end.php">logout</a> |
<a href="admin.php">user show delete and update</a> |
<br><br>
<?php
	$a=$_SESSION['a'];
	echo' welcome '.$a.'<br>';

?>

<?php 
if(isset($_GET['au']))
{
$au=$_GET['au'];
		
		include"connection.php";
		
		$q="delete from med where email='".$au."'";
		$sq=mysqli_query($connection,$q);
		if($sq)
		{
					header("location:admin.php");
		}
		else
		{
			echo mysqli_error($connection);
		}

}
else
{
	header("location:admin.php");
}
?>
<?php
session_start();
if($_SESSION['aid']!=session_id())
{
	header("location:login.php");
}
?>
<a href="end.php">logout</a> |
<a href="admin.php">user show delete and update</a> |
<a href="amedical.php">add and show and delete medical packages</a> |
<a href="abooking.php">show and delete booking</a> |

<br><br>
<?php
	$a=$_SESSION['a'];
	echo' welcome '.$a;

?> 

<?php 
if(isset($_GET['au']))
{
$au=$_GET['au'];
		
		include"connection.php";
		
		$q="delete from booking where bid='".$au."'";
		$sq=mysqli_query($connection,$q);
		if($sq)
		{
					header("location:abooking.php");
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
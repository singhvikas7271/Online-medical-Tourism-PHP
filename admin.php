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

		include"connection.php";
		
		$q="select * from med";
		$sq=mysqli_query($connection,$q);
	if($sq)
	{	
		if(mysqli_fetch_array($sq)>0)
		{
		$sq=mysqli_query($connection,$q);
		echo'<table border="1"><tr>
		<th>id</th><th>Name</th><th>email</th><th>phone</th><th>password</th>
		<th>update</th><th>delete</th></tr>';
			while($r=mysqli_fetch_array($sq))
			{
				echo '<tr><th>'.$r['id'].'</th>';
				echo '<th>'.$r['name'].'</th>';
				echo '<th>'.$r['email'].'</th>';
				echo '<th>'.$r['phone'].'</th>';
				echo '<th>'.$r['password'].'</th>';
				
				$ue=$r['email'];
				
				echo '<th><a href="aup.php?au='.$ue.'">update</a></th>';
				
				echo '<th><a href="adel.php?au='.$ue.'">delete</a></th><tr>';
			}
			echo'</table>';
		}		
		else
		{
		echo 'no record found';
		}
	}
	else
	{
		echo mysqli_error($connection);
	}
?>
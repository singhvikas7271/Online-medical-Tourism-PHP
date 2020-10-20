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
		
		$q="select * from booking";
		$sq=mysqli_query($connection,$q);
	if($sq)
	{	
		if(mysqli_fetch_array($sq)>0)
		{
		$sq=mysqli_query($connection,$q);
		echo'<table border="1" width="600"><tr>
		<th>bid</th><th>person id</th><th>person name</th><th>person email id</th><th>person phone</th>
		<th>treatment id</th><th>treatment name</th><th>treatment desciption</th>
		<th>rate</th><th>photo</th><th>date of treatment</th><th>delete</th></tr>';
			while($r=mysqli_fetch_array($sq))
			{
				echo '<tr><th>'.$r['bid'].'</th>';
				echo '<th>'.$r['pid'].'</th>';
				echo '<th>'.$r['pname'].'</th>';
				echo '<th>'.$r['pemail'].'</th>';
				echo '<th>'.$r['pphone'].'</th>';
				echo '<th>'.$r['tid'].'</th>';
				echo '<th>'.$r['tname'].'</th>';
				echo '<th>'.$r['tdesc'].'</th>';
				echo '<th>'.$r['rate'].'</th>';
				
				echo '<th><img src="'.$r['photo'].'" width="100" height="100"></th>';
				echo '<th>'.$r['date'].'</th>';
				$pa=$r['bid'];
echo '<th><a href="abookingdel.php?au='.$pa.'">delete</a></th><tr>';
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
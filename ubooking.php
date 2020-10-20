<?php
session_start();
if($_SESSION['uid']!=session_id())
{
	header("location:login.php");
}
?>
<a href="end.php">logout</a> |
<a href="user.php">user show and update</a> |
<a href="umedical.php">user medical package</a> |
<a href="ubooking.php">user booked medical package</a> |
<?php
	$u=$_SESSION['u'];
	echo' welcome '.$u;
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.r{background-color:silver; margin:20px;height:400px;}
.r:hover {background-color:lime;}
.r1{position:absolute;left:15%;width:60%;height:100%;top:0%;}
.r:hover .r1{color:red;}
.r2{position:absolute;left:60%;width:35%;height:80%;top:0%;}
</style>
<hr color="red">
<div class="fluid-container">
<?php 

		include"connection.php";
		
		$q="select * from booking where pemail='".$u."'"; ;
		$sq=mysqli_query($connection,$q);
if($sq)
{
	
									
		if(mysqli_fetch_assoc($sq)>0)
		{
		
	$sq=mysqli_query($connection,$q);
		echo'<div class="row">';
			while($r=mysqli_fetch_assoc($sq))
			{
			echo'<div class="col-md-6">';
			echo'<div class="r">';
			echo'<div class="r2">';
echo '<br><img src="'.$r['photo'].'" width="100%" height="100%">';
				echo'</div>';
				echo'<div class="r1">';
				echo '<br>Booking id ->'.$r['bid'];
				echo '<br>person id ->'.$r['pid'];
				echo '<br>name ->'.$r['pname'];
				echo '<br>Email ->'.$r['pemail'];
				echo '<br>Phone ->'.$r['pphone'];
				echo '<br>treatment id->'.$r['tid'];
				echo '<br>treatment name->'.$r['tname'];
				echo '<br>treatment description->'.$r['tdesc'];
				echo '<br>treatment rate->'.$r['rate'];
				echo '<br>date of treatment->'.$r['date'];
				
				echo'</div>';
				
			echo'</div>';
			echo'</div>';
				}
			echo'</div>';
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
</div>

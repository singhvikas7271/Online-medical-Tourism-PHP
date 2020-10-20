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
<a href="ubooking.php">user medical package</a> |
<?php
	$u=$_SESSION['u'];
	echo' welcome '.$u;
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.r{background-color:silver; margin:20px;height:200px;}
.r:hover {background-color:lime;}
</style>
<hr color="red">
<div class="fluid-container">
<div class="row">
<div class="col-md-4 col-offset-3">
<div class="r">
<?php 
if(isset($_GET['tid']))
{
$pid=$_GET['tid'];
	
	
	include"connection.php";
		
		$q="select * from package where tid='".$pid."'" ;
		$sq=mysqli_query($connection,$q);
if($sq)
{
		if(mysqli_fetch_assoc($sq)>0)
		{
		
	$sq=mysqli_query($connection,$q);
		while($r=mysqli_fetch_assoc($sq))
			{
			
				$_SESSION['photo']=$r['photo'];
				$_SESSION['tid']=$r['tid'];
				$_SESSION['tname']=$r['tname'];
				$_SESSION['rate']=$r['rate'];
				$_SESSION['desc']=$r['tdesc'];
				
		}	
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

	
	
}
else
{
	header("location:uproduct.php");
}

		
?>



		<form action="" method="POST" >
product selected:<font color="white"> <?php echo $_SESSION['tname'];?></font><br>
product rate:<font color="white"> <?php echo $_SESSION['rate'];?></font><br>
			select date of treatment<input type="date" name="d">
			<br><br>
				<input type="submit" name="s" value="conform booking ">		
		</form>
	


</div>
</div>
</div>
</div>


<?php
if(isset($_POST['s']))
{
			if($_POST['d']!='')
			{				
				$sy=date('Y');
				$sm=date('m');
				$sd=date('d');
				
				$ey=date('Y',strtotime($_POST['d']));
				$em=date('m',strtotime($_POST['d']));
				$ed=date('d',strtotime($_POST['d']));
				
				$dif=($ey*365 + ($em-1)*30 + $ed)-($sy*365 + ($sm-1)*30 + $sd);
				if($dif<=180 && $dif>0)
				{
				$d=date('Y-m-d',strtotime($_POST['d']));
				$pid=$_SESSION['pid'];
				$pemail=$_SESSION['pemail'];
				$pname=$_SESSION['pname'];
				$pphone=$_SESSION['pphone'];
				
				
				$tp=$_SESSION['photo'];
				$tid=$_SESSION['tid'];
				$tn=$_SESSION['tname'];
				$tr=$_SESSION['rate'];
				$td=$_SESSION['desc'];
	include"connection.php";
	$q1="insert into booking 
				(pid ,pname ,pemail ,pphone ,
						tid ,tname ,tdesc ,rate, photo,date )
		values ('".$pid."','".$pname."','".$pemail."',
		'".$pphone."','".$tid."',
		'".$tn."','".$td."','".$tr."','".$tp."','".$d."')";
	
		
		
		
if(mysqli_query($connection,$q1) )
		{
			echo'<script> alert(" booking confirm ")</script>';
			header("location:ubooking.php");
		}
		else
		{
			echo mysqli_error($connection);
		}
			}
			else
			{
				echo'<script> alert("check date ")</script>';
			}
			}
			else
			{
				echo'<script> alert("check date ")</script>';
			}

}
?>
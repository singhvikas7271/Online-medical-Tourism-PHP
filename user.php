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
.r{background-color:silver; margin:20px;height:200px;}
.r:hover {background-color:lime;}
.r1{position:absolute;left:15%;width:30%;height:100%;top:0%;
opacity:1;}
.r:hover .r1{opacity:1;}

</style>
<hr color="red">
<div class="fluid-container">
<?php 

		include"connection.php";
		$u=$_SESSION['u'];
		$q="select * from med where email='".$u."'";
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
		
				echo'<div class="r1">';
				echo '<br>id ->'.$r['id'];
				echo '<br>email->'.$r['email'];
				echo '<br>name->'.$r['name'];
				echo '<br>phone->'.$r['phone'];
			
				echo '<br>password->'.$r['password'];
				$_SESSION['pid']=$r['id'];
				$_SESSION['pemail']=$r['email'];
				$_SESSION['pname']=$r['name'];
				$_SESSION['pphone']=$r['phone'];
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

<?php

$n=$ns=$e=$es=$ph=$phs=$ci=$cis='';

function checkname()
{
	$n=trim($_POST['n']);
	$nc='/^[a-zA-Z ]*$/';
	if(preg_match($nc,$n)&&strlen($n)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}



function checkemail()
{
	$e=trim($_POST['e']);
	$ec='/^[a-zA-Z0-9._-]*\@[a-zA-Z.]*\.[a-zA-Z]{2,6}$/';
	if(preg_match($ec,$e))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function checkphone()
{
	$ph=trim($_POST['ph']);
	$pc='/^[0-9]{10,10}$/';
	if(preg_match($pc,$ph))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}

function checkpassword()
{
	$ci=trim($_POST['ci']);
	if(strlen($ci)>=4)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}
if(isset($_POST['s']))
{
$n=trim($_POST['n']);
if(checkname()=='n')
{
	$ns='** check name';
}

$e=trim($_POST['e']);
if(checkemail()=='n')
{
	$es='** check mail';
}

$ph=trim($_POST['ph']);
if(checkphone()=='n')
{
	$phs='** check phone';
}
$ci=trim($_POST['ci']);
if(checkpassword()=='n')
{
	$cis='** check password';
}

if(checkname()=='y'&& checkemail()=='y' && checkphone()=='y' && checkpassword()=='y')
{



	include"connection.php";
	$q="update med set name='".$n."',password ='".$ci."',phone='".$ph."'
	where email='".$e."'";
		
		$sq=mysqli_query($connection,$q);
		if($sq)
		{
			echo'<script> alert(" updated successfully ")</script>';
			
		$n=$ns=$e=$es=$ph=$phs=$ci=$cis='';
		}
		else
		{
			echo mysqli_error($connection);
		}
}
else
{
	echo'<script> alert(" check ")</script>';
}
}
?>
<!-- 1st below code then above code of isset!-->
<?php 

					include"connection.php";
					
					$q="select * from med where email='".$u."'";
					$sq=mysqli_query($connection,$q);
					
					if($sq)
					{
						while($r=mysqli_fetch_array($sq))
						{
						
echo'<form  action="" method="POST" enctype="multipart/form-data">
id:<input type="text" name="id" value="'.$r["id"].'" readonly><br><br>

name:<input type="text" name="n" value="'.$r["name"].'" readonly>
<span ><?php echo $ns; ?></span><br><br>

Email:<input type="text" name="e" value="'.$r["email"].'" readonly>
<span ><?php echo $es; ?></span><br><br>

Phone:<input type="text" name="ph" value="'.$r["phone"].'"  maxlength="10">
<span ><?php echo $ph; ?></span><br><br>

Password:[4-10 characters]
<input type="text" name="ci" maxlength="10" value="'.$r["password"].'">
<span ><?php echo $pss; ?></span><br><br>


<input type="submit" name="s" value="update">
</form>';
						
						
						
						}
					
					
					}
					else
					{
						echo mysqli_error($connection);
					}
	
	
	
?>



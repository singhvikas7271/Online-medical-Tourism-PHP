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
	echo' welcome '.$a;

?>
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

	if(isset($_GET['au']))
	{
	$ae=$_GET['au'];
	
					include"connection.php";
					
					$q="select * from med where email='".$ae."'";
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
	
	}
	else
	{
	header("location:admin.php");
	}
?>
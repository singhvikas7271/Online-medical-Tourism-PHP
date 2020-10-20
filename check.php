<?php
	if(isset($_POST['s']))
	{
		$e=$_POST['e'];
		$p=$_POST['p'];
			if($e=='argus' && $p=='academy')
			{
				session_start();
				$_SESSION['aid']=session_id();
				$_SESSION['a']=$e;
				header("location:admin.php");
			}
			else
			{
			
			include"connection.php";
		
$q="select * from med where email='".$e."' and password='".$p."'";
		$sq=mysqli_query($connection,$q);
			if($sq)
			{
		if(mysqli_fetch_array($sq)>0)
		{
				
				session_start();
				$_SESSION['uid']=session_id();
				$_SESSION['u']=$e;
				header("location:user.php");
		}
		else
		{
		header("location:login.php");
		}
			}
			else
			{
				echo mysqli_error($connection);
			}
			
			}
	}
	else
	{
			header("location:login.php");
	}

?>
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
$pn=$pns=$r=$rs=$d=$ds=$ms='';

function checkproduct()
{
	$pn=trim($_POST['pn']);
	$pnc='/^[a-zA-Z ]*$/';
	if(preg_match($pnc,$pn) && strlen($pn)>0)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function checkrate()
{
	$r=trim($_POST['r']);
	$rc='/^[0-9]{4,8}$/';
	if(preg_match($rc,$r))
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function checkdesc()
{
	$d=trim($_POST['d']);
	
	if(strlen($d)>=10)
	{
		return 'y';
	}
	else
	{
		return 'n';
	}
}


function checkphoto()
{
	if($_FILES['m']['name']!='')
	{
		$fn=$_FILES['m']['name'];
		$exp=strrpos($fn,'.');
		$ext=substr($fn,$exp+1,strlen($fn));
$aa=array('bmp','jpg','png','jpeg','gif');
			if(in_array($ext,$aa))
			{
			return 'y';
			}
			else
			{
			return 'n';
			}
	}
	else
	{
	return 'n';
	}
}




if(isset($_POST['s']))
{
$pn=trim($_POST['pn']);
if(checkproduct()=='n')
{
	$pns='** check treatment name';
}

$r=trim($_POST['r']);
if(checkrate()=='n')
{
	$rs='** check rate';
}



$d=trim($_POST['d']);
if(checkdesc()=='n')
{
	$ds='** check desc';
}


if(checkphoto()=='n')
{
	$ms='** check photo';
}

if(checkproduct()=='y' && checkrate()=='y' &&
checkdesc()=='y' && checkphoto()=='y')
{

$fn=$_FILES['m']['name'];

$ta=$_FILES['m']['tmp_name'];

$fa='photo/'.uniqid().$fn;

	include"connection.php";
	$q1="insert into package (tname,tdesc,rate,photo)
		values ('".$pn."','".$d."','".$r."','".$fa."')";
		
		$sq=mysqli_query($connection,$q1);
		if($sq)
		{
			echo'<script> alert(" package inserted ")</script>';
			move_uploaded_file($ta,$fa);
		$pn=$pns=$r=$rs=$d=$ds=$ms='';
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
<form  action="" method="POST" enctype="multipart/form-data">

treatment:<input type="text" name="pn" value="<?php echo $pn;?>">
<span ><?php echo $pns; ?></span><br><br>

rate:<input type="text" name="r" value="<?php echo $r;?>"  
maxlength="8">
<span ><?php echo $rs; ?></span><br><br>

description:<textarea name="d"><?php echo $d;?></textarea>
<span ><?php echo $ds; ?></span><br><br>

load image <input type="file" name="m">
<span ><?php echo $ms; ?></span><br><br>
<input type="submit" name="s">
</form>

<?php 

		include"connection.php";
		
		$q="select * from package";
		$sq=mysqli_query($connection,$q);
	if($sq)
	{	
		if(mysqli_fetch_array($sq)>0)
		{
		$sq=mysqli_query($connection,$q);
		echo'<table border="1" width="600"><tr>
		<th>pid</th><th>product name</th><th>description</th>
		<th>rate</th><th>photo</th><th>delete</th></tr>';
			while($r=mysqli_fetch_array($sq))
			{
				echo '<tr><th>'.$r['tid'].'</th>';
				echo '<th>'.$r['tname'].'</th>';
				echo '<th>'.$r['tdesc'].'</th>';
				echo '<th>'.$r['rate'].'</th>';
				echo '<th><img src="'.$r['photo'].'" width="100" height="100"></th>';
				$pa=$r['tid'];
echo '<th><a href="atreatmentdel.php?au='.$pa.'">delete</a></th><tr>';
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

<style>
#z{position:absolute;top:40%;right:28%;background-color:pink;background-size:120%;}
.f{position:absolute;color:blue;line-height:40px;font-size:1.2vw;}
#f1{top:20%}
#f2{top:25%}
ul{list-style-type:none;padding:0px;}
ul li{height:50px;width:150px;
background-color:;float:left;text-align:center;
line-height:50px;font-size:1.5vw;transition:0.5s;
}
ul li ul li{visibility:hidden;}
ul li:hover ul li{visibility:visible;}
li a{color:red;text-decoration:none}
li:hover{background-color:pink;}
#x{position:absolute;top:15%;width:100%;height:50%;
left:0%;}
#s{position:absolute;width:100%;background:rgba(12,232,11,0.2);bottom:0%;left:0%;color:white;font-family:forte;
   font-size:2vw;line-height:50px;height:15%;text-align:center;}
#j{position:absolute}

body{position:absolute;width:100%;height:100%;background:url('14.jpg');background-size:144%;background-position:right;}
#j1{position:absolute;}
#hh{position:absolute;text-align:center;}

</style>
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
	$q="insert into med (name,email,password ,phone)
		values ('".$n."','".$e."','".$ci."','".$ph."')";
		
		$sq=mysqli_query($connection,$q);
		if($sq)
		{
			echo'<script> alert(" ragisterd successfull ")</script>';
			
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

<div id="z">

<form action=""method="POST" >
Name:<input type="text" placeholder="enter your name" name="n"value="<?php echo $n;?>"><span><?php echo $ns;?></span><br><br><br><br>
Email:<input type="text"placeholder="enter your email"name="e"value="<?php echo $e;?>"><span><?php echo $es;?></span><br><br><br><br>
Mobile:<input type="text"placeholder="enter your number"name="ph"value="<?php echo $ph;?>"><span><?php echo $phs;?></span><br><br><br><br>
password:<input type="password"placeholder="enter your password"name="ci"value="<?php echo $ci;?>"><span><?php echo $cis;?></span><br><br><br><br>

<input type="submit" name="s" bgcolor="green">
<input type="submit" value="clear" name="s1">

</form>

</div>

<div id="hh" class="center">
  <h1 > Online Medical Tourism</h1>
  
  </div>

<body>
  
<div id="j" >
<ul>
<li><a href="">Home</a></li>

<li><a href="mdprovide.php">MadicalProvider</a></li>

<li><a href="">Events</a></li>

<li><a href="">Location</a></li>
<li><a href="">Contect</a></li>
<li><a href="login.php">SignIn</a></li>
</ul>

</div>
</body>




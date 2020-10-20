<?php
include"connection.php";
$q="create table package (tid int(5) auto_increment ,
						tname varchar(50)  ,
						tdesc varchar(500) not null,
						rate int(5) not null,
						photo varchar(500) not null,
						primary key(tid))";
						
			$sq=mysqli_query($connection,$q);
			if($sq)
			{
				echo ' table created';
			}
			else
			{
				echo mysqli_error($connection);
			}

?>
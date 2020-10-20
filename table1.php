<?php
include"connection.php";

$q="create table med (id int(5) auto_increment ,
                        name varchar(20) not null,
						email varchar(50) unique ,
						password varchar(50) not null ,
						phone  varchar(15) not null,
						primary key(id))";
						
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
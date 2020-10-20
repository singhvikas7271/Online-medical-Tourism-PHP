
<?php
include"connection.php";

$q="create table booking(bid int(5) auto_increment ,
                        pid int(5) not null,
                        pname varchar(20) not null,
						pemail varchar(50) unique ,
						pphone  varchar(15) not null,
						tid int(5) not null,
						tname  varchar(50) not null,
						tdesc  varchar(500) not null,
						rate int(5) not null,
						photo varchar(500) not null,
						date date not null,
						primary key(bid))";
						
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
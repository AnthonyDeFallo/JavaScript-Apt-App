<!DOCTYPE html>
<html>
<head>
<title>User Database</title>
</head>
<body>
	<!--<div>
		<form method="POST" action="add.php">
			<label>Firstname:</label><input type="text" name="firstname">
			<label>Middle:</label><input type="text" name="middle">
			<label>Lastname:</label><input type="text" name="lastname">
			<label>Email:</label><input type="text" name="email">
			<label>Phone:</label><input type="text" name="phone">
			<input type="submit" name="add">
		</form>
	</div>-->
	<br>
	<div>
		<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>

<?php
function phpruns() {
$search_value=$_POST["search"];
$con=new mysqli("fuss19pros2.mysql.database.azure.com", "fusmaster@fuss19pros2", "7I1XAh4k7ZdZ", "fuss19pro");
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        $sql="select * from name_m where first_name like '%$search_value%'";

        $res=$con->query($sql);

        while($row=$res->fetch_assoc()){
            echo 'First_name:  '.$row["first_name"];


            }       

        }
    }
?>

	</div>
</body>
</html>
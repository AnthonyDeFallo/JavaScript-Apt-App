<?php
$conn=mysqli_connect("fuss19pros2.mysql.database.azure.com", "fusmaster@fuss19pros2", "7I1XAh4k7ZdZ", "fuss19pro");

//Check
if (mysqli_connect_errno())
{
echo "Failed " . mysqli_connect_error();
}
?>
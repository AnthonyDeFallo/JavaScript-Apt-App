<?php
$host = "fuss19pros2.mysql.database.azure.com"; /* Host name */
$user = "fusmaster@fuss19pros2"; /* User */
$password = "7I1XAh4k7ZdZ"; /* Password */
$dbname = "fuss19pro"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}




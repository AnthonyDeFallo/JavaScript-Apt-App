<?php

// SQL Server Extension Sample Code:
//$connectionInfo = array("UID" => "fusmaster", "pwd" => "7I1XAh4k7ZdZ", "Database" => "fuss19pro", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
//$serverName = "tcp:fuss19pros.database.windows.net,1433";
//$conn = sqlsrv_connect($serverName, $connectionInfo);

//$sql = "SELECT * FROM name_m WHERE id_num = ?";


$mysqli = new mysqli("fuss19pros2.mysql.database.azure.com", "fusmaster@fuss19pros2", "7I1XAh4k7ZdZ", "fuss19pro");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT id, first_name, phone, last_name FROM name_m WHERE id = ?";


$stmt = $mysqli->prepare(sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>id</th>";
echo "<td>" . $cid . "</td>";
echo "<th>first_name</th>";
echo "<td>" . $cname . "</td>";
echo "<th>last_name</th>";
echo "<td>" . $name . "</td>";
echo "<th>phone</th>";
echo "<td>" . $adr . "</td>";
echo "</tr>";
echo "</table>";
?>
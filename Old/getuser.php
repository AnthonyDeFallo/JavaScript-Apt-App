<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('fuss19pros2.mysql.database.azure.com', 'fusmaster@fuss19pros2', '7I1XAh4k7ZdZ', 'fuss19pro');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fuss19pro");
$sql="SELECT * FROM appointment_master WHERE stylist = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Client Name</th>
<th>Client Phone</th>
<th>Appointment Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['apt_date'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
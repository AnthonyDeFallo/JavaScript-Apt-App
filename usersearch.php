<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="no-sidebar is-preload">
        <div id="page-wrapper">
            <header id="header">
                <br>
                    <nav id="nav">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li><a href="query.html">Search Appointment</a></li>
                        </ul>
                    </nav>
            </header>
        <div>
        <style>
            table {
              border-collapse: collapse;
              width: 100%;
            }

            th, td {
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
              background-color: #83D3C9;
              color: white;
            }

            th {text-align: left;}
        </style>
    </div>
    <hr><hr>
    </head>
<body>

<?php

$con = mysqli_connect('fuss19pros2.mysql.database.azure.com', 'fusmaster@fuss19pros2', '7I1XAh4k7ZdZ', 'fuss19pro');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$firstname=$_POST['first_name'];
$lastname=$_POST['last_name'];

mysqli_select_db($con,"fuss19pro");
$sql="SELECT * FROM appointment_master WHERE (first_name = '".$firstname."' AND last_name = '".$lastname."' AND cancel != 1)";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Client Name</th>
<th>Client Phone</th>
<th>Stylist</th>
<th>Appointment Date</th>
<th>Appointment Type</th>
<th>Cancel</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['stylist'] . "</td>";
    echo "<td>" . $row['apt_date'] . "</td>";
        echo "<td>" . $row['apt_type'] . "</td>";
    echo "<td>" . '<a href="delete.php?apt_id='.$row['apt_id'].'">Cancel Appointment</a>' . "<td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
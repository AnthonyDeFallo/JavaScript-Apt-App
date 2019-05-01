<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js"></script>
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

mysqli_select_db($con,"fuss19pro");
$sql="SELECT * FROM appointment_master WHERE (DATE(apt_date) = CURDATE() AND cancel != 1) order by apt_date asc";
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
     if ($row['stylist'] == "5") {
        echo "<td>Jon Lee</td>";
    }
    else if ($row['stylist'] == "4") {
        echo "<td>Tim Mullins</td>";
    }
    else if ($row['stylist'] == "2") {
        echo "<td>Joe Wessel</td>";
    }
    else {
        echo "<td>" . $row['stylist'] . "</td>";
    }
    echo "<td>" . $row['apt_date'] . "</td>";
    if ($row['apt_type'] == "hc") {
        echo "<td>Haircut</td>";
    }
    else if ($row['apt_type'] == "nl") {
        echo "<td>Nails</td>";
    }
    else if ($row['apt_type'] == "hccl") {
        echo "<td>Haircut and Color</td>";
    }
    else if ($row['apt_type'] == "cl") {
        echo "<td>Coloringt</td>";
    }
    else if ($row['apt_type'] == "pd") {
        echo "<td>Pedicure</td>";
    }
    else {
        echo "<td>" . $row['apt_type'] . "</td>";
    }
    echo "<td>" . '<a href="delete.php?apt_id='.$row['apt_id'].'">Cancel Appointment</a>' . "<td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
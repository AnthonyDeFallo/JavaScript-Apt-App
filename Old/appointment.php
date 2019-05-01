<!DOCTYPE html>
<html>
<head>
<title>Appointment Master</title>
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
		<table border="1">
			<thead>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Stylist</th>
				<th>Appointment Date</th>
			</thead>
			<tbody>
				<?php
				include('conn.php');
					$query=mysqli_query($conn,"select * from `appointment_master`");
					while($row=mysqli_fetch_array($query)){
						?>
        		<tr>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['stylist']; ?></td>
					<td><?php echo $row['apt_date']; ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
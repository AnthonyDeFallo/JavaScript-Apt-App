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
		<table border="1">
			<thead>
				<th>Firstname</th>
				<th>Middle</th>
				<th>Lastname</th>
			</thead>
			<tbody>
				<?php
				
				// Send a select query to MSSQL
				$link = mssql_connect('fuss19pros.database.windows.net', 'teke', '7I1XAh4k7ZdZ');
				mssql_select_db('fuss19pro', $link); 
				$query = mssql_query('SELECT first_name, middle_name, last_name FROM name_m');

				// Check if there were any records
				if (!mssql_num_rows($query)) {
					echo 'No records found';
				} else {

				while ($row = mssql_fetch_array($query)) {
				?>
        		<tr>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['middle_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
				</tr>
										<?php
					}
				?>
			}
			</tbody>
		</table>
	</div>
</body>
</html>
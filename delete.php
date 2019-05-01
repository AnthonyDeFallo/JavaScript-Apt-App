<?php 
	require 'database.php';
	$apt_id = 0;
	
	if ( !empty($_GET['apt_id'])) {
		$apt_id = $_REQUEST['apt_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$apt_id = $_POST['apt_id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE appointment_master SET cancel = 1 WHERE apt_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($apt_id));
		Database::disconnect();
		header("Location: index.html");
		
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a Customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="apt_id" value="<?php echo $apt_id;?>"/>
					  <p class="alert alert-error">Are you sure you want to cancel your appointment??</p>
					  <div class="form-actions">
						  <button type="submit">Yes</button>
						  <a href="index.html">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
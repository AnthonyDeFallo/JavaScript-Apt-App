<?php
	include('conn.php');
	
	$firstname=$_POST['first_name'];
	$lastname=$_POST['last_name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$stylist=$_POST['stylist'];
	$apt_type=$_POST['apt_type'];
	$apt_date=$_POST['apt_date'];
		
	mysqli_query($conn,"insert into `appointment_master` (first_name,last_name,phone,email,stylist,apt_type,apt_date) values ('$firstname','$lastname','$phone','$email','$stylist','$apt_type','$apt_date')");


	header('location:index.html');
	
?>
<?php
include 'config.php';

$sel = mysqli_query($con,"SELECT * FROM appointment_master WHERE (DATE(apt_date) = CURDATE() AND cancel != 1) order by apt_date asc");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("name"=>$row['first_name'] . " " . $row['last_name'], "phone"=>$row['phone'], "stylistN"=>$row['stylist'], "aptdate"=>$row['apt_date'], "apttype"=>$row['apt_type']);
}
						
if ($data["stylistN"] == "5") {
	$data["stylistN"] = "Jon Lee";
}
if ($_POST['stylist'] == '2') {
	$data['stylistN'] = "Joe Wessel";
}
if ($_POST['stylist'] == '4') {
	$data['stylistN'] = "Tim Mullins";
}
if ($_POST['apt_type'] == 'hc') {
	$data['apttype'] = "Haircut";
}
if ($_POST['apt_type'] == 'nl') {
	$data['apttype'] = "Nails";
}
if ($_POST['apt_type'] == 'hccl') {
	$data['apttype'] = "Haircut and Color";
}
if ($_POST['apt_type'] == 'cl') {
	$data['apttype'] = "Hair Color";
}
if ($_POST['apt_type'] == 'pd') {
	$data['apttype'] = "Pedicure";
}


echo json_encode($data);

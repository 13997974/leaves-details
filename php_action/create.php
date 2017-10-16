<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$month = $_POST['month'];

    $fromdate = $_POST['fromDate'];
    $todate = $_POST['toDate'];
	$casual = $_POST['casual'];
	$absence = $_POST['absence'];
	$informed = $_POST['informed'];
	$active = $_POST['active'];
	

	$sql = "INSERT INTO tbl_leaves (month, fromDate, toDate, casualLeave, absence, informed, sign) VALUES ('$month', '$todate', '$fromdate', '$casual', '$absence', '$informed', '$active')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}
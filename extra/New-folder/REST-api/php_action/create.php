<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$name = $_POST['month'];
	
	
	$kannada = $_POST['kannada'];

	$hindi = $_POST['hindi'];

	$social = $_POST['social'];

	$science = $_POST['science'];
	
	$maths = $_POST['maths'];
	$active = $_POST['active'];
	

	$sql = "INSERT INTO tbl_leaves (month, fromDate, toDate, casualLeave, absence, informed, sign) VALUES ('$name', '$kannada', '$hindi', '$social', '$science', '$maths', '$active')";
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
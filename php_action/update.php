<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$month = $_POST['editMonth'];
	
	
	$fdate = $_POST['editFDate'];

	$tdate = $_POST['editTDate'];
	
	$casual = $_POST['editCasual'];

	$absence = $_POST['editAbsence'];

	$informed = $_POST['editInformed'];
	$active = $_POST['editActive'];

	$sql = "UPDATE tbl_leaves SET month = '$month',  fromDate = '$fdate', toDate = '$tdate', casualLeave = '$casual', absence = '$absence', informed = '$informed', sign = '$active' WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully updated";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}
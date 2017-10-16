<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['member_id'];
	$name = $_POST['editName'];
	
	
	$kannada = $_POST['editKannada'];

	$hindi = $_POST['editHindi'];
	
	$social = $_POST['editSocial'];

	$science = $_POST['editScience'];

	$maths = $_POST['editMaths'];
	$active = $_POST['editActive'];

	$sql = "UPDATE student_table SET name = '$name',  kannada = '$kannada', hindi = '$hindi', social = '$social', science = '$science', maths = '$maths', active = '$active' WHERE id = $id";
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
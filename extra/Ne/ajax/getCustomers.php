<?php
include('../includes/config.php');

$query="select distinct c.customerName, c.address, c.email, c.city, c.state, c.postalCode, c.country from angularcode_customer c order by c.customerNumber";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}
# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>

<?php
	// headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	// database connection
	include('bd_connection.php');

	if(isset($_GET['submit']) && $_GET['delete']!=""){
		$sid = intval($_GET['delete']);

		$query = "SELECT * FROM tbl_students where sid='$sid'";

		/* check the sql statement for errors and if errors report them */
		$stmt = oci_parse($connect, $query);
		if(!$stmt) {
			$response=array(
				'status' => 400,
				'status_message' => 'An error occurred in parsing the sql string.\n'
			);
			exit;
		}
		oci_execute($stmt);
		if(oci_fetch($stmt))
		{
			$query = "DELETE FROM tbl_students WHERE sid=$sid";
				$stmt_del = oci_parse($connect, $query);
				if(!$stmt_del) {
					$response=array(
						'status' => 400,
						'status_message' => 'An error occurred in parsing the sql string.\n'
					);
					exit;
				}
				if (oci_execute($stmt_del)){
					$response=array(
						'status' => 200,
						'status_message' => 'Item deleted successfully!'
					);
				}
		}
		else {
			$response=array(
				'status' => 400,
				'status_message' => 'SID not found!'
			);
		} 
	}else{
		$response=array(
			'status' => 400,
			'status_message' => 'Invalid request!'
		);
	}

	echo json_encode($response);


?>
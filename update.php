<?php
	// headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	// database connection
	include('bd_connection.php');

	if($_GET['submit']=="update" && $_GET['sid']!="" && $_GET['fname']!="" && $_GET['sname']!="" && $_GET['email']!=""){
		$sid = intval($_GET['sid']);

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
		if(!oci_fetch($stmt))
		{
			$response=array(
				'status' => 400,
				'status_message' => 'Sorry, the SID you typed does not exist on the table. Try a new one!'
			);
		} else {
			$fname = $_GET['fname'];
			$sname = $_GET['sname'];
			$email = $_GET['email'];
			//var_dump($_GET['delete']);
			$query = "UPDATE tbl_students SET 
						fname='$fname',
						sname='$sname', 
						email='$email'
						WHERE sid='$sid'";
				$stmt = oci_parse($connect, $query);
				//oci_bind_by_name($stmt_del, ":delete", $delete);
				if(!$stmt) {
					$response[] = array(
						'status' => 400,
						'status_message' => ocierror($stmt)['message']
						
					);
					exit;
				}
				if(oci_execute($stmt)){
					$response[] = array(
						'status' => 400,
						'status_message' => 'Updated successfully!'
						
					);
				}
		}
	}
	else{
        $response[] = array(
            'status' => 400,
            'status_message' => 'Invalid request!'
        );
    }


    echo json_encode($response);

?>
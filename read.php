<?php
    // headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type:application/json");

    // database connection
    include('bd_connection.php');

    if (empty($_GET["sid"])){
        /*build sql statement */
        $query="SELECT * FROM tbl_students order by sid";
        
        /*check the sql statement for errors and if there are errors report them.*/
        $stmt=oci_parse($connect, $query);
        
        if(!$stmt)
        {
            $response[] = array(
                'status' => 400,
                'status_message' => oci_error($stmt)['message']
            );
            exit;
        }
        else {
            if (oci_execute($stmt)){
                while ($row = oci_fetch($stmt)){
                    $response[] = array(
                        'sid' => oci_result($stmt,1),
                        'fname' => oci_result($stmt,2),
                        'sname' => oci_result($stmt,3),
                        'email' => oci_result($stmt,4)
                    );
                }
            }
            else{
                $response[] = array(
                    'status' => 400,
                    'status_message' => oci_error($stmt)['message']
                    
                );
            }

        }

    } else 
    if(isset($_GET['sid']) && $_GET['sid']!=""){
        $sid = $_GET['sid'];
        $query="SELECT * FROM tbl_students where sid='$sid'";
        
        /*check the sql statement for errors and if there are errors report them.*/
        $stmt=oci_parse($connect, $query);
        
        if(!$stmt)
        {
            $response[] = array(
                'status' => 400,
                'status_message' => oci_error($stmt)['message']
            );
            exit;
        }
        else {
            if (oci_execute($stmt)){
                while ($row = oci_fetch($stmt)){
                    $response[] = array(
                        'sid' => oci_result($stmt,1),
                        'fname' => oci_result($stmt,2),
                        'sname' => oci_result($stmt,3),
                        'email' => oci_result($stmt,4)
                    );
                }
            }
            else{
                $response[] = array(
                    'status' => 400,
                    'status_message' => oci_error($stmt)['message']
                    
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
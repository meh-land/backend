<?php 
require 'db_connection.php';


$data = json_decode(file_get_contents("php://input"));

if(isset($data->status)
	&& !empty(trim($data->status))
	){
		
	$status = mysqli_real_escape_string($db_conn, trim($data->status));
	$add = mysqli_query($db_conn,"insert into test (status) values('$status')");
	if($add){
		$id = $db_conn->insert_id;
		echo json_encode(["status"=>true,"insertid"=>$id]);
		return;
    }else{
        echo json_encode(["status"=>false,"msg"=>"Server Problem. Please Try Again"]);
		return;
    } 

} else{
    echo json_encode(["status"=>false,"msg"=>"Please fill all the required fields!"]);
	return;
}
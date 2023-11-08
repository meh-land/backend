<?php 
require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->password)
	&& isset($data->user_id) 
	&& !empty(trim($data->password))
	&& !empty(trim($data->user_id))
	){
		
	$password = mysqli_real_escape_string($db_conn, trim($data->password));
	$user_id = mysqli_real_escape_string($db_conn, trim($data->user_id));

  $add = mysqli_query($db_conn,"UPDATE user SET password='$password' WHERE user_id='$user_id'");

	if($add){
		echo json_encode(["status"=>true]);
		return;
    }else{
        echo json_encode(["status"=>false,"msg"=>"Server Problem. Please Try Again"]);
		return;
    } 

} else{
    echo json_encode(["success"=>false,"msg"=>"Please fill all the required fields!"]);
	return;
}
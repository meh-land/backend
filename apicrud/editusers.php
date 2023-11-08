<?php 
require 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

if(isset($data->fullname)
	&& isset($data->email) 
	&& isset($data->user_id) 
	&& !empty(trim($data->fullname))
	&& !empty(trim($data->email))
	&& !empty(trim($data->user_id))
	){
		
	$fullname = mysqli_real_escape_string($db_conn, trim($data->fullname));
	$email = mysqli_real_escape_string($db_conn, trim($data->email));
	$user_id = mysqli_real_escape_string($db_conn, trim($data->user_id));

  $add = mysqli_query($db_conn,"UPDATE user SET name='$fullname', email='$email' WHERE user_id='$user_id'");

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
<?php

require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);

$dotenv->load();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$DB_USERNAME = $_ENV["DB_USERNAME"];
$DB_PWD = $_ENV["DB_PWD"];
$DB_NAME = $_ENV["DB_NAME"];
$DB_PORT = $_ENV["DB_PORT"];

$db_conn = mysqli_connect("127.0.0.1", $DB_USERNAME, $DB_PWD, $DB_NAME ,$DB_PORT);

// Check connection
if($db_conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors','Off');
?> 
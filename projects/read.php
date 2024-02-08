<?php
// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "./function.php";
// Set access control headers
header("Access-Control-Allow-Origin: *"); // Change * to your specific domain if needed
header("Access-Control-Allow-Methods: GET"); // Change GET to the methods you want to allow
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type, Authorization, Access-Control-Allow-Headers, X-Request-With"); // Add the necessary headers


echo "jaaha";
print_r($_SERVER['REQUEST']);
die;

$requestMethod = $_SERVER['REQUEST'];

if($requestMethod == "GET"){
    $projectList = projectList();
    echo json_encode($projectList);

    
}else{
    $data = array(
        'status' => 405,
        'message' => $requestMethod. "Method Not Allowed",
    );
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);    
}

?>

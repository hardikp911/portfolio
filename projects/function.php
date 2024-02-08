<?php
require_once "../connection/connection.php";
function projectList(){
    global $conn;
    $sqlQuery = "select * from projects";
    $queryRun = mysqli_query($conn , $sqlQuery);
    if($queryRun){
        if(mysqli_num_rows($queryRun)>0){
            
            $res = mysqli_fetch_all($queryRun, MYSQLI_ASSOC);

            $data = array(
                'status' => 200,
                'message' => 'Success',
                'data'=> $res
            );
            header("HTTP/1.0 200 ok");
            return $data;

        }else{
            $data = array(
                'status' => 404,
                'message' => "No Project Found",
            );
            header("HTTP/1.0 404 No Project Found");
            return $data;
        }

    }else{
        $data = array(
            'status' => 500,
            'message' => "internal server error",
        );
        header("HTTP/1.0 500 internal server error");
        return $data;
    
    }

}
  
?>
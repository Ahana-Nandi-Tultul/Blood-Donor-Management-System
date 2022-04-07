<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


 include ('../_dbconnection.php');
 session_start();

 if($_SERVER['REQUEST_METHOD']=='POST'){
        $json = file_get_contents('php://input');
        $json_data=json_decode($json,true);
        
        $userType=$json_data["userType"];
        if($userType=="admin"){
        $r_no=$json_data["r_no"];

        $sql1="UPDATE `bloodrequest` SET `r_status` = 'Complete' WHERE `bloodrequest`.`r_no` ='$r_no'";
        $result1=mysqli_query($con, $sql1);
        }
        
        elseif ($userType=="donor"){
              $r_no=$json_data["r_no"];
              $d_no=$_SESSION['no'];
      
              $sql1="UPDATE `bloodrequest` SET `d_no` = '$d_no' WHERE `bloodrequest`.`r_no` ='$r_no'";
              $result1=mysqli_query($con, $sql1);
        }
        
        echo json_encode($json_data);
 }
 ?>
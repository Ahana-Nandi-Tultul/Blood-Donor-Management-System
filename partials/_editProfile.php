<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


 include ('_dbconnection.php');
 session_start();

 if($_SERVER['REQUEST_METHOD']=='POST'){
        $json = file_get_contents('php://input');
        $json_data=json_decode($json,true);
        
       $user_type=$json_data[0]["usertype"];
       if($user_type=="patient"){
        $no=$json_data[0]["no"];
        $phn_no=$json_data[0]["phn_no"];
        $address=$json_data[0]["address"];
        $city=$json_data[0]["city"];
        $privious_address=$json_data[0]["privious_address"];
        $privious_phn_no=$json_data[0]["privious_phn_no"];
        

        $sql='UPDATE patient SET p_phn_no = "'.$phn_no.'",
        p_address="'.$address.'",
        p_city="'.$city.'" WHERE p_no = '.$no.';';
        mysqli_query($con, $sql);  
       }
       else if($user_type=="admin"){
              $no=$json_data[0]["no"];
              $phn_no=$json_data[0]["phn_no"];
              $address=$json_data[0]["address"];
              $city=$json_data[0]["city"];
              $privious_address=$json_data[0]["privious_address"];
              $privious_phn_no=$json_data[0]["privious_phn_no"];
              
      
              $sql='UPDATE `admin` SET a_phn_no = "'.$phn_no.'",
              a_address="'.$address.'",
              a_city="'.$city.'" WHERE a_no = '.$no.';';
              mysqli_query($con, $sql);  
       }
       else if($user_type=="donor"){
              $no=$json_data[0]["no"];
              $phn_no=$json_data[0]["phn_no"];
              $address=$json_data[0]["address"];
              $city=$json_data[0]["city"];
              $privious_address=$json_data[0]["privious_address"];
              $privious_phn_no=$json_data[0]["privious_phn_no"];
              
      
              $sql='UPDATE `donor` SET d_phn_no = "'.$phn_no.'",
              d_address="'.$address.'",
              d_city="'.$city.'" WHERE d_no = '.$no.';';
              mysqli_query($con, $sql);  
       }
        // if(($privious_time!="0") || ($privious_date!="0")){
        //       //  $cno="o";
        //        $sql1="SELECT * FROM appoinments where apointment_no=".$appoinment_no."";
        //        $result1=mysqli_query($con, $sql1);
        //        $row1=mysqli_fetch_assoc($result1);
        //        $cno=$row1['cno'];
        //        if($privious_date!="0"){
        //               $mgs1="Your appointment date has been change from ".$privious_date." to ".$date."";
        //               $sql2="INSERT INTO `notification_customers` (`cno`, `smgs`, `timeStamp`) VALUES ('$cno', '$mgs1', current_timestamp())";
        //               $result2=mysqli_query($con, $sql2);
        //        }
        //        if($privious_time!="0"){
        //              $mgs2="Your appointment time has been change from ".$privious_time." to ".$time."";
        //              $sql3="INSERT INTO `notification_customers` (`cno`, `smgs`,`timeStamp`) VALUES ('$cno', '$mgs2',current_timestamp())";
        //              $result3=mysqli_query($con, $sql3);
        //       }
        // }
        
        echo json_encode($json_data);
 }
 ?>
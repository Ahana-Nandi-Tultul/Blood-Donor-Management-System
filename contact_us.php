<?php
$showerror=false;
$showSuccess=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require('partials/_dbconnection.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $mgs=$_POST['mgs'];
    $sql="INSERT INTO `contact_us` (`name`, `email`, `phn`, `smgs`, `submittingTime`) 
    VALUES ('$name', '$email', '$phone', '$mgs', current_timestamp());";
    $result=mysqli_query($con, $sql);
    $showSuccess=true;
    $SuccessMgs="Your form has been submited";
    header('location:index.php?showSuccess='.$showSuccess.'&errorMgs='.$SuccessMgs.'');
}
?>
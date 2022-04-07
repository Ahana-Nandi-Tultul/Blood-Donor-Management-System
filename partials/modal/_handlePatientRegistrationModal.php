<?php
$showerror=false;
$showSuccess=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require('../_dbconnection.php');
    $name=$_POST['pname'];
    $email=$_POST['pemail'];
    $address=$_POST['paddress'];
    $phn_number=$_POST['pnumber'];
    $password=$_POST['p_Password'];
    $cpassword=$_POST['cp_Password'];
    $city=$_POST['pCity'];
    $bloodGroup=$_POST['pBloodGroup'];
    if($cpassword!=$password){
        $showerror=true;
        $errorMgs="Confirm Password is not same.";
        echo $errorMgs;
        header('location:../../index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
    }
    else{ 
        echo $email;
        $sql="SELECT * FROM `patient` WHERE cmail='$email'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        echo $num;
        if($num>0){
            $showerror=true;
            $errorMgs="Account has already been created by this email.Use another email.";
            echo $errorMgs;
            header('location:../../index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
        }
        else{
            $sql2="INSERT INTO `patient` ( `p_name`, `p_email`, `p_address`, `p_phn_no`, `p_blood_group`, `p_city`, `p_password`, `account_creating_time`) 
            VALUES ('$name', '$email', '$address', '$phn_number', '$bloodGroup', '$city', '$password', current_timestamp())";
            $result2=mysqli_query($con, $sql2);
            if($result2==null){
                $showerror=true;
                $errorMgs="Sorry! Your registration has not been completed for technical problem.";
                echo $errorMgs;
                header('location:../../index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
            }
            else{
                $showSuccess=true;
                $SuccessMgs="Your accoun has been created. Please log in";
                echo $showSuccess;
               header('location:../../index.php?showSuccess='.$showSuccess.'&errorMgs='.$SuccessMgs.'');
            }
        }
    }
}
?>
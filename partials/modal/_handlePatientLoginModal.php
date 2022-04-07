<?php 
$boole=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    require('../_dbconnection.php');
    $email=$_POST['p_email'];
    $p_Pass=$_POST['p_Pass'];
    $p_ConPass=$_POST['p_ConPass'];
    if($p_Pass==$p_ConPass){
        $sql="SELECT * FROM `patient` WHERE p_email='$email' AND p_password='$p_Pass'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        echo $num;
        if($num==1){
            $row=mysqli_fetch_assoc($result);
            $cno=$row['p_no'];
            $cname=$row['p_name'];
            $caddress=$row['p_address'];
            $cphoneNumber=$row['p_phn_no'];
            $city=$row['p_city'];
            $bloodGroup=$row['p_blood_group'];

            session_start();
            $_SESSION['no']=$cno;
            $_SESSION['name']=$cname;
            $_SESSION['email']=$email;
            $_SESSION['address']=$caddress;
            $_SESSION['phn_number']=$cphoneNumber;
            $_SESSION['city']=$city;
            $_SESSION['bloodGroup']=$bloodGroup;
            $_SESSION['loggedIn']=true;
            $_SESSION['user']='patient';
            $_SESSION['dashboard']='dashboard.php';
            $_SESSION['logout']='logout.php';
            $boole=true;
            header('location: ../../dashboard.php?loginsuccess='.$boole.'');
        }
        else{
            $boole=false;
            $showerror="Please Provide the correct username and password.";
            header('location: ../../index.php?loginsuccess='.$boole.'&error='.$showerror.'');
        }
    }
    else{
        $boole=false;
        $showerror="Password doesn't match";
        header('location: ../../index.php?loginsuccess='.$boole.'&error='.$showerror.'');
    }
}
?>

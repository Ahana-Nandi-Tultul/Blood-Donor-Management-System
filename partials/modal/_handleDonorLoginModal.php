<?php 
$boole=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    require('../_dbconnection.php');
    $email=$_POST['d_email'];
    $d_Pass=$_POST['d_Pass'];
    $d_ConPass=$_POST['d_ConPass'];
    if($d_Pass==$d_ConPass){
        $sql="SELECT * FROM `donor` WHERE d_email='$email' AND d_password='$d_Pass'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        echo $num;
        if($num==1){
            $row=mysqli_fetch_assoc($result);
            $cno=$row['d_no'];
            $cname=$row['d_name'];
            $caddress=$row['d_address'];
            $cphoneNumber=$row['d_phn_no'];
            $city=$row['d_city'];
            $bloodGroup=$row['d_blood_group'];

            session_start();
            $_SESSION['no']=$cno;
            $_SESSION['name']=$cname;
            $_SESSION['email']=$email;
            $_SESSION['address']=$caddress;
            $_SESSION['phn_number']=$cphoneNumber;
            $_SESSION['city']=$city;
            $_SESSION['bloodGroup']=$bloodGroup;
            $_SESSION['loggedIn']=true;
            $_SESSION['dashboard']='dashboard.php';
            $_SESSION['logout']='logout.php';
            $_SESSION['logout']='../logout.php';
            $_SESSION['user']='donor';
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
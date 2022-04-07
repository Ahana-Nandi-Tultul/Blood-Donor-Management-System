<?php 
$boole=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    require('../_dbconnection.php');
    $email=$_POST['adminlogin'];
    $a_Pass=$_POST['adminPass'];
    $a_ConPass=$_POST['adminConPass'];
    if($a_Pass==$a_ConPass){
        $sql="SELECT * FROM `admin` WHERE a_email='$email' AND a_password='$a_Pass'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        echo $num;
        if($num==1){
            $row=mysqli_fetch_assoc($result);
            $cno=$row['a_no'];
            $cname=$row['a_name'];
            $caddress=$row['a_address'];
            $cphoneNumber=$row['a_phn_no'];
            $city=$row['a_city'];
            $bloodGroup=$row['a_blood_group'];

            session_start();
            $_SESSION['no']=$cno;
            $_SESSION['name']=$cname;
            $_SESSION['email']=$email;
            $_SESSION['address']=$caddress;
            $_SESSION['phn_number']=$cphoneNumber;
            $_SESSION['city']=$city;
            $_SESSION['bloodGroup']=$bloodGroup;
            $_SESSION['loggedIn']=true;
            $_SESSION['dashboard']='../dashboard.php';
            $_SESSION['logout']='../logout.php';
            $_SESSION['user']='admin';
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
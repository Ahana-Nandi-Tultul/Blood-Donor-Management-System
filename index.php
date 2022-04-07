<?php
$showerror=false;
$showSuccess=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require('partials/_dbconnection.php');
    $name=$_POST['dname'];
    $email=$_POST['demail'];
    $address=$_POST['daddress'];
    $phn_number=$_POST['dnumber'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $city=$_POST['city'];
    $bloodGroup=$_POST['bloodGroup'];
    
    if($cpassword!=$password){
        $showerror=true;
        $errorMgs="Confirm Password is not same.";
        echo $errorMgs;
        header('location:index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
    }
    else{ 
        echo $email;
        $sql="SELECT * FROM `donor` WHERE cmail='$email'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        echo $num;
        if($num>0){
            $showerror=true;
            $errorMgs="Account has already been created by this email.Use another email.";
            echo $errorMgs;
            header('location:index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
        }
        else{
            $sql2="INSERT INTO `donor` ( `d_name`, `d_email`, `d_address`, `d_phn_no`, `d_blood_group`, `d_city`, `d_password`, `account_creating_time`) 
            VALUES ('$name', '$email', '$address', '$phn_number', '$bloodGroup', '$city', '$password', current_timestamp())";
            $result2=mysqli_query($con, $sql2);
            if($result2==null){
                $showerror=true;
                $errorMgs="Sorry! Your registration has not been completed for technical problem.";
                echo $errorMgs;
                header('location:index.php?showerror='.$showerror.'&errorMgs='.$errorMgs.'');
            }
            else{
                $showSuccess=true;
                $SuccessMgs="Your accoun has been created. Please log in";
                echo $showSuccess;
               header('location:index.php?showSuccess='.$showSuccess.'&errorMgs='.$SuccessMgs.'');
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <title>Blood Donor Management System</title>
    
</head>

<body>
    <div id="main_body">
        <div style="height:200px;">
        <?php  require('partials/_Navbar.php');
        $_SESSION['dashboard']='dashboard.php';
        $_SESSION['logout']='logout.php';
        if(isset($_GET['showerror'])=='true'){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error! </strong> '.$_GET['errorMgs'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if(isset($_GET['showSuccess'])=='true'){
            echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Success! </strong> '.$_GET['errorMgs'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        </div>
        <div class="container_fluid sub_container">
            <div class="home_button">
                <div class="first_button">
                    <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal"
                        data-bs-target="#patientLoginModal">Paitent Login</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal"
                        data-bs-target="#patientRegistrationModal">Paitent Registration</button>
                    <div class="third_button">
                        <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#donorLoginModal">Donor Login</button>
                    </div>
                </div>
            </div>
            <div class="cform">
                <div class="card form_card" style="width: 30rem;">
                    <div class="inside_card_index">
                        <h5 class="card-title">Registration Form For Donor</h5>
                        <p class="card-text">Please register youself as Donor.<br> <strong>Give Blood & Save a Life</strong></p>
                        <form action="index.php" method="POST">
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name*</label>
                                <input type="text" class="form-control" id="dname" name="dname"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address*</label>
                                <input type="email" class="form-control" id="demail" name="demail"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address*</label>
                                <input type="text" class="form-control" id="daddress" name="daddress"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number*</label>
                                <input type="number" class="form-control" id="dnumber" name="dnumber"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Blood Group*</label><br>
                                <select name="bloodGroup" id="bloodGroup" require>
                                   <option value="A+">A+</option>
                                   <option value="A-">A-</option>
                                   <option value="AB+">AB+</option>
                                   <option value="AB-">AB-</option>
                                   <option value="B+">B+</option>
                                   <option value="B-">B-</option>
                                   <option value="O+">O+</option>
                                   <option value="O-">O-</option>
                               </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">City*</label><br>
                                <select name="city" id="city" require>
                                   <option value="Dhaka">Dhaka</option>
                                   <option value="Jhenaidah">Jhenaidah</option>
                                   <!-- <option value="AB+">AB+</option>
                                   <option value="AB-">AB-</option>
                                   <option value="B+">B+</option>
                                   <option value="B-">B-</option>
                                   <option value="O+">O+</option>
                                   <option value="O-">O-</option> -->
                               </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password*</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    aria-describedby="emailHelp" required>
                               
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirm Password*</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword"
                                    aria-describedby="emailHelp" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <div class="contact_us" id="contact_us">
   
    <section class="get-in-touch">
   <h1 class="title">Contact Us</h1>
   <form class="contact-form row" action="contact_us.php" method="POST">
      <div class="form-field col-lg-6">
         <input id="name" name="name" class="input-text js-input" type="text" required>
         <label class="label" for="name">Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" name="email" class="input-text js-input" type="email" required>
         <label class="label" for="email">E-mail</label>
      </div>
      <!-- <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" type="text" required>
         <label class="label" for="company">Address</label>
      </div> -->
       <div class="form-field col-lg-6 ">
         <input id="phone" name="phone" class="input-text js-input" type="text" required>
         <label class="label" for="phone">Phone Number</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="message" name="mgs" class="input-text js-input" type="text" required>
         <label class="label" for="message">Message</label>
      </div>
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>

    
    </div>
    <?php require('partials/_Footer.php');?>
    <?php include('partials/modal/_adminLoginModal.php');
    include('partials/modal/_patientLoginModal.php');
    include('partials/modal/_patientRegistrationModal.php');
    include('partials/modal/_donorLoginModal.php');
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
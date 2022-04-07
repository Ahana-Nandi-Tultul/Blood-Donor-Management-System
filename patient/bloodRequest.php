
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Management System</title>
    <link href="../dashboard/css/styles.css" rel="stylesheet" />
    <script src="../dashboard/font_awesome/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('../dashboard/_dashboard.php');
    include('../partials/_dbconnection.php');
    
    ?>
    <?php
        $showerror=false;
        $showSuccess=false;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            require("../partials/_dbconnection.php");
            $no=$_SESSION['no'];
            $reason=$_POST['cause'];
            $donateLocation=$_POST['donateLocation'];
            $neededDate=$_POST['neededDate'];
            if($reason!=null){
            $sql="INSERT INTO `bloodrequest` ( `p_no`, `r_status`,`donateLocation`,`neededDate`, `r_reason`,  `requesting_time`) 
            VALUES ('$no', 'Pending', '$donateLocation', '$neededDate','$reason', current_timestamp());";
            $result=mysqli_query($con, $sql);
            $showSuccess=true;
            // 
            $msg="Your resquest has been saved. Wait, You will get response in 'Notification' option";
            }
            else{
            
                $showerror=true;
                $msg="Please provide the reason of requesting blood";
            }
        }

?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
            <div style="height:60px">
                <?php   
                if($showSuccess==true){
                    echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                if($showerror==true){
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong> '.$msg.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>
                </div>
                <h1 class="mt-4">Blood Request Form</h1>
                
                <?php
                $_SESSION['dashboard']='../dashboard.php';
                $_SESSION['logout']='../logout.php';
                            $cno = $_SESSION['no'];
                            $sql1="SELECT * FROM patient WHERE p_no='$cno'";
                            $result1=mysqli_query($con, $sql1);
                            $row1= mysqli_fetch_assoc($result1);
                           echo' <p><label for="">Patient Name:</label> <span><strong>'.$row1['p_name'].'</strong></span></p>
                            <p><label for="">Email:</label> <span><strong>'.$row1['p_email'].'</strong></span></p>
                            <p><label for="">Address:</label> <span><strong>'.$row1['p_address'].'</strong></span></p>
                            <p><label for="">Phone Number:</label> <span><strong>'.$row1['p_phn_no'].'</strong></span></p>
                            <p><label for="">Blood Group:</label> <span><strong>'.$row1['p_blood_group'].'</strong></span></p>
                            <p><label for="">City:</label> <span><strong>'.$row1['p_city'].'</strong></span></p>
                            ';
                ?>
                <form action="bloodRequest.php"method="POST">
                <div class="mb-3">
                        <input type="hidden" name="no" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Doante Location : </label><br>
                        <input type="text" name="donateLocation" id="donateLocation">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Blood Needed Date : </label><br>
                        <input type="date" name="neededDate" id="neededDate" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Reason</label><br>
                        <textarea name="cause" id="cause" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </main>
        <?php require('../dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dashboard/js/scripts.js"></script>

</body>

</html>
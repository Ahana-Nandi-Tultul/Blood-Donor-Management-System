<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahana Nandi's Parler Appoinments</title>
    <link href="../dashboard/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
    <script src="../dashboard/font_awesome/js/all.min.js"></script>
    <script src="../dashboard/font_awesome/js/kit.js" crossorigin="anonymous"></script>
    <script src="../jquery/jquery-3.5.1.js"></script>
</head>

<body>
    <?php
    require('../dashboard/_dashboard.php');
    require('../partials/_dbconnection.php');
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
                <?php
                $cno=$_SESSION['no'];
                $name=$_SESSION['name'];
                echo '<h4>Notification for '.$name.'  </h4>';

                $sql1="SELECT patient.p_name, patient.p_address, patient.p_phn_no, patient.p_email, 
                        patient.p_blood_group, patient.p_city, donor.d_name, donor.d_address, donor.d_phn_no, donor.d_email, 
                        donor.d_blood_group, donor.d_city, bloodrequest.r_reason, bloodrequest.r_no, bloodrequest.donateLocation, bloodrequest.neededDate, bloodrequest.r_status, bloodrequest.requesting_time 
                        FROM donor, patient, bloodrequest WHERE bloodrequest.d_no!=0 AND bloodrequest.p_no='$cno' AND bloodrequest.r_status='Complete'
                        AND bloodrequest.d_no=donor.d_no" ;
                $result1=mysqli_query($con, $sql1);
               //echo var_dump($row1);
                while($row1= mysqli_fetch_assoc($result1)){
                echo ' 
                <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      '.$row1["donateLocation"].' ('.$row1["neededDate"].') 
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Your Blood Request of <strong> '.$row1["neededDate"].' </strong> at <strong>'.$row1["donateLocation"].'</strong> has been accepted by <strong?>'.$row1["d_name"].'</strong>. 
                    Donar \'s contact informations are : Phone Number: <strong>'.$row1["d_phn_no"].'</strong> Email Address: <strong>'.$row1["d_email"].'</strong>
                  </div>
                </div>
            </div>
                ';
                }
            ?>
            </div>
        </main>
        <?php require('../dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dashboard/js/scripts.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
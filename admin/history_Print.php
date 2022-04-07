<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood patient Management System</title>
    <link href="../dashboard/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css">
    <script src="../dashboard/font_awesome/js/all.min.js"></script>
    <script src="../dashboard/font_awesome/js/kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../datatables/css/jquery.dataTables.min.css">
    <script src="../jquery/jquery-3.5.1.js"></script>
    <script src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
    </script>
</head>

<body>
    <?php require('../dashboard/_dashboard.php');
    require('../partials/_dbconnection.php');
    $_SESSION['dashboard']='../dashboard.php';
    $_SESSION['logout']='../logout.php';
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-3 mx-3">
                <h4 class="my-4 mx-3">History and Report Generation</h4>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Serial No</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Email</th>
                            <th scope="col">Patient Phone Number</th>
                            <th scope="col">Patient Blood Group</th>
                            <th scope="col">Patient City</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Donor Email</th>
                            <th scope="col">Donor Phone Number</th>
                            <th scope="col">Donor Blood Group</th>
                            <th scope="col">Donor City</th>
                            <th scope="col">Status</th>
                            <th scope="col">Reason</th>

                            <th scope="col">Donate Location</th>
                            <th scope="col">Needed Time</th>
                            <th scope="col">Requesting Time</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </thead>
                        <tbody>
                            <?php
                        $sql2="SELECT patient.p_name, patient.p_address, patient.p_phn_no, patient.p_email, 
                        patient.p_blood_group, patient.p_city, donor.d_name, donor.d_address, donor.d_phn_no, donor.d_email, 
                        donor.d_blood_group, donor.d_city, bloodrequest.r_reason, bloodrequest.r_no, bloodrequest.donateLocation, bloodrequest.neededDate, bloodrequest.r_status, bloodrequest.requesting_time 
                        FROM donor, patient, bloodrequest WHERE bloodrequest.d_no!=0 AND bloodrequest.p_no=patient.p_no AND bloodrequest.r_status='Complete'
                        AND bloodrequest.d_no=donor.d_no" ;
                        $result2=mysqli_query($con, $sql2);
                        $num2= mysqli_num_rows($result2);
                        $r_no=0;
                        if($num2>0){
                            $a_sl=1;
                            
                            while($row2= mysqli_fetch_assoc($result2)){
                                $r_no=$row2['r_no'];
                                echo'<tr>
                                <td>'.$a_sl.'</td>
                                <td>'.$row2['p_name'].'</td>
                                <td>'.$row2['p_email'].'</td>
                                <td>'.$row2['p_phn_no'].'</td>
                                <td>'.$row2['p_blood_group'].'</td>
                                <td>'.$row2['p_city'].'</td>
                                <td>'.$row2['d_name'].'</td>
                                <td>'.$row2['d_email'].'</td>
                                <td>'.$row2['d_phn_no'].'</td>
                                <td>'.$row2['d_blood_group'].'</td>
                                <td>'.$row2['d_city'].'</td>
                                <td>'.$row2['r_status'].'</td>
                                <td>'.$row2['r_reason'].'</td>
                                <td>'.$row2['donateLocation'].'</td>
                                <td>'.$row2['neededDate'].'</td>
                                <td>'.$row2['requesting_time'].'</td>
                                <form action="print.php?r_no='.$row2["r_no"].'" method="POST">
                               <td><button type="submit" class="btn btn-primary btn-xm ">Print</button></td>
                               </form>
                             </tr>';
                            $a_sl=$a_sl+1;
                        }
                    }
                        ?>
                        </tbody>
                       
                    </table>
                  
                         
                         
                </div>
        </main>
        <?php require('../dashboard/_dashboard_footer.php');
        ?>
    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dashboard/js/scripts.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
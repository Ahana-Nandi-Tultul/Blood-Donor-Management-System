<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Management System</title>
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
                <?php
                            $cno = $_SESSION['no'];
                            $sql1="SELECT * FROM patient WHERE p_no='$cno'";
                            $result1=mysqli_query($con, $sql1);
                            $row1= mysqli_fetch_assoc($result1);
                           echo' <p><label for="">Patient Name:</label> <span><strong>'.$row1['p_name'].'</strong></span></p>
                            <p><label for="">Email:</label> <span><strong>'.$row1['p_email'].'</strong></span></p>
                            <p><label for="">Address:</label> <span><strong>'.$row1['p_address'].'</strong></span></p>
                            <p><label for="">Phone Number:</label> <span><strong>'.$row1['p_phn_no'].'</strong></span></p>';
                ?>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Blood Request No</th>
                            <th scope="col">Donor Name </th>
                            <th scope="col">Donor Phone Number</th>
                            <th scope="col">Donor Email</th>
                            <th scope="col">Donor Address</th>
                            <th scope="col">Donor Blood Type</th>
                            <th scope="col">Donor City</th>
                            <th scope="col">Request Status</th>
                            <th scope="col">Requesting Time</th>
                        </thead>
                        <tbody>
                            <?php
                        $sql2="SELECT donor.d_name, donor.d_address, donor.d_phn_no, donor.d_email,
                         donor.d_blood_group, donor.d_city, bloodrequest.r_status, bloodrequest.requesting_time 
                         FROM donor, bloodrequest WHERE bloodrequest.p_no='$cno' AND bloodrequest.d_no=donor.d_no";
                        $result2=mysqli_query($con, $sql2);
                        $num2= mysqli_num_rows($result2);
                        if($num2>0){
                            $a_sl=1;
                            while($row2= mysqli_fetch_assoc($result2)){
                                echo'<tr>
                                <td>'.$a_sl.'</td>
                                <td>'.$row2['d_name'].'</td>
                                <td>'.$row2['d_phn_no'].'</td>
                                <td>'.$row2['d_email'].'</td>
                                <td>'.$row2['d_address'].'</td>
                                <td>'.$row2['d_blood_group'].'</td>
                                <td>'.$row2['d_city'].'</td>
                                <td>'.$row2['r_status'].'</td>
                                <td>'.$row2['requesting_time'].'</td>
                            </tr>';
                            $a_sl=$a_sl+1;
                        }
                    }
                        ?>
                        </tbody>
                    </table>
                </div>
        </main>
        <?php require('../dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../dashboard/js/scripts.js"></script>
</body>

</html>
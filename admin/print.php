<?php 
require('../partials/_dbconnection.php');
session_start();
if(isset($_SESSION['loggedIn'])!=true || ($_SESSION['user']!='admin')){
    header('location:index.php');
  
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    include ('../partials/_dbconnection.php');
    $r_no= $_GET['r_no'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blood Donor Management System</title>
    <style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .print-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .print-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .print-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .print-box table tr td:nth-child(2) {
        text-align: right;
    }

    .print-box table tr.top table td {
        padding-bottom: 20px;
    }

    .print-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .print-box table tr.information table td {
        padding-bottom: 40px;
    }

    .print-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .print-box table tr.details td {
        padding-bottom: 20px;
    }

    .print-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .print-box table tr.item.last td {
        border-bottom: none;
    }

    .print-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .print-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .print-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <div class="print-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h1>Blood Donor Management System</h1>
                            </td>
                            <td>
                                <?php 
                                  $_SESSION['dashboard']='../dashboard.php';
                                  $_SESSION['logout']='../logout.php';
                                $sql= "SELECT patient.p_name, patient.p_address, patient.p_phn_no, patient.p_email, 
                                patient.p_blood_group, patient.p_city, donor.d_name, donor.d_address, donor.d_phn_no, donor.d_email, 
                                donor.d_blood_group, donor.d_city, bloodrequest.r_reason, bloodrequest.r_no, bloodrequest.donateLocation, bloodrequest.neededDate, bloodrequest.r_status, bloodrequest.requesting_time 
                                FROM donor, patient, bloodrequest WHERE bloodrequest.r_no='$r_no' AND bloodrequest.p_no=patient.p_no AND bloodrequest.d_no=donor.d_no";
                                $result=mysqli_query($con, $sql);
                                $row=mysqli_fetch_assoc($result);
                                ?>

                                Date: <?php echo date('l jS \of F Y h:i:s A');?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="item">
                <td><strong>Patient_Name: </strong></td>
                <td><?php echo $row['p_name']?></td>
            </tr>
            <tr class="item">
                <td><strong>Patient_Address: </strong></td>
                <td><?php echo $row['p_address']?></td>
            </tr>
            <tr class="item">
                <td><strong>Patient_Phone_Number: </strong></td>
                <td><?php echo $row['p_phn_no']?></td>
            </tr>
            <tr class="item">
                <td><strong>Patient_Email_Address: </strong></td>
                <td><?php echo $row['p_email']?></td>
            </tr>
            <tr class="item">
                <td><strong>Patient_Blood Group: </strong></td>
                <td><?php echo $row['p_blood_group']?></td>
            </tr>
            <tr class="item">
                <td><strong>Patient_City: </strong></td>
                <td><?php echo $row['p_city']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_Name: </strong></td>
                <td><?php echo $row['d_name']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_Address: </strong></td>
                <td><?php echo $row['d_address']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_Phone_Number: </strong></td>
                <td><?php echo $row['d_phn_no']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_Email_Address: </strong></td>
                <td><?php echo $row['d_email']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_Blood Group: </strong></td>
                <td><?php echo $row['d_blood_group']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donor_City: </strong></td>
                <td><?php echo $row['d_city'] ?></td>
            </tr>
            <tr class="item">
                <td><strong>Reason_For_Blood_Request: </strong></td>
                <td><?php echo $row['r_reason']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donate_Location: </strong></td>
                <td><?php echo $row['donateLocation']?></td>
            </tr>
            <tr class="item">
                <td><strong>Donated Date: </strong></td>
                <td><?php echo $row['neededDate'] ?></td>
            </tr>
       </table>
    
            <button type="button" onclick=window.print()>Print</button>
        
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
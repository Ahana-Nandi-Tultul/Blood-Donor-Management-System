<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahana's Parlour</title>
    <link href="../dashboard/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
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
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-3 mx-3">
                <h4 class="my-4 mx-3">Contact Request</h4>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Contact No</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Email</th>
                            <th scope="col">Sender Phone Number</th>
                            <th scope="col">Sender Message</th>
                            <th scope="col">Submitting Time</th>
                        </thead>
                        <tbody>
                            <?php
                        $sql2="SELECT * FROM contact_us";
                        $result2=mysqli_query($con, $sql2);
                        $num2= mysqli_num_rows($result2);
                        if($num2>0){
                            $a_sl=1;
                            while($row2= mysqli_fetch_assoc($result2)){
                                echo'<tr>
                                <td>'.$a_sl.'</td>
                                <td>'.$row2['name'].'</td>
                                <td>'.$row2['email'].'</td>
                                <td>'.$row2['phn'].'</td>
                                <td>'.$row2['smgs'].'</td>
                                <td>'.$row2['submittingTime'].'</td>
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
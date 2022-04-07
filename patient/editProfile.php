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
    <script src="../ashboard/font_awesome/js/kit.js" crossorigin="anonymous"></script>
    <script src="../jquery/jquery-3.5.1.js"></script>
</head>

<body>
    <?php
    require('../dashboard/_dashboard.php');
    require('../partials/_dbconnection.php');
    $_SESSION['dashboard']='../dashboard.php';
    $_SESSION['logout']='../logout.php';
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
            <h3 id="user"> </h3>
            <h3 id="'.$user_type.'"> </h3>
                <?php 
                $p_no=$_SESSION['no'];
                $user_type=$_SESSION['user'];
                $sql='SELECT * FROM `patient` where `p_no`='.$p_no.'';
                $result=mysqli_query($con, $sql);
                $row=mysqli_fetch_assoc($result);
                $user_type=$_SESSION['user'];
                echo'<h3 id="usertype"> </h3>
                <h3 id="'.$user_type.'"> </h3>';
                echo'<h4 id="edit_profile">Information of '.$row['p_name'].' </h4>
                
                <div id="'.$p_no.'">
                <p><label for="">Patient Name: </label> <span><strong>'.$row['p_name'].'</strong></span></p>
                <p><label for="">Blood Group: </label> <span><strong>'.$row['p_blood_group'].'</strong></span></p>
                <p><label for="">Adress: </label> <span><strong id="privious_address">'.$row['p_address'].'</strong></span></p>
                <p><label for="">City: </label> <span><strong id="privious_city">'.$row['p_city'].'</strong></span></p>
                <p><label for="">Phone Number: </label> <span><strong id="privious_phn_no">'.$row['p_phn_no'].'</strong></span></p>

                <p><label for="">Updated Phone Number:</label><input type="number" name="update_phn_no" id="update_phn_no" value="'.$row['p_phn_no'].'">
                <button class="btn btn-primary px-4 mx-4" id="update_phn_no_button" name="update_phn_no_button">Edit</button></p>

                <label for="">Updated Address:</label><input type="text" name="update_address" id="update_address" value="'.$row['p_address'].'">
                <button class="btn btn-primary px-4 mx-4" id="update_address_button" name="update_address_button">Edit</button>
                <br><br>
                <p><label for="">Update City:  </label><select name="update_city" id="update_city"> <tb>
                <option value="Dhaka">Dhaka</option>
                <option value="Jhenaidah">Jhenaidah</option>
                </select>
                <button class="btn btn-primary px-4 mx-4" id="update_city_button" name="update_city_button">Edit</button></p>
                </div>
               
                ';
                ?>
                <button class="btn btn-primary" id="profile_update_save_button"
                    name="profile_update_save_button">Save Changes</button>
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
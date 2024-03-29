<?php
session_start();
if(isset($_SESSION['loggedIn'])!=true){
    header('location: index.php');
    exit;
}
else{
    if($_SESSION['user']=='patient'){
        $link="patient/editProfile.php";
    }
    else if($_SESSION['user']=='donor'){
        $link="donor/editProfile.php";
    }
    elseif($_SESSION['user']=='admin'){
        $link="admin/editProfile.php";
    }
    echo'
       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Profile</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="'.$link.'">Edit Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="'.$_SESSION['logout'].'">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Welcome '.$_SESSION['name'].'</div>
                            <div class="card" style="width: 100%; background-color: #212529;">
                                <img src="images/personal.png" class="card-img-top" alt="..." style="border-radius: 50%;">
                                <div class="card-body">
                                    <h6>Name <span class="badge bg-secondary">'.$_SESSION['name'].'</span></h6>
                                    <h6>Phone Number: <span class="badge bg-secondary">'.$_SESSION['phn_number'].'</span></h6>
                                    <h6>Address: <span class="badge bg-secondary">'.$_SESSION['address'].'</span></h6>';

                                    if($_SESSION['user']=='patient'|| $_SESSION['user']=='donor'){
                                    echo'<h6>Blood Group : <span class="badge bg-secondary">'.$_SESSION['bloodGroup'].'</span></h6>
                                    <h6>City : <span class="badge bg-secondary">'.$_SESSION['city'].'</span></h6>';
                                    }

                              echo' </div>
                              </div>
                            <a class="nav-link" href="'. $_SESSION['dashboard'].'">
                                <div class="sb-nav-link-icon"></i></div>
                                Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        '.$_SESSION['name'].'
                    </div>
                </nav>
            </div>';}

        ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
<!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
<!-- <script src="js/datatables-simple-demo.js"></script> -->
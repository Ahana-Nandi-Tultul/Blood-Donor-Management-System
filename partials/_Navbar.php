<?php
echo'
<nav class="navbar navbar-expand-lg navbar-dark" style="align-items:right">
  <div class="container-fluid">
    <a class="navbar-brand nav_a" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active nav_a" aria-current="page" href="#contact_us">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active nav_a" aria-current="page" data-bs-toggle="modal"
          data-bs-target="#adminLoginModal">Admin Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>';

include('partials/modal/_adminLoginModal.php');
  if((isset($_GET['loginsuccess'])) and  ($_GET['loginsuccess']==false)){
    echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> '.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

?>
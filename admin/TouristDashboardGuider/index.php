<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
  header("Location:http://localhost/epaktourisum/login.php");
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='Event Organisor'){
  header("http://localhost/epaktourisum/admin/eventOrg_dash/index.php");
}
if($_SESSION['user']['role']=='Tourist'){
  header("http://localhost/epaktourisum/admin/TouristDashboard/index.php");
}
if($_SESSION['user']['role']=='TouristGuider'){
  header("http://localhost/epaktourisum/admin/TouristGuiderDashboard/index.php");
}
if($_SESSION['user']['role']=='Infulencer'){
  header("http://localhost/epaktourisum/admin/InfulencerDashboard/index.php");
}
if($_SESSION['user']['role']=='Blogger'){
  header("http://localhost/epaktourisum/admin/ExpolrePakistanDashboard/index.php");
}
if($_SESSION['user']['role']=='Vister'){
  header("http://localhost/epaktourisum/admin/ExpolrePakistanDashboard/index.php");
}
if($_SESSION['user']['role']=='Admin'){
  header("http://localhost/epaktourisum/admin/adminDashboard/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "TouristGuiderParticle/headsec.php"?>
  <link rel="stylesheet" href="TouristGuider_Dashboard/dist/css/custom.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include 'TouristGuiderParticle/preloader.php'?>
 
  <!-- Navbar -->
  <?php include 'TouristGuiderParticle/navar.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include 'TouristGuiderParticle/sidebar.php'?>
    <!-- Sidebar -->

    <h1>Welcome  <?php echo $_SESSION['user']['fname'];?>

    <section class="content" style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="TouristGuider_Dashboard/public/assets/images/TouristGuiderProcess.jpg" alt="" style="width: 550px; height: 550px; border-radius: 100%; ">
    </section>
  </div>
 
  <!-- Main Footer -->
  <?php include 'TouristGuiderParticle/footer.php'?>
</div>



<script src="TouristGuider_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="TouristGuider_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="TouristGuider_Dashboard/dist/js/adminlte.js"></script>
</body>
</html>

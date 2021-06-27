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
 <?php include "infulencerparticle/headsec.php"?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include "infulencerparticle/preloader.php"?>

  <!-- Navbar -->
  <?php include "infulencerparticle/navmenu.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include "infulencerparticle/sidebarmenu.php"?>




    <section class="content">

    <h1>Welcome Back! <span class="" style="font-family: Georgia, 'Times New Roman', Times, serif;"> <?php echo $_SESSION['user']['fname'];?> </span> </h1>

    </section>
    <section class="content" style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="Infulencer_Dashboard/dist/images/Infulencerprocess.jpg" alt="Process" style="width: 550px; height: 550px; border-radius: 100%; ">
    </section>

  </div>
 
  <!-- Main Footer -->
  <?php include "infulencerparticle/footer.php"?>
</div>



<script src="Infulencer_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="Infulencer_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Infulencer_Dashboard/dist/js/adminlte.js"></script>
</body>
</html>

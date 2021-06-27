<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
  header("Location:http://localhost/epaktourisum/login.php");
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='Event Organisor'){
  header("http://localhost/epaktourisumadmin/eventOrg_dash/index.php");
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
 <?php  include "particles/headsec.php"?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader --> 
  <?php  include "particles/preloader.php"?>

  <!-- Navbar -->
  <?php  include "particles/navar.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include "particles/sidebar.php"?>

    <section class="content">
       <h1>Welcome Back! <span class="" style="font-family: Georgia, 'Times New Roman', Times, serif;"> <?php echo $_SESSION['user']['fname'];?> </span> </h1>
       </section>
  
    <section class="content" style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
      <img src="ExpolrePakistanDashboard/public/assets/images/Blogger Process.jpg" alt="" style="width: 550px; height: 550px; border-radius: 100%; ">
      
    </section>
    <!-- <caption class="text-center"><h4>Designed By: <a href="https://www.facebook.com/ehtisham.wajid.961">Ehtisham Wajid</a></h4></caption> -->
  </div>
 
  <!-- Main Footer -->
  <?php  include "particles/footer.php"?>
</div>



<script src="ExpolrePakistanDashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="ExpolrePakistanDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ExpolrePakistanDashboard/dist/js/adminlte.js"></script>
</body>
</html>

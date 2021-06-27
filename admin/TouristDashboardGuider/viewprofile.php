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
  <link rel="stylesheet" href="TouristGuider_Dashboard/dist/css/bootstrap_min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="TouristGuider_Dashboard/dist/css/Guider.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
 
 
  <!-- Navbar -->
  <?php include 'TouristGuiderParticle/navar.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include 'TouristGuiderParticle/sidebar.php'?>
    <!-- Sidebar -->

  <h1>Welcome  <?php echo $_SESSION['user']['fname'];?> 

    <section class="content">
    <div class="main_contect">


<div><h1 class="text-center mx-auto">View Tourist Guider Card</h1></div>
        <!-- Tourist Data  -->
                  <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $user_id = $_SESSION['user']['user_id']; 
                     $sqlrecord="SELECT * FROM touristguider where user_id = $user_id ORDER BY 	touristguider_id  DESC  "; 
                      
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>   
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-4 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">

                                            <div class="m-b-25"> 
                                                <img src="TouristGuider_Dashboard/upload/<?php echo$row['image']?>" class="img-radius" alt="User-Profile-Image" style="width: 250px; height: 250px; border-radius: 100%">
                                             </div>

                                        <h6 class="f-w-600 head"><?php echo$row['displayName']?></h6>
                                       <h6 class="f-w-600 head"> <span><i class="fas fa-envelope mx-2 my-2"></i></span><?php echo$row['displayEmail']?></h6> 
                                       <h6 class="f-w-600"> <span><i class="fas fa-home mx-2 my-2"></i></span><?php echo$row['address']?></h6>
                                        <p><?php echo$row['aboutme']?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="f-w-400"><?php echo$row['displayEmail']?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="f-w-400">touristguider.contact</h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Services</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Services Offer</p>
                                                <h6 class="f-w-400"><?php echo$row['services']?> </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Charges Per-Hours ~PKR</p>
                                                <h6 class="f-w-400"><?php echo$row['servicescharges']?> </h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Services Aeras</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="f-w-400"><?php echo$row['servicesaera']?> </h6>
                                            </div>
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="<?php echo$row['fb']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="<?php echo$row['twitter']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo$row['instagram']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                        <button type="button" class="btn btn-outline-success text-center"><i class="fab fa-whatsapp"></i> <strong><?php echo$row['displayPhone']?></strong></button>
                                    </div>
                                    <ul class="social-link list-unstyled m-t-20 m-b-10 d-flex flex-row-reverse bd-highlight">
                                     <li><a href="deletecard.php?id=<?php echo$row['touristguider_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Profile Card" data-original-title="Delete Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-trash text-danger "></i></a></li> 
                                     <li><a href="updatecard.php?id=<?php echo$row['touristguider_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Profile Card" data-original-title="Edit Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-user-edit text-success "></i></a></li>
                                    
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>

 
    </div>

    </section>
  </div>
                  <?php 
                      }
                    }
                ?>
  <!-- Main Footer -->
  <?php include 'TouristGuiderParticle/footer.php'?>




<script src="TouristGuider_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="TouristGuider_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="TouristGuider_Dashboard/dist/js/adminlte.js"></script>
</body>
</html>

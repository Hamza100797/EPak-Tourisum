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
<html dir="ltr" lang="en">

<head>
<?php include "particles/eventOrgheadSeclinks.php"?>

</head>

<body>
       <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include "particles/eventOrg_preloader.php"?>

    <div id="main-wrapper">
         <!-- Header  -->
         <?php include "particles/eventOrgheader.php"?>

             <!-- sidebarMenu  -->
             <?php include "particles/eventOrgSidebarMenu.php"?>
        <div class="page-wrapper">
<!-- {{!-- breadcrum  --}} -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <h1 class="font-bold mb-0">689</h1>
                                        <span>Total Events</span>
                                    </div>
                                    <div class="ml-auto">
                                        <i class="mdi mdi-wallet text-info display-5"></i>
                                    </div>
                                </div>
                                <h5>About E-Pakistan Tourism</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula,
                                    sit amet laoreet arcu.Integer.</p>

                            </div>
                            <div class="mt-5">
                                <canvas id="campaign" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-6">
                        <div class="row">
                            <!-- column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Total Tourist Engaged</h4>
                                        <h4 class="font-bold mt-3 mb-2">3,25,346</h4>
                                        <h5 class="card-subtitle mb-0">Total Earnings of the Month</h5>
                                    </div>

                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Sales Ratio</h4>
                                        <h4 class="font-bold mt-3 mb-2">35,658</h4>
                                        <h5 class="card-subtitle mb-0">Total Earnings of the Month</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-sm-12">
                                <div class="card order-widget">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- column -->
                                            <div class="col-sm-12 col-md-8">
                                                <h4 class="card-title">Social Traffic</h4>
                                                <h5 class="card-subtitle mb-0">Traffic Comming across </h5>
                                                <div class="row mt-3">
                                                    <div class="col-4 border-right">
                                                        <i class="fa fa-circle text-cyan"></i>
                                                        <h3 class="mb-0 font-medium">5489</h3>
                                                        <span>Facebook</span>
                                                    </div>
                                                    <div class="col-4 border-right">
                                                        <i class="fa fa-circle text-orange"></i>
                                                        <h3 class="mb-0 font-medium">954</h3>
                                                        <span>Google</span>
                                                    </div>
                                                    <div class="col-4">
                                                        <i class="fa fa-circle text-info"></i>
                                                        <h3 class="mb-0 font-medium">736</h3>
                                                        <span>Instagram</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- column -->
                                            <div class="col-sm-12 col-md-4">
                                                <div id="visitor" class="mt-3" style="height:150px; width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- footer  -->
            <?php include "particles/eventOrgfooter.php"?>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   <script src="public/eventOrg_dashboard_files/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="public/eventOrg_dashboard_files/dist/js/app.min.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/app.init.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="public/eventOrg_dashboard_files/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/eventOrg_dashboard_files/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/eventOrg_dashboard_files/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/c3/d3.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/extra-libs/c3/c3.min.js"></script>
    <script src="public/eventOrg_dashboard_files/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="public/eventOrg_dashboard_files/dist/js/pages/dashboards/dashboard7.js"></script>
</body>

</html>
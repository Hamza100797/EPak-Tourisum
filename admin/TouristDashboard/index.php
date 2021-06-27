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
   <!-- bootstrap CDN  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

     <?php include "particles/touristdash_headlinks.php"?>
</head>

<body>

  <?php include "particles/touristdash_commonsections.php"?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard Overview</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div>
                    <div id="booking" class="section">
                      <div class="section-center">
                        <div class="container">
                          <div class="row">
                            <div class="booking-form">
                              <div class="form-header">
                                <h1>Find your Trip</h1>
                              </div>
                              <form>
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Enter The Place Name" required/>
                                  <span class="form-label">Trip Destination</span>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="date" required />
                                      <span class="form-label">From</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="date" required />
                                      <span class="form-label">To</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <select class="form-control" required>
                                        <option value selected hidden>No of Persons</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                      </select>
                                      <span class="select-arrow" ></span>
                                      <span class="form-label">Rooms</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <select class="form-control" required>
                                        <option value selected hidden>No of adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                      </select>
                                      <span class="select-arrow" ></span>
                                      <span class="form-label">Adults</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <select class="form-control" required>
                                        <option value selected hidden>no of children</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                      </select>
                                      <span class="select-arrow"></span>
                                      <span class="form-label">Children</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="email" placeholder="Enter your Email" />
                                      <span class="form-label">Email</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="tel" placeholder="Enter you Phone" />
                                      <span class="form-label">Phone</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-btn">
                                  <button class="submit-btn">Find Now</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    </div>
 <!-- Reservation Section  -->
 
            <footer class="footer text-center">
                All Rights Reserved by HSA@1007. Designed and Developed by <a href="">HSA@1007</a>.
            </footer>
      






    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="public/touristdashboard_filies/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="public/touristdashboard_filies/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/touristdashboard_filies/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="public/touristdashboard_filies/dist/js/app.min.js"></script>
    <script src="public/touristdashboard_filies/dist/js/app.init.js"></script>
    <script src="public/touristdashboard_filies/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="public/touristdashboard_filies/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="public/touristdashboard_filies/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="public/touristdashboard_filies/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="public/touristdashboard_filies/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="public/touristdashboard_filies/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="public/touristdashboard_filies/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="public/touristdashboard_filies/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="public/touristdashboard_filies/assets/extra-libs/c3/d3.min.js"></script>
    <script src="public/touristdashboard_filies/assets/extra-libs/c3/c3.min.js"></script>
    <script src="public/touristdashboard_filies/assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="public/touristdashboard_filies/dist/js/pages/dashboards/dashboard7.js"></script>
</body>

</html>
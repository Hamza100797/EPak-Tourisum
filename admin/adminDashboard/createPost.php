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
  <link rel="stylesheet" href="ExpolrePakistanDashboard/public/style/explorePakistanProfile.css">
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
        <div className="touristProfile">
            <div class="container-fluid">
                    <div>
                        <div id="booking" class="section">
                          <div class="section-center">
                            <div class="container">
                              <div class="row">
                                <div class="booking-form">
                                  <div class="form-header">
                                    <h1>Expolre Pakistan</h1>
                                    <p>We're to Expolre Such aera Of Pakistan thats unknow to World</p>
                                    <p>Be a part of Our Team,Write a Post and Earn </p>
                                  </div>
                                  <form action="/expolrepakistandashboard/createPost" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-mad-4">
                                            <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Enter Author Name"  name="name" />
                                            <span class="form-label">Author Name</span>
                                            </div>
                                        </div>
                                  
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="email" name="email" placeholder="Enter Your Email"  />
                                          <span class="form-label">Email</span>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="number" name="contact" placeholder="Enter Your Phone Number"  />
                                          <span class="form-label">Phone Num</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <input class="form-control" type="file" name="destinationimage" placeholder="Enter Your Image/Place-Photo"  />
                                              <span class="filelabel"> Destination Image</span>
                                            </div>
                                          </div>  
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="destination" placeholder="Enter Destination Name"  />
                                          <span class="form-label">Destination Place</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="province" placeholder="Enter Destination Province/State/Nearlocation Name"  />
                                          <span class="form-label">Destination Place Province</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                      <div class="form-group">
                                        <input class="form-control" type="date" name="posteddate" placeholder="Posted Date"  />
                                        <span class="form-label">Posted Date</span>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="nearestlocation" placeholder="Enter Nearest Location" />
                                          <span class="form-label">Nearest Location </span>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag1" placeholder="Enter  Aera Tag"  />
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag2" placeholder="Enter another aera Tag"  />
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div> 
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag3" placeholder="Enter another aera Tag"  />
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div> 
                                        <div class="col-md-3">
                                          <div class="form-group">
                                            <input class="form-control" type="text" name="aeratag4" placeholder="Enter another aera Tag"  />
                                            <span class="form-label">Aera Tags</span>
                                          </div>
                                        </div>  
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <div class="tripdescription">
                                              <label for="Write about Destination"> </label>
                                              <textarea  id="tripdescription" cols="30" rows="30" class="form-control"
                                                defaultValue="" name="tripdescription"></textarea>
                                              <span class="form-label">Write about Destination:</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="fb" placeholder="Copy your Facebook link Here"  />
                                          <span class="form-label">Facebook Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="instagram" placeholder="Copy your instagram link Here"  />
                                          <span class="form-label">Instagram Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                      <div class="form-group">
                                        <input class="form-control" type="text" name="youtube" placeholder="Copy your youtube link Here"  />
                                        <span class="form-label">Youtube Link</span>
                                      </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="blogs" placeholder="Copy your Blogs link Here" />
                                          <span class="form-label">Blogs link </span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-btn">
                                      <button class="submit-btn"> Share Now</button>
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
    
    </section>

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

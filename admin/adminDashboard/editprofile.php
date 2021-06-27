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
        <div class="page-wrapper">

            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                   
  
                                        
                      <div class="card">
                        <div class="card-body d-flex ">
                           <div class="mt-4 d-block">
                                <img src="ExpolrePakistanDashboard/public/assets/images/epaktourisumlogo.jpeg" class="rounded-circle"width="150" height="150px" />
                                <!-- <h4 class="card-title mt-2 d-block"> data.fname  </h4> -->
                                <h4 class="card-subtitle mt-2"><i class="fas fa-users mx-2"></i> <?php echo $_SESSION['user']['fname'];?><?php echo $_SESSION['user']['lname'];?></h4>
                                <h6 class="card-subtitle mt-2"><i class="fas fa-blog mx-2"></i> data.website </h6>
                              </div>
                           
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6> data.email  </h6> <small class="text-muted pt-4 db">Phone</small>
                            <h6> data.contact </h6> <small class="text-muted pt-4 db">Address</small>
                            <br />
                            <button class="btn btn-circle btn-secondary">
                              <a href=" data.fb ">
                                <i class="fab fa-facebook-f"></i>
                              </a>
                            </button>
                            <button class="btn btn-circle btn-secondary">
                              <a href=" data.twitter ">
                                <i class="fab fa-twitter"></i>
                              </a>
                            </button>
                            <button class="btn btn-circle btn-secondary">
                              <a href=" data.youtube ">
                                <i class="fab fa-youtube"></i>
                              </a>
                            </button>
                        </div>
                        <div>
                          
                        </div>
                    </div>


                  </div>
                    <!-- Column -->

                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tabs -->
                            <form class="px-4 pt-4 " action="/expolrepakistandashboard/editprofile" method="POST"  enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feFirstName">
                                            First Name:
                                        </label>
                                        <input type="text" class="form-control" id="feFirstName"
                                            placeholder="First Name" defaultValue="Sierra" name="fname"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feLastName">
                                            Last Name:
                                        </label>
                                        <input type="text" class="form-control" id="feLastName" placeholder="Last Name " name="lname"
                                            defaultValue="Brooks" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="feEmailAddress">
                                            Email:
                                        </label>
                                        <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" name="email"
                                            defaultValue="sierra@example.com" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="fephonenum">
                                            PhoneNum:
                                        </label>
                                        <input type="text" class="form-control" id="fephonenum"
                                            placeholder="+92 333 3333333" defaultValue="" name="contact" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label htmlFor="feAddress">
                                            Address:
                                        </label>
                                        <input type="text" class="form-control" id="feAddress"
                                            placeholder="123 Street ABC City Pakistan" defaultValue="" name="address" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="fb_link">
                                            Facebook Profile link:
                                        </label>
                                        <input type="text" class="form-control" id="fb_link"
                                            placeholder="www.facebook.com/Profile" name="fb" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="insta_pro_link">
                                            Instagram Profile Link:
                                        </label>
                                        <input type="text" class="form-control" id="insta_pro_link"
                                            placeholder="www.instgram.com/Profile" name="instagram" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="twitter_pro_link">
                                            Twitter Profile Link:
                                        </label>
                                        <input type="text" class="form-control" id="twitter_pro_link"
                                            placeholder="www.twitter.com/Twitter" name="twitter" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label htmlFor="youtube_channel_link">
                                            You Tube Link:
                                        </label>
                                        <input type="text" class="form-control" id="youtube_channel_link"
                                            placeholder="www.youtuber.com/Profile" name="youtube" />
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label htmlFor="website_link">
                                            Website Links:
                                        </label>
                                        <input type="text" class="form-control" id="website_link"
                                            placeholder="www.yourwebsite_name.com" name="website" />
                                    </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                      <label htmlFor="website_link">
                                          Profile Image:
                                      </label>
                                      <input type="file" class="form-control" id=""
                                           name="image" />
                                  </div>
                              </div>
                                <button type="submit" class="btn btn-accent pb-3 mb-4 btn-success">
                                    Update Account
                                </button>
                            </form>
                        </div> 
                    </div>
                    <!-- Column -->
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

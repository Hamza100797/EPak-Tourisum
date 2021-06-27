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
<link rel="stylesheet" href="TouristGuider_Dashboard/public/style/TouristGuideProfile.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style> a {text-decoration: none;}</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- Preloader -->
  <?php include 'TouristGuiderParticle/preloader.php'?>
 
  <!-- Navbar -->
  <?php include 'TouristGuiderParticle/navar.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include 'TouristGuiderParticle/sidebar.php'?>
    <!-- Sidebar -->

<!-- Form UI Here  -->

    <section class="">
   <!-- header slider section start  -->
       <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
            $userid=$_GET['id'];
            $sqlrecord="SELECT * FROM touristguider WHERE touristguider_id  ={$userid}"; 
            $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

            if(mysqli_num_rows($recordResult)>0){
            while($row =mysqli_fetch_assoc($recordResult)){

        ?>

    <div className="touristProfile">
        <div class="container-fluid">
                <div>
                    <div id="booking" class="section">
                      <div class="section-center">
                        <div class="container">
                          <div class="row">
                            <div class="booking-form">
                              <div class="form-header">
                                <h1>Tourist Guider Registration</h1>
                              </div>
                              
                        
                              <form action="updateprofiledata.php?id=<?php echo$row['touristguider_id'] ?>" method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Enter Your Name"   value="<?php echo$row['displayName']?>"name="displayName" />
                                  <span class="form-label">Profile Name</span>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="email" name="displayEmail" value="<?php echo$row['displayEmail']?>" placeholder="Enter Your Email"  />
                                      <span class="form-label">Profile Email</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="number" name="displayPhone" value="<?php echo$row['displayPhone']?>" placeholder="Enter Your Phone Number"  />
                                      <span class="form-label">Profile Phone Num</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="address" value="<?php echo$row['address']?>" placeholder="Enter Your address"  />
                                      <span class="form-label">address</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="cnic" value="<?php echo$row['cnic']?>" placeholder="Enter Your cnic"  />
                                      <span class="form-label">cnic No.</span>
                                    </div>
                                  </div>  
                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="fb" value="<?php echo$row['fb']?>" placeholder="Enter Your Facebook link"  />
                                      <span class="form-label">Facebook Link</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="instagram"  value="<?php echo$row['instagram']?>"placeholder="Enter Your instagram link"  />
                                      <span class="form-label">fb Link.</span>
                                    </div>
                                  </div> 
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <input class="form-control" type="text" name="twitter" value="<?php echo$row['twitter']?>" placeholder="Enter Your twitter"  />
                                      <span class="form-label"> twitter Link.</span>
                                    </div>
                                  </div>  
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Enter your Offer Services"  value="<?php echo$row['services']?>" name="services"/>
                                      <span class="form-label">Services Provide</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Enter you Services Aeras" value="<?php echo$row['servicesaera']?>" name="servicesaera"/>
                                      <span class="form-label">Services Aeras</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                    <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Enter your Services Rates PKR"  value="<?php echo$row['servicescharges']?>" name="servicescharges"/>
                                      <span class="form-label">Services Charges PerHours</span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    
                                    <div class="form-group" style="margin-top: 10px;">
                                      
                                      <input class="form-control"  type="file" value="<?php echo $row['image']?>" name="image"/>
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="row mb-5">
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                      <div class="form-group">
                                        <div class="tripdescription container-fluid">
                                          <label for="Describe Yourself"> </label>
                                          <textarea  id="tripdescription" cols="40" rows="40" class="form-control"
                                            defaultValue=""  name="aboutme"><?php echo $row['aboutme']?></textarea>
                                          <span class="form-label">About Me:</span>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-btn">
                                  <button class="submit-btn" type="submit" vaule="save" name="save">Update Profile</button>
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

    <?php 
        }
     }
      ?>
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

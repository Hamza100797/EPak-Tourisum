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
 <link rel="stylesheet" href="adminDashboardfilies/public/style/bootstrap_min.css">
  <link rel="stylesheet" href="adminDashboardfilies/public/style/infulencer.css">
  <link rel="stylesheet" href="adminDashboardfilies/public/style/TouristGuideProfile.css">
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


    <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
            $userid=$_GET['id'];
            $sqlrecord="SELECT * FROM infulencer WHERE influncer_id  ={$userid}"; 
            $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

            if(mysqli_num_rows($recordResult)>0){
            while($row =mysqli_fetch_assoc($recordResult)){

        ?>
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
                                    <h1>Share Your Experience</h1>
                                    <p>We're Love to Post your Experience</p>
                                  </div>

                                  
                                  <form action="updatestorydata.php?id=<?php echo$row['influncer_id'] ?>" method="POST" enctype="multipart/form-data" >
                                    <div class="row">
                                        <div class="col-mad-12">
                                            <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Enter Your Name"  name="displayname" value="<?php echo $row['displayname']?>"/>
                                            <span class="form-label">Name</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="email" name="displayemail" placeholder="Enter Your Email" value="<?php echo $row['displayemail']?>" />
                                          <span class="form-label">Email</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="number" name="displayphone" placeholder="Enter Your Phone Number" value="<?php echo $row['displayphone']?>"  />
                                          <span class="form-label">Phone Num</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="address" placeholder="Enter Your Country Name" value="<?php echo $row['address']?>"  />
                                          <span class="form-label">Country Name</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="file" name="image" placeholder="Enter Your Image/Place-Photo"  value="<?php echo $row['image']?>" />
                                          <span class="form-label"> ProfileImage/Place-Photo</span>
                                        </div>
                                      </div>  
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="fb" placeholder="Enter Your Facebook link" value="<?php echo $row['fb']?>" />
                                          <span class="form-label">Facebook Link</span>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="instagram" placeholder="Enter Your Instagram link" value="<?php echo $row['instagram']?>" />
                                          <span class="form-label">Instagram Link.</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="youtube" placeholder="Enter Your Youtube" value="<?php echo $row['youtube']?>" />
                                          <span class="form-label"> Youtube Link.</span>
                                        </div>
                                      </div>  
                                    </div>
    
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="text" placeholder="Enter Post Title"  name="Posttitle" value="<?php echo $row['Posttitle']?>"/>
                                          <span class="form-label">Post Title</span>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <input class="form-control" type="date" placeholder="Select Event Date"  name="posteddate" value="<?php echo $row['posteddate']?>"/>
                                          <span class="form-label">Event Occur Date</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <div class="tripdescription">
                                              <label for="Describe Yourself"> </label>
                                              <textarea  id="tripdescription" cols="30" rows="30" class="form-control"
                                                defaultValue="" name="experience"><?php echo $row['experience']?>"</textarea>
                                              <span class="form-label">Write Your Experience:</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag1" placeholder="Enter  Aera Tag" value="<?php echo $row['aeratag1']?>"  />
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag2" placeholder="Enter another aera Tag" value="<?php echo $row['aeratag2']?>" />
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag3" placeholder="Enter another aera Tag" value="<?php echo $row['aeratag3']?>" />
                                          <span class="form-label">Aera Tags</span>
                                        </div>
                                      </div> 
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <input class="form-control" type="text" name="aeratag4" placeholder="Enter another aera Tag"value="<?php echo $row['aeratag4']?>"  />
                                          <span class="form-label">Aera Tags</span>
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



<script src="adminDashboardfilies/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="adminDashboardfilies/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminDashboardfilies/dist/js/adminlte.js"></script>
</body>
</html>
<?php 
        }
     }
      ?>
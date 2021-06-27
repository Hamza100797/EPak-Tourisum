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
 <?php 
 
 
// Updating Fotm Part 
// Updating Part 
if (isset($_POST['submit'])){
  $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());

    $userid = mysqli_real_escape_string($conn,$_POST['user_id']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname =mysqli_real_escape_string($conn,$_POST['lname']);
    $username =mysqli_real_escape_string($conn,$_POST['username']);
    $email =mysqli_real_escape_string($conn,$_POST['email']);

    $phone =mysqli_real_escape_string($conn,$_POST['phone']);
    $role =mysqli_real_escape_string($conn,$_POST['role']);
    $gender =mysqli_real_escape_string($conn,$_POST['gender']);
    $fb =mysqli_real_escape_string($conn,$_POST['fb']);
    $twitter =mysqli_real_escape_string($conn,$_POST['twitter']);
    $youtube =mysqli_real_escape_string($conn,$_POST['youtube']);
    $website =mysqli_real_escape_string($conn,$_POST['website']);
    $image =mysqli_real_escape_string($conn,$_POST['image']);

    $easypasia =mysqli_real_escape_string($conn,$_POST['easypasia']);
    $jazzcash =mysqli_real_escape_string($conn,$_POST['jazzcash']);
    $instagram =mysqli_real_escape_string($conn,$_POST['instagram']);
    // $password =mysqli_real_escape_string($conn,md5($_POST['password']));
  
    
    $sqluserUpdate ="UPDATE users SET fname ='{$fname}', lname ='{$lname}',username ='{$username}', email ='{$email}' ,phone ='{$phone}',role ='{$role}', gender ='{$gender}', fb ='{$fb}' ,twitter ='{$twitter}',youtube ='{$youtube}',  website ='{$website}', image ='{$image}', easypasia ={$easypasia}, jazzcash ={$jazzcash},instagram ='{$instagram}' WHERE user_id ={$userid}";

        if (mysqli_query($conn,$sqluserUpdate)){
          header("Location: http://localhost/epaktourisum/admin/adminDashboard/index.php");
        }
  
    
    }
 
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

 <?php  include "particles/headsec.php"?>
 <link rel="stylesheet" href="adminDashboardfilies/dist/css/neweditform.css">
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
    <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class=" col-md-12">
                    <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_GET['id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){

                    ?>

                  <!-- Form Start -->
                  <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header my-2">
							<h1>Edit Profile</h1>
						</div>
            <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
							<div class="row">
								<div class="col-sm-7">
									<div class="form-group">
										<span class="form-label">User ID</span>
										<input type="hidden" name="user_id"  class="form-control" value="<?php echo$row['user_id']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">First Name</span>
										<input type="text" name="fname" class="form-control" value="<?php echo$row['fname']?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Last Name</span>
										<input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Email</span>
								<input type="text" name="email" class="form-control" value="<?php echo$row['email']; ?>" placeholder="" >
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">User Name</span>
										<input type="text" name="username" class="form-control" value="<?php echo$row['username']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Phone Number</span>
										<input type="text" name="phone" class="form-control" value="<?php echo$row['phone']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Role</span>
										<input type="text" name="role" class="form-control" value="<?php echo$row['role']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Gender</span>
										<input type="text" name="gender" class="form-control" value="<?php echo$row['gender']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">FaceBook</span>
										<input type="text" name="fb" class="form-control" value="<?php echo$row['fb']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Instagram</span>
										<input type="text" name="instagram" class="form-control" value="<?php echo$row['instagram']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">YouTube</span>
										<input type="text" name="youtube" class="form-control" value="<?php echo$row['youtube']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Website/Blog</span>
										<input type="text" name="website" class="form-control" value="<?php echo$row['website']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Twitter</span>
										<input type="text" name="twitter" class="form-control" value="<?php echo$row['twitter']; ?>" placeholder="" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Easypasia Account</span>
										<input type="text" name="easypasia" class="form-control" value="<?php echo$row['easypasia']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Jazzcash Account</span>
										<input type="text" name="jazzcash" class="form-control" value="<?php echo$row['jazzcash']; ?>" placeholder="" >
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<span class="form-label">Profile Image</span>
										<input type="file" name="image" class="form-control" value="<?php echo$row['image']; ?>" placeholder="" >
									</div>
								</div>
							</div>

						<div class="row">
                <div class="col-sm-4">
                    <div class="form-btn">
                      <input type="submit" name="submit" class="btn btn-primary" value="Update"  />
                    </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="form-btn">
                      <a href="delete_inline.php?id=<?php echo $row['user_id']; ?>"> <div class="delicon"><i class="fas fa-trash delicon" data-toggle="tooltip" data-placement="top" title="Delete User"></i></div> </a>
                      </div>
                  </div>
                </div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

                  <?php 
                        }
                     }
                  ?>
                  <!-- /Form -->
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


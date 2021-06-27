<?php
  $userid=$_GET['id']; 
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
if (isset($_POST['submit'])){
    $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
  
      $reservation_id  = mysqli_real_escape_string($conn,$_POST['reservation_id']);
    
      $name =mysqli_real_escape_string($conn,$_POST['name']);
      $email =mysqli_real_escape_string($conn,$_POST['email']);
      $phone =mysqli_real_escape_string($conn,$_POST['phone']);
  
      $pickuppoint =mysqli_real_escape_string($conn,$_POST['pickuppoint']);
      $noadult =mysqli_real_escape_string($conn,$_POST['noadult']);
      $childrens =mysqli_real_escape_string($conn,$_POST['childrens']);
      $paymentmethod =mysqli_real_escape_string($conn,$_POST['paymentmethod']);
      $paymentmobile =mysqli_real_escape_string($conn,$_POST['paymentmobile']);
      $destinationform =mysqli_real_escape_string($conn,$_POST['destinationform']);
      $destinationto =mysqli_real_escape_string($conn,$_POST['destinationto']);
      $dateform =mysqli_real_escape_string($conn,$_POST['dateform']);
  
      $dateto =mysqli_real_escape_string($conn,$_POST['dateto']);
      $eventdays =mysqli_real_escape_string($conn,$_POST['eventdays']);
  

    
       $action =mysqli_real_escape_string($conn,$_POST['action']);
       $ticketnum =mysqli_real_escape_string($conn,$_POST['ticketnum']);
       $date =mysqli_real_escape_string($conn,$_POST['date']);
        $comments =mysqli_real_escape_string($conn,$_POST['comments']);
      
      $sqluserUpdate ="UPDATE tourreservation SET name ='{$name}', email ='{$email}',phone ='{$phone}', pickuppoint ='{$pickuppoint}' ,noadult ={$noadult},childrens ={$childrens}, paymentmethod ='{$paymentmethod}', paymentmobile ='{$paymentmobile}' ,destinationform ='{$destinationform}',destinationto ='{$destinationto}',  dateform ='{$dateform}', dateto ='{$dateto}', eventdays ={$eventdays}, action ='{$action}', ticketnum ='{$ticketnum}', date ='{$date}',comments ='{$comments}' WHERE reservation_id  ={$userid}"; 
  
          if (mysqli_query($conn,$sqluserUpdate)){
            header("Location: http://localhost/epaktourisum/admin/eventOrg_dash/invoicelist.php");
          }
    
      
      }
   
   
   ?>







<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
      <!-- {{!-- own css  --}} -->
    <!-- <link rel="stylesheet" href="/eventOrg_dashboard_files/dist/css/editprofile_utlitiy.css">
    <link rel="stylesheet" href="/eventOrg_dashboard_files/dist/css/editperofile.css"> -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="public/eventOrg_dashboard_files/dist/css/reservationedit.css">
    <?php include "particles/eventOrgheadSeclinks.php"?>
   

</head>

<body>

    <?php include "particles/eventOrg_preloader.php"?>


    <div id="main-wrapper">
         <!-- Header  -->
         <?php include "particles/eventOrgheader.php"?>
             <!-- sidebarMenu  -->
             <?php include "particles/eventOrgSidebarMenu.php"?>

<!-- Update Section  -->
        <div class="page-wrapper">
        <section class="content">

<h1>Welcome Back! <span class="" style="font-family: Georgia, 'Times New Roman', Times, serif;">
        <?php echo $_SESSION['user']['fname'];?>
    </span> </h1>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class=" col-md-12">
                <?php 
             $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $userid=$_GET['id']; 
                $sqlrecord="SELECT * FROM tourreservation WHERE reservation_id ={$userid}"; 
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
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <span class="form-label">User ID</span>
                                                    <input type="hidden" name="reservation_id" class="form-control"
                                                        value="<?php echo$row['reservation_id']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">First Name</span>
                                                    <input type="text" name="name" class="form-control"
                                                        value="<?php echo$row['name']?>" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Email</span>
                                                    <input type="text" name="email" class="form-control"
                                                        value="<?php echo $row['email']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <span class="form-label">Phone Number</span>
                                            <input type="text" name="phone" class="form-control"
                                                value="<?php echo$row['phone']; ?>" placeholder="" readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Pickup Point</span>
                                                    <input type="text" name="pickuppoint" class="form-control"
                                                        value="<?php echo$row['pickuppoint']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Total Persons</span>
                                                    <input type="text" name="noadult" class="form-control"
                                                        value="<?php echo$row['noadult']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">#of Children</span>
                                                    <input type="text" name="childrens" class="form-control"
                                                        value="<?php echo$row['childrens']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Paymentmethod</span>
                                                    <input type="text" name="paymentmethod" class="form-control"
                                                        value="<?php echo$row['paymentmethod']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">PaymentMobile</span>
                                                    <input type="text" name="paymentmobile" class="form-control"
                                                        value="<?php echo$row['paymentmobile']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Destination Form</span>
                                                    <input type="text" name="destinationform" class="form-control"
                                                        value="<?php echo$row['destinationform']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Destination To</span>
                                                    <input type="text" name="destinationto" class="form-control"
                                                        value="<?php echo$row['destinationto']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Date Form</span>
                                                    <input type="date" name="dateform" class="form-control"
                                                        value="<?php echo$row['dateform']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Date To</span>
                                                    <input type="date" name="dateto" class="form-control"
                                                        value="<?php echo$row['dateto']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Total Days</span>
                                                    <input type="text" name="eventdays" class="form-control"
                                                        value="<?php echo$row['eventdays']; ?>" placeholder=""
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <span class="form-label">Event Name & ID</span>
                                                    <input type="text" name="eventname" class="form-control"
                                                        value="<?php echo$row['eventname']; ?> & <?php echo$row['event_id']; ?>"
                                                        placeholder="" readonly>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row ">
                                            <div class="col-sm-6 mt-4">
                                            <div class="input-group mb-3">
                                            <select class="custom-select" id="inputGroupSelect02" name="action">
                                                <option selected>Choose...</option>
                                                <option value="Payment Conformed">Payment Conformed</option>
                                                <option value="Partial Amount Recieved">Partial Amount Recieved</option>
                                                <option value="Payment Rejected">Payment Rejected</option>
                                            </select>
                                            <div class="input-group-append">
                                                <label class="input-group-text" for="inputGroupSelect02">Payments</label>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Ticket Number</span>
                                                    <input type="text" name="ticketnum" class="form-control"
                                                        value="<?php echo$row['ticketnum']; ?>" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Date</span>
                                                    <input type="date" name="date" class="form-control"
                                                        value="<?php echo$row['date']; ?>" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <span class="form-label">Comments</span>
                                                    <input type="text" name="comments" class="form-control"
                                                        value="<?php echo$row['comments']; ?>" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-btn">
                                                    <input type="submit" name="submit" class="btn btn-primary"
                                                        value="Update" />
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
        <?php include "particles/eventOrgfooter.php"?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
</body>

</html>
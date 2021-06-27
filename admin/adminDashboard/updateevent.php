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
<link rel="stylesheet" href="adminDashboardfilies/public/eventOrg_dashboard_files/dist/css/createevent.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php  include "particles/headsec.php"?>
<style> a {text-decoration: none;} </style>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


<div class="wrapper">
  <!-- Navbar -->
  <?php  include "particles/navar.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php  include "particles/sidebar.php"?>

            <div class="container-fluid px-5">
            <div class="create_event">
        <div id="booking" class="section">
          <div class="section-center">
            <div class="container">
              <div class="row">
                <div class="booking-form">
                  <div class="form-header">
                    <h1>Create A Events</h1>
                  </div>
                  <?php 
                        $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                        $userid=$_GET['id'];
                        $sqlrecord="SELECT * FROM tourevents WHERE event_id   ={$userid}"; 
                        $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                        if(mysqli_num_rows($recordResult)>0){
                        while($row =mysqli_fetch_assoc($recordResult)){

                    ?>
                  <form action="updateeventformdata.php?id=<?php echo$row['event_id'] ?>" method="POST" enctype="multipart/form-data" >

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="event_name"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Event" id="event_name"
                            required   name="eventname" value="<?php echo $row['eventname']?>"/>
                          <span class="form-label">Event Name:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventorg"> </label>
                          <input class="form-control" type="text" placeholder="Enter Your Event Orgnaization Name "
                            id="event_org"  name="eventorg" required value="<?php echo $row['eventorg']?>"/>
                          <span class="form-label">Orgazation Name:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="number" placeholder="Enter Total Number Of Days "
                            id="eventdays" name="eventdays" required value="<?php echo $row['eventdays']?>" />
                          <span class="form-label">No of Days:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="event_type"> </label>
                          <div class="rs-select2 js-select-simple select--no-search">
                                <select name="type" class=" form-control"  value="<?php echo $row['type']?>" >
                                   <option class="form-control" vaule="bookingopen"  selected="selected">Booking Start</option>    
                                   <option class="form-control"  vaule="bookingclosed">Booking Closed</option>
                                    <option class="form-control" vaule="featured">Featured</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                          <span class="form-label">Type Of Trip:</span>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                          <label for="destinationform"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Destination From"
                            id="destinationform" required  name="destinationform" value="<?php echo $row['destinationform']?>"/>
                          <span class="form-label">Destination From:</span>
                        </div>
                        <div class="col-md-6">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="destinationto" id="event_name" required
                          name="destinationto" value="<?php echo $row['destinationto']?>"/>
                          <span class="form-label">Destination To:</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <!-- <label for="event_date_from"></label>  -->
                          <input class="form-control" type="date" required id="event_date_from" name="datefrom" value="<?php echo $row['datefrom']?>" />
                          <span class="form-label">Date From</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="date" required  name="dateto" value="<?php echo $row['dateto']?>"/>
                          <span class="form-label">Date To</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 1"
                            id="destinationfrom" required  name="place1" value="<?php echo $row['place1']?>"  />
                          <span class="form-label">Visted Place 1:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 2" id="event_name" required
                          name="place2" value="<?php echo $row['place2']?>"/>
                          <span class="form-label">Visted Place 2:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 3" id="event_name" required
                          name="place3" value="<?php echo $row['place3']?>" />
                          <span class="form-label">Visted Place 3:</span>
                        </div>

                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 4"
                            id="place4"  name="place4" value="<?php echo $row['place4']?>" />
                          <span class="form-label">Visted Place 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 5" id="event_name" required
                          name="place5" value="<?php echo $row['place5']?>" />
                          <span class="form-label">Visted Place 5:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Name Of Visted Place 6" id="event_name" required
                          name="place6"value="<?php echo $row['place6']?>" />
                          <span class="form-label">Visted Place 6:</span>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="tripdescription">
                            <label for="tripdescription"> </label>
                            <textarea name="tripdescription" id="tripdescription" cols="30" rows="30" class="form-control"
                              defaultValue=""><?php echo $row['tripdescription']?>"</textarea>
                            <span class="form-label">Trip Description:</span>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 1"
                            id="destinationfrom" required  name="service1" value="<?php echo $row['service1']?>" />
                          <span class="form-label">Service 1:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 2" id="event_name" required
                          name="service2" value="<?php echo $row['service2']?>"/>
                          <span class="form-label">Service 2:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 3" id="event_name" required
                          name="service3" value="<?php echo $row['service3']?>"/>
                          <span class="form-label">Service 3:</span>
                        </div>

                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 4"
                            id="place4" required  name="service4" value="<?php echo $row['service4']?>" />
                          <span class="form-label">Service 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 5" id="event_name" required
                          name="service5" value="<?php echo $row['service5']?>"/>
                          <span class="form-label">Service 5:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Service Provided 6" id="event_name" required
                          name="service6" value="<?php echo $row['service6']?>" />
                          <span class="form-label">Service 6:</span>
                        </div>

                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="tripdescription">
                            <label for="tripdescription"> </label>
                            <textarea name="servicesnot" id="tripdescription" cols="15" rows="15" class="form-control"
                              defaultValue=""><?php echo $row['servicesnot']?>"</textarea>
                            <span class="form-label">Services Not Inculdes:</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="event_name"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Location Name Pickup Point 1" id="event_name"
                            required   name="pick1" value="<?php echo $row['pick1']?>"/>
                          <span class="form-label">Pick Up Point 1:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="event_org"> </label>
                          <input class="form-control" type="text" placeholder="Time of Arrival At PickUp Point "
                            id="event_org"  name="picktime1" required value="<?php echo $row['picktime1']?>" />
                          <span class="form-label">Time For Pickup:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="text" placeholder="Enter The Location Name Pickup Point2 "
                            id="eventdays" name="pick2" required value="<?php echo $row['pick2']?>" />
                          <span class="form-label">Pick Up Point 2:</span>
                        </div>
                        <div class="col-md-3">
                          <label for="eventdays"> </label>
                          <input class="form-control" type="text" placeholder="Time of Arrival At PickUp Point "
                            id="eventdays" name="picktime2" required value="<?php echo $row['picktime2']?>" />
                          <span class="form-label">Time For Pickup:</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_includes"> </label>
                          <input class="form-control" type="number" placeholder="Charges Per Head:"
                            id="services_includes" required  name="perhead" value="<?php echo $row['perhead']?>" />
                          <span class="form-label">PerHead Charge RS/-:</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_not_includes"> </label>
                          <input class="form-control" type="email" placeholder="Enter your contact Email:"
                            id="services_not_includes" required name="email" value="<?php echo $row['email']?>" />
                          <span class="form-label">Email@:</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="services_not_includes"> </label>
                          <input class="form-control" type="number" placeholder="Enter Your Contact Number:"
                            id="services_not_includes" required name="phone" value="<?php echo $row['phone']?>" />
                          <span class="form-label">Contact at:</span>
                        </div>
                      </div>
                    </div>


                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                            <label for="Addtional Charges"> </label>
                            <textarea name="addcomment" id="tripdescription" cols="30" rows="30" class="form-control"
                              defaultValue=""><?php echo $row['addcomment']?>" </textarea>
                            <span class="form-label">Addtional comment:</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="destinationfrom"> </label>
                          <input class="form-control" type="text" placeholder="www.facebook.com/"
                            id="place4" required  name="fb" value="<?php echo $row['fb']?>" />
                          <span class="form-label">Facebook link 4:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="www.instagram.com" id="event_name" required
                          name="instagram" value="<?php echo $row['instagram']?>" />
                          <span class="form-label">Instagramc link:</span>
                        </div>
                        <div class="col-md-4">
                          <label for="destinationto"> </label>
                          <input class="form-control" type="text" placeholder="www.youtube.com" id="event_name" required
                          name="youtube" value="<?php echo $row['youtube']?>" />
                          <span class="form-label">Youtube link:</span>
                        </div>

                      </div>
                    </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="media_for_trip"> </label>
                              <input class="form-control" type="file" id="media_for_trip" multiple
                                style="padding-top: 20px " name="image" value="<?php echo $row['image']?>" />
                              <span class="form-label w-100">Images/Videos/Demos For Trip: 📷</span>
                            </div>
                          </div>
                          <div class="form-btn" style="margin-top: 20px">
                            <button class="submit-btn">Create Now</button>
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
      </div>
   

           

            <?php 
                    }
                }
                ?>
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

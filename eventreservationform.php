<?php 
$eventname=$_GET['name'];
$event_id=$_GET['eventid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "particles/pageheadsec.php"?>
   <link rel="stylesheet" href="public/style/bootstrap_min.css">
   <link rel="stylesheet" href="public/style/touristGuider.css">
   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

<link rel="stylesheet" href="public/style/eventreservationform.css">
</head>

<body>
   
    <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  

    <!-- Main Contect  -->
    <div class="main_contect">
    <div class="touristGuider_header">
            <div class="touristGuider_header_txt">
              <h1>Find Upcoming Event</h1>
              <form class="search" action="eventpagesearch.php" method="GET">
              <input class="bar text-center" type="text" placeholder="Search Places To Know About [EventOrg/Places/NeareastLocation/DestinationFrom/Perhead]" name="result" style="background-color: grey;color:white;font: weight 700px;"/>
                <button><i class="fas fa-search"></i></button>
            </form>
            </div>
          </div>
          <div><h1 class="text-center my-3 mx-auto">Booking Event: <span style="color: green; font-size:42px"> <?php echo $_GET["name"] ?> </span>  </h1></div>
                  <!-- Tourist Data  -->
        <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());

                       $sqlrecord="SELECT * FROM tourevents WHERE eventname='{$eventname}' and event_id={$event_id}"; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
                <div class="reservationevent">
                <div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form action="reservationdata.php" method="POST">
							<div class="row">
								<span class="form-label">Tourest Personal Information</span>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Name</span>
										<input class="form-control" type="text" placeholder="Enter Your name" name="name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Email</span>
										<input class="form-control" type="email" placeholder="Enter your Email" name="email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Phone </span>
										<input class="form-control" type="text" required placeholder="Enter Your Number" name="phone">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Pick up Point</span>
										<input class="form-control" type="text" required name="pickuppoint">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Adults (18+)</span>
										<input class="form-control" type="number" min ="1" max="10" placeholder="Enter No Of Reservation Seats" name="noadult">
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Children (0-17)</span>
										<select class="form-control" name="childrens">
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Payment Method</span>
										<select class="form-control" name="paymentmethod">
											<option>EasyPasia</option>
											<option>JazzCash</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-5">
										<div class="form-group">
											<span class="form-label">Payment Mobile Number</span>
											<input class="form-control" type="number"  placeholder="Enter Your Payment Amount Number" name="paymentmobile">
											
										</div>
									</div>
								</div>
							</div>
                            
							<span class="form-label">Event Details</span>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Destination From</span>
										<input class="form-control" type="text" placeholder="City or airport"  name="destinationform" value="<?php echo$row['destinationform']?>" readonly="readonly" >
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Destination To</span>
										<input class="form-control" type="text" placeholder="City or airport" value="<?php echo$row['destinationto']?>" name="destinationto" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Date Form</span>
										<input class="form-control" type="date" value="<?php echo$row['datefrom']?>" readonly="readonly" name="dateform">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Date To</span>
                                     
										<input class="form-control " type="date"  value="<?php echo$row['dateto']?>" readonly="readonly" name="dateto">
									</div>
                                </div>    
								<input class="form-control " type="number"  value="<?php echo$row['eventdays']?>" hidden name="eventdays">
                                <input class="form-control " type="number"  value="<?php echo$row['eventdays']?>" hidden name="event_id">
							
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Event Orgnaizor</span>
										<input class="form-control" type="text" placeholder="Event Orgnazaior"  value="<?php echo$row['eventorg']?>" readonly="readonly" name="eventorg">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Event Name</span>
										<input class="form-control" type="text" placeholder="Event Name"  value="<?php echo$row['eventname']?>" readonly="readonly" name="eventname">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-8">
									<div class="form-group">
										<span class="form-label">Services Inculdes</span>
										<input class="form-control" type="text" placeholder="Services includes"  value="<?php echo$row['service1']?> & <?php echo$row['service2']?> & <?php echo$row['service3']?> & <?php echo$row['service4']?> & <?php echo$row['service5']?> & <?php echo$row['service6']?>"  readonly="readonly" name="services">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center ">
                            <div class="col-md-8">
									<div class="form-group">
										<span class="form-label">Visted Places </span>
										<input class="form-control" type="text" placeholder="Services includes" required value="<?php echo$row['place1']?> & <?php echo$row['place2']?> & <?php echo$row['place3']?> & <?php echo$row['place4']?> & <?php echo$row['place5']?> & <?php echo$row['place6']?>"  readonly="readonly" name="places">
									</div>
								</div>

							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn" type="submit" value="submit" name="submit">Book Now</button>
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

 
    </div>




            <!-- footer  -->
            <?php include "particles/mainfooter.php" ?>
        </div>
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
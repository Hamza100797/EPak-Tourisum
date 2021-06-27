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
   <link rel="stylesheet" href="public/style/upcomingevents.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    <style>
    .search input {width: 950px;} 
    ::placeholder {color: lightsteelblue; font-weight: 700;font-size: 18px; }</style>
<link rel="stylesheet" href="public/style/bookingpop.css">
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
          <div><h1 class="text-center my-5 py-3 mx-auto">Booking Event: <span style="color: green; font-size:42px"> <?php echo $_GET["name"] ?> </span>  </h1></div>
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
						<div class="booking-bg">
							<div class="form-header">
								<h2>Make your reservation</h2>
                                <p class="">Destination Form: <span style="color: green; font-size:28px"> <?php echo $row["destinationform"] ?> </span>  </p>
                                <p class="">Destination TO: <span style="color: green; font-size:28px"> <?php echo $row["destinationto"] ?> </span>  </p>
                                <p class="">Date Form: <span style="color: green; font-size:28px"> <?php echo $row["datefrom"] ?> </span>  </p>
                                <p class="">Date TO: <span style="color: green; font-size:28px"> <?php echo $row["dateto"] ?> </span>  </p>
                                <p class="">Event Organazior: <span style="color: green; font-size:28px"> <?php echo $row["eventorg"] ?> </span>  </p>
							</div>
						</div>
						<form>
							<div class="row">
                            <div><h1 class="text-center ">Booking Event: <span style="color: green; font-size:32px"> <?php echo $_GET["name"] ?> </span>  </h1></div>
    
							<div class="form-btn">
								<button class="submit-btn" > <a href="eventreservationform.php?name=<?php echo$row['eventname'] ?>&eventid=<?php echo$row['event_id'] ?>">Continue Without Login</a> </button>
							</div>
                            <div class="form-btn">
								<button class="submit-btn" ><a href="login.php">Login TO Dashboard</a></button>
							</div>
                            <div class="form-btn">
								<button class="submit-btn" ><a href="signup.php">New? Register as Tourist</a></button>
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
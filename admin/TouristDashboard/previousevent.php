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
<html dir="ltr" lang="en">

<head>
<?php include "particles/touristdash_headlinks.php"?>
<link rel="stylesheet" href="public/touristdashboard_filies/dist/css/allevents.css">
</head>

<body>
<?php include "particles/touristdash_commonsections.php"?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">All Upcoming Events</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Event Diray</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div><h1 class="text-center my-2 py-2 mx-auto">Upcoming Events</h1></div>
            <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $limit=5;

                if(isset($_GET['page'])){
                $pageNo=$_GET['page']; 
                }else{
                    $pageNo=1;
                }

               $offset = ($pageNo -1 )* $limit;

                       $sqlrecord="SELECT * FROM tourevents ORDER BY event_id  DESC LIMIT  {$offset},{$limit}"; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
            <div class="dark pt-5">
                <main class="container py-4">
                    <article class="postcard dark blue">
                        <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="../../admin/eventOrg_dash/public/eventOrg_dashboard_files/upload<?php echo$row['image']?>" alt="Image Title" />        
                        </a>
                        <div class="postcard__text ">
                            <h1 class="postcard__title blue"><a href="#"><?php echo$row['eventname']?></a></h1>
                       <h6 class="postcard__title blue "><a href="#"><?php echo$row['eventorg']?></a></h6>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i> <span class="mr-3" style="color: green; font-size:15px"><?php echo$row['datefrom']?></span>  TO <span class="ml-3" style="color: blue;font-size:15px"><?php echo$row['dateto']?></span>
                                </time>
                            </div>

                            <div class="postcard__subtitle small">
                     <span style="font-size:20px"> DestinationFrom:</span>   <span class="mr-3 ml-3" style="color: green; font-size:20px"><?php echo$row['destinationform']?></span>  <span style="font-size:20px"> Destination To:</span>  <span class="ml-3" style="color: blue;font-size:20px"><?php echo$row['destinationto']?></span>
                            </div>


                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt"><?php echo$row['tripdescription']?></div>
                            <div class="postcard__subtitle small">
                     <h4 style="font-weight: 900; font-size: 22px; color: green; display: inline-block"> <i class="fab fa-angellist mr-2 "></i>Services Inculdes: </h4>  

                     <ul class="postcard__tagbox">
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1 "></i><?php echo$row['service1']?></li>
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1 "></i><?php echo$row['service2']?></li>
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1 "></i><?php echo$row['service3']?></li>
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1 "></i><?php echo$row['service4']?></li>
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1"></i><?php echo$row['service5']?></li>
                        <li class="tag__item py-3"><i class="fas fa-tag mr-1"></i><?php echo$row['service6']?></li>
                    </ul>
                    </div>

                    <div class="row ">
                        <div class="col-md-6 my-2 d-flex justify-content-center align-content-center">
                        <button type="button" class="btn btn-outline-info mt-3  px-4 pt-2"><a href="../../upcomingevents.php">Find Details</a></button>
                            
                        </div>
                        <div class="col-md-6 d-flex justify-content-center align-content-center">
                        <div class="button my-2">
                            <div class="default"></div>
                            <button type="button" class="btn btn-outline-success mt-3  px-4 pt-2"><a href="../../eventbookingmethod.php?name=<?php echo$row['eventname'] ?>&eventid=<?php echo$row['event_id'] ?>">Book Now</a></button>
                            
                        </div>
                        </div>
                    </div>
                        </div>
                    </article>
                </main>
            </div>



<?php 
                      }
                    }

                  $sqlpagination="SELECT * FROM tourevents";
                $paginationResult=mysqli_query($conn, $sqlpagination) or die("Query Failed 2");
                if(mysqli_num_rows($paginationResult)>0){
                        $totalRecord=mysqli_num_rows($paginationResult);
                      
                        $totalpages =ceil($totalRecord/$limit);
                      
                        echo" <ul class='pagination admin-pagination mt-3 ml-4 mx-1'>";
                        if ($pageNo>1){
                            echo '<li class="page-item"><a class="page-link" href="previousevent.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="previousevent.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="previousevent.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                       
                }
                ?>



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
            <!--This page plugins -->
            <script src="public/touristdashboard_filies/assets/extra-libs/DataTables/datatables.min.js"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
            <script>
                //=============================================//
                //    File export                              //
                //=============================================//
                $('#file_export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
            </script>
</body>

</html>
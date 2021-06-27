<?php 
            $destinationto=$_GET['destinationto']; 
            $dateform=$_GET['dateform'];
            $dateto=$_GET['dateto'];
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
    <style>   .search input {width: 950px;} ::placeholder {color: lightsteelblue; font-weight: 700;font-size: 18px; }</style>

</head>

<body>
   
    <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  

    <!-- Main Contect  -->
    <div class="main_contect">
    <div class="touristGuider_header">
           
          </div>

          <div><h1 class="text-center my-5 py-3 mx-auto">Matching Upcoming Events Found: <span style="color: green; font-size:32px"> <?php echo $_GET["destinationto"] ?> <br> </span>
           DateFrom:<span style="color: green; font-size:32px; margin-right:10px;"> <?php echo $_GET["dateform"] ?> <br> </span>
           
           DateTo: <span style="color: green; font-size:32px; margin-right:10px;"> <?php echo $_GET["dateto"] ?> </span> </h1></div>
         <!-- Tourist Data  -->
        <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $limit=5;



                if(isset($_GET['page'])){
                $pageNo=$_GET['page']; 
                }else{
                    $pageNo=1;
                }

               $offset = ($pageNo -1 )* $limit;

                     
              $sqlrecord="SELECT * FROM tourevents WHERE destinationto LIKE '%{$destinationto}%' AND `datefrom` LIKE '{$dateform}%' and dateto LIKE '{$dateto}%' 
               "; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
 <div class=" " id="">

 <div class="">
        <main class="container ">   
            <article class="postcard dark blue">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="./admin/eventOrg_dash/public/eventOrg_dashboard_files/upload<?php echo$row['image']?>" alt="Image Title" />                  
                </a>
                <div class="postcard__text">
                    <h1 style="font-weight: 900; font-size: 52px; color: green; display: inline-block;" class="postcard__title blue"><a href="#"><?php echo$row['eventname']?></a></h1>
                    <h4 class="postcard__title blue ml-4 pl-3"><a href="#"><?php echo$row['eventorg']?></a></h4>
                    <ul class="postcard__tagbox d-flex justify-content-start">
                        <li class="tag__item py-3 px-4"><i class="fas fa-stopwatch mr-1" style="color: rgb(232, 232, 233);font-size: 18px;"></i><?php echo$row['eventdays']?> Trip </li> <br>
                    </ul>
                    <ul class="postcard__tagbox d-flex justify-content-end">
                        <li class="tag__item py-3 "><i class="fas fa-stopwatch mr-1" style="color: rgb(232, 232, 233);font-size: 18px;"></i><?php echo$row['type']?></li> <br>
                    </ul>
                    
                    <ul class="postcard__tagbox">                          
                        <li class="tag__item bg-success py-2"><i class="fas fa-calendar-alt "></i><span class="mx-1">Date From:</span> <?php echo$row['datefrom']?> </li>
                        <span class="mx-2">TO</span>
                        <li class="tag__item bg-danger py-2"><i class="fas fa-calendar-alt "></i><span class="mx-1">Date To:</span><?php echo$row['dateto']?> </li>
                    </ul>
                  
                    <ul class="postcard__tagbox">
                        <li class="tag__item bg-info py-2"><i class="fas fa-map-marker-alt"></i><span class="mx-1">Destination  From:</span> <?php echo$row['destinationform']?> </li>
                        <span class="mx-2">TO</span>
                        <li class="tag__item bg-gradient-success py-2"><i class="fas fa-map-marker-alt"></i><span class="mx-1">Destination To:</span><?php echo$row['destinationto']?></li>
                    </ul>
    
                    
                    <ul class="postcard__tagbox">
                        <h6 class="my-2 mx-3">Visted Places:</h6>

                        <li class="tag__item py-3 "><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place1']?></li>
                        <li class="tag__item  py-3"><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place2']?></li></li>
                        <li class="tag__item  py-3"><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place3']?></li></li>
                        <li class="tag__item  py-3"><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place4']?></li></li>
                        <li class="tag__item  py-3"><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place5']?></li></li>
                        <li class="tag__item  py-3"><i class="fas fa-thumbtack mr-1"></i><?php echo$row['place6']?></li></li>
                    </ul>
    
    
    
    
    
    
                    <h1 class="postcard__title blue my-3"><a href="#">Event-ID-<?php echo$row['event_id']?></li></a></h1>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="far fa-comment-dots mx-3 d-inline" style="color: green;font-size: 33px;"></i> <h3 class="d-inline">Trip Descriptation</h3>
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt"><h6 style="font-size: 18px;"><?php echo$row['tripdescription']?></h6></div>

                    <div class="perheadCharges">
                        <h1 style="font-weight: 900; font-size: 72px; color: green; display: inline-block;">P</h1><p style="display: inline-block;">er Head <?php echo$row['perhead']?></p>: 
                    </div>

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


                    <div class="postcard__subtitle small my-4">
                        <p style="font-weight: 900; font-size: 22px; color: rgba(228, 24, 24, 0.911); display: inline"> <i class="fab fa-angellist mr-2 "></i> </p>
                           <h4 class="d-inline"> Services Not Inculdes: </h4>  
                        <div class="postcard__preview-txt mr-4 pr-4"><h4> <?php echo$row['servicesnot']?> </h4></div>
                  
                       </div>  


                       <div class="postcard__subtitle small">
                     <h4 style="font-weight: 900; font-size: 22px; color: blue; display: inline-block"> <i class="fas fa-bus mr-2 "></i>Pick Up Points: </h4>  

                     <ul class="postcard__tagbox">
                        <li class="tag__item py-3 "><i class="fas fa-bus mr-1 "></i><?php echo$row['pick1']?> <i class="fas fa-clock ml-2"></i> <?php echo$row['picktime1']?></li> 
                        <li class="tag__item  py-3"><i class="fas fa-bus mr-1 "></i><?php echo$row['pick2']?> <i class="fas fa-clock ml-2"></i> <?php echo$row['picktime2']?></li>
                    </ul>
                    </div>
                   
                    <div class="contact d-inline my-4">
                        <p class="postcard__title red " style="display: inline-block; font-size: 20px;">
                            <span><i class="fas fa-phone"></i></span><a href="#"> <?php echo$row['phone']?> </a>
                            <span><i class="fas fa-envelope mx-2 "></i></span><a href="#"> <?php echo$row['email']?> </a>
                        </p>
                    </div>

                        <div>
                            <h6 class="tag__item contact  d-inline  mx-1 " style="font-size: 18px;">Easypasia NO: </h6> <span class=" "><?php echo$row['easypasia']?></span>
                            <h6 class="tag__item  contact d-inline  mx-1 " style="font-size: 18px;">Jazzcash NO: </h6> <span class=""><?php echo$row['jazzcash']?></span>
                        </div>
                        <div class="postcard__subtitle small my-4">
                        <p style="font-weight: 900; font-size: 22px; color: rgba(228, 24, 24, 0.911); display: inline"> <i class="fas fa-thumbtack"></i></p>
                           <h4 class="d-inline" style="font-size: 24px;"> Additional Note: </h4>  
                        <div class="postcard__preview-txt"><p style="font-size: 15px;"><?php echo$row['addcomment']?></p></div>
                  
                       </div>  
                       <div class="gallery d-flex justify-content-center align-content-lg-center my-3">
                        <div class="button my-2">
                            <div class="default"><a href="eventbookingmethod.php?name=<?php echo$row['eventname'] ?>&eventid=<?php echo$row['event_id'] ?>">Book Now</a></div>
                            <div class="hover"><a href="eventbookingmethod.php?name=<?php echo$row['eventname'] ?>&eventid=<?php echo$row['event_id'] ?>">Book Now</a></div>
                        </div>
                        <script>
                        $(".default, .hover").click(function(){
                            $(this).parent(".button").toggleClass('active');
                            })
                        </script>
                    </div>

                 
                    <div class="socialicon" >
                        <a href="<?php echo$row['fb']?>" class="mr-2"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="fab fa-facebook-f" style="font-size: 33px; color: blue;" ></i></a>
                        <a href="<?php echo$row['instagram']?>"  class="mr-2"  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-instagram" style="font-size: 33px; color: rgb(180, 124, 60);"></i></a>
                        <a href="<?php echo$row['youtube']?>" class="mr-2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="youtube" data-abc="true"><i class="fab fa-youtube" style="font-size: 33px; color: red;"></i></a>
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
                      
                        echo" <ul class='pagination admin-pagination'>";
                        if ($pageNo>1){
                            echo '<li class="page-item"><a class="page-link" href="upcomingevents.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="upcomingevents.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="upcomingevents.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                       
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
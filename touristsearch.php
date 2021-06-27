<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "particles/pageheadsec.php"?>
   <link rel="stylesheet" href="public/style/bootstrap_min.css">
   <link rel="stylesheet" href="public/style/touristGuider.css">
   <style> ::placeholder {color: lightsteelblue; font-weight: 700;font-size: 18px; }</style>
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
              <h1>Find Tourist Guider</h1>
              <form class="search" action="touristsearch.php" method="get">
              <input class="bar text-center" type="text" placeholder="Search Tourist Guider [Name/Email/Services/ServicesAera]" name="result" style="background-color: grey;color:white;font: weight 700px;">
                <button type="submit" > <i class="fas fa-search"></i> </button>
            </form>
            </div>
     </div>

<div><h1 class="text-center my-5 py-3 mx-auto">Matching Result: <span style="color: green; font-size:32px"> <?php echo $_GET["result"] ?> </span>  </h1></div>
        <!-- Tourist Data  -->
        <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $limit=6;

                if(isset($_GET['page'])){
                $pageNo=$_GET['page']; 
                }else{
                    $pageNo=1;
                }

               $offset = ($pageNo -1 )* $limit;
               $result=$_GET['result'];
                   
               $sqlrecord=  "SELECT * FROM touristguider WHERE displayName LIKE '%{$result}%' OR displayEmail LIKE '%{$result}%' OR displayPhone LIKE '%{$result}%'OR servicesaera LIKE '%{$result}%' OR	services LIKE '%{$result}%' ORDER BY touristguider_id DESC LIMIT  {$offset},{$limit}";
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");
                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
 <div class=" d-flex justify-content-center" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-4 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">

                                            <div class="m-b-25"> 
                                                <img src="admin/TouristDashboardGuider/TouristGuider_Dashboard/upload/<?php echo$row['image']?>" class="img-radius" alt="User-Profile-Image" style="width: 250px; height: 250px; border-radius: 100%">
                                             </div>

                                        <h6 class="f-w-600 head"><?php echo$row['displayName']?></h6>
                                       <h6 class="f-w-600 head"> <span><i class="fas fa-envelope mx-2 my-2"></i></span><?php echo$row['displayEmail']?></h6> 
                                       <h6 class="f-w-600"> <span><i class="fas fa-home mx-2 my-2"></i></span><?php echo$row['address']?></h6>
                                        <p><?php echo$row['aboutme']?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="f-w-400"><?php echo$row['displayEmail']?></h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="f-w-400"><?php echo$row['displayPhone']?></h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Services</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Services Offer</p>
                                                <h6 class="f-w-400"><?php echo$row['services']?> </h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Charges Per-Hours ~PKR</p>
                                                <h6 class="f-w-400"><?php echo$row['servicescharges']?> </h6>
                                            </div>
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600 p-25 py-3 my-4 head">Services Aeras</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="f-w-400"><?php echo$row['servicesaera']?> </h6>
                                            </div>
                                        </div>
                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="<?php echo$row['fb']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="<?php echo$row['twitter']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="<?php echo$row['instagram']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                        <button type="button" class="btn btn-outline-success text-center"><i class="fab fa-whatsapp"></i> <strong><?php echo$row['displayPhone']?></strong></button>
                                    </div>
                                   
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
                  <?php 
                      }
                    }
              
                
                  $sqlpagination="SELECT * FROM touristguider";
                $paginationResult=mysqli_query($conn, $sqlpagination) or die("Query Failed 2");
                if(mysqli_num_rows($paginationResult)>0){
                        $totalRecord=mysqli_num_rows($paginationResult);
                      
                        $totalpages =ceil($totalRecord/$limit);

                        echo" <ul class='pagination admin-pagination'>";
                        if ($pageNo>1){
                            echo '<li class="page-item"><a class="page-link" href="touristGuiderProfile.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="touristGuiderProfile.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="touristGuiderProfile.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                }
                ?>

 
    </div>


 
    
    <!-- Footer  -->
        <?php include "particles/mainfooter.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>



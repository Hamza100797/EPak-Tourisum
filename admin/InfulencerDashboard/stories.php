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
 <?php include "infulencerparticle/headsec.php"?>
 <link rel="stylesheet" href="Infulencer_Dashboard/public/style/bootstrap_min.css">
  <link rel="stylesheet" href="Infulencer_Dashboard/public/style/infulencer.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include "infulencerparticle/preloader.php"?>

  <!-- Navbar -->
  <?php include "infulencerparticle/navmenu.php"?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php include "infulencerparticle/sidebarmenu.php"?>




    <section class="content">
    <h1>Welcome Back! <span class="" style="font-family: Georgia, 'Times New Roman', Times, serif;"> <?php echo $_SESSION['user']['fname'];?> </span> </h1>
   
                   <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                     $user_id = $_SESSION['user']['user_id'];

                     $limit=6;

                     if(isset($_GET['page'])){
                     $pageNo=$_GET['page']; 
                     }else{
                         $pageNo=1;
                     }
     
                    $offset = ($pageNo -1 )* $limit;

                     $sqlrecord="SELECT * FROM infulencer where user_id = $user_id LIMIT  {$offset},{$limit}"; 
                      
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>   

  <!-- Influncer Card Data  -->
  <main class="container">
            <div class="h1 text-center" id="pageHeaderTitle"></div>
            <article class="postcard red mx-5 " style="margin: 0px 150px;">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="Infulencer_Dashboard/upload/<?php echo$row['image']?>" alt="Image Title" />	
                </a>
                <div class="postcard__text">
                    <h1 class="postcard__title red"><a href="#"><?php echo$row['displayname']?></a></h1>
                    <p class="postcard__title red"><a href="#"><?php echo$row['address']?></a></p>
                    <p class="postcard__title red"><span><i class="fas fa-envelope mx-2 "></i></span><a href="#"> <?php echo$row['displayemail']?></a></p>
                    <div class="postcard__subtitle small">
                        <p style="display: inline-block;">Posted: <h6 style="display: inline-block;"><span><i class="fas fa-calendar-week mx-2" style="color: aquamarine;" ></i></span><?php echo$row['posteddate']?></h6></p>

                        <div class="socialicon" >
                            <a href="<?php echo$row['fb']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="fab fa-facebook-f"></i></a>
                            <a href="<?php echo$row['instagram']?> " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="fab fa-instagram"></i></a>
                            <a href="<?php echo$row['youtube']?> " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="youtube" data-abc="true"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="postcard__bar"></div>
                    <h1><?php echo$row['Posttitle']?></h1>
                    <div class="postcard__preview-txt"> <?php echo$row['experience']?> </div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i> <?php echo$row['aeratag1']?> </li>
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i> <?php echo$row['aeratag2']?></li>
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i> <?php echo$row['aeratag3']?> </li>
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i> <?php echo$row['aeratag4']?> </li>
                    </ul>

                    <ul class="d-flex flex-row-reverse bd-highlight">
                    <li><a href="deletecard.php?id=<?php echo$row['influncer_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Profile Card" data-original-title="Delete Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-trash text-danger mx-2"></i></a></li> 
                     <li><a href="updatecard.php?id=<?php echo$row['influncer_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Profile Card" data-original-title="Edit Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-user-edit text-success"></i></a></li>
                    </ul>
                </div>
            </article>
        </main>
       
                  <?php 
                      }
                    }
                    $sqlpagination="SELECT * FROM infulencer";
                    $paginationResult=mysqli_query($conn, $sqlpagination) or die("Query Failed 2");
                    if(mysqli_num_rows($paginationResult)>0){
                            $totalRecord=mysqli_num_rows($paginationResult);
                          
                            $totalpages =ceil($totalRecord/$limit);
    
                            echo" <ul class='pagination admin-pagination'>";
                            if ($pageNo>1){
                                echo '<li class="page-item"><a class="page-link" href="stories.php?page='.($pageNo - 1).'">Previous</a></li>';
                            }
                            for($i=1; $i<=$totalpages; $i++){
                                if ($i == $pageNo){
                                    $active ="active";
                                }else {
                                    $active ="";
                                }
                              echo '<li class='.$active.'> <a href="stories.php?page='.$i.'"> '.$i.'</a> </li>';
                            }
                            if ($totalpages>$pageNo){
                                echo '<li class="page-item"><a class="page-link" href="stories.php?page='.($pageNo + 1).'">Next</a></li>';
                            }
                            echo "</ul>";
                    }
                ?>










    </section>
  </div>
 
  <!-- Main Footer -->
  <?php include "infulencerparticle/footer.php"?>
</div>



<script src="Infulencer_Dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="Infulencer_Dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Infulencer_Dashboard/dist/js/adminlte.js"></script>
</body>
</html>

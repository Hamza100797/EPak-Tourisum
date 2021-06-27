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
       <link rel="stylesheet" href="ExpolrePakistanDashboard/public/style/bootstrap_min.css">
        <link rel="stylesheet" href="ExpolrePakistanDashboard/public/style/expolrepakistan.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
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

   
  <section style="font-family: 'Noto Serif', serif;">
  <div>
  <h1 class="text-center my-3"> Blogs Posts</h1>
  </div>

       
      <div class="container">
          <div class="row">   
                    <!-- Explore Pakistan Data  -->
                    <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $limit=6;

                if(isset($_GET['page'])){
                $pageNo=$_GET['page']; 
                }else{
                    $pageNo=1;
                }

               $offset = ($pageNo -1 )* $limit;
               $user_id = $_SESSION['user']['user_id'];
                       $sqlrecord="SELECT * FROM expolrepakistan WHERE user_id = $user_id ORDER BY post_id  DESC LIMIT  {$offset},{$limit}"; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
                    <main class="container">   
                        <article class="postcard blue mx-5 " style="margin: 0px 150px;">
                            <a class="postcard__img_link" href="#">
                                  <img class="postcard__img" src="ExpolrePakistanDashboard/upload/<?php echo$row['image']?>" alt="BloggerProfile" />   
                            </a>
                            <div class="postcard__text">
                                <img src="ExpolrePakistanDashboard/public/assets/images/epaktourisumlogo.jpeg" alt="authorimg" class="authorimg mb-3">

                              <h1 class="postcard__title blue">
                                <a href="#" class="mapoverflow">
                                <label for="expdatalabel">Destination:
                                <span class="locationmain"><?php echo$row['destination']?> </span>
                              </label> 
                              </a>
                              </h1>
                              
                                <p class=" blue">
                                  <a href="#" class="mapoverflow">
                                    <label for="expdatalabel">Province:
                                    <span><?php echo$row['province']?> </span>
                                  </label>
                                  </a>
                                </p>
    
    
    
                                <p class="blue">
                                  <a href="#" class="mapoverflow"> 
                                    <label for="expdatalabel">Nearest Location: 
                                      <span><?php echo$row['nearestlocation']?> </span>
                                    </label>
                                   
                                  </a>
                                </p>
    
    
                                <p class="blue">
                                  <a href="#" class="mapoverflow">
                                    <label for="expdatalabel">Posted Date:
                                    <span>
                                    <?php echo$row['posteddate']?> 
                                    </span> 
                                  </label>
                                    </a>
                                  </p>
    
    
                                  <p class="blue">
                                    <a href="#" class="mapoverflow">
                                      <label for="expdatalabel">Author:
                                      <span class="authorname">
                                      <?php echo$row['displayname']?> 
                                      </span> 
                                    </label>
                                      </a>
                                    </p>

                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt">
                                <?php echo$row['tripdescription']?>  
                                </div>
                                <ul class="postcard__tagbox">
                                    <li class="tag__item" ><i class="fas fa-tag mr-2"></i> <?php echo$row['aeratag1']?> </li>
                                    <li class="tag__item" ><i class="fas fa-tag mr-2"></i><?php echo$row['aeratag2']?> </li>
                                    <li class="tag__item" ><i class="fas fa-tag mr-2"></i><?php echo$row['aeratag3']?> </li>
                                    <li class="tag__item" ><i class="fas fa-tag mr-2"></i><?php echo$row['aeratag4']?></li>
                                </ul>
                                <div class="socialmedia">
                                  
                                  <ul class="postcard__tagbox">
                                    <li class="tag__item" > 
                                    <a href="<?php echo$row['fb']?> ">
                                      <i class="fab fa-facebook-f"></i>
                                    </a>
                                    </li>

                                    <li class="tag__item" > 
                                      <a href="<?php echo$row['instagram']?> ">
                                        <i class="fab fa-instagram"></i>
                                      </a>
                                      </li>

                                    <li class="tag__item" > 
                                      <a href="<?php echo$row['youtube']?> ">
                                        <i class="fab fa-youtube"></i>
                                      </a>
                                    </li>

                                    <li class="tag__item" > 
                                      <a href="<?php echo$row['blogs']?> ">
                                        <i class="fas fa-blog"></i>
                                      </a>
                                    </li>
                                </ul>
                                </div>
                                <ul class="d-flex flex-row-reverse bd-highlight">
                                <li><a href="deletecard.php?id=<?php echo$row['post_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Profile Card" data-original-title="Delete Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-trash text-danger mx-2"></i></a></li> 
                                <li><a href="updateblogs.php?id=<?php echo$row['post_id'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Profile Card" data-original-title="Edit Profile Card" data-abc="true" style="font-size: 64px;"><i class="fas fa-user-edit text-success"></i></a></li>
                                </ul>

                            </div>
    
    
                        </article>
                    </main>
                    <?php 
                      }
                    }
              
                
                  $sqlpagination="SELECT * FROM expolrepakistan";
                $paginationResult=mysqli_query($conn, $sqlpagination) or die("Query Failed 2");
                if(mysqli_num_rows($paginationResult)>0){
                        $totalRecord=mysqli_num_rows($paginationResult);
                      
                        $totalpages =ceil($totalRecord/$limit);

                        echo" <ul class='pagination admin-pagination'>";
                        if ($pageNo>1){
                            echo '<li class="page-item"><a class="page-link" href="viewBlogpost.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="viewBlogpost.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="viewBlogpost.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                } 
                ?>
       </div>
      </div>
















    </section>
    <!-- <caption class="text-center"><h4>Designed By: <a href="https://www.facebook.com/ehtisham.wajid.961">Ehtisham Wajid</a></h4></caption> -->
  </div>
 
  <!-- Main Footer -->
  <?php  include "particles/footer.php"?>
</div>



<script src="ExpolrePakistanDashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="ExpolrePakistanDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="ExpolrePakistanDashboard/dist/js/adminlte.js"></script>
</body>
</html>

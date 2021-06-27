<!DOCTYPE html>
<html lang="en">

<head>
        <?php include "particles/pageheadsec.php"?>

        <!-- <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>       -->
        
        <link rel="stylesheet" href="public/style/bootstrap_min.css">
        <link rel="stylesheet" href="public/style/expolrepakistan.css">
        <link rel="stylesheet" href="public/style/touristGuider.css">
        <style> ::placeholder {color: lightsteelblue; font-weight: 700;font-size: 18px; }</style>

</head>

<body>

    <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>

    
        <!-- header slider section start  -->
        <!-- Header Hero Image Section  -->
        <div class="touristGuider_header">
            <div class="touristGuider_header_txt">
                <h1>Explore Pakistan</h1>
                <form class="search" action="explorepakistansearch.php" method="GET">
                <input class="bar text-center" type="text" placeholder="Search Places To Know About [AuthorName/Places/NeareastLocation]" name="result" style="background-color: grey;color:white;font: weight 700px;">
                 <button><i class="fas fa-search"></i></button>
              </form>
            </div>
           
        </div>

        <div class="h1 text-center" id="pageHeaderTitle"> Explore Pakistan Blogs</div>
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

                       $sqlrecord="SELECT * FROM expolrepakistan ORDER BY post_id  DESC LIMIT  {$offset},{$limit}"; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
                    <main class="container">   
                        <article class="postcard blue">
                            <a class="postcard__img_link" href="#">
                                  <img class="postcard__img" src="admin/ExpolrePakistanDashboard/ExpolrePakistanDashboard/upload/<?php echo$row['image']?>" alt="BloggerProfile" />   
                            </a>
                            <div class="postcard__text">
                                <img src="public/assets/images/epaktourisumlogo.jpeg" alt="authorimg" class="authorimg">

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
                            echo '<li class="page-item"><a class="page-link" href="expolrepakistane.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="expolrepakistan.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="expolrepakistan.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                }
                ?>
       </div>
      </div>


                        <script src="JavaScript/explorepakistan.js"></script>
                <!-- Footer  -->
                <?php include "particles/mainfooter.php" ?>


</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "particles/pageheadsec.php"?>
    <link rel="stylesheet" href="public/style/bootstrap_min.css">
    <link rel="stylesheet" href="public/style/infulencer.css">
    <style> ::placeholder {color: lightsteelblue; font-weight: 700;font-size: 18px; }</style>
</head>
<body >
        <!-- Navemenu -->
    <div class="menu_header header" id="myHeader">
      <?php include  "particles/mainmenu.php"?>
    </div>
  

  <!-- Header Hero Image Section  -->
        <div class="touristGuider_header">
            <div class="touristGuider_header_txt">
              <h1>SEARCH STORIES</h1>
              <p>You're  Love to Read Other Experiences</p>
              <form class="search" action="infulencerserch.php" method="GET">
              <input class="bar text-center" type="text" placeholder="Search Stories [AuthorName/Places/YYYY:MM:DD]" name="result" style="background-color: grey;color:white;font: weight 700px;">
                <button><i class="fas fa-search"></i></button>
            </form>
            </div>
          </div>

<!-- infulencer Card -->
<div><h1 class="text-center my-5 py-3 mx-auto">Matching Stories Found: <span style="color: green; font-size:32px"> <?php echo $_GET["result"] ?> </span>  </h1></div>
          <?php 
            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
             $limit=6;
             $result=$_GET['result'];
                if(isset($_GET['page'])){
                $pageNo=$_GET['page']; 
                }else{
                    $pageNo=1;
                }

               $offset = ($pageNo -1 )* $limit;

                       $sqlrecord="SELECT * FROM infulencer WHERE Posttitle LIKE '%{$result}%' OR posteddate LIKE '%{$result}%' OR displayname LIKE '%{$result}%' ORDER BY influncer_id  DESC LIMIT  {$offset},{$limit}"; 
                      
                   $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed 1");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
        ?>  
        <!-- Influncer Card Data  -->
        <main class="container">
            <div class="h1 text-center" id="pageHeaderTitle"></div>
            <article class="postcard red">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="admin/InfulencerDashboard/Infulencer_Dashboard/upload/<?php echo$row['image']?>" alt="Image Title" />	
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
                            echo '<li class="page-item"><a class="page-link" href="infulencerStories.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="infulencerStories.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="infulencerStories.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                }
                ?>
 

     <!-- Footer  -->
     <?php include "particles/mainfooter.php" ?>
</body>
</html>
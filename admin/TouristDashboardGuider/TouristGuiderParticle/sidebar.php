<?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_SESSION['user']['user_id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>  


                        <aside class="main-sidebar sidebar-dark-success ">
                        <div class="sidebar">
                            <!-- Brand Logo -->
                            <a href="" class="brand-link">
                              <img src="TouristGuider_Dashboard/public/assets/images/epaktourisumlogo.jpeg" alt="E-Pakistan logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                              <span class="brand-text font-weight-light">E Pakistan Tourisum</span>
                            </a>

                              <!-- Sidebar user panel (optional) -->
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex w-100 d-flex justify-content-center">
                                  <div class="image ">
                                    <img src="TouristGuider_Dashboard/upload/<?php echo$row['image']?>" class="img-circle elevation-2" alt="User Image" style="width: 100px; height: 100px; border-radius: 100%; ">
                                  </div>
                                  
                                </div>
                                <div class="info d-flex justify-content-center mt-3 pb-1 mb-1">
                                <a href="#" class="d-block" style="font-style: 1.1rem;"> <?php echo$row['fname']?></a>  
                                
                                </div>
                                <div class="info d-flex justify-content-center">
                                    <h6><?php echo$row['email']?> </h6>
                                
                                </div>
                                
                                   
                        <?php 
                        }
                          }
                          ?>  
                    
                    <!-- Sidebar Menu -->
                          <nav class="mt-2 form-inline">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                              <!-- Add icons to the links using the .nav-icon class
                                  with font-awesome or any other icon font library -->
                              <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                  <i class="nav-icon fas fa-tachometer-alt"></i>
                                  <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                    <a href="index.php" class="nav-link active">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Overview</p>
                                    </a>
                                  </li>
                              
                              </li>
                              <li class="nav-item">
                                <a href="createprofile.php" class="nav-link">
                                  <i class="fas fa-user-circle nav-icon "></i>
                                  <p>Create Profile Service</p>
                                </a>
                              </li>
                             
                              <?php 
                                  $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                                    $userid=$_SESSION['user']['user_id'];
                                      $sqlrecord="SELECT * FROM touristguider WHERE user_id ={$userid}"; 
                                    $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                                    if(mysqli_num_rows($recordResult)>0){
                                        if($row =mysqli_fetch_assoc($recordResult)){
                                  ?>  
                         
                              <li class="nav-item">
                                <a href="viewprofile.php?id=<?php echo$row['touristguider_id']?>" class="nav-link">
                                  <i class="fas fa-user-circle nav-icon "></i>
                                  <p>View Profile </p>
                                </a>
                              </li>
                          
                                    <?php 
                            }
                              }
                              ?> 

                              <li class="nav-item">
                                <a href="editprofile.php?id=<?php echo $_SESSION['user']['user_id'];?>" class="nav-link">
                                  <i class="fas fa-user-edit nav-icon"></i>
                                  <p>Update Profile</p>
                                </a>
                              </li>
                            
                              <a href='update-inline.php><i class='fa fa-edit'></i></a>
                              <li class="nav-item">
                                <a href="logout.php" class="nav-link">
                                  <i class="fas fa-sign-out-alt nav-icon"></i>
                                  <p>logout</p>
                                </a>
                              </li>
                            </ul>
                            </ul>
                          </nav>
                          <!-- /.sidebar-menu -->
                        </div>
                        <!-- /.sidebar -->
                      </aside>
                     
                    

                      <div class="content-wrapper">
                        <div class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">
                              </div>
                              <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                </ol>
                              </div>
                            </div>
                          </div>
                        </div>

                        
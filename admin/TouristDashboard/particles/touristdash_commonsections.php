<?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_SESSION['user']['user_id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                                       <a class="navbar-brand mt-5 mt-3" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon  d-flex justify-content-center ">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="public/touristdashboard_filies/assets/images/epaktourisumlogo.jpeg" alt="homepage" class="dark-logo rounded-circle" width="180px" height="180px"style="text-center"/>
                            <!-- Light Logo icon -->
                            <img src="public/touristdashboard_filies/assets/images/epaktourisumlogo.jpeg" alt="homepage" class="light-logo rounded-circle" width="180px" height="180px"style="text-center" />
                        </b>

                        <!--End Logo icon -->
                        <!-- Logo text -->

                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    



                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                </div>
            </nav>
        </header>

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-5 pt-5">
                                <div class="user-pic"><img src="public/touristdashboard_filies/upload/<?php echo$row['image']?>" alt="users"
                                        class="rounded-circle" width="60" height="60"/></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium"><?php echo$row['fname']?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo$row['email']?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="touristprofile.php?id=<?php echo $_SESSION['user']['user_id'];?>"><i
                                                class="ti-user mr-1 ml-1"></i> My Profile</a>
                                        <a class="dropdown-item" href="previousevent.php"><i
                                                class="ti-wallet mr-1 ml-1"></i> Previous Trips</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="touristprofile.php"><i
                                                class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>


                        <li class="p-15 mt-2"><a href="index.php"
                                class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                                    class="fa fa-plus-square"></i> <span class="hide-menu ml-1">Dashboard</span>
                            </a>
                        </li>


                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Event Dirary</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-inbox-arrow-down"></i><span class="hide-menu">Up Coming Events</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="previousevent.php" class="sidebar-link"><i
                                            class="mdi mdi-vector-rectangle"></i><span class="hide-menu">All Events</span></a></li>
                            </ul>
                        </li>


                        <!-- User Profile  -->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Profile</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="touristprofile.php?id=<?php echo $_SESSION['user']['user_id'];?>" class="sidebar-link"><i
                                            class="mdi mdi-account-network"></i><span class="hide-menu"> User
                                            Profile</span></a></li>

                            </ul>
                        </li>

                        <!-- logout section  -->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php"
                                aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log
                                    Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        <?php 
      }
        }?>
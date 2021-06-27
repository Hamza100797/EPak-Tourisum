<?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_SESSION['user']['user_id'];
                        $sqlrecord="SELECT * FROM users WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>0){
                          while($row =mysqli_fetch_assoc($recordResult)){
                    ?>  
        <aside class="left-sidebar mt-5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3  mt-4">
                                <div class="user-pic"><img src="public/eventOrg_dashboard_files/upload/<?php echo$row['image']?>" alt="users"
                                        class="rounded-circle" width="60" height="60" /></div>
                                <div class="user-content hide-menu ml-2">
                                    <a href="" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="mb-0 user-name font-medium"><?php echo$row['fname']?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?php echo$row['email']?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['user']['user_id'];?>"><i
                                                class="ti-user mr-1 ml-1"></i> My Profile</a>
                                        <a class="dropdown-item" href="invoicelist.php"><i
                                                class="ti-wallet mr-1 ml-1"></i> Invoices</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['user']['user_id'];?>"><i
                                                class="ti-settings mr-1 ml-1"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php"><i
                                                class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <?php 
                 }
        }?>
                <!-- Dashboard Overview -->

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Company Name</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-inbox-arrow-down"></i><span class="hide-menu">Dashboard Overview</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php" class="sidebar-link"><i
                                            class="mdi mdi-vector-rectangle"></i><span class="hide-menu">Dashboard 
                                            Status </span></a></li>
                            </ul>
                        </li>

                        <li class="p-15 mt-2"><a href="createevent.php"
                                class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i
                                    class="fa fa-plus-square"></i> <span class="hide-menu ml-1">Create New Event</span>
                            </a></li>


                        <!-- User Profile-->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Event
                                Managment </span></li>

                        <!-- Event Overview -->
                        <?php 
                     $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                      $userid=$_SESSION['user']['user_id'];
                        $sqlrecord="SELECT * FROM tourevents WHERE user_id ={$userid}"; 
                      $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");

                      if(mysqli_num_rows($recordResult)>=0){
                          if($row =mysqli_fetch_assoc($recordResult)){
                      ?>  
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu">Event Overview</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="upcomingevents.php?id=<?php echo$row['event_id']?>" class="sidebar-link"><i
                                            class="mdi mdi-adjust"></i><span class="hide-menu"> All Event  </span></a></li>
                            </ul>
                        </li>
                        <?php 
                          }
                            }
                            ?>  
                 <!-- Invoice Details -->

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Invoice Details</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-inbox-arrow-down"></i><span class="hide-menu">Payments </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="invoicelist.php" class="sidebar-link"><i
                                            class="mdi mdi-vector-rectangle"></i><span class="hide-menu">All Payments
                                            Status </span></a></li>
                            </ul>
                        </li>

                        <!-- users Sction  -->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">users</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-bookmark-plus-outline"></i><span
                                    class="hide-menu">Tourists</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="userlist.php" class="sidebar-link"><i
                                            class="mdi mdi-book-multiple"></i><span class="hide-menu"> Tourists List
                                        </span></a></li>
                            </ul>
                        </li>

                        <!-- User Profile  -->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Profile</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="mdi mdi-account-multiple"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="profile.php?id=<?php echo $_SESSION['user']['user_id'];?>" class="sidebar-link"><i
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

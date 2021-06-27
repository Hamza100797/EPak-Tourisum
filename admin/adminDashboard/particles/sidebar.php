<aside class="main-sidebar sidebar-dark-success ">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="adminDashboardfilies/public/assets/images/epaktourisumlogo.jpeg" alt="E-Pakistan logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E Pakistan Tourisum</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="adminDashboardfilies/public/assets/images/epaktourisumlogo.jpeg" class="img-circle elevation-2" alt="User Image" style="width: 70px; height: 70px; border-radius: 100%; ">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['user']['fname'];?></a>
          </div> 
        </div>


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
                  <p>All Users</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Event Organizor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="allEventOrg.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Event Organizors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="EventOrgProfiles.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Organizors Profiles</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               Tourist Guider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="allTouristGuider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tourist Guider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="TouristGuiderProfile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tourist Guider Profiles</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Infulencers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="allInfulencer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Infulencer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="InfulenerProfiles.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infulencer Proflies</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Expolers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="allExpoler.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Expolers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ExpolerProfiles.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expolers Profiles</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>logout</p>
            </a>
          </li>
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
  
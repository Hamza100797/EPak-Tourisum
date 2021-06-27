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
 <?php  include "particles/headsec.php"?>
 
 <link rel="stylesheet" href="adminDashboardfilies/dist/css/tablestyle.css">
 <link rel="stylesheet" href="adminDashboardfilies/dist/css/bootstrap.min.css">
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

    <section class="content bgsec">
       <h1>Welcome Back! Main Page  <span class="" style="font-family: Georgia, 'Times New Roman', Times, serif;"> = data.fname </span> </h1>
      
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-12">
              
              <?php 
               $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
              
                $limit=10;

                if(isset($_GET['page'])){
                    $pageNo=$_GET['page'];
                }else{
                    $pageNo=1;
                }

                $offset = ($pageNo -1 )* $limit;
              
                $sqlrecord="SELECT * FROM users ORDER BY user_id DESC LIMIT {$offset},{$limit}";
                $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");
              
                if(mysqli_num_rows($recordResult)>0){

             
              ?>
                             <div class="container-fluid">

<!-- basic table -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All USsers</h4>
                <div class="table-responsive">
                    <table id="file_export" class="table  table-bordered">
                    <thead class="thead-light text-center text-capitalize font-bold">
          <th>User ID.</th>
          <th>Profile Image.</th>
          <th>Full Name</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Phone No</th>
          <th>Cnic</th>
          <th>Role</th>
          <th>Gender</th>
          <th>fb</th>
          <th>Instagram</th>
          <th>EasyPasia</th>
          <th>Jazzcash</th>
          <th>Edit</th>
      </thead>
                        <tbody>
      <?php while($row = mysqli_fetch_assoc( $recordResult)) {?>
          <tr>
          
              <td class='id'> <?php echo$row['user_id']; ?> </td>
              <td><?php echo$row['image']; ?></td>
              <td><?php echo$row['fname']."".$row['lname']; ?> </td>
              <td><?php echo$row['username']; ?></td>
              <td><?php echo$row['email']; ?></td>
              <td><?php echo$row['phone']; ?></td>
              <td><?php echo$row['cnic']; ?></td>
              <td><?php echo$row['role']; ?></td>
              <td><?php echo$row['gender']; ?></td>
              <td><?php echo$row['fb']; ?></td>
              <td><?php echo$row['instagram']; ?></td>
              <td><?php echo$row['easypasia']; ?></td>
              <td><?php echo$row['jazzcash']; ?></td>
              <td class='edit'><a href='update-inline.php?id=<?php echo $row["user_id"];?>'><i class='fa fa-edit'></i></a></td>
          </tr>
         <?php } ?>
      </tbody>
                        <tfoot class="thead-light text-center text-capitalize font-bold">
                            <tr>
                            <th>User ID.</th>
                            <th>Profile Image.</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Cnic</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>fb</th>
                            <th>Instagram</th>
                            <th>EasyPasia</th>
                            <th>Jazzcash</th>
                            <th>Edit</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                  <?php 
                }

                $sqlpagination="SELECT * FROM users";
                $paginationResult=mysqli_query($conn, $sqlpagination) or die("Query Failed");
                if(mysqli_num_rows($paginationResult)>0){
                        $totalRecord=mysqli_num_rows($paginationResult);
                      
                        $totalpages =ceil($totalRecord/$limit);

                        echo" <ul class='pagination admin-pagination'>";
                        if ($pageNo>1){
                            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($pageNo - 1).'">Previous</a></li>';
                        }
                        for($i=1; $i<=$totalpages; $i++){
                            if ($i == $pageNo){
                                $active ="active";
                            }else {
                                $active ="";
                            }
                          echo '<li class='.$active.'> <a href="index.php?page='.$i.'"> '.$i.'</a> </li>';
                        }
                        if ($totalpages>$pageNo){
                            echo '<li class="page-item"><a class="page-link" href="index.php?page='.($pageNo + 1).'">Next</a></li>';
                        }
                        echo "</ul>";
                }
                  ?>
       
       </section>
  
  
    
  </div>
 
  <!-- Main Footer -->
  <?php  include "particles/footer.php"?>
</div>

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
            <!--This page plugins -->
            <script src="public/eventOrg_dashboard_files/assets/extra-libs/DataTables/datatables.min.js"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


<script src="adminDashboardfilies/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="adminDashboardfilies/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminDashboardfilies/dist/js/adminlte.js"></script>
</body>
</html>

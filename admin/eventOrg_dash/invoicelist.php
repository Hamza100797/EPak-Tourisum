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
<html dir="ltr" lang="en">

<head>
<?php include "particles/eventOrgheadSeclinks.php"?>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include "particles/eventOrg_preloader.php"?>


    <div id="main-wrapper">
         <!-- Header  -->
          <?php include "particles/eventOrgheader.php"?>


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
             <!-- sidebarMenu  -->
             <?php include "particles/eventOrgSidebarMenu.php"?>


        <div class="page-wrapper">

 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Invoice List</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="invoicelist.php">Invoice List</a></li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="mr-2">
                                <div class="lastmonth"></div>
                            </div>
                            <div class=""><small>LAST MONTH</small>
                                <h4 class="text-info mb-0 font-medium">$58,256</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="container-fluid">

                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Invoice List</h4>
                                <h6 class="card-subtitle">In these invoice, with these below
                                    buttons(CSV,Copy,Excel,PDF,Print) you can save this content ad per requirments.</h6>
                                <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered ">

                                        <thead class="bg-primary font-weight-bold text-light">

                                            <tr>
                                            
                                                <th>Reservation ID</th>
                                                <th>Tourist Name</th>
                                                <th>Designation From</th>
                                                <th>Designation To</th>
                                                <th>Pick Up Point</th>
                                                <td>Date Form</td>
                                                <td>Date To</td>
                                                <td>Reservation Seats</td>
                                                <th>Contact Number</th>
                                                <th>Payment Method</th>
                                                <th>Reservation Status</th>
                                                <th>Ticket Number</th>
                                                <th>Date</th>
                                         
                                                <th>Payment Status</th>
                                                <th>Comments</th>
                                                <th>Edit Reservation</th>
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $conn = mysqli_connect("localhost","root","","epaktourism") or die("Connection Failed:" .mysqli_connect_error());
                                            
                                            $sqlrecord="SELECT * FROM tourreservation";
                                                $recordResult = mysqli_query($conn,$sqlrecord) or die("Query failed");
                                            
                                                if(mysqli_num_rows($recordResult)>0){
                                                    while($row =mysqli_fetch_assoc($recordResult)){
                                            
                                             ?>
                                            <tr>
                                                <td> <?php echo$row['reservation_id'];?> </td>
                                                <td><?php echo$row['name'];?> </td>
                                                <td><?php echo$row['destinationform'];?></td>
                                                <td><?php echo$row['destinationto'];?></td>
                                                <td><?php echo$row['pickuppoint'];?></td>
                                                <td><?php echo$row['dateform'];?></td>
                                                <td><?php echo$row['dateto'];?></td>
                                                <td><?php echo$row['noadult'];?></td>
                                                <td><?php echo$row['phone'];?></td>
                                                <td><?php echo$row['paymentmethod'];?></td>
                                                <td><?php echo$row['action'];?></td>
                                                <td><?php echo$row['ticketnum'];?></td>
                                               
                                                <td><?php echo$row['date'];?></td>
                                              
                                                <td><?php echo$row['action'];?></td>
                                                <td><?php echo$row['comments'];?></td>
                                                <td data-toggle="tooltip" data-placement="top" title="Edit Reservation" style="color: green; font-size:33px;">
                                                     <a href="editreservation.php?id=<?php echo$row['reservation_id'];?>"><i class="fas fa-user-edit"></i></a></td>
                                                </tr>
                                                <?php }} ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Reservation ID</th>
                                                <th>Tourist Name</th>
                                                <th>Designation From</th>
                                                <th>Designation To</th>
                                                <th>Pick Up Point</th>
                                                <td>Date Form</td>
                                                <td>Date To</td>
                                                <td>Reservation Seats</td>
                                                <th>Contact Number</th>
                                                <th>Payment Method</th>
                                                <th>Reservation Status</th>
                                                <th>Ticket Number</th>
                                                <th>Date</th>
                                                <th>Payment Status</th>
                                                <th>Comments</th>
                                                <th>Edit Reservation</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

             <!-- footer  -->
             <?php include "particles/eventOrgfooter.php"?>
            </div>
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
            <script>
                //=============================================//
                //    File export                              //
                //=============================================//
                $('#file_export').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
            </script>
</body>

</html>
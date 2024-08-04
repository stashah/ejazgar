<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$sql = 'SELECT  YEAR(purdate) PYEAR FROM purchase  GROUP BY PYEAR ASC';
$result = $conn->query($sql);

$sqlSal = 'SELECT  YEAR(saldate) SYEAR FROM sale  GROUP BY SYEAR ASC';
$resultSal = $conn->query($sqlSal);

$sqldefault = "SELECT ntcinfo.custid, ntcinfo.dt, ntcinfo.amount,c.custname,c.custmobile,c.custaddress from (SELECT nt.custid, nt.dt, sum(nt.cf+nt.amount-nt.pamount) as amount  FROM (SELECT custid, saldate as dt, sum(salqty*salprice) as amount,'' as pamount, '' as cf FROM sale where account=1 GROUP BY custid 
UNION
SELECT custid, paymentdate as dt,'' as amount, sum(amount) as pamount,'' as cf FROM customeraccount group by custid  
UNION
SELECT custid,ldate as dt, '' as amount,''as pamount, sum(amount) as cf FROM cashaccount where amount<>0 group by custid) as nt  GROUP by nt.custid) as ntcinfo,customer as c WHERE ntcinfo.custid=c.custid and ntcinfo.amount <> 0";
$resultdefault = $conn->query($sqldefault);

?>

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
        include "../../partials/title.php";
    ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!--<link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->

  <!-- for datatable from data tabelfolder-->
  <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />

<!-- Modal CSS from folder --->
<link rel="stylesheet" href="../../css/modal.css">
  

  
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    include "../../partials/_navbar.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php
      include "../../partials/_settings-panel.php";
      ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php
      include "../../partials/_sidebar.php";
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        
          <div class="row">
          
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Purchase</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#sale" role="tab" aria-selected="false">Sale</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#receiveable" role="tab" aria-selected="false">Receiveable</a>
                    </li>
                    <li class="nav-item">
                      <!--<a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a> -->
                    </li>
                  </ul>
                  
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div>
                                  <div>
                                    <h4 class="card-title card-title-dash">Purchase Details</h4>
                                    <h5 class="card-subtitle card-subtitle-dash">Categorised purchase details</h5>
                                  </div>
                                  <div>
                                    <div id="purrp" class="table-responsive">
                                      <table class="table" style="cursor: pointer;">
                                        <tbody id="tbody" class="tt">
                                          
                                          <tr>
                                            <?php $gtotal = 0;
                                            while ($row = $result->fetch_assoc()) {
                                              $pyear = $row["PYEAR"];
                                              $total = 0;
                                              $count=0;
                                              if($count ==0){
                                                $count++;
                                                  echo '<script>id = '.$pyear.'</script>';

                                              }
                                            ?>
                                          
                                              <th class="alert alert-success" role="alert" >
                                                  <span  data-pid="<?= htmlspecialchars($row["PYEAR"]); ?>" class='btn-edit '><?= $pyear ?></span>
                                                  <!--    <button class='btn btn-danger btn-icon btn-del mdi mdi-delete btn-lg' data-pid="<?= htmlspecialchars($row["p_id"]); ?>"></button> -->
                                               </th>
                                            
                                            <?php   }  ?>
                                          </tr>
                                            </tbody>
                                      </table>
                                    </div>
                                    <div  class="table-responsive">
                                      <table class="table" id="example" ><thead><tr><th>Month</th><th>Amount</th></tr></thead><tbody id="vlist" style="cursor:pointer;"></tbody></table>

                                      </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade show " id="sale" role="tabpanel" aria-labelledby="sale">
                    <div class="row">
                      <div class="col-sm-12">
                        
                        <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div>
                                  <div>
                                    <h4 class="card-title card-title-dash">Sale Details</h4>
                                    <h5 class="card-subtitle card-subtitle-dash">Categorised Sale details</h5>
                                  </div>
                                  <div>
                                    <div id="salrp" class="table-responsive">
                                      <table class="table" style="cursor: pointer;">
                                        <tbody id="tbodysal" class="tt">
                                          
                                          <tr>
                                            <?php $gtotalsal = 0;
                                            while ($rowsal = $resultSal->fetch_assoc()) {
                                              $syear = $rowsal["SYEAR"];
                                              $stotal = 0;
                                              $scount=0;
                                              if($scount ==0){
                                                $scount++;
                                                 echo '<script> sid = '.$syear.'</script>';

                                              }
                                            ?>
                                          
                                              <th class="alert alert-success" role="alert" >
                                                  <span  data-sid="<?=htmlspecialchars($rowsal["SYEAR"]); ?>" class='btn-saledit'><?=$syear ?></span>
                                                  <!--    <button class='btn btn-danger btn-icon btn-del mdi mdi-delete btn-lg' data-pid="<?= htmlspecialchars($row["p_id"]); ?>"></button> -->
                                               </th>
                                            
                                            <?php   }  ?>
                                          </tr>
                                            </tbody>
                                      </table>
                                    </div>
                                    <div  class="table-responsive">
                                      <table class="table responsive" id="examplesal" ><thead><tr><th>Daily</th><th style="text-align:right">Sale</th><th style="text-align:right">Profit</th></tr></thead><tbody id="slist" style="cursor:pointer;"></tbody></table>
                                      

                                      </div>
                                      
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>  
                      
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade show " id="receiveable" role="tabpanel" aria-labelledby="receiveable">
                    <div class="row">
                      <div class="col-sm-12">
                        
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-sm-12">
                                      <div style="text-align:right">
                                        
                                        </div>
                                        <h4 class="card-title">Defaulter</h4>
                                        <p class="card-description">
                                            Defaulter <code>.Details</code>
    
                                        </p>
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-light table-bordered display table-sm" style="width:100%">
                                                <thead class="thead">
                                                    <tr>
    
                                                        <th>Customer Id</th>
                                                        <th>Customer Name</th>
                                                        <th>Outstanding</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $totalrecable = 0;
                                                    while ($rowdefault = $resultdefault->fetch_assoc()) {
                                                        $totalrecable += $rowdefault["amount"];
                                                    ?>
    
                                                        <tr>
    
                                                            <td><a href="../customer/report.php?id=<?= $rowdefault["custid"]; ?>"><?= htmlspecialchars($rowdefault["custid"]); ?></a></td>
                                                            <td><a href="../customer/report.php?id=<?= $rowdefault["custid"]; ?>"><?= htmlspecialchars($rowdefault["custname"]); ?></a></td>
                                                            <td style="text-align:right;"><?= htmlspecialchars($rowdefault["amount"]); ?></td>
                                                        </tr>
                                                    <?php  } ?>
                                                </tbody>
                                                <tfoot>
                                                    <th></th>
                                                    <th>Total Recieveable</th>
                                                    
                                                    <th style="text-align:right;"><?= $totalrecable ?></th>
                                                </tfoot>
                                            </table>
    
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade show " id="more" role="tabpanel" aria-labelledby="more">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center justify-content-between">
                          
                        
                        More

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="myModal" class="modal modal-md">
                    <!-- Modal content -->
                    <div class="modal-header">
                          <button class='btn btn-blue btn-icon btn-del mdi mdi-keyboard-backspace mdi-24px btn-sm' id="btnback" ></button>
                          <h2 style="font-size: 100%;">Detailed Summary</h2>
                          <span class="close">&times;</span>
                        </div>
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <div class="row">
                            <div  class="table-responsive">
                                      
                                      <table class="table table-light" id="dlist" ></table>

                            </div>
                            </div>
                        </div>
                    </div>
<!-- end of modal -->
                </div>
                    <!-- end of model-->
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../../vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>

  <script src="jquery.js"></script>
  <script src="jqajax.js"></script>
  
  <!-- End custom js for this page-->
  <!-- from datatable folder-->

  <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</body>

</html>
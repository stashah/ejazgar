<!DOCTYPE html>
<html lang="en">
<?php

date_default_timezone_set("Asia/Karachi");

?>

<head>
  <style>
    
  </style>
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
  <!-- Modal CSS from folder --->
  <link rel="stylesheet" href="../../css/modal.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" href="../autocomp/jquery.auto-complete.css">
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <!-- for datatable from data tabelfolder-->

  <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />


</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php
    include "../../partials/_navbar.php";
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <?php
      include "../../partials/_settings-panel.php";
      ?>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php
      include "../../partials/_sidebar.php";
      
      ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class=" card-title">Payment</h4>
                  <p class="card-description">
                    Payment <code>Invoice</code>
                  </p>
                  <div id="msg1"></div>
                  <div id="msg"></div>
                  <form autocomplete="off" class="forms-sample" id="myform">
                   
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="date" class="form-control form-control-sm" id="iddate">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" autofocus class="form-control form-control-sm" id="idcustomername" placeholder="Member Name..." style="width:100%;max-width:600px;outline:0">
                          <input type="text" id="idcustid" disabled style="display:none" value="0">
                          <div class="table-reponsive  table-hover" id="vlist" style="margin-top:-10px; height: 300px; width:100%; overflow-y: scroll; z-index:10; position:absolute; background-color: white; display:none;">
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" id="iddetail" placeholder="Details..."  autofocus class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="number" min="0" class="form-control form-control-sm" placeholder="Amount" id="idcash" value="0">
                        </div>
                      </div>
                      
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for=""> </label>
                          <button type="submit" class="btn btn-primary  mdi mdi-content-save" id="btnsave"> Save</button>
                        </div>
                      </div>
                    </div>
                    <hr>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="newmsg" class="alert-danger">
        </div>
        

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
              BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
              rights reserved.</span>
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
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
<script src="jquery.js"></script>
<script src="jqajax.js"></script>
<script src="../autocomp/jquery.auto-complete.js"></script>

<!-- from datatable folder-->

<script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</html>
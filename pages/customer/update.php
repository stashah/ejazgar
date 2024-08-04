<!DOCTYPE html>
<html lang="en">
<?php 
require '../../assets/db.php';
$msg ="";
$id=0;
$custname="";
$custmob="";
$custaddress="";

if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
  }

  if(!empty($_GET["id"])){
    $id = $_GET["id"];

    $sql = 'SELECT * FROM customer where custid='.$id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $custname = $row["custname"];
    $custmob = $row["custmobile"];
    $custaddress = $row["custaddress"];


}

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
  <!-- for datatable from data tabelfolder-->

  <link rel="stylesheet" type="text/css" href="../../datatable/jquery.dataTables.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- for datatable from data tabelfolder-->
  <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />

  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
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
              <div class="col-md-3"></div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer</h4>
                  <p class="card-description">
                    Update customer form
                    
                  </p>
                  <div id="msg"><?= $msg; ?></div>
                  <form class="forms-sample" id="myform">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" autofocus value="<?= htmlspecialchars($custname); ?>" id="idcustname" placeholder="Customer Name...">
                      <input type="text" class="form-control" autofocus id="idcustid" value="<?=$id?>" disabled hidden="true">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Mobile</label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($custmob); ?>" id="idcustmob" maxlength="11"  placeholder="Customer Mobile Number...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Address</Address></label>
                      <input type="text" class="form-control" value="<?= htmlspecialchars($custaddress); ?>" id="idcustaddress" placeholder="Customer Address...">
                    </div>
                    <button type="submit" class="btn btn-primary me-2" id="btnupdate">Submit</button>
                    <a href="../customer/"class="btn btn-danger">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
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

<!-- from datatable folder-->

<script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</html>

<!DOCTYPE html>
<html lang="en">
<?php
$title = "Shop Admin";
date_default_timezone_set("Asia/Karachi");
require '../../assets/db.php';
$sql = 'SELECT * FROM categories';
$result = $conn->query($sql);

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
    include "../../partials/_navbaruser.php";
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
      if (!empty($_SESSION["shopping_cart_sale"])) {
        unset($_SESSION["shopping_cart_sale"]);
      }
      ?>
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <button class="btn btn-md  mdi mdi-24px mdi-cart" style="float:right;" id="myBtn">
                    My Cart <input id="cartitem" style="width: min-content;border:none;"></button>
                  <h4 class=" card-title">Sale</h4>
                  <p class="card-description">
                    Cash Sale <code>Invoice</code>
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
                          <input type="text" autofocus class="form-control form-control-sm" id="idcustomername" placeholder="Customer Name..." style="width:100%;max-width:600px;outline:0">
                          <input type="text" id="idcustid" disabled style="display:none" value="0">
                          <div class="table-reponsive  table-hover" id="vlist" style="margin-top:-10px; height: 300px; width:100%; overflow-y: scroll; z-index:10; position:absolute; background-color: white; display:none;">
                          </div>
                        </div>
                      </div>
                      <div id="creditdiv" class="form-group" style="display: none;">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input autofocus type="checkbox" id="chkcredit" class="form-check-input">
                            Sale on Credit
                          </label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" id="idpid" placeholder="Product Id" min="0" autofocus class="form-control form-control-sm">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" autofocus class="form-control form-control-sm" id="idname" disabled style="background-color: transparent;" placeholder="Product" style="width:100%;max-width:600px;outline:0">
                          <!--<ul class="list-group" style="position:absolute; cursor:pointer; margin-top:-10px; z-index:10;" id="plist"></ul>-->
                          <div class="table-reponsive  table-hover" id="plist" style="margin-top:-10px; height: 200px; width:300px; overflow-y: scroll; z-index:10; position:absolute; background-color: white; display:none;">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">

                          <input type="number" min="0" placeholder="Quantity" class="form-control form-control-sm" id="idqty" placeholder="0">
                          <div style="width: 200px;">
                            <span width="30%">Stock</span> <input type="text" style="width:70%; border:none; background-color: transparent;" disabled class="" id="idstock" placeholder="0">
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <input type="number" min="0" class="form-control form-control-sm" placeholder="Price" id="idcp" placeholder="0">
                        </div>
                      </div>
                      <div class="col-md-2" style="display: none;">
                        <div class="form-group">
                          <label for="idqty"></label>
                          <input type="number" min="0" class="form-control form-control-sm" id="idsp" placeholder="0">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for=""> </label>
                          <button type="submit" class="btn btn-primary btn-sm mr-2 mdi mdi-plus-circle" id="btnadd"> Add Item</button>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          Total Amount
                          <input type="text" style=" border:none;" disabled class="form-control form-control-lg" id="idTotalAmount" placeholder="0">
                        </div>
                      </div>
                      <div class="col-md-4">
                      <div class="form-group">
                          Total Amount
                          <input type="number"  min="0" class="form-control form-control-lg" id="idcash" placeholder="0">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <button id="savedata" class="btn btn-primary btn-md  mdi mdi-content-save-all" style="float:right;"> Save All</button>
                      </div>
                      <div class="col-md-1"></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="newmsg" class="alert-danger">
        </div>
        <div id="myModal" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <h2 style="font-size: 100%;">My Cart</h2>
              <span class="close">&times;</span>
            </div>
            <div class="modal-body">
              <div class="row">
                <div id="order_table" class="table-responsive" height="600px">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>Purchase Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Cash Price</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="tbody" class="tt">
                    </tbody>
                    <tfoot>

                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

          </div>

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
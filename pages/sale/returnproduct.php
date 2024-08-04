<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$sdate = date("Y-m-d");
$result = "";

$msg = "";
if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
    $cls = $_GET["cls"];
}

if(isset ($_POST['idsdate']) ) {

    

    $sdate = $_POST['idsdate'];

    
    try{
  
      if($sdate != '' ){
  
        $name= '';
        $sql = "SELECT * FROM `sale` join products on sale.productid=products.pid WHERE saldate='".$sdate."'";
        
        $result = $conn->query($sql);
        
      }else{
  
        $message= '<div class="p-3 mb-2 bg-warning text-white">Fill all fields...</div>';
      }
    }catch (Exception $e)
    {
      echo $e;
    }
  
  }


?>

<head>
    <style>
        .tt td:hover {
            font-size: 30px;
        }

        .tt a:link {
            color: black;

        }

        /* visited link */
        .tt a:visited {
            color: green;
        }

        /* mouse over link */
        .tt a:hover {
            color: hotpink;
            font-size: 30px;
        }

        /* selected link */
        .tt a:active {
            color: blue;
        }

        .tt a:link {
            text-decoration: none;
        }

        .tt a:visited {
            text-decoration: none;
        }

        .tt a:hover {
            text-decoration: underline;
        }

        .tt a:active {
            text-decoration: underline;
        }
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
    <!-- for datatable from data tabelfolder-->
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css" />

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form class="pt-3" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="iddate">Search Date</label>
                                                        <input type="date" class="form-control form-control-sm" value="<?=$sdate;?>" name="idsdate" id="idsdate">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <input class="btn btn-primary  " type="submit" id="btnSearch" name="btnSearch" value="Search" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="text-align:right">
                                            <a href="../../pages/dash/" class="btn btn-sm btn-icon btn-primary pull-right mdi mdi-24px mdi-keyboard-backspace"> </a>
                                        </div>
                                        <h4 class="card-title">Sale</h4>
                                        <p class="card-description">
                                            Total Sale <code>.Date Wise</code>

                                        </p>
                                        <div class="table-responsive">
                                            <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                            <?php if($result == null){}else{?>
                                            <table id="example" class="table table-light table-bordered display table-sm" style="width:100%">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Sale Id</th>
                                                        <th>Product ID</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Total</th>
                                                        <th>Account Type</th>
                                                        <th>Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($row["saldate"]); ?></a></td>
                                                            <td><?= htmlspecialchars($row["saleid"]); ?></a></td>
                                                            <td width="200"><?= htmlspecialchars($row["productid"]); ?></a></td>
                                                            <td width="200"><?= htmlspecialchars($row["pname"]); ?></a></td>
                                                            <td style="text-align:right;"><?= htmlspecialchars($row["salqty"]); ?></td>
                                                            <td style="text-align:right;"><?= htmlspecialchars($row["salprice"]); ?></td>
                                                            <td style="text-align:right;"><?= htmlspecialchars($row["salprice"] * $row["salqty"]); ?></td>
                                                            <td><?php if($row["account"]== 1){echo "Loan";}else{echo "Cash";}?></td>
                                                            <td style="color:red"><?php if($row["remarks"] == "R"){echo "Returned";}?></td>
                                                            <td><button name="delete" style="color:red" class="btn mdi-24px btn-rounded btn-sm btn-icon delete mdi mdi-undo-variant" s-date="<?=$row["saldate"]?>" s-id="<?=$row["saleid"]?>" p-id="<?=$row["pid"]?>" acc-type="<?=$row["account"]?>" ></button></td>
                                                        </tr>
                                                    <?php  } ?>
                                                </tbody>
                                            </table>
                                            <?php } ?>
                                        </div>
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
        <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="jquery.js"></script>

        <script src="../../js/off-canvas.js"></script>
        <script src="../../js/hoverable-collapse.js"></script>
        <script src="../../js/template.js"></script>
        <script src="../../js/settings.js"></script>
        <script src="../../js/todolist.js"></script>




        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->

        <script src="jqajaxreturn.js"></script>
        <!-- from datatable folder-->

        <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</body>

</html>
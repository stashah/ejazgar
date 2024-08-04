<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$sql = 'SELECT * FROM customer';
$result = $conn->query($sql);
$msg = "";
if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
    $cls = $_GET["cls"];
}


?>

<head>
    <style>
        .tt td:hover{
            font-size: 30px;
        }
       .tt a:link {
            color: black;

        }

        /* visited link */
      .tt  a:visited {
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
                                    <div style="text-align:right">
                                        <a href="create.php" class="btn btn-sm btn-icon btn-primary pull-right mdi  mdi mdi-account btn-rounded"> New Customer</a>
                                    </div>
                                    <h4 class="card-title">customer</h4>
                                    <p class="card-description">
                                        Customer <code>.Details</code>

                                    </p>
                                    <div class="table-responsive tt">
                                    <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                    <div>
        Show / Hide Column: <a class="toggle-vis" data-column="0">Action</a> -  <a class="toggle-vis" data-column="3">Mobile</a> - <a class="toggle-vis" data-column="4">Address </a>
    </div>
                                        <table id="example" class="table table-light table-bordered display table-sm" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Customer Id</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><a href="update.php?id=<?= $row["custid"]; ?>"><span class="mdi mdi-mdi mdi-table-edit"></span></a></td></td>
                                                        <td><a href="report.php?id=<?= $row["custid"]; ?>"><?= htmlspecialchars($row["custid"]); ?></a></td>
                                                        <td><a href="report.php?id=<?= $row["custid"]; ?>"><?= htmlspecialchars($row["custname"]); ?></a></td>
                                                        <td><a href="report.php?id=<?= $row["custid"]; ?>"><?= htmlspecialchars($row["custmobile"]); ?></a></td>
                                                        <td><?= htmlspecialchars($row["custaddress"]); ?></td>
                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                        </table>
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

    <script src="jqajax.js"></script>
    <!-- from datatable folder-->

    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$id = $_GET["id"];

$sqlcust = 'SELECT * From customer where custid =' . $id;
$result = $conn->query($sqlcust);
$row = $result->fetch_assoc();

$sqlfund = "SELECT nt.id, nt.pdate,nt.details, nt.ct, nt.cr FROM 
(SELECT payables.id, payables.pdate,payables.details,payables.amount as ct,''as cr FROM payables where payables.custid={$id}
 UNION
 SELECT cashloanreturned.id, cashloanreturned.pdate, cashloanreturned.details, ''as ct, cashloanreturned.amount as cr FROM cashloanreturned WHERE cashloanreturned.custid={$id})
 as nt ORDER by nt.pdate";
$results = $conn->query($sqlfund);
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
<!-- Modal CSS from folder --->
<link rel="stylesheet" href="../../css/modal.css">
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
            <div class="main-panel ">
                <div class="content-wrapper">


                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:right">
                                        
                                    </div>
                                    <h4 class="card-title">Customer</h4>
                                    <p class="card-description">
                                        Customer <code>.Statement</code>
                                    </p>
                                    <div style="text-align:right;">
                                    </div>

                                    <div>
                                        <div class="row">
                                            <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                            <div class="col-md-6">
                                                <table width="100%">
                                                    <tr>
                                                        <td>ID</td>
                                                        <td><?= $id; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><?= $row["custname"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile:</td>
                                                        <td><?= $row["custmobile"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address:</td>
                                                        <td><?= $row["custaddress"] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-4 ">

                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-12">
                                                <div class="table-responsive">

                                                    <table  class="table table-light  display table-sm" style="width:100%">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Sr.</th>
                                                                
                                                                <th>Date</th>
                                                                <th>Details</th>
                                                                <th>Debit</th>
                                                                <th>Credit</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                           <?php   while ($rows = $results->fetch_assoc()) {$total= $total + $rows["amount"]; $rbalance= $rbalance +$rows["ct"]-$rows["cr"]; ?>
                                                    <tr>
                                                        <td><?= $sr = $sr+1; ?></td>
                                                        
                                                        <td><?= htmlspecialchars($rows["pdate"]); ?></a></td>
                                                        <td><?= htmlspecialchars($rows["details"]); ?></a></td>
                                                        <td><?= htmlspecialchars($rows["ct"]); ?></a></td>
                                                        <td><?= htmlspecialchars($rows["cr"]); ?></a></td>
                                                        <td style="text-align:right;"><?= number_format($rbalance,2); ?></td>
                                                    </tr>
                                                <?php  } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            
                                                            <th colspan="5" style="text-align:center;">Total Outstanding</th>
                                                          
                                                            
                                                            <th style="text-align:right;"><?= number_format($rbalance, 2); ?></th>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="myModal" class="modal ">
                   
                    <!-- Modal content -->
                    <div class="modal-content modal-sm">
                        <div class="modal-header">
                            <h2 style="font-size: 100%;">Receive Cash</h2>
                            <span class="close">&times;</span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="forms-sample" id="myform">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Date</label>
                                        <input type="date" class="form-control form-control-sm" id="iddate">
                                        <input type="text" disabled hidden="true" value="<?= $id; ?>" id="idcustid">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Details</label>
                                        <input type="text" class="form-control" autofocus id="iddetails" required placeholder="Payment details...">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Amount</Address></label>
                                        <input type="number" class="form-control" id="idamount" required value="0" placeholder="0">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2" id="btnaddpayment">Save</button>
                                    <a href="../customer/" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
<!-- end of modal -->
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
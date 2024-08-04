<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$sql = 'SELECT * FROM products';
$result = $conn->query($sql);
$msg = "";
if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
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
                                        <a href="create.php" class="btn btn-sm btn-primary pull-right">New
                                            Product</a>
                                    </div>
                                    <h4 class="card-title">Products</h4>
                                    <p class="card-description">
                                        Product <code>.Details</code>

                                    </p>
                                    <div class="table-responsive">
                                        <div id="msg"><?= $msg; ?></div>
                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Purchase Price</th>
                                                    <th>Total Purc</th>
                                                    <th>Sold</th>
                                                    <th>Stock </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($row["pid"]); ?></td>
                                                        <td><?= htmlspecialchars($row["pname"]); ?></td>
                                                        <td>
                                                            <?php
                                                            $sql1 = 'SELECT * FROM categories where cid=' . $row["cid"];
                                                            $result1 = $conn->query($sql1);
                                                            $r = $result1->fetch_assoc();
                                                            echo htmlspecialchars($r["cname"]);
                                                            ?>
                                                        </td>
                                                        <?php
                                                        $sqlsold = 'SELECT SUM(`salqty`) as solditem FROM sale WHERE productid=' . $row["pid"];
                                                        $sql2 = 'SELECT SUM(purqty) as stock FROM purchase WHERE productid=' . $row["pid"];
                                                        $resultsold = $conn->query($sqlsold);
                                                        $result2 = $conn->query($sql2);
                                                        $rsold = $resultsold->fetch_assoc();
                                                        $rs = $result2->fetch_assoc();
                                                        $solditem = $rsold["solditem"];
                                                        $titem = $rs["stock"];



                                                        ?>
                                                        <td>
                                                            <?php
                                                       
                                                        $sqlpprice = 'SELECT  purdate,purprice,purqty FROM purchase WHERE productid=' . $row["pid"];
                                                        $resultpprice = $conn->query($sqlpprice);
                                                        
                                                       
                                                        
                                                        while ($rpp = $resultpprice->fetch_assoc()) {
                                                        echo  $rpp["purdate"]." | ". $rpp["purprice"]." | ". $rpp["purqty"]."</br>";}
                                                        

                                                        ?>
                                                        </td>
                                                        <td align="right"><?= $titem; ?></td>
                                                        <td align="right"><?= $solditem; ?></td>
                                                        <td align="right">
                                                            <?= $titem - $solditem ?>
                                                        </td>
                                                        <td align="center">
                                                            <div class="btn-group btn-flex">
                                                                <button data-pid="<?= htmlspecialchars($row["pid"]); ?>" class='btn btn-social-icon btn-twitter btn-rounded  mdi mdi-table-edit btn-edit'></button> <span></span>
                                                                <button class="btn btn-social-icon btn-google btn-danger btn-rounded mdi mdi-delete btn-del" data-pid="<?= htmlspecialchars($row["pid"]); ?>"></button> 
                                                            </div>
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
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>



    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
    <script src="jquery.js"></script>
    <script src="jqajax.js"></script>
    <!-- from datatable folder-->

    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';
$sqlTrans = 'SELECT * FROM(SELECT mutualfund.id,mutualfund.pdate, CONCAT(mutualfund.details , " ", customer.custname) AS details,mutualfund.amount as debit,\'\'as credit,mutualfund.custid FROM mutualfund JOIN customer on mutualfund.custid=customer.custid 
UNION
SELECT mf.mfexid,mf.mfexdate,mf.mfexdetail,\'\',mf.mfexamount,\'\' from mutualfundexpense mf) as m ORDER BY m.pdate';
$resulttrans = $conn->query($sqlTrans);



//$sql = 'SELECT mutualfund.id,mutualfund.pdate,mutualfund.details,sum(mutualfund.amount) as amount,customer.custid,customer.custname FROM mutualfund JOIN customer on mutualfund.custid=customer.custid group by mutualfund.custid';


$sql = 'SELECT * FROM (SELECT mutualfund.id,mutualfund.pdate,mutualfund.details,sum(mutualfund.amount) as amount, 0 as expense,customer.custid,customer.custname FROM mutualfund JOIN customer on mutualfund.custid=customer.custid group by mutualfund.custid) as incom union
SELECT `mfexid`,`mfexdate`, "Total Expense",0 as income, sum(`mfexamount`) as expense,0,\'Total Expense\' FROM mutualfundexpense AS A';

$result = $conn->query($sql);

//print_r($result->fetch_all());
$msg = "";
if (!empty($_GET["msg"])) {
    $msg = $_GET["msg"];
    $cls = $_GET["cls"];
}

$sqlex = 'SELECT * from mutualfundexpense';
$resultex = $conn->query($sqlex);




?>

<head>
    <style>
        .tt td:hover{
            
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
                                      
                                      <a href="create.php" class="btn btn-sm btn-icon btn-success pull-right"> Receiving</a>
                                      <a href="expense.php" class="btn btn-sm btn-icon btn-danger pull-right"> Payment </a>
                                    </div>
                                    <h4 class="card-title">Contribution</h4>
                                    <p class="card-description">
                                        Contribution <code>.Statement</code>

                                    </p>
                                    <div class="table-responsive tt">
                                    <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                    
                                              <table id="contr_tbl"
                                               class="table table-light table-bordered display table-sm" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    
                                                    <th>Sr.</th>
                                                    <th>Tr. ID</th>
                                                    <th>Tr. Date</th>
                                                    <th>Details</th>
                                                    <th>Debit</th>
                                                    <th>Credit</th>
                                                    <th>Balance</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $total=0; 
                                                    $debit=0; 
                                                    $credit=0; 
                                                    $count=1; 
                                                    while ($row = $resulttrans->fetch_assoc()) {
                                                        $total = $total + floatval($row["debit"]) - floatval($row["credit"]); 
                                                        $debit = $debit + floatval($row["debit"]);
                                                        $credit = $credit + floatval($row["credit"]); 
                                                ?>
                                                    <tr> 
                                                
                                                      <td><?php  echo $count++;?></td>
                                                      <td><?= htmlspecialchars($row["id"]); ?></td>
                                                      <td><?= htmlspecialchars($row["pdate"]); ?></td>
                                                      <td><?= htmlspecialchars($row["details"]); ?></td>
                                                      <td style="text-align:right;"><?= htmlspecialchars($row["debit"]); ?></td>                                                                                            <td style="text-align:right;"><?= htmlspecialchars($row["credit"]); ?></td>
                                                      <td style="text-align:right;"><?= htmlspecialchars(number_format($total,2)); ?></td>
                                                    </tr>

                                                <?php  
                                                    } 
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                
                                                <th style="text-align:center;" colspan="4">
                                                    Total 
                                                </th>
                                                <th style="text-align:right;">
                                                    <?=number_format($debit, 2);?>
                                                </th>
                                                <th style="text-align:right;">
                                                    <?=number_format($credit, 2);?>
                                                </th>
                                                <th style="text-align:right;">
                                                    <?=number_format($total, 2);?>
                                                </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:right">
                                      
                                        
                                    </div>
                                    <h4 class="card-title">Contribution</h4>
                                    <p class="card-description">
                                        Contribution <code>.Details</code>

                                    </p>
                                    <div class="table-responsive tt">
                                    <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                    
                                        <table id="example1" class="table table-light table-bordered display table-sm" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    
                                                    <th>Sr.</th>
                                                    
                                                    <th>Member Name</th>
                                                    
                                                    <th>Contribution</th>
                                                     <th>Expense</th>
                                                      <th>Balance </th>
                                                    
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $bal=0; 
                                                    $total=0;
                                                    $exp=0;
                                                    $srExp=1; 
                                                    while ($row = $result->fetch_assoc()) { 
                                                        $total = $total + $row["amount"];
                                                        $exp = $exp + $row["expense"]; 
                                                        $bal = $bal + $row["amount"] - $row["expense"]; 
                                                 ?>
                                                    <tr>
                                                        <td><a href="report.php?id=<?= $row["custid"]; ?>"><?=$srExp++; ?></a></td>
                                                        <td><a href="report.php?id=<?= $row["custid"]; ?>"><?= htmlspecialchars($row["custname"]); ?></a></td>
                                                        <td style="text-align:right;"><?= htmlspecialchars(number_format($row["amount"],2)); ?></td>
                                                        <td style="text-align:right;"><?= htmlspecialchars(number_format($row["expense"],2)); ?></td>
                                                        <td style="text-align:right;"> <?=number_format($bal, 2);?></td>
                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                            <tfoot>
                                                
                                                <th style="text-align:center;" colspan="2">
                                                    Total 
                                                
                                                <th style="text-align:right;">
                                                    <?=number_format($total, 2);?>
                                                </th>
                                                <th style="text-align:right;">
                                                     <?=number_format($exp, 2);?>
                                                </th>
                                                <th style="text-align:right;">
                                                     <?=number_format($bal, 2);?>
                                                </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div style="text-align:right">
                                        
                                    </div>
                                    <h4 class="card-title">Expense </h4>
                                    <p class="card-description">
                                        Expense <code>.Details</code>

                                    </p>
                                    <div class="table-responsive tt">
                                    
                                    
                                        <table id="exampleex" class="table table-light table-bordered display table-sm" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    
                                                    <th>Sr.</th>
                                                    
                                                    <th>Details </th>
                                                    
                                                    <th>Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $totalex=0; while ($rowex = $resultex->fetch_assoc()) { $totalex = $totalex + $rowex["mfexamount"]; ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($rowex["mfexid"]); ?></a></td>
                                                        
                                                        <td><?= htmlspecialchars($rowex["mfexdetail"]); ?></a></td>
                                                        
                                                        <td style="text-align:right;"><?= htmlspecialchars(number_format($rowex["mfexamount"],2)); ?></td>
                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                            <tfoot>
                                                
                                                <th style="text-align:center;" colspan="2">
                                                    Total 
                                                </th>
                                                <th style="text-align:right;">
                                                    <?=number_format($totalex, 2);?>
                                                </th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h1>Balance: <?php echo number_format(($total-$totalex), 2); ?></h1>
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
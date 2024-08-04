<!DOCTYPE html>
<html lang="en">
<?php
require '../../assets/db.php';

$sqlproducts = 'SELECT * FROM products';
$resproducts = $conn->query($sqlproducts);
$totalcalculation = [];
while($rowproduct = $resproducts->fetch_assoc()){
$purchase =[];
$sells = [];
$sqlpur = 'SELECT * FROM purchase join products on purchase.productid=products.pid WHERE purchase.productid = '.$rowproduct["pid"];

$resultpur = $conn->query($sqlpur);

while ($rowpur = $resultpur->fetch_assoc()) {
    $array_item = array(
        'pid' =>    $rowpur["productid"],
        'pname' => $rowpur["pname"],
        'qty' =>    $rowpur["purqty"],
        'price' =>  $rowpur["purprice"],
        'amt'   =>  0,
        'sold' => 0

    );
$purchase[] = $array_item;
}


$sqlsell = 'SELECT * FROM sale WHERE sale.productid ='.$rowproduct["pid"];
$resultsell = $conn->query($sqlsell);
while ($rowsell = $resultsell->fetch_assoc()) {
    $array_item= array(
        'pid'   =>  $rowsell["productid"],
        'qty'   =>  $rowsell["salqty"],
        'amt'   =>  0,
        'purAmt' => 0,
        "price" => $rowsell["salprice"]
    );
$sells[] = $array_item; 
}


$msg = "";
/*
$sells = [
    ["name"=>"Foam","qty"=>10,"amt"=>0,"purAmt"=>0, "price"=>2000],
    ["name"=>"Foam","qty"=>7,"amt"=>0,"purAmt"=>0, "price"=>2500],
    ["name"=>"Foam","qty"=>5,"amt"=>0,"purAmt"=>0, "price"=>3000],    
];
$purchase = [
    ["name"=>"Foam","qty"=>2,"price"=>1200, "amt"=>0],
    ["name"=>"Foam","qty"=>1,"price"=>1200, "amt"=>0],
    ["name"=>"Foam","qty"=>15,"price"=>2000, "amt"=>0],
    ["name"=>"Foam","qty"=>5,"price"=>2500, "amt"=>0],
];
*/
foreach ($sells as $key => $value) {
    $sells[$key]["amt"] = $value["qty"] * $value["price"];
}


// FIFO Calculation Stat
foreach ($purchase as  $pur_key => $pur) {
    $sellAmount = 0;
    $balance =$pur["qty"];
    $usedQty=0;
    $detail = [];
    $sellQty = [];
    $sold = 0;
    foreach ($sells as $sell_key => $sell) {
        if($balance != 0){
           if($sell["qty"] <= $balance){
               $sells[$sell_key]["qty"] = 0;
               $tempArr[] = $sell;
               unset($sells[$sell_key]);
               $sellAmount += $sell["qty"] * $sell["price"];
                $detail[] = $sell["qty"] ."*". $sell["price"] . "=" . $sell["qty"] * $sell["price"];
                $sellQty[] = array('selQty' => $sell["qty"],'selAmt' => $sell["price"]);
                $balance -= $sell["qty"];
                $sold += $sell["qty"];
                //    print_r($sellAmount);
                //    die;
           }else{
               if($sell["qty"] > $balance ){
                 $balance -= $sell["qty"];
                 $usedQty = $sell["qty"] - abs($balance);
                 $sells[$sell_key]["qty"]= abs($balance);
                 if($balance != 0){
                   $sellAmount += $usedQty * $sell["price"];
                   $detail[] = $usedQty ."*". $sell["price"] . "=" . $usedQty * $sell["price"];
                   $sellQty[] = array('selQty' => $usedQty,'selAmt' => $sell["price"]);
                   $sold +=  $usedQty;    
                 }
                 $balance = max(0,$balance);
                 break;
               }
           }     
        }
    }
    // $purchase[ $pur_key]["details"] = $detail;
    $purchase[$pur_key]["seldetails"] = $sellQty;
    $purchase[ $pur_key]["sellAmt"] = $sellAmount;
    $purchase[ $pur_key]["sold"] = $sold;
    $purchase[ $pur_key]["amt"] = ($purchase[ $pur_key]["qty"] - ($purchase[ $pur_key]["qty"] - $sold)) * $purchase[ $pur_key]["price"];
    $purchase[ $pur_key]["gainLoss"] = $purchase[ $pur_key]["sellAmt"] - $purchase[ $pur_key]["amt"];
}
//FIFO Calculation End
// print_r($sells);
//  print_r($purchase);
// print_r($tempArr);
//  die;
 $totalcalculation[] = $purchase;
}

// print_r($totalcalculation);
// die;
















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
                                        <a href="create.php" class="btn btn-sm btn-icon btn-primary pull-right mdi  mdi mdi-account btn-rounded"> New Product</a>
                                    </div>
                                    <h4 class="card-title">Products</h4>
                                    <p class="card-description">
                                        Products <code>.Details</code>

                                    </p>
                                    <div class="table-responsive">
                                    <div id="msg" class="<?= $cls; ?>"><?= $msg; ?></div>
                                    <div>
        
    </div>
                                        <table id="example2" class="table table-light table-bordered display table-sm" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th></th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Pur Qty</th>
                                                    <th>Pur Amt</th>
                                                    <th>Sold</th>
                                                    <th>Pur Amount</th>
                                                    <th>Total Sell Price </th>
                                                    <th>Stock </th>
                                                    <th>Gain/Loss</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach ($totalcalculation as  $tc_key => $tc) {
                                                foreach ($totalcalculation[$tc_key] as  $pur_key => $pur) { ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?=$pur["pid"]?></td>
                                                    <td><?=$pur["pname"]?></td>
                                                    <td><?=$pur["qty"] . "*" . $pur["price"]  ?></td>
                                                    <td><?=$pur["qty"] * $pur["price"]  ?></td>

                                                    <td><?php 
                                                        $selldet =$pur["seldetails"];
                                                        
                                                        $sqty =0;
                                                        foreach ($selldet as  $sd_key => $sd) {
                                                             $sqty += $selldet[$sd_key]["selQty"];    
                                                        }
                                                        echo $sqty;
                                                    ?></td>
                                                    <td><?=$pur["amt"]?></td>
                                                    <td><?=$pur["sellAmt"]?></td>
                                                    <td><?=$pur["qty"]-$sqty;?></td>
                                                    <td style="text-align:right;"><?=number_format($pur["gainLoss"],2)?></td>
                                                </tr>
                                                <?php  } }?>
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
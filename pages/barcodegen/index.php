<!DOCTYPE html>
<html lang="en">
<?php


$txtcode = "";
    $id = "";
    $amount = "";
if(isset ($_POST['idcode']) ) {

    

    $txtcode = $_POST['idname'];
    $id = $_POST['idpid'];
    $amount = $_POST['idprice'];

    
    
  
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
    <link rel="stylesheet" href="../autocomp/jquery.auto-complete.css">

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
                                                    <label for="idcode">Search Product</label>
                                                        <input type="text" name="idpid" id="idpid" style="display:none" value="0">
                                                        <input type="text" class="form-control form-control-sm"  name="idcode" id="idcode">
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                        <input type="text" name="idname" id="idname"  class="form-control form-control-sm" placeholder="Product Name on Sticker.."  >
                                                    </div>
                                                        <div class="form-group">
                                                        <input type="text" class="form-control form-control-sm" name="idprice" id="idprice"  placeholder="price..">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <input class="btn btn-primary  " type="submit" id="btnSearch" name="btnSearch" value="Generate" />
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
                                    
                                    <div class="table-responsive">
                                        
                                        <div style='text-align: center;'>
                                            <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                                            <table>
                                                <tr>
                                                    <td>
                                                      <strong>  <?=$txtcode?></strong>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td >
                                                    <img style="margin-bottom: -25px;" alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=<?=$id;?>&code=Code128&translate-esc=on' />
                                                       
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                     <strong style="background-color: white;">   Rs. <?=$amount;?></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <br>
                                                        <br><br>
                                                    <img alt='Barcode Generator TEC-IT'
       src='https://barcode.tec-it.com/barcode.ashx?data=id:<?=$id;?> Price:<?=$amount?> Name:<?=$txtcode?>&code=MobileQRCode&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=0&hidehrt=False&eclevel=L'/>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        <div style='padding-top:8px; text-align:center; font-size:15px; font-family: Source Sans Pro, Arial, sans-serif;'>
                                            <!-- back-linking to www.tec-it.com is required -->
                                            <a href='https://www.tec-it.com' title='Barcode Software by TEC-IT' target='_blank'>
                                                TEC-IT Barcode Generator<br />
                                                <!-- logos are optional -->
                                               
                                            </a>
                                        </div>

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
    <script src="../autocomp/jquery.auto-complete.js"></script>

    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>

</body>

</html>
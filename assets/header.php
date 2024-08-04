<?php date_default_timezone_set("Asia/Karachi");
session_start();
if(!empty($_SESSION["logindetails"])){
  
 
}else{
header("Location: https://ejazgarments.42web.io/index.html");
          exit();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Salam Electornics</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <!-- Bootstrap -->


  <style>
    .navbar .navbar-menu-wrapper {
      background: #3c8dbc;
    }

    .navbar .navbar-brand-wrapper {
      background: #367fa9;
      border: 1px #367fa9;

    }

    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand {
      color: var(--white);
    }

    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-toggler {
      border: 0;
      color: var(--white);

    }

    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand:active,
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand:focus,
    .navbar .navbar-brand-wrapper .navbar-brand-inner-wrapper .navbar-brand:hover {
      color: #ffffff;
    }

    .form-control,
    .dataTables_wrapper select {
      border: 2px solid #367fa9;

    }


    select.form-control,
    .dataTables_wrapper select {
      padding: .4375rem .75rem;
      border: 0;
      outline: 2px solid var(--gray-light);
      color: #367fa9;
    }


    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    table a {
      color: black;
    }

    th {
      background: #367fa9;
      color: white;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 4px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    .card-header  {
      background: #367fa9;
      color: white;
      text-align: center;
    }
    .card-header  a {
      background: #367fa9;
      color: white;
      text-align: center;
    }

    .card-header .btn {
      background: #f39c12;
      color: white;
      text-align: center;

    }

    legend {
      color: #367fa9;
    }
    h6{
      font-size: 10px;
    }

    .card .card-body{
      padding: 13px;
    }
    .handsets-strip {
      width: 330px;
      height: 100px;
      background-repeat: no-repeat;
      background-position: center top;
      display: block;
      -webkit-transition: width 0.25s ease-in-out;
      -moz-transition: width 0.25s ease-in-out;
      -ms-transition: width 0.25s ease-in-out;
      -o-transition: width 0.25s ease-in-out;
      transition: width 0.25s ease-in-out;
    }

    .handsets-strip-box-1 {
      width: auto;
      height: auto;
      position: fixed;
      top: 0%;
      right: 40%;
      display: none;
      z-index: 99999;
    }

    /* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
  </style>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="../../pages/dashboard/"><span class="logo-lg"><b>Salam</b>Electronics</span></a>
          <a class="navbar-brand brand-logo-mini" href="../../pages/dashboard/"><span class="logo-mini"><b>S</b>E</span></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <!-- <h3 style="color:white"><?php echo date("Y-m-d h:i:sa")?></h3> -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/nafees.jpg" alt="profile" />
              <span class="nav-profile-name"><?=$_SESSION["logindetails"]["name"];?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="../../logout.php">
                <i class="mdi mdi-logout text-primary"> </i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../pages/dashboard/">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Entries</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/products/">Products</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/customers/">Customers</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/guarantor/">Guarantor</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/vendor/">Vendors</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/employee/">Employees</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic_inv" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Invoice</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic_inv">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/purchase/">Purchase</a></li>

              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/inquiryregistration/">
              <i class="mdi mdi-cart menu-icon"></i>
              <span class="menu-title">Lease</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic_rep" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic_rep">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/reports/freshlist.php">List of Active Cases</a></li>

              </ul>
            </div>
          </li>
<!--
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
-->
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
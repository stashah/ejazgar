<?php 
date_default_timezone_set("Asia/Karachi");
  session_start();
  if($_SESSION["logindetailsshop"]){

    $greetings ="";
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        $greetings = "Good morning";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        $greetings = "Good afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        $greetings = "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        $greetings = "Good night";
    }

    
    if($_SESSION["logindetailsshop"]['role'] == "admin"){

    }else if($_SESSION["logindetailsshop"]["role"] == "user" && $_SESSION["logindetailsshop"]['shop'] == "2" ){
        header('Location: ../../pages/sale/indexuser.php');
    }
    else{
        unset($_SESSION["logindetailsshop"]);
        header("Location: index.php");
        exit();
    }

    
  }else{
    header('Location: https://ejazgarments.42web.io/index.html');
  }


?>
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center hhtog" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../../pages/dash/">
            <img src="../../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="../../pages/dash/">
            <img src="../../images/logo-mini.svg" alt="logo" />
          </a>
                <p class="welcome-sub-text">Shop <?=$_SESSION["logindetailsshop"]['shop']?> </p> 
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><?=$greetings;?>, <span class="text-black fw-bold"><?=$_SESSION["logindetailsshop"]["name"];?></span></h1>
            <h3 class="welcome-sub-text">Shop Branch <?=$_SESSION["logindetailsshop"]['shop']?> </h3> 
            <?=$_SESSION["logindetailsshop"]["role"]?>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">        
          <li class="nav-item">
            <form class="search-form" action="#">
              <i class="icon-search"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
          </li>
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="../../images/person.png" alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="../../img-md rounded-circle" src="../../images/person.png" alt="Profile Image">
                <p class="mb-1 mt-3 font-weight-semibold"><?=$_SESSION["logindetailsshop"]["name"];?></p>
                <p class="fw-light text-muted mb-0"></p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              
              <a href="../../logout.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>

        <?php include "buttons.php"?>
      </div>
    </nav>
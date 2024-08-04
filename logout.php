<?php
session_start();
unset($_SESSION["logindetailsshop"]);
header("Location: index.html");

exit();
?>
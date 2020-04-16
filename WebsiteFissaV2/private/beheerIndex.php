<?php
    session_start();
    require_once("initialize.php");
    include("beheerHeader.php");
    print_r($_SESSION['login_user']);
?>
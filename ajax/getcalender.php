<?php
    session_start();
    //include ("../config.php");
    include_once "../functions.php";
    $namapeg = $_GET['namapeg'];
    $niep = $_GET['niep'];
    echo getCalender($niep,$namapeg);
    
?>
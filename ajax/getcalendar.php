<?php
   session_start();
   include_once "../functions.php";
   $niep = $_GET['niep'];
   $namapeg = $_GET['namapeg'];
     
   echo getCalender($niep,$namapeg);
?>
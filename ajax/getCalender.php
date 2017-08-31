<?php
   session_start();
   include("config.php");
   include_once "functions.php";

   echo getCalender(nip);
?>
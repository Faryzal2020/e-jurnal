<?php
   include('config.php');
   session_start();

   if(!isset($_SESSION['nip'])){
      header("location: index.php");
   }
?>

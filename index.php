<?php
   session_start();
   include("config.php");

   if (isset($_SESSION['nip'])){
      $nip = $_SESSION['nip'];
      $level = $_SESSION['level'];
      $nama = $_SESSION['nama'];
?>
<!DOCTYPE HTML>
<html>
   <head>
   <meta charset="utf-8">
   <title>Login E-Jurnal</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
   <link rel="stylesheet" type="text/css" href="css/homepage2.css">
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body class="background">
      <div class="page">
         <?php 
            if ($level == '2'){
               include_once "views/staf/home.php";
            } else {
               include_once "views/admin/home.php";
            }
         ?>
         <script type="text/javascript" src="js/scripts.js"></script>
         <script type="text/javascript" src="assets/js/jquery.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
      </div>
   </body>
</html>
<?php
}else{
   header("Location:login.php");
}
?>

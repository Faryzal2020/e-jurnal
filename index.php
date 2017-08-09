<?php
   session_start();
   include("config.php");

   if (isset($_SESSION['nip'])){
      $nip = $_SESSION['nip'];
      $level = $_SESSION['level'];
      $nama = $_SESSION['nama'];
      $email = $_SESSION['email'];

      $ALsql = "SELECT a.id_aktivitas, a.nama_aktivitas, a.durasi, k.nama_kategori FROM aktivitas AS a LEFT JOIN kategori AS k ON a.id_kategori = k.id_kategori";
      $ALquery = mysqli_query($db,$ALsql);

      if(count($_POST)>0) {
      }
?>
<!DOCTYPE HTML>
<html>
   <head>
   <meta charset="utf-8">
   <title>E-Jurnal Setwapres</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
   <link rel="stylesheet" type="text/css" href="css/a.css">
   
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
         <script type="text/javascript" src="assets/js/jquery.min.js"></script>
         <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
         <script type="text/javascript" src="js/scripts.js"></script>
         <script type="text/javascript">
            var modal = document.getElementById('tCModal');
            var namaAct = document.getElementById('tcmNamaAct');
            var durasiAct = document.getElementById('tcmDurasi');
            var namaCat = document.getElementById('tcmNamaCat');
            var idInput = document.getElementsByClassName('tcm_IDAct')[0];
            var span = document.getElementsByClassName("close")[0];
            function selectActivity(id, nama, durasi, cat){
               console.log(id + nama + durasi + cat);
               modal.style.display = "block";
               namaAct.innerHTML = nama;
               durasiAct.innerHTML = durasi;
               namaCat.innerHTML = cat;
               idInput.value = i;
            }
            span.onclick = function() {
               modal.style.display = "none";
            }
            window.onclick = function(event){
               if(event.target == modal){
                  modal.style.display = "none";
               }
            }

            function searchAct() {
               var input, filter, table, tr, td, i;
               input = document.getElementById("actSearch");
               filter = input.value.toUpperCase();
               table = document.getElementById("actTable");
               tr = table.getElementsByTagName("tr");
               console.log(filter)
               if(filter == ''){
                  for (i = 2; i < tr.length; i++){
                     td = tr[i].getElementsByTagName("td")[1];
                     if(td){
                        tr[i].style.display = "none";
                     }
                  }
                  tr[1].style.display = "";
               } else {
                  tr[1].style.display = "none";
                  for (i = 2; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[1];
                     if(td){
                        if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                           tr[i].style.display = "";
                        } else {
                           tr[i].style.display = "none";
                        }
                     }
                  }
               }
               
            }

            function validateSJ() {
               var volumetype = document.forms["FormSJ"]["volumeType"].value;

            }
         </script>
         <script type="text/javascript">
         $('.clockpicker').clockpicker({
            donetext: 'Done'
         });
         </script>
      </div>
   </body>
</html>
<?php
}else{
   header("Location:login.php");
}
?>

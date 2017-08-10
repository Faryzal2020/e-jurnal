<?php
   session_start();
   include("config.php");

   function Redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       exit();
   }

   if (isset($_SESSION['nip'])){
      $nip = $_SESSION['nip'];
      $level = $_SESSION['level'];
      $nama = $_SESSION['nama'];
      $email = $_SESSION['email'];

      $ALsql = "SELECT a.id_aktivitas, a.nama_aktivitas, a.durasi, k.nama_kategori FROM aktivitas AS a LEFT JOIN kategori AS k ON a.id_kategori = k.id_kategori";
      $ALquery = mysqli_query($db,$ALsql);
      $Catsql = "SELECT * FROM kategori";
      $Catquery = mysqli_query($db,$Catsql);

      if(count($_POST)>0) {
          
         ?><script type="text/javascript"> alert('$_POST');</script><?php
         if(!empty($_POST['tcm_idAct'])){
            $id = $_POST['tcm_idAct'];
            $vol = $_POST['volume'];
            $voltype = $_POST['volumeType'];
            $mulai = $_POST['tglMulai'] .' '. $_POST['jamMulai'] . ':00';
            $selesai = $_POST['tglSelesai'] .' '. $_POST['jamSelesai'] . ':00';
            $tgljurnal = date("Y-m-d");
            $acttype = $_POST['actType'];
            $msg;
            $SJsql = "INSERT INTO jurnal(`id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`, `tanggal_jurnal`, `jenis_aktivitas`)  
                        VALUES ('$id','$nip','$vol','$voltype','$mulai','$selesai','$tgljurnal','$acttype')";
            mysqli_query($db,$SJsql);
         } else if( !empty($_POST['nama_pegawai'])){
              $nip = $_SESSION['nip'];
              $nama = $_POST['nama_pegawai'];
              $email = $_POST['email_pegawai'];
              $_SESSION['nama'] = $nama;
              $_SESSION['email'] = $email;
              $bio_update = ("UPDATE user SET       nama_pegawai='$nama',
                                                    email_pegawai='$email'
                                                    WHERE nip='$nip'");
              mysqli_query($db,$bio_update);
          } else if( !empty($_POST['password_baru'])){
              $nip = $_SESSION['nip'];
              $password = $_POST['password_baru'];
              $pass_update = ("UPDATE user SET password='$password' WHERE nip = '$nip'");
              mysqli_query($db,$pass_update);
          }
        Redirect('index.php');
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
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    
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
            var idInput = document.getElementsByClassName('tcm_idAct')[0];
            var span = document.getElementsByClassName("close")[0];
            var ddc = document.getElementById("ddcContent");
            var pass_select = document.getElementById('pass_select');
            var tutup = document.getElementsByClassName("tutup")[0];
            var bio_select = document.getElementById('bio_select'); 
            var tutupin = document.getElementsByClassName("tutupin")[0];
            
            span.onclick = function() {
                modal.style.display = "none";
            }
            tutup.onclick = function() {
                pass_select.style.display = "none";
            }
            tutupin.onclick = function() {
                bio_select.style.display = "none";
            }
            
            window.onclick = function(event){
                if(event.target == modal || event.target == pass_select || event.target == bio_select){
                    modal.style.display = "none";
                    pass_select.style.display = "none";
                    bio_select.style.display = "none";
                }else if (!event.target.matches('.dropbtn')){
                    var ddc = document.getElementById("ddcContent");
                    if ( ddc.classList.contains("show")){
                        ddc.classList.toggle("show");
                    }
                }else {
                        if (event.target == pass_select){
                        pass_select.style.display = "none";
                        }
                        if (event.target == bio_select){
                        bio_select.style.display = "none";
                        }
                }
            }
            var ubah = document.querySelectorAll('.tombol_ubah')
            var ubah_ubah = document.querySelectorAll('.ubah_ubah')
            var forEach = Array.prototype.forEach;
            
            forEach.call(ubah, ubah_addListener)
            
            function ubah_addListener (r, m) {
               console.log('ubah')
               r.addEventListener('click', function () {
                   setActive_ubah(m)
               })
            }
            function ubah_removeActive(r) {
               r.classList.remove('active')
            }
             
            function setActive_ubah(m) {
                forEach.call(ubah, ubah_removeActive)
                forEach.call(ubah_ubah, ubah_removeActive)
                ubah[m].classList.add('active')
                ubah_ubah[m].classList.add('active')
            }
             
            function selectActivity(id, nama, durasi, cat){
               console.log(id + nama + durasi + cat);
               modal.style.display = "block";
               namaAct.innerHTML = nama;
               durasiAct.innerHTML = durasi;
               namaCat.innerHTML = cat;
               idInput.value = id;
            }
            function bio_selectActivity(nip){
                var nomorinduks = document.getElementById("nomorinduks");
                bio_select.style.display = "block";
                nomorinduks.innerHTML = nip;
                var nip_input = document.forms['Formbio']['nip_input'].value;
                nip_input = nip;
            }
             
             function validateUB(){
                 var nama_pegawai = document.forms['Formbio']['nama_pegawai'].value;
                var email_pegawai = document.forms['Formbio']['email_pegawai'].value;
                 if (nama_pegawai == "" || email_pegawai == "") {
                     alert("Semua kolom harus diisi");
                 } else {
                     document.getElementById("Formbio").submit();
                 }
                 
             }
              function validatepass(){
                 var password_lama = document.forms['Formpass']['password_lama'].value;
                 var password_baru = document.forms['Formpass']['password_baru'].value;
                 var password_baru_konfirmasi = document.forms['Formpass']['password_baru_konfirmasi'].value;
                 if (password_lama == "" || password_baru == "" || password_baru_konfirmasi=="")                 {
                     alert("Semua kolom harus diisi");
                 } else {
                     <?php  $passnya = "SELECT password FROM user WHERE nip = '$nip'";
                            $pass = mysqli_query($db,$passnya);
                    while($password=mysqli_fetch_array($pass)){
                     ?>
                     if (password_lama == "<?php echo $password['password']; ?>"){
                         if(password_baru == password_baru_konfirmasi){
                                console.log(password_lama + password_baru + password_baru_konfirmasi);
                                document.getElementById("Formpass").submit();
                                alert("Password Telah Diganti");
                            } else {
                                alert("Password Baru Tidak Sesuai dengan Konfirmasi");
                            }
                     }
                     else{
                         alert("Password Lama Tidak Sesuai");
                     }
                  <?php
                    }
                  ?>
                 }
              }
             
            function pass_selectActivity(){
                    pass_select.style.display = "block";
            }

            function searchAct() {
               var input, filter, catFilter, catBtn, table, tr, td, i, showCount = 0;
               catBtn = document.getElementById("ddcBtn");
               input = document.getElementById("actSearch");
               filter = input.value.toUpperCase();
               table = document.getElementById("actTable");
               tr = table.getElementsByTagName("tr");

               if(catBtn.classList.contains("selectd")){
                  catFilter = catBtn.innerHTML;
               } else {
                  catFilter = '';
               }

               for (i = 2; i < tr.length; i++){
                  td = tr[i].getElementsByTagName("td")[1];
                  if(td){
                     tr[i].style.display = "none";
                  }
               }
               if(filter != '' && catFilter != ''){
                  for (i = 2; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[1];
                     tdcat = tr[i].getElementsByTagName("td")[3];
                     if(td){
                        if(td.innerHTML.toUpperCase().indexOf(filter) > -1 && tdcat.innerHTML.indexOf(catFilter) > -1){
                           tr[i].style.display = "";
                           showCount++;
                        }
                     }
                  }
               } else if(filter != ''){
                  for (i = 2; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[1];
                     if(td){
                        if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                           tr[i].style.display = "";
                           showCount++;
                        }
                     }
                  }
               } else if( catFilter != ''){
                  for (i = 2; i < tr.length; i++) {
                     tdcat = tr[i].getElementsByTagName("td")[3];
                     if(tdcat){
                        if(tdcat.innerHTML.indexOf(catFilter) > -1) {
                           tr[i].style.display = "";
                           showCount++;
                        }
                     }
                  }
               }

               document.getElementById("actCount").innerHTML = showCount;
               if( showCount <= 0 ){
                  tr[1].style.display = "";
                  if( filter != '' || catFilter != ''){
                     document.getElementById("actTableMessage").innerHTML = "No Result";
                  } else {
                     document.getElementById("actTableMessage").innerHTML = "Mulai pencarian dengan mengetik pada kolom search atau pilih kategori";
                  }
               } else {
                  tr[1].style.display = "none";
               }
            }

            function selectCat(cat) {
               catBtn = document.getElementById("ddcBtn");
               if(cat != 'Semua'){
                  catBtn.classList.add("selectd");
               } else {
                  catBtn.classList.toggle("selectd");
               }
               document.getElementById("ddcContent").classList.toggle("show");
               catBtn.innerHTML = cat;
               searchAct();
            }

            function validateSJ() {
               var volumetype = document.forms["FormSJ"]["volumeType"].value;
               var tglMulai = document.forms["FormSJ"]["tglMulai"].value;
               var tglSelesai = document.forms["FormSJ"]["tglSelesai"].value;
               var jamMulai = document.forms["FormSJ"]["jamMulai"].value;
               var jamSelesai = document.forms["FormSJ"]["jamSelesai"].value;
               var error = 0;
               var msg;
               if (volumetype == "" || tglMulai == "" || tglSelesai == ""){
                  msg = "Semua kolom harus diisi";
                  error++;
               } else if ( tglMulai > tglSelesai){
                  msg = "Tanggal selesai tidak boleh lebih awal dari tanggal mulai";
                  error++;
               } else if ( tglMulai == tglSelesai) {
                  if ( jamMulai >= jamSelesai ) {
                     msg = "Jam selesai tidak boleh lebih awal atau sama dengan jam mulai di hari yang sama"
                     error++;
                  }
               }

               if ( error == 0){
                  alert("ok");
                  document.getElementById("FormSJ").submit();
               } else {
                  alert(msg);
               }

            }
         </script>
         <script type="text/javascript">
         $('.dropbtn').click(function(){
            document.getElementById("ddcContent").classList.toggle("show");
         })
         $('.clockpicker').clockpicker({
            autoclose: true
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

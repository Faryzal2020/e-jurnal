<?php
   session_start();
   include("config.php");

   function Redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       exit();
   }
$nip = $_SESSION['nip'];
?> <script> console.log('<?php echo $nip ?>');</script><?php 

   if (isset($_SESSION['nip'])){
      $nip = $_SESSION['nip'];
      $nipb = $_SESSION['nipb'];
      $level = $_SESSION['level'];
      $nama = $_SESSION['nama'];    
      $bagian= $_SESSION['bagian'];
      $jabatan = $_SESSION['jabatan'];

      // Activity List
      $ALsql = "SELECT a.id_aktivitas, a.nama_aktivitas, a.durasi, k.nama_kategori FROM aktivitas AS a LEFT JOIN kategori AS k ON a.id_kategori = k.id_kategori";
      $ALquery = mysqli_query($db,$ALsql);
      $ALquery2 = mysqli_query($db,$ALsql);
      // Category
      $Catsql = "SELECT * FROM kategori";
      $Catquery = mysqli_query($db,$Catsql);
      $Catquery2 = mysqli_query($db,$Catsql);
      // Semua Pegawai
      $ALLsql = "SELECT * FROM user WHERE user.level < 99";
      $ALLquery = mysqli_query($db,$ALLsql);
      // Daftar Pegawai
      $DPsql = "SELECT * FROM user WHERE user.level < '$level'";
      $DPquery = mysqli_query($db,$DPsql);
      // Daftar Pegawai Subbagian
      $DPSsql = "SELECT * FROM user WHERE user.level < '$level' AND user.bagian = '$bagian'";
      $DPSquery = mysqli_query($db,$DPSsql);
      // Jurnal Staff
      $LJstaffsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip'";
      $LJstaffquery = mysqli_query($db, $LJstaffsql);

      if(count($_POST)>0) {
         if(!empty($_POST['tcm_idAct'])){
            $id = $_POST['tcm_idAct'];
            $vol = $_POST['volume'];
            $voltype = $_POST['volumeType'];
            $mulai = $_POST['tglMulai'] .' '. $_POST['jamMulai'] . ':00';
            $selesai = $_POST['tglSelesai'] .' '. $_POST['jamSelesai'] . ':00';
            $tgljurnal = date("Y-m-d");
            $acttype = $_POST['actType'];
            $ket = $_POST['keterangan'];
            $SJsql = "INSERT INTO jurnal(`id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`, `tanggal_simpan`, `status_jurnal`, `jenis_aktivitas`, `keterangan`)  
                        VALUES ('$id','$nip','$vol','$voltype','$mulai','$selesai','$tgljurnal','simpan','$acttype','$ket')";
            mysqli_query($db,$SJsql);
         } else if(!empty($_POST['EDJSidJ'])){
            $id = $_POST['EDJSidJ'];
            $idAct = $_POST['EDJSidAct'];
            $vol = $_POST['edjsVolume'];
            $voltype = $_POST['edjsVolumeType'];
            $jamMulai = date('G:i', strtotime($_POST['edjsJamMulai']));
            $jamSelesai = date('G:i', strtotime($_POST['edjsJamSelesai']));
            $mulai = $_POST['edjsTglMulai'] .' '. $jamMulai . ':00';
            $selesai = $_POST['edjsTglSelesai'] .' '. $jamSelesai . ':00';
            $acttype = $_POST['edjsActType'];
            $ket = $_POST['edjsKeterangan'];
            $EDJsql = "UPDATE jurnal SET id_aktivitas = '$idAct', nip = '$nip', volume = '$vol', jenis_output = '$voltype', waktu_mulai = '$mulai', waktu_selesai = '$selesai', jenis_aktivitas = '$acttype', keterangan = '$ket' WHERE id_jurnal = '$id'";
            //echo "<script type='javascript'>alert($EDJsql);</script>";
            mysqli_query($db,$EDJsql);
         } else if( !empty($_POST['password_baru'])){
              $nip = $_SESSION['nip'];
              $password = $_POST['password_baru'];
              $pass_update = ("UPDATE user SET password='$password' WHERE nip = '$nip'");
              mysqli_query($db,$pass_update);
         } else if( !empty($_POST['EAnip'])){
            $nip = $_POST['EAnip'];
            $nama = $_POST['nama'];
            $bagian = $_POST['bagian'];
            $jabatan = $_POST['jabatan'];
            $password = $_POST['password'];
            $level = $_POST['level'];
            $EAsql = "UPDATE user SET nama_pegawai = '$nama', bagian = '$bagian', jabatan = '$jabatan', password = '$password', level = '$level' WHERE nip = '$nip'";
            mysqli_query($db,$EAsql);
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
   <link rel="stylesheet" href="css/css.css">
   <link type="text/css" rel="stylesheet" href="css/calendarstyle.css"/>    
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
   <link rel="stylesheet" type="text/css" href="css/profile.css"><link rel="stylesheet" type="text/css" href="css/pure.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/a.css">
	
   <script type="text/javascript" src="assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript" src="js/FileSaver/FileSaver.min.js"></script>
   <script type="text/javascript" src="js/js-xlsx/xlsx.core.min.js"></script>
   <script type="text/javascript" src="js/jsPDF/jspdf.min.js"></script>
   <script type="text/javascript" src="js/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
   <script type="text/javascript" src="js/html2canvas/html2canvas.min.js"></script>
   <script type="text/javascript" src="js/tableExport.min.js"></script>
   <script type="text/javascript" src="js/weekPicker.js"></script>
   <script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script>
   <script type="text/javascript" src="js/script.js"></script>   

    
   </head>
   <body class="background">
      <div class="page">
         <?php
            if ($level == '1'){
                include_once "functions_staff.php";
                include_once "views/staf/home_staff.php";
            } else {
                include_once "functions.php";
                include_once "views/admin/home.php";
            }
         ?>
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
            var detail_select = document.getElementById('detail_select');
            var staff_detail_select = document.getElementById('staff_detail_select');
            var staff_tutup_detail = document.getElementsByClassName("staff_tutup_detail")[0];
            var tutup_detail = document.getElementsByClassName("tutup_detail")[0];
            var tutupLJ = document.getElementsByClassName("tutupLJ")[0];
            var modalLJ = document.getElementById('modalLJ');
            var closeEA = document.getElementsByClassName("EAclose")[0];
            var modalEA = document.getElementById('ModalEA');
            var closeDJS = document.getElementsByClassName("DJSclose")[0];
            var modalDJS = document.getElementById('modalDJS');
            var closeDJS2 = document.getElementsByClassName("DJS2close")[0];
            var modalDJS2 = document.getElementById('modalDJS2');
            var foto_select = document.getElementById('foto_select');
            var foto_tutup = document.getElementsByClassName("foto_tutup")[0];
             
            span.onclick = function() {
                modal.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
            }
            tutup.onclick = function() {
                pass_select.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
            }
            
            if(typeof foto_tutup != 'undefined'){
              foto_tutup.onclick = function() {
                  foto_select.style.display = "none";
              }
            }
             
            if(typeof staff_tutup_detail != 'undefined'){
              staff_tutup_detail.onclick = function() {
                  staff_detail_select.style.display = "none";
              }
            }
            
            if(typeof tutup_detail != 'undefined'){   
                tutup_detail.onclick = function() {
                    detail_select.style.display = "none";
                }
            }
            if ( typeof tutupLJ != 'undefined' ){
              tutupLJ.onclick = function() {
                modalLJ.style.display = "none";
              }
            }
            if ( typeof closeEA != 'undefined' ){
              closeEA.onclick = function() {
                modalEA.style.display = "none";
              }
            }
            if ( typeof closeDJS != 'undefined' ){
              closeDJS.onclick = function() {
                modalDJS.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            if ( typeof closeDJS2 != 'undefined' ){
              closeDJS2.onclick = function() {
                modalDJS2.style.display = "none";
              }
            }
            
            
            window.onclick = function(event){
                if(event.target == modal || event.target == modalLJ || event.target == pass_select || event.target == detail_select || event.target == staff_detail_select || event.target == modalEA || event.target == modalDJS || event.target == modalDJS2 || event.target == foto_select){
                    modal.style.display = "none";
                    pass_select.style.display = "none";

                    if(foto_select){
                      foto_select.style.display = "none";
                    }
                    
                    if (detail_select){
                      detail_select.style.display = "none";
                    }
                    if(staff_detail_select){
                      staff_detail_select.style.display = "none";
                    }
                    if(modalLJ){
                      modalLJ.style.display = "none";
                    }
                    if(modalEA){
                      modalEA.style.display = "none";
                    }
                    document.getElementsByTagName("body")[0].style.overflow = "";
                    if(modalDJS){
                      if(modalDJS2.style.display != "block"){
                        modalDJS.style.display = "none";
                      } else {
                        modalDJS2.style.display = "none";
                        document.getElementsByTagName("body")[0].style.overflow = "hidden";
                      }
                    }
                    
                }else if (!event.target.matches('.dropbtn')){
                    var ddc = document.getElementById("ddcContent");
                    var rep = document.getElementById("repContent");
                    var fil = document.getElementById("filContent");
                    var djs = document.getElementById("djsContent");
                    var pac = document.getElementById("pacContent");
                    if ( ddc.classList.contains("show")){
                        ddc.classList.toggle("show");
                    }
                    if (rep){
                      if ( rep.classList.contains("show")){
                          rep.classList.toggle("show");
                      }
                    }
                    if (fil){
                      if ( fil.classList.contains("show")){
                          fil.classList.toggle("show");
                      }
                    }
                    if (djs){
                      if ( djs.classList.contains("show")){
                          djs.classList.toggle("show");
                      }
                    }
                    if (pac){
                      if ( pac.classList.contains("show")){
                          pac.classList.toggle("show");
                      }
                    }
                }
            }
            function select_file(){
			      document.getElementById('image').click();
			      return false;
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
               document.getElementsByTagName("body")[0].style.overflow = "hidden";
               modal.style.display = "block";
               namaAct.innerHTML = nama;
               durasiAct.innerHTML = durasi;
               namaCat.innerHTML = cat;
               idInput.value = id;
            }
             
            function detail_selectActivity(nip_nip, nama, tanggal_tanggal){
                document.getElementById("detail_select").style.display = "block";
                document.getElementById("jurnal_nama").innerHTML = nama;
                document.getElementsByTagName("body")[0].style.overflow = "hidden";
                $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "detailajax.php",             
                dataType: "html",   //expect html to be returned
                data: {nip_nip:nip_nip , tanggal_tanggal:tanggal_tanggal},               
                success: function(response){                    
                    $("#tabledata").html(response); 
                    }
              });  
            }
            function staff_detail_selectActivity( staff_tanggal_tanggal){
                document.getElementById("staff_detail_select").style.display = "block";
                //document.getElementById("jurnal_nama").innerHTML = nama;
                $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "staff_detailajax.php",             
                dataType: "html",   //expect html to be returned
                data: { staff_tanggal_tanggal:staff_tanggal_tanggal},               
                success: function(response){   
                    $("#staff_tabledata").html(response); 
                    }
              });  
            }
             
             /*function staff_detail_selectActivity(id_jurnal, nama_aktivitas, nama_pegawai,volume,satuan_output,durasi,tanggal_mulai,bulan_mulai,tahun_mulai,tanggal_selesai,bulan_selesai,tahun_selesai,jam_mulai,jam_selesai,durasi_pekerjaan,jurnal_tanggal,jurnal_bulan,jurnal_tahun){
                console.log(id_jurnal + nama_aktivitas + nama_pegawai + volume + satuan_output + durasi + tanggal_mulai + bulan_mulai + tahun_mulai + tanggal_selesai + bulan_selesai + tahun_selesai + jam_mulai + jam_selesai + durasi_pekerjaan + jurnal_tanggal + jurnal_bulan + jurnal_tahun);
                document.getElementById("staff_detail_select").style.display = "block";
                document.getElementById("labelID").innerHTML = id_jurnal;
                document.getElementById("nama_aktiv").innerHTML = nama_aktivitas;
                document.getElementById("pembuat").innerHTML = nama_pegawai;
                document.getElementById("vol").innerHTML = volume;
                document.getElementById("satuan").innerHTML = satuan_output; 
                document.getElementById("waktu_efektif").innerHTML = durasi;
                document.getElementById("mulai_tanggal").innerHTML = tanggal_mulai;
                document.getElementById("mulai_bulan").innerHTML = bulan_mulai;
                document.getElementById("mulai_tahun").innerHTML = tahun_mulai;
                document.getElementById("selesai_tanggal").innerHTML = tanggal_selesai;
                document.getElementById("selesai_bulan").innerHTML = bulan_selesai;
                document.getElementById("selesai_tahun").innerHTML = tahun_selesai;
                document.getElementById("mulai_jam").innerHTML = jam_mulai;
                document.getElementById("selesai_jam").innerHTML = jam_selesai;
                document.getElementById("lama_kerja").innerHTML = durasi_pekerjaan;
                document.getElementById("tanggal_jurnal").innerHTML = jurnal_tanggal;
                document.getElementById("bulan_jurnal").innerHTML = jurnal_bulan;
                document.getElementById("tahun_jurnal").innerHTML = jurnal_tahun;
               
            }*/
             
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
                    document.getElementsByTagName("body")[0].style.overflow = "hidden";
            }
            function ubah_foto(){
                    foto_select.style.display = "block";
                    document.getElementsByTagName("body")[0].style.overflow = "hidden";
            }

            function searchAct() {
               var input, filter, catFilter, catBtn, table, tr, td, i, showCount = 0;
               catBtn = document.getElementById("ddcBtn");
               input = document.getElementById("actSearch");
               filter = input.value.toUpperCase();
               table = document.getElementById("actListTable");
               tr = table.getElementsByTagName("tr");

               if(catBtn.classList.contains("selectd")){
                  catFilter = ddcbtnLabel.innerHTML;
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

            function searchAct2() {
               var input, filter, catFilter, catBtn, table, tr, td, i, showCount = 0;
               catBtn = document.getElementById("pacBtn");
               input = document.getElementById("pacSearch");
               filter = input.value.toUpperCase();
               table = document.getElementById("pacListTable");
               tr = table.getElementsByTagName("tr");

               if(catBtn.classList.contains("selectd")){
                  catFilter = document.getElementById("pacbtnLabel").innerHTML;
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

               document.getElementById("pacCount").innerHTML = showCount;
               if( showCount <= 0 ){
                  tr[1].style.display = "";
                  if( filter != '' || catFilter != ''){
                     document.getElementById("pacTableMessage").innerHTML = "No Result";
                  } else {
                     document.getElementById("pacTableMessage").innerHTML = "Mulai pencarian dengan mengetik pada kolom search atau pilih kategori";
                  }
               } else {
                  tr[1].style.display = "none";
               }
            }

            function searchAcc() {
               var input, filter, sbFilter, ssbBtn, table, tr, td, i, showCount = 0;
               input = document.getElementById("pegSearch");
               filter = input.value.toUpperCase();
               table = document.getElementById("epTable");
               tr = table.getElementsByTagName("tr");

               for (i = 2; i < tr.length; i++){
                  td = tr[i].getElementsByTagName("td")[1];
                  if(td){
                     tr[i].style.display = "none";
                  }
               }
               if(filter != ''){
                  for (i = 2; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[1];
                     if(td){
                        if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                           tr[i].style.display = "";
                           showCount++;
                        }
                     }
                  }
               }

               document.getElementById("pegCount").innerHTML = showCount;
               if( showCount <= 0 ){
                  tr[1].style.display = "";
                  if( filter != ''){
                     document.getElementById("pegTableMessage").innerHTML = "No Result";
                  } else {
                     document.getElementById("pegTableMessage").innerHTML = "Mulai pencarian karyawan dengan mengetik nama pada kolom search";
                  }
               } else {
                  tr[1].style.display = "none";
               }
            }

            function selectCat(cat) {
               catBtn = document.getElementById("ddcBtn");
               label = document.getElementById("ddcbtnLabel");
               if(cat != 'Semua'){
                  catBtn.classList.add("selectd");
               } else {
                  cat = "Pilih Kategori";
                  catBtn.classList.toggle("selectd");
               }
               document.getElementById("ddcContent").classList.toggle("show");
               label.innerHTML = cat;
               searchAct();
            }

            function selectCat2(cat) {
               catBtn = document.getElementById("pacBtn");
               label = document.getElementById("pacbtnLabel");
               if(cat != 'Semua'){
                  catBtn.classList.add("selectd");
               } else {
                  cat = "Pilih Kategori";
                  catBtn.classList.toggle("selectd");
               }
               document.getElementById("pacContent").classList.toggle("show");
               label.innerHTML = cat;
               searchAct2();
            }

            selectReport('Harian');
            function selectReport(rep) {
               repBtn = document.getElementById("repBtn");
               label = document.getElementById("repbtnLabel");
               if (repBtn){
                 var harian = document.getElementsByClassName("LJSfilter")[0];
                 var mingguan = document.getElementsByClassName("LJSfilter")[1];
                 var bulanan = document.getElementsByClassName("LJSfilter")[2];
                 document.getElementById("repContent").classList.toggle("show");
                 label.innerHTML = rep;

                 if (mingguan){
                   if( rep == 'Harian'){
                      harian.style.display = "inline-block";
                      mingguan.style.display = "none";
                      bulanan.style.display = "none";
                   } else if( rep == 'Mingguan'){
                      mingguan.style.display = "inline-block";
                      bulanan.style.display = "none";
                      harian.style.display = "none";
                   } else {
                      bulanan.style.display = "inline-block";
                      mingguan.style.display = "none";
                      harian.style.display = "none";
                   }
                    document.getElementById("LJSfilterType").value = rep;
                 }
               }
            }

            selectDJS('Mingguan');
            function selectDJS(t) {
               btn = document.getElementById("djsBtn");
               label = document.getElementById("djsbtnLabel");
               if (btn){
                 var mingguan = document.getElementsByClassName("DJSfilter")[0];
                 var bulanan = document.getElementsByClassName("DJSfilter")[1];
                 document.getElementById("djsContent").classList.toggle("show");
                 label.innerHTML = t;

                 if (mingguan){
                   if( t == 'Mingguan'){
                      mingguan.style.display = "inline-block";
                      bulanan.style.display = "none";
                   } else {
                      bulanan.style.display = "inline-block";
                      mingguan.style.display = "none";
                   }
                    document.getElementById("DJSfilterType").value = t;
                 }
               }
            }

            function lihatDJS(nip){
              var filType = document.getElementById("DJSfilterType").value;
              var data = "kosong";

              if ( filType == 'Mingguan'){
                var tahunMinggu = document.getElementById("DJSpilihMinggu").value;
                var split = tahunMinggu.split("-");
                var tahun = split[0];
                var minggu = split[1];
                if ( tahunMinggu != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'minggu': minggu };
                }
              } else {
                var tahun = document.getElementById("DJSpilihTahun").value;
                var bulan = document.getElementById("DJSpilihBulan").value;
                data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan };
              }
              console.log(data);
              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "tabelDraftStaff.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#tabelDJstaffContainer").html(response);
                  }
                });
              } else {
                alert("Kolom filter kosong");
              }
            }

            function editDJ(idJ,idAct,dur) {
               document.getElementsByTagName("body")[0].style.overflow = "hidden";
               document.getElementById("modalDJS").style.display = "block";
               var table = document.getElementById("tabelDJajax");
               for(var i=0; i<table.rows.length; i++){
                  if(table.rows[i].cells[0].innerHTML == idJ){
                    var row = table.rows[i];
                    document.getElementById("EDJSidJ").value = idJ;
                    document.getElementById("EDJSidAct").value = idAct;
                    document.getElementById("edjsNamaAct").innerHTML = row.cells[1].innerHTML;
                    document.getElementById("edjsDurasi").innerHTML = dur;
                    document.getElementById("edjsNamaCat").innerHTML = row.cells[3].innerHTML;
                    document.getElementById("edjsVolume").selectedIndex = row.cells[4].innerHTML-1;
                    document.getElementById("edjsVolumeType").value = row.cells[5].innerHTML;
                    document.getElementById("edjsKeterangan").value += row.cells[9].innerHTML;
                    var mulai = row.cells[6].innerHTML.split(" ");
                    var selesai = row.cells[7].innerHTML.split(" ");
                    document.getElementById("edjsTglMulai").value = mulai[0];
                    document.getElementById("edjsJamMulai").value = mulai[1];
                    document.getElementById("edjsTglSelesai").value = selesai[0];
                    document.getElementById("edjsJamSelesai").value = selesai[1];
                    document.getElementById("edjsActType").value = row.cells[2].innerHTML;
                  }
               }
            }

            function DJSgantiAct() {
              document.getElementById("modalDJS2").style.display = "block";
            }

            function DJSpilihAct(id,nama,dur,cat) {
              document.getElementById("EDJSidAct").value = id;
              document.getElementById("edjsNamaAct").innerHTML = nama;
              document.getElementById("edjsDurasi").innerHTML = dur;
              document.getElementById("edjsNamaCat").innerHTML = cat;
              document.getElementById("modalDJS2").style.display = "none";
            }

            function validateEDJ() {
               var volumetype = document.forms["FormDJS"]["edjsVolumeType"].value;
               var tglMulai = document.forms["FormDJS"]["edjsTglMulai"].value;
               var tglSelesai = document.forms["FormDJS"]["edjsTglSelesai"].value;
               var jamMulai = document.forms["FormDJS"]["edjsJamMulai"].value;
               var jamSelesai = document.forms["FormDJS"]["edjsJamSelesai"].value;
               var keterangan = document.forms["FormDJS"]["edjsKeterangan"].value;
               var error = 0;
               var msg;
               if (volumetype == "" || keterangan == "" || tglMulai == "" || tglSelesai == ""){
                  msg = "Semua kolom harus diisi";
                  error++;
               } else if ( tglMulai > tglSelesai){
                  msg = "Tanggal selesai tidak boleh lebih awal dari tanggal mulai";
                  error++;
               } else if ( tglMulai == tglSelesai) {
                  if ( jamMulai > jamSelesai ) {
                     msg = "Jam selesai tidak boleh lebih awal dari jam mulai di hari yang sama"
                     error++;
                  } else if(jamMulai == jamSelesai) {
                     msg = "Jam selesai tidak boleh sama dengan jam mulai di hari yang sama"
                     error++;
                  }
               }
               if ( error == 0){
                  alert("Berhasil submit jurnal");
                  document.getElementById("FormDJS").submit();
               } else {
                  alert(msg);
               }
            }

            function validateSJ() {
               var volumetype = document.forms["FormSJ"]["volumeType"].value;
               var tglMulai = document.forms["FormSJ"]["tglMulai"].value;
               var tglSelesai = document.forms["FormSJ"]["tglSelesai"].value;
               var jamMulai = document.forms["FormSJ"]["jamMulai"].value;
               var jamSelesai = document.forms["FormSJ"]["jamSelesai"].value;
               var keterangan = document.forms["FormSJ"]["keterangan"].value;
               var error = 0;
               var msg;
               if (volumetype == "" || keterangan == "" || tglMulai == "" || tglSelesai == ""){
                  msg = "Semua kolom harus diisi";
                  error++;
               } else if ( tglMulai > tglSelesai){
                  msg = "Tanggal selesai tidak boleh lebih awal dari tanggal mulai";
                  error++;
               } else if ( tglMulai == tglSelesai) {
                  if ( jamMulai > jamSelesai ) {
                     msg = "Jam selesai tidak boleh lebih awal dari jam mulai di hari yang sama"
                     error++;
                  } else if(jamMulai == jamSelesai) {
                     msg = "Jam selesai tidak boleh sama dengan jam mulai di hari yang sama"
                     error++;
                  }
               }

               if ( error == 0){
                  alert("Berhasil submit jurnal");
                  document.getElementById("FormSJ").submit();
               } else {
                  alert(msg);
               }

            }

            function validateEA() {
               var nama = document.forms["FormEA"]["nama"].value;
               var bagian = document.forms["FormEA"]["bagian"].value;
               var jabatan = document.forms["FormEA"]["jabatan"].value;
               var password = document.forms["FormEA"]["password"].value;
               var level = document.forms["FormEA"]["level"].value;
               var error = 0;
               var msg;
               if (nama == "" || jabatan == "" || bagian == "" || password == "" || level == ""){
                  msg = "Tidak boleh ada kolom yang kosong";
                  error++;
               } else if ( level > 99){
                  msg = "Level tidak boleh lebih dari 99";
                  error++;
               } else if ( level == 99){
                  msg = "Level tidak boleh sama dengan 99";
                  error++;
               }

               if ( error == 0){
                  alert("Berhasil edit account");
                  document.getElementById("FormEA").submit();
               } else {
                  alert(msg);
               }

            }

            function lihatJurnal(nip, nama) {
              document.getElementById("modalLJ").style.display = "block";
              document.getElementById("labelPemilikJurnal").innerHTML = nama;
              document.getElementById("LJSnip").value = nip;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
              document.getElementById("tabelLJstaffContainer").innerHTML = "";
            }

            function editAccount(nip, nama, bagian, jabatan, level, password){
              document.getElementById("ModalEA").style.display = "block";
              document.getElementById("labelPemilikAccount").innerHTML = nip;
              document.getElementById("EAnip").value = nip;
              document.getElementById("inputNama").value = nama;
              document.getElementById("inputBagian").value = bagian;
              document.getElementById("inputJabatan").value = jabatan;
              document.getElementById("inputLevel").value = level;
              document.getElementById("inputPassword").value = password;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
            }


            function selectJA(type){
              var btn1 = document.getElementById("pjBtn1");
              var btn2 = document.getElementById("pjBtn2");
              if ( type == "Pribadi"){
                if (!btn1.classList.contains("active")){
                  var filter = document.getElementById("PJAfilter");
                  var tabelA = document.getElementById("JAtabelA");
                  var tabelS = document.getElementById("JAtabelS");
                  tabelA.style.display = "block";
                  tabelS.style.display = "none";
                  filter.style.display = "flex";
                  btn1.classList.add("active");
                  btn2.classList.remove("active");
                }
              } else {
                if (!btn2.classList.contains("active")){
                  var filter = document.getElementById("PJAfilter");
                  var tabelA = document.getElementById("JAtabelA");
                  var tabelS = document.getElementById("JAtabelS");
                  tabelS.style.display = "block";
                  tabelA.style.display = "none";
                  filter.style.display = "none";
                  btn2.classList.add("active");
                  btn1.classList.remove("active");
                }
              }
            }
            function selectTYPE(type,nipnya_sendiri){
              var tombol1 = document.getElementById("tombol1");
              var tombol2 = document.getElementById("tombol2");
                //alert(type)
              if ( type == "sendiri"){
                if (!tombol1.classList.contains("active")){
                  var tabelADMIN = document.getElementById("JAtabelADMIN");
                  var tabelSTAFF = document.getElementById("JAtabelSTAFF");
                  tabelADMIN.style.display = "block";
                  tabelSTAFF.style.display = "none";
                  tombol1.classList.add("active");
                  tombol2.classList.remove("active");
                }
              } else {
                if (!tombol2.classList.contains("active")){
                  var tabelADMIN = document.getElementById("JAtabelADMIN");
                  var tabelSTAFF = document.getElementById("JAtabelSTAFF");
                  tabelSTAFF.style.display = "block";
                  tabelADMIN.style.display = "none";
                  tombol2.classList.add("active");
                  tombol1.classList.remove("active");
                }
              }
            }

            JAfilter('Mingguan');
            function JAfilter(fil) {
               btn = document.getElementById("filBtn");
               label = document.getElementById("PJAbtnLabel");
               if(btn){
                 var mingguan = document.getElementsByClassName("LJAfilter")[0];
                 var bulanan = document.getElementsByClassName("LJAfilter")[1];
                 document.getElementById("filContent").classList.toggle("show");
                 label.innerHTML = fil;

                 if ( typeof mingguan === 'undefined'){
                   } else {
                   if( fil == 'Mingguan'){
                      mingguan.style.display = "inline-block";
                      bulanan.style.display = "none";
                   } else {
                      bulanan.style.display = "inline-block";
                      mingguan.style.display = "none";
                   }
                    document.getElementById("LJAfilterType").value = fil;
                 }
               }
            }

            function lihatJurnalAdmin(nip) {
              var filType = document.getElementById("LJAfilterType").value;
              var data = "kosong";
              if ( filType == 'Mingguan'){
                var tahunMinggu = document.getElementById("LJApilihMinggu").value;
                var split = tahunMinggu.split("-");
                var tahun = split[0];
                var minggu = split[1];
                if ( tahunMinggu != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'minggu': minggu };
                }
              } else {
                var tahun = document.getElementById("LJApilihTahun").value;
                var bulan = document.getElementById("LJApilihBulan").value;
                data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan };
              }

              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "tabelLJadmin.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#JAtabelA").html(response);

                      if(document.getElementById(nip)){
                        document.getElementById("labelTotalWaktuAdm").innerHTML = document.getElementById(nip).value;
                        var csv = document.getElementById("csvBtnADM");
                        var xls = document.getElementById("xlsBtnADM");
                        var pdf = document.getElementById("pdfBtnADM");
                        csv.addEventListener('click', function(e){
                          $('#tabelLJajaxADM').tableExport({
                            type:'csv',
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                        xls.addEventListener('click', function(e){
                          $('#tabelLJajaxADM').tableExport({
                            type:'xls',
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                        pdf.addEventListener('click', function(e){
                          $('#tabelLJajaxADM').tableExport({
                            type:'pdf',
                            jspdf: {
                              orientation: 'l'
                            },
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                      }
                  }
                });
              } else {
                alert("Kolom filter kosong");
              }
            }

            function lihatJurnalStaff(nip) {
              var filType = document.getElementById("LJSfilterType").value;
              var data = "kosong";

              if (document.getElementById("LJSnip")){
                nip = document.getElementById("LJSnip").value;
              }
              if ( filType == 'Harian'){
                var tanggal = document.getElementById("LJSpilihHari").value;
                var split = tanggal.split("-");
                var tahun = split[0];
                var bulan = split[1];
                var hari = split[2];
                if ( tanggal != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan, 'hari': hari };
                }
              } else if ( filType == 'Mingguan'){
                var tahunMinggu = document.getElementById("LJSpilihMinggu").value;
                var split = tahunMinggu.split("-");
                var tahun = split[0];
                var minggu = split[1];
                if ( tahunMinggu != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'minggu': minggu };
                }
              } else {
                var tahun = document.getElementById("LJSpilihTahun").value;
                var bulan = document.getElementById("LJSpilihBulan").value;
                data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan };
              }

              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "tabelLJstaff.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#tabelLJstaffContainer").html(response);
                      if(document.getElementById(nip)){
                        document.getElementById("labelTotalWaktu").innerHTML = document.getElementById(nip).value;
                        var csv = document.getElementById("csvBtn");
                        var xls = document.getElementById("xlsBtn");
                        var pdf = document.getElementById("pdfBtn");
                        csv.addEventListener('click', function(e){
                          $('#tabelLJajax').tableExport({
                            type:'csv',
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                        xls.addEventListener('click', function(e){
                          $('#tabelLJajax').tableExport({
                            type:'xls',
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                        pdf.addEventListener('click', function(e){
                          $('#tabelLJajax').tableExport({
                            type:'pdf',
                            jspdf: {
                              orientation: 'l'
                            },
                            fileName: 'Jurnal'+filType+'-'+nip,
                            escape:'false'
                          });
                        });
                      }
                  }
                });
              } else {
                alert("Kolom filter kosong");
              }
            }
         </script>
         <script type="text/javascript">
         $(document).ready(function(){
           if (document.getElementById("pjBtn1")){
             document.getElementById("pjBtn1").classList.add("active");
           }
           if (document.getElementById("LJApilihMinggu")){
            convertToWeekPicker($("#LJApilihMinggu"));
           }
           if (document.getElementById("DJSpilihMinggu")){
            convertToWeekPicker($("#DJSpilihMinggu"));
           }
           convertToWeekPicker($("#LJSpilihMinggu"));
           $('.dropbtn').click(function(){
              document.getElementById("ddcContent").classList.toggle("show");
              if (document.getElementById("repContent")){
                document.getElementById("repContent").classList.toggle("show");
              }
              if (document.getElementById("filContent")){
                document.getElementById("filContent").classList.toggle("show");
              }
              if (document.getElementById("djsContent")){
                document.getElementById("djsContent").classList.toggle("show");
              }
              if (document.getElementById("pacContent")){
                document.getElementById("pacContent").classList.toggle("show");
              }
           })
           $('.clockpicker').clockpicker({
              autoclose: true
           });
           $("#FormDJS").submit(function(e) {
              e.preventDefault();
           });
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

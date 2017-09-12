<?php
   session_start();
   include("config.php");

   function Redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       exit();
   }

   function getTglSubmit()
   {
      include("config.php");
      if(date('d') >= '5'){
        $date1 = date('Y-m-\5');
        $tglsubmit = strtotime('+1 month', strtotime($date1));
      } else {
        $tglsubmit = strtotime(date('Y-m-\5'));
      }
      

      $HLsql = "SELECT * FROM hari_libur ORDER BY end_date";
      $HLresult = mysqli_query($db,$HLsql);
      while($data = mysqli_fetch_row($HLresult)){
        $start = strtotime($data[2]);
        $end = strtotime($data[3]);
        //echo '<script>console.log(new Date('.$end.'*1000))</script>';
        //echo '<script>console.log(new Date('.$tglsubmit.'*1000))</script>';
        //echo '<script>console.log(\'===============\')</script>';
        if($tglsubmit >= $start && $tglsubmit <= $end){
          $tglsubmit = strtotime('+1 day', $end);
          //echo '<script>console.log(new Date('.$tglsubmit.'*1000))</script>';
        }
        $mon = date("D", $tglsubmit);
        if($mon == "Mon"){
          $tglsubmit = strtotime('+1 day', $tglsubmit);
        }
      }
      //$test = date("Ymd", $tglsubmit);
      //echo '<script>console.log('.$test.')</script>';
      $_SESSION['tglsubmit'] = $tglsubmit;
      return date("Y-m-d", $tglsubmit);

   }
   $nip = $_SESSION['nip'];

   if (isset($_SESSION['nip'])){

      $today = date('Y-m-d');
      if($today == getTglSubmit()){
        $sql = "UPDATE jurnal SET tanggal_kirim = '$today', status_jurnal = 'terkirim'";
        mysqli_query($db,$sql);
      }

      //echo '<script>alert(new Date('.$_SESSION['tglsubmit'].'*1000))</script>';

      $nip = $_SESSION['nip'];
      $nipb = $_SESSION['nipb'];
      $level = $_SESSION['level'];
      $nama = $_SESSION['nama'];    
      $eselon= $_SESSION['eselon'];
      $idjabatan = $_SESSION['idjabatan'];
      $jabatan = $_SESSION['jabatan'];

      // Activity List
      $ALsql = "SELECT k.id_kategori,a.id_aktivitas, a.nama_aktivitas, a.durasi, k.nama_kategori FROM aktivitas AS a LEFT JOIN kategori AS k ON a.id_kategori = k.id_kategori";
      $ALquery = mysqli_query($db,$ALsql);
       
      $ALsql2 = "SELECT a.id_aktivitas, a.nama_aktivitas, a.durasi, k.nama_kategori FROM aktivitas AS a LEFT JOIN kategori AS k ON a.id_kategori = k.id_kategori WHERE k.nama_kategori != 'izin harian'";
      $ALquery2 = mysqli_query($db,$ALsql2);
      // Category
      $Catsql = "SELECT * FROM kategori";
      $Catquery = mysqli_query($db,$Catsql);
      $Catquery2 = mysqli_query($db,$Catsql);
      $Catquery3 = mysqli_query($db,$Catsql);
      $Catquery4 = mysqli_query($db,$Catsql);
      // Semua Pegawai
      $ALLsql = "SELECT user.nip,user.nama_pegawai,a.nama_jabatan as jabatan ,b.nama_jabatan as atasan,user.password FROM user,jabatan as a, jabatan as b WHERE user.level < 99 AND user.id_jabatan=a.id_jabatan AND a.atasan=b.id_jabatan ORDER BY user.nama_pegawai";
      $ALLquery = mysqli_query($db,$ALLsql);
      // Daftar Pegawai
      $DPsql = "SELECT * FROM user WHERE user.level < '$level' ORDER BY user.nama_pegawai";
      $DPquery = mysqli_query($db,$DPsql);
      // Jurnal Staff
      $LJstaffsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip'";
      $LJstaffquery = mysqli_query($db, $LJstaffsql);

      $BiroSql = "SELECT * FROM jabatan WHERE eselon = 2";
      $BiroQuery = mysqli_query($db, $BiroSql);

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
                        VALUES ('$id','$nip','$vol','$voltype','$mulai','$selesai','$tgljurnal','draft','$acttype','$ket')";
            mysqli_query($db,$SJsql);
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
         } else if( !empty($_POST['aktivitas'])){
            $aktivitas = $_POST['aktivitas'];
            $kategori = $_POST['kategori'];
            $durasi = $_POST['durasi'];
            $insertact = "INSERT INTO aktivitas(`id_kategori`, `nama_aktivitas`, `durasi`) VALUES ('$kategori','$aktivitas','$durasi')";
            mysqli_query($db,$insertact);
         } else if( !empty($_POST['id_aktivitas'])){
            $aktivitas = $_POST['inputaktivitas'];
            $idaktivitas = $_POST['id_aktivitas'];
            $kategori = $_POST['input_idkategori'];
            $durasi = $_POST['inputdurasi'];
            $updateact = "update aktivitas SET id_kategori='$kategori', nama_aktivitas='$aktivitas' , durasi='$durasi' WHERE id_aktivitas ='$idaktivitas'" ;
            mysqli_query($db,$updateact);
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
   <link rel="stylesheet" type="text/css" href="css/oswald.css">
   <link rel="stylesheet" type="text/css" href="css/opensanss.css">
   <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-year-calendar.min.css">
   <link rel="stylesheet" type="text/css" href="css/profile.css">
   <link rel="stylesheet" type="text/css" href="css/pure.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="css/a.css">
	
   <script type="text/javascript" src="assets/js/jquery.min.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
   <script type="text/javascript" src="js/jquery12.js"></script>
   <script type="text/javascript" src="js/FileSaver/FileSaver.min.js"></script>
   <script type="text/javascript" src="js/js-xlsx/xlsx.core.min.js"></script>
   <script type="text/javascript" src="js/jsPDF/jspdf.min.js"></script>
   <script type="text/javascript" src="js/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
   <script type="text/javascript" src="js/html2canvas/html2canvas.min.js"></script>
   <script type="text/javascript" src="js/tableExport.min.js"></script>
   <script type="text/javascript" src="js/weekPicker.js"></script>
   <script type="text/javascript" src="js/bootstrap-year-calendar.min.js"></script>
   <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
    
   </head>
   <body class="background">
      <div class="loadingpage" id="loadingpage">
        <div class="LPwrapper">
          <div class="loadingIcon">
          </div>
          <div class="loadingIcon2">
          </div>
        </div>
      </div>
      <div class="page" id="page">
          <input type="hidden" id="selectedTab" value="<?php echo $_SESSION['tab']; ?>"/>
          <input type="hidden" id="userNip" value="<?php echo $_SESSION['nip']; ?>"/>
         <?php
            if ($eselon == '5'){
                include_once "functions_staff.php";
                include_once "views/staf/home_staff.php";
            } else if ($level >= '98') {
                include_once "functions.php";
                include_once "views/adminWeb/home.php";
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
            var modalTA = document.getElementById("ModalTA");
            var closeTA = document.getElementsByClassName("TAclose")[0];
            var modalKal = document.getElementById("ModalKal");
            var closeKal = document.getElementsByClassName("Kalclose")[0];
            var modalact = document.getElementById("ModalAct");
            var closeAct = document.getElementsByClassName("Actclose")[0];
            var modalEact = document.getElementById("ModalEact");
            var closeEAct = document.getElementsByClassName("EActclose")[0];
            var modalTJ = document.getElementById("ModalTJ");
            var closeTJ = document.getElementsByClassName("TJclose")[0];
            var lihat_pegawai = document.getElementById('EJBlihat_pegawai');
            var tutup_lihat = document.getElementsByClassName("EJBtutup_lihat")[0];
             
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
                  document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
             
            if(typeof staff_tutup_detail != 'undefined'){
              staff_tutup_detail.onclick = function() {
                  staff_detail_select.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            
            if(typeof tutup_detail != 'undefined'){   
                tutup_detail.onclick = function() {
                  detail_select.style.display = "none";
                  document.getElementsByTagName("body")[0].style.overflow = "";
                }
            }
            if(typeof tutup_lihat != 'undefined'){   
                tutup_lihat.onclick = function() {
                  lihat_pegawai.style.display = "none";
                  document.getElementsByTagName("body")[0].style.overflow = "";
                }
            }
            if ( typeof tutupLJ != 'undefined' ){
              tutupLJ.onclick = function() {
                modalLJ.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            if ( typeof closeEA != 'undefined' ){
              closeEA.onclick = function() {
                modalEA.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
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
            if ( typeof closeTA != 'undefined' ){
              closeTA.onclick = function() {
                modalTA.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            if ( typeof closeKal != 'undefined' ){
              closeKal.onclick = function() {
                modalKal.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
             
            if ( typeof closeAct != 'undefined' ){
              closeAct.onclick = function() {
                modalact.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            if ( typeof closeEAct != 'undefined' ){
              closeEAct.onclick = function() {
                modalEact.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            if ( typeof closeTJ != 'undefined' ){
              closeTJ.onclick = function() {
                modalTJ.style.display = "none";
                document.getElementsByTagName("body")[0].style.overflow = "";
              }
            }
            
            
            window.onclick = function(event){
                var detail_select2 = document.getElementById('detail_select');
                var tutup_detail2 = document.getElementsByClassName("tutup_detail")[0];
                if(event.target == modal || event.target == modalLJ || event.target == pass_select || event.target == detail_select || event.target == staff_detail_select || event.target == modalEA || event.target == modalDJS || event.target == modalDJS2 || event.target == foto_select || event.target == modalTA || event.target == modalact || event.target == modalEact || event.target == modalKal || event.target == detail_select2 || event.target == tutup_detail2 || event.target == modalTJ || event.target == lihat_pegawai){
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
                    if(modalTA){
                      modalTA.style.display = "none";
                    }
                    if(modalact){
                      modalact.style.display = "none";
                    }
                    if(modalEact){
                      modalEact.style.display = "none";
                    }
                    if(modalTJ){
                      modalTJ.style.display = "none";
                    }
                    if(lihat_pegawai){
                      lihat_pegawai.style.display = "none";
                    }
                    document.getElementsByTagName("body")[0].style.overflow = "";
                    if(modalKal){
                      if(!detail_select2 || detail_select2.style.display != "block"){
                        modalKal.style.display = "none";
                      } else {
                        detail_select2.style.display = "none";
                        document.getElementsByTagName("body")[0].style.overflow = "hidden";
                      }
                    } else {
                      if (detail_select2){
                        detail_select2.style.display = "none";
                      }
                    }
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
                    var ej = document.getElementById("EJContent");
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
                    if (ej){
                      if ( ej.classList.contains("show")){
                          ej.classList.toggle("show");
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
               var tabel = document.getElementById("tableSJ");
               for(var i=0; i<tabel.rows.length;i++ ){tabel.rows[i].style.display = ""; vt = "";}
                document.getElementById("jamMulai").type = "text";
                document.getElementById("jamMulai").value = "00:00";
                document.getElementById("jamSelesai").type = "text";
                document.getElementById("jamSelesai").value = "23:59";
                document.getElementById("iconJamMulai").style.display = "";
                document.getElementById("iconJamSelesai").style.display = "";
                document.getElementById("tglMulai").type = "date";
                document.getElementById("tglSelesai").type = "date";
                document.getElementById("tanggal").style.width = "";
                modal.style.display = "block";
                namaAct.innerHTML = nama;
                durasiAct.innerHTML = durasi;
                namaCat.innerHTML = cat;
                idInput.value = id;
                if(cat == "izin harian"){
                  tabel.rows[2].style.display = "none";
                  tabel.rows[4].style.display = "none";
                  tabel.rows[5].style.display = "none";
                  tabel.rows[9].style.display = "none";
                  document.getElementById("volumeType").value = "-";

                  document.getElementById("jamMulai").type = "hidden";
                  document.getElementById("jamMulai").value = "00:00";
                  document.getElementById("jamSelesai").type = "hidden";
                  document.getElementById("jamSelesai").value = "23:59";
                  document.getElementById("iconJamMulai").style.display = "none";
                  document.getElementById("iconJamSelesai").style.display = "none";
                  document.getElementById("labelWaktuMulai").innerHTML = "Dari tanggal";
                  document.getElementById("labelWaktuSelesai").innerHTML = "Sampai";
               } else {
                  document.getElementById("labelWaktuMulai").innerHTML = "Waktu Mulai";
                  document.getElementById("labelWaktuSelesai").innerHTML = "Waktu Selesai";
                  document.getElementById("volumeType").value = "";
                  document.getElementById("tglMulai").type = "hidden";
                  document.getElementById("tglSelesai").type = "hidden";
                  document.getElementById("tanggal").style.width = "1px";
               }
            }
            function lihatPegawai(id_jabatan){
              if(document.getElementById("EJBlihat_pegawai")){
                document.getElementById("EJBlihat_pegawai").style.display = "block";
                document.getElementsByTagName("body")[0].style.overflow = "hidden";
                $.ajax({    //create an ajax request to load_page.php
                  type: "POST",
                  url: "ajax/lihatpegawai.php",             
                  dataType: "html",   //expect html to be returned
                  data: { 'id_jabatan':id_jabatan },               
                  success: function(response){             
                    $("#tablelihatpegawai").html(response);
                  }
                });
              } else {
                alert("test");
              }
            }
            function detail_selectActivity(tanggal_tanggal,nip,namapegawai){
                document.getElementById("detail_select").style.display = "block";
                document.getElementById("jurnal_nama").innerHTML = namapegawai;
                document.getElementsByTagName("body")[0].style.overflow = "hidden";
                $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/detailajax.php",             
                dataType: "html",   //expect html to be returned
                data: { tanggal_tanggal:tanggal_tanggal,nip_nip:nip},               
                success: function(response){                 
                    $("#tabledata").html(response);
                    var nip_nip = nip;
                    console.log(nip);
                    console.log(nip_nip);
                    if(document.getElementById("tabledata")){
                        var csv = document.getElementById("csvBtn_admin");
                        var xls = document.getElementById("xlsBtn_admin");
                        var pdf = document.getElementById("pdfBtn_admin");
                        csv.addEventListener('click', function(e){
                          $('#tabledata').tableExport({
                            type:'csv',
                            fileName: 'Jurnal-'+nip+"-"+tanggal_tanggal,
                            escape:'false'
                          });
                        });
                        xls.addEventListener('click', function(e){
                          $('#tabledata').tableExport({
                            type:'xls',
                            fileName: 'Jurnal-'+nip+"-"+tanggal_tanggal,
                            escape:'false'
                          });
                        });
                        pdf.addEventListener('click', function(e){
                          $('#tabledata').tableExport({
                            type:'pdf',
                            jspdf: {
                              orientation: 'l'
                            },
                            fileName: 'Jurnal-'+nip+"-"+tanggal_tanggal,
                            escape:'false'
                          });
                        });
                      }
                    }
              });  
            }
            function staff_detail_selectActivity( staff_tanggal_tanggal){
                document.getElementById("staff_detail_select").style.display = "block";
                document.getElementsByTagName("body")[0].style.overflow = "hidden";
                //document.getElementById("jurnal_nama").innerHTML = nama;
                $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/staff_detailajax.php",             
                dataType: "html",   //expect html to be returned
                data: { staff_tanggal_tanggal:staff_tanggal_tanggal},               
                success: function(response){   
                    $("#staff_tabledata").html(response);
                    if(document.getElementById("staff_tabledata")){
                        var csv = document.getElementById("csvBtn_staff");
                        var xls = document.getElementById("xlsBtn_staff");
                        var pdf = document.getElementById("pdfBtn_staff");
                        csv.addEventListener('click', function(e){
                          $('#staff_tabledata').tableExport({
                            type:'csv',
                            fileName: 'Jurnal-'+staff_tanggal_tanggal,
                            escape:'false'
                          });
                        });
                        xls.addEventListener('click', function(e){
                          $('#staff_tabledata').tableExport({
                            type:'xls',
                            fileName: 'Jurnal-'+staff_tanggal_tanggal,
                            escape:'false'
                          });
                        });
                        pdf.addEventListener('click', function(e){
                          $('#staff_tabledata').tableExport({
                            type:'pdf',
                            jspdf: {
                              orientation: 'l'
                            },
                            fileName: 'Jurnal-'+staff_tanggal_tanggal,
                            escape:'false'
                          });
                        });
                    }
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
               document.getElementById("actTableMessage").style.display = "";
               tr[1].style.display = "";
               document.getElementById("actCount").innerHTML = "0";

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
                  document.getElementById("actCount").innerHTML = showCount;
                  if( showCount <= 0 ){
                      if( filter != '' || catFilter != ''){
                         document.getElementById("actTableMessage").innerHTML = "No Result";
                      } else {
                         document.getElementById("actTableMessage").innerHTML = "Mulai pencarian dengan mengetik pada kolom search atau pilih kategori";
                      }
                   } else {
                      document.getElementById("actTableMessage").style.display = "none";
                      tr[1].style.display = "none";
                   }
                  if(catFilter == 'izin harian'){
                    document.getElementById("headerStandarWaktu").style.display = "none";
                  } else {
                    document.getElementById("headerStandarWaktu").style.display = "";
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
                  document.getElementById("actCount").innerHTML = showCount;
                  if( showCount <= 0 ){
                      if( filter != '' || catFilter != ''){
                         document.getElementById("actTableMessage").innerHTML = "No Result";
                      } else {
                         document.getElementById("actTableMessage").innerHTML = "Mulai pencarian dengan mengetik pada kolom search atau pilih kategori";
                      }
                   } else {
                      document.getElementById("actTableMessage").style.display = "none";
                      tr[1].style.display = "none";
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
                  if(document.getElementById("headerStandarWaktu")){
                    if(catFilter == 'izin harian'){
                      document.getElementById("headerStandarWaktu").style.display = "none";
                    } else {
                      document.getElementById("headerStandarWaktu").style.display = "";
                    }
                  }
                  document.getElementById("actCount").innerHTML = showCount;
                  if( showCount <= 0 ){
                      if( filter != '' || catFilter != ''){
                         document.getElementById("actTableMessage").innerHTML = "No Result";
                      } else {
                         document.getElementById("actTableMessage").innerHTML = "Mulai pencarian dengan mengetik pada kolom search atau pilih kategori";
                      }
                  } else {
                      document.getElementById("actTableMessage").style.display = "none";
                      tr[1].style.display = "none";
                  }
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
                  if(catFilter == 'izin harian'){
                    document.getElementById("DJSheaderStandarWaktu").style.display = "none";
                  } else {
                    document.getElementById("DJSheaderStandarWaktu").style.display = "";
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
               if(input){
                 filter = input.value.toUpperCase();
                 table = document.getElementById("epTable");
                 tr = table.getElementsByTagName("tr");

                 for (i = 2; i < tr.length; i++){
                    td = tr[i].getElementsByTagName("td")[1];
                    if(td){
                       tr[i].style.display = "";
                    }
                 }
                 if(filter != ''){
                    for (i = 2; i < tr.length; i++) {
                       td = tr[i].getElementsByTagName("td")[1];
                       if(td){
                          if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                             
                             tr[i].style.display = "";
                             showCount++;
                          } else {
                             tr[i].style.display = "none";
                          }
                       }
                    }
                 }

                 if( filter != ''){
                  document.getElementById("pegCount").innerHTML = showCount;
                  if( showCount <= 0){
                    tr[1].style.display = "";
                    document.getElementById("pegTableMessage").innerHTML = "No Result";
                  } else {
                    tr[1].style.display = "none";
                  }
                 } else {
                  document.getElementById("pegCount").innerHTML = tr.length;
                 }
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

            
            function selectReport(rep) {
               repBtn = document.getElementById("repBtn");
               label = document.getElementById("repbtnLabel");
               if (repBtn){
                 var harian = document.getElementsByClassName("LJSfilter")[0];
                 var periode = document.getElementsByClassName("LJSfilter")[1];
                 document.getElementById("repContent").classList.toggle("show");
                 label.innerHTML = rep;

                 if (harian){
                   if( rep == 'Harian'){
                      harian.style.display = "inline-block";
                      periode.style.display = "none";
                   } else {
                      periode.style.display = "inline-block";
                      harian.style.display = "none";
                   }
                    document.getElementById("LJSfilterType").value = rep;
                 }
               }
            }

            function selectDJS(t) {
               btn = document.getElementById("djsBtn");
               label = document.getElementById("djsbtnLabel");
               if (btn){
                 var harian = document.getElementsByClassName("DJSfilter")[0];
                 var mingguan = document.getElementsByClassName("DJSfilter")[1];
                 var bulanan = document.getElementsByClassName("DJSfilter")[2];
                 document.getElementById("djsContent").classList.remove("show");
                 if(t == "Bulanan"){
                    label.innerHTML = "Semua Jurnal" 
                 } else {
                    label.innerHTML = t;
                 }

                 if (mingguan){
                   if( t == 'Harian'){
                      document.getElementById("DJSbtn").style.display = "";
                      harian.style.display = "inline-block";
                      bulanan.style.display = "none";
                      mingguan.style.display = "none";
                   } else if( t == 'Mingguan'){
                      document.getElementById("DJSbtn").style.display = "";
                      mingguan.style.display = "inline-block";
                      bulanan.style.display = "none";
                      harian.style.display = "none";
                   } else {
                      document.getElementById("DJSbtn").style.display = "none";
                      document.getElementById("DJSfilterType").value = t;
                      eventFire(document.getElementById("DJSbtn"), 'click');
                      mingguan.style.display = "none";
                      harian.style.display = "none";
                   }
                    document.getElementById("DJSfilterType").value = t;
                 }
               }
            }

            function selectEch(e){
               catBtn = document.getElementById("EJBtn");
               label = document.getElementById("EJbtnLabel");
               document.getElementById("jabSearch").value = "";
               document.getElementById("EJContent").classList.toggle("show");
               if(e == 5){
                  document.getElementById("searchJabatan").style.display = "";
               } else {
                  document.getElementById("searchJabatan").style.display = "none";
               }
               $.ajax({    //create an ajax request to load_page.php
                  type: "POST",
                  url: "ajax/getListJabatan.php",             
                  dataType: "html",   //expect html to be returned
                  data: { 'kat':e},               
                  success: function(response){                    
                    $("#EJTableWrapper").html(response);
                  }
               });
            }

            function toggleChild(atasan, eselon, container, el){
              if(el){
                el.getElementsByClassName("glyphicon")[0].classList.toggle('glyphicon-plus');
                el.getElementsByClassName("glyphicon")[0].classList.toggle('glyphicon-minus');
              }
              var data = { 'atasan':atasan, 'eselon':eselon };
              if(document.getElementById(container).innerHTML == ""){
                $.ajax({    //create an ajax request to load_page.php
                  type: "POST",
                  url: "ajax/getListJabatan.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){
                    document.getElementById(container).innerHTML = response;             
                    //$("#"+container).html(response);
                  }
                });
              } else {
                document.getElementById(container).innerHTML = "";
              }
            }

            function editJabatan(id,nama){
              document.getElementById("ModalTJ").style.display = "block";
              document.getElementById("TJidJabatan").value = id;
              document.getElementById("TJnamaJabatan").value = nama;
            }

            function validateEJB(){
              var id = document.forms["FormEJB"]["TJidJabatan"].value;
              var nama = document.forms["FormEJB"]["TJnamaJabatan"].value;

              if(nama != ""){
                $.ajax({    //create an ajax request to load_page.php
                  type: "POST",
                  url: "ajax/editJabatan.php",             
                  dataType: "html",   //expect html to be returned
                  data: { 'id':id, 'nama':nama},               
                  success: function(response){
                    if(response == "y"){
                      alert("Berhasil edit nama jabatan");
                      location.reload();
                    } else {
                      alert("Gagal edit nama jabatan");
                    }
                  }
                });
              } else {
                alert("Kolom tidak boleh kosong");
              }
            }

            function lihatDJS(nip){
              var filType = document.getElementById("DJSfilterType").value;
              var data = "kosong";

              if ( filType == 'Harian'){
                var tanggal = document.getElementById("DJSpilihHari").value;
                var split = tanggal.split("-");
                var tahun = split[0];
                var bulan = split[1];
                var hari = split[2];
                if ( tanggal != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan, 'hari': hari };
                }
              } else if ( filType == 'Mingguan'){
                var tahunMinggu = document.getElementById("DJSpilihMinggu").value;
                var split = tahunMinggu.split("-");
                var tahun = split[0];
                var minggu = split[1];
                if ( tahunMinggu != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'minggu': minggu };
                }
              } else {
                data = { 'nip': nip, 'tipeFilter': filType };
              }
              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "ajax/tabelDraftStaff.php",             
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
               for(var i=1; i<table.rows.length; i++){
                  if(table.rows[i].cells[0].innerHTML == idJ){
                    var row = table.rows[i];
                    document.getElementById("EDJSidJ").value = idJ;
                    document.getElementById("EDJSidAct").value = idAct;
                    document.getElementById("edjsNamaAct").innerHTML = row.cells[1].innerHTML;
                    document.getElementById("edjsDurasi").innerHTML = dur;
                    document.getElementById("edjsNamaCat").innerHTML = row.cells[2].innerHTML;
                    document.getElementById("edjsVolume").selectedIndex = row.cells[3].innerHTML-1;
                    document.getElementById("edjsVolumeType").value = row.cells[6].innerHTML;
                    document.getElementById("edjsKeterangan").value = row.cells[11].innerHTML;
                    document.getElementById("edjsActType").value = row.cells[3].innerHTML.toLowerCase();

                    var tabelEDJS = document.getElementById("tableEDJS");
                    cat = row.cells[2].innerHTML;
                    if(cat == "izin harian"){
                      tabelEDJS.rows[3].style.display = "none";
                      tabelEDJS.rows[5].style.display = "none";
                      tabelEDJS.rows[6].style.display = "none";
                      tabelEDJS.rows[10].style.display = "none";
                      document.getElementById("btnGantiAct").style.display = "none";
                      document.getElementById("edjsJamMulai").type = "hidden";
                      document.getElementById("edjsJamSelesai").type = "hidden";
                      document.getElementById("edjsiconJM").style.display = "none";
                      document.getElementById("edjsiconJS").style.display = "none";
                      document.getElementById("edjsTglMulai").type = "date";
                      document.getElementById("edjsTglSelesai").type = "date";
                      document.getElementById("edjsTanggal").style.width = "";
                      var m = row.cells[7].innerHTML.split("-");
                      var s = row.cells[8].innerHTML.split("-");
                      document.getElementById("edjsTglMulai").value = m[2]+"-"+m[1]+"-"+m[0];
                      document.getElementById("edjsTglSelesai").value = s[2]+"-"+s[1]+"-"+s[0];
                    } else {
                      tabelEDJS.rows[3].style.display = "";
                      tabelEDJS.rows[5].style.display = "";
                      tabelEDJS.rows[6].style.display = "";
                      tabelEDJS.rows[10].style.display = "";
                      document.getElementById("edjsTglMulai").value = row.cells[13].innerHTML;
                      document.getElementById("edjsTglSelesai").value = row.cells[13].innerHTML;
                      document.getElementById("btnGantiAct").style.display = "";
                      document.getElementById("edjsJamMulai").value = row.cells[7].innerHTML;
                      document.getElementById("edjsJamSelesai").value = row.cells[8].innerHTML;
                      document.getElementById("edjsiconJM").style.display = "";
                      document.getElementById("edjsiconJS").style.display = "";
                      document.getElementById("edjsTglMulai").type = "hidden";
                      document.getElementById("edjsTglSelesai").type = "hidden";
                      document.getElementById("edjsTanggal").style.width = "1px";
                      document.getElementById("edjsJamMulai").type = "text";
                      document.getElementById("edjsJamSelesai").type = "text";
                    }
                  }
               }
            }

            function deleteDJ(idJ){
              if(confirm("Jurnal Draft dengan id " + idJ + " akan dihapus")){
                $.ajax({
                    dataType: 'html',
                    url:'ajax/deleteJurnalStaff.php',
                    method:'post',
                    data : { 'id':idJ },
                    success:function(a){
                      alert(a);
                      document.getElementById("tabelDJstaffContainer").innerHTML = "";
                      eventFire(document.getElementById("DJSbtn"), 'click');
                    }
                  });
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
               if (volumetype == "" || tglMulai == "" || tglSelesai == ""){
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
                  //document.getElementById("FormDJS").submit();
                  $.ajax({
                    dataType: 'html',
                    url:'ajax/editJurnalStaff.php',
                    method:'post',
                    data : $('#FormDJS').serialize(),
                    success:function(a){
                      alert(a);
                      document.getElementById('modalDJS').style.display = "none";
                      document.getElementsByTagName("body")[0].style.overflow = "";
                      document.getElementById("tabelDJstaffContainer").innerHTML = "";
                      eventFire(document.getElementById("DJSbtn"), 'click');
                      //alert("Berhasil submit jurnal");
                      //lihatDJS(document.getElementById("userNip").value);
                    }
                  });
               } else {
                  alert(msg);
               }
            }

            function submitDraftS(){
              var table = document.getElementById("tabelDJajax");
              var len = table.rows.length - 1;
              var count = 0;
              if(confirm("Sebanyak "+len+" jurnal akan disubmit ke atasan anda, jurnal yang sudah disubmit tidak bisa diedit kembali")){
                for(var i=1; i<table.rows.length; i++){
                  var idJ = table.rows[i].cells[0].innerHTML;
                  $.ajax({
                      dataType: 'html',
                      url:'ajax/kirimJurnal.php',
                      method:'post',
                      data : { 'id':idJ },
                      success:function(a){
                        if(a=="1"){
                          count += 1;
                        }
                      }
                  });
                  if(i == table.rows.length-1){
                    if(count>0){
                      alert("Submit jurnal berhasil, jumlah jurnal yang di submit: "+count);
                    } else {
                      alert("Submit jurnal gagal");
                    }
                  }
                }
                
                document.getElementById("tabelDJstaffContainer").innerHTML = "";
                eventFire(document.getElementById("DJSbtn"), 'click');
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
               if (volumetype == "" || tglMulai == "" || tglSelesai == ""){
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

            function validateTA() {
               var nip = document.forms["FormTA"]["nip"].value;
               var nipbaru = document.forms["FormTA"]["nipbaru"].value;
               var nama = document.forms["FormTA"]["nama"].value;
               var bagian = document.forms["FormTA"]["bagian"].value;
               var jabatan = document.forms["FormTA"]["jabatan"].value;
               var password = document.forms["FormTA"]["password"].value;
               var level = document.forms["FormTA"]["level"].value;
               var error = 0;
               var msg;
               if (nip == "" || nama == "" || jabatan == "" || bagian == "" || password == "" || level == ""){
                  msg = "Tidak boleh ada kolom yang kosong";
                  error++;
               } else if ( level > 99){
                  msg = "Level tidak boleh lebih dari 99";
                  error++;
               } else if ( level == 99){
                  msg = "Level tidak boleh sama dengan 99";
                  error++;
               }

               data = { 'nip':nip, 'nipbaru':nipbaru, 'nama':nama, 'bagian':bagian, 'jabatan':jabatan, 'password':password, 'level':level };
               if ( error == 0){
                  document.getElementById("FormTA").submit();
                  $.ajax({
                      dataType: 'html',
                      url:'ajax/cekNip.php',
                      method:'post',
                      data : { 'nip':nip },
                      success:function(a){
                        if(a == 'y'){
                          $.ajax({
                            dataType: 'html',
                            url:'ajax/tambahAccount.php',
                            method:'post',
                            data : data,
                            success:function(b){
                              if(b){
                                alert("Berhasil menambahkan account baru dengan nip: "+b);
                              } else {
                                alert("Gagal menambahkan account baru");
                              }
                            }
                          });
                        } else {
                          alert("NIP yang dimasukkan sudah ada di database, nama pegawai pemilik nip tersebut: "+a);
                        }
                      }
                  });
               } else {
                  alert(msg);
               }
            }
            function validateTA_Act(){
                 var aktivitas = document.forms['FormTA_Act']['aktivitas'].value;
                 var kategori = document.forms['FormTA_Act']['kategori'].value;
                 var durasi = document.forms['FormTA_Act']['durasi'].value;
                 if (aktivitas == "" || kategori == "" || durasi=="")                 {
                     alert("Semua kolom harus diisi");
                 } else {
                                document.getElementById("FormTA_Act").submit();
                                alert("Aktivitas Baru telah Ditambahkan");
                        }
              }
            function validateTA_EAct(){
                 var id_aktivitas = document.forms['FormTA_EAct']['id_aktivitas'].value;
                 var aktivitas = document.forms['FormTA_EAct']['inputaktivitas'].value;
                 var kategori = document.forms['FormTA_EAct']['input_idkategori'].value;
                 var durasi = document.forms['FormTA_EAct']['inputdurasi'].value;
                 if (id_aktivitas == "" || aktivitas == "" || kategori == "" || durasi=="")                 {
                     alert("Semua kolom harus diisi");
                 } else {
                                document.getElementById("FormTA_EAct").submit();
                                alert("Aktivitas telah Diubah");
                        }
              }

            function lihatJurnal(nip, nama) {
              document.getElementById("modalLJ").style.display = "block";
              document.getElementById("labelPemilikJurnal").innerHTML = nama;
              document.getElementById("LJSnip").value = nip;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
              document.getElementById("tabelLJstaffContainer").innerHTML = "";
              eventFire(document.getElementById("LJSbtn"), 'click');
            }

            function lihatJurnalADM(nip, nama) {
              document.getElementById("modalLJ").style.display = "block";
              document.getElementById("labelPemilikJurnal").innerHTML = nama;
              document.getElementById("LJSnip").value = nip;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
              document.getElementById("tabelLJstaffContainer").innerHTML = "";
              eventFire(document.getElementById("LJSbtn"), 'click');
            }

            function editAccount(nip, nama, jabatan,kepala, password){
              document.getElementById("ModalEA").style.display = "block";
              document.getElementById("labelPemilikAccount").innerHTML = nip;
              document.getElementById("EAnip").value = nip;
              document.getElementById("inputNama").value = nama;
              document.getElementById("inputJabatan").value = jabatan;
              document.getElementById("inputKepala").value = kepala;    
              document.getElementById("inputPassword").value = password;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
            }
             function editAktivitas(id_aktivitas, nama_aktivitas, durasi, id_kategori){
              document.getElementById("ModalEact").style.display = "block";
              document.getElementById("labelaktivitas").innerHTML = nama_aktivitas;
              document.getElementById("id_aktivitas").value = id_aktivitas;
              document.getElementById("inputaktivitas").value = nama_aktivitas;
              document.getElementById("inputdurasi").value = durasi;
              document.getElementById("input_idkategori").value = id_kategori;
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
            }
             function deleteAktivitas(id_aktivitas){
               data = { 'id_aktivitas':id_aktivitas };
                  alert("Menghapus Aktivitas");
                  var jurnalExists = true;
                  $.ajax({
                      dataType: 'html',
                      url:'ajax/cekjurnal.php',
                      method:'post',
                      data : { 'id_aktivitas':id_aktivitas },
                      success:function(a){
                        if(a == 'n'){
                          //jurnalExists = false;
                          $.ajax({
                                  dataType: 'html',
                                  url:'ajax/hapusjurnal.php',
                                  method:'post',
                                  data : data,
                                  success:function(){
                                      alert("Berhasil menghapus aktivitas ");
                                      location.reload();
                                    }
                                });
                        } else {
                                alert("Terdapat "+a+" Jurnal yang menggunakan aktivitas ini");
                      }
                          }
                  });
            }

            function selectJA(type, jabatan){
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
                  JAgetListPegawai(jabatan);
                }
              }
            }

            function JAgetListPegawai(j){
              $.ajax({
                dataType: 'html',
                url:'ajax/getListPegawai.php',
                method:'get',
                data : {'idjabatan': j},
                success:function(response){
                  $("#JAtabelSContainer").html(response);
                  $("#JPTable").tablesorter();
                }
              });
            }

            function selectTYPE(type,j){
              var tombol1 = document.getElementById("tombol1");
              var tombol2 = document.getElementById("tombol2");
                //alert(type)
              if(tombol1){
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
                    $.ajax({
                      dataType: 'html',
                      url:'ajax/getListPegawai-detail_admin.php',
                      method:'post',
                      data : { 'idjabatan': j },
                      success:function(response){
                        $("#JAtabelSTAFF").html(response);
                        $("#actTableDA").tablesorter();
                      }
                    });
                  }
                }
              }
              
            }

            function JAfilter(fil) {
               btn = document.getElementById("filBtn");
               label = document.getElementById("PJAbtnLabel");
               if(btn){
                 var harian = document.getElementsByClassName("LJAfilter")[0];
                 var periode = document.getElementsByClassName("LJAfilter")[1];
                 document.getElementById("filContent").classList.toggle("show");
                 label.innerHTML = fil;

                 if ( typeof harian === 'undefined'){
                   } else {
                   if( fil == 'Harian'){
                      harian.style.display = "inline-block";
                      periode.style.display = "none";
                   } else {
                      periode.style.display = "inline-block";
                      harian.style.display = "none";
                   }
                    document.getElementById("LJAfilterType").value = fil;
                 }
               }
            }

            function lihatJurnalAdmin(nip) {
              var filType = document.getElementById("LJAfilterType").value;
              var data = "kosong";
              if ( filType == 'Harian'){
                var tanggal = document.getElementById("LJApilihHari").value;
                var split = tanggal.split("-");
                var tahun = split[0];
                var bulan = split[1];
                var hari = split[2];
                if ( tanggal != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'tahun': tahun, 'bulan': bulan, 'hari': hari };
                }
              } else {
                var awal = document.getElementById("LJApilihAwal").value;
                var akhir = document.getElementById("LJApilihAkhir").value;
                if ( awal != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'awal': awal, 'akhir': akhir };
                }
              }

              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "ajax/tabelLJadmin.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#JAtabelA").html(response);

                      if(document.getElementById(nip)){
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
              } else {
                var awal = document.getElementById("LJSpilihAwal").value;
                var akhir = document.getElementById("LJSpilihAkhir").value;
                if ( awal != ""){
                  data = { 'nip': nip, 'tipeFilter': filType, 'awal': awal, 'akhir': akhir };
                }
              }

              if ( data != 'kosong'){
                $.ajax({    //create an ajax request to load_page.php
                  type: "GET",
                  url: "ajax/tabelLJstaff.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#tabelLJstaffContainer").html(response);
                      if(document.getElementById(nip)){
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

            function lihatJurnalSemua(nip) {
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
                  url: "ajax/tabelLJsemua.php",             
                  dataType: "html",   //expect html to be returned
                  data: data,               
                  success: function(response){                    
                      $("#tabelLJstaffContainer").html(response);
                      if(document.getElementById(nip)){
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

            function openTAform(id_jabatan){
              document.getElementById("ModalTA").style.display = "block";
              document.getElementsByTagName("body")[0].style.overflow = "hidden";

            }
            function Actform(){
              document.getElementById("ModalAct").style.display = "block";
              document.getElementsByTagName("body")[0].style.overflow = "hidden";

            }
             
            function lihatKalender(niep,namapeg){
              document.getElementById("ModalKal").style.display = "block";
              document.getElementsByTagName("body")[0].style.overflow = "hidden";
              $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/getcalender.php",             
                dataType: "html",   //expect html to be returned
                data: { 'niep': niep,'namapeg':namapeg},               
                success: function(response){                    
                    $("#calendar_div").html(response);
                }
              });
            }
             
            function eventFire(el, etype){
              if(el){
                if (el.fireEvent) {
                  el.fireEvent('on' + etype);
                } else {
                  var evObj = document.createEvent('Events');
                  evObj.initEvent(etype, true, false);
                  el.dispatchEvent(evObj);
                }
              }
            }

            
         </script>
         <script type="text/javascript">
         $(document).ready(function(){
           JAfilter('Periode');
           selectDJS('Bulanan');
           selectReport('Periode');
           getHLdata();
           if(document.getElementById("EJBTableWrapper")){
              toggleChild('n','2','EJBTableWrapper');
           }
           eventFire(document.getElementById("DJSbtn"), 'click');
           eventFire(document.getElementById("tombol2"), 'click');
           if(document.getElementById("LJSbtn")){
              eventFire(document.getElementById("LJSbtn"), 'click');
           }
           if(document.getElementById("LJAbtn")){
              eventFire(document.getElementById("LJAbtn"), 'click');
           }

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
              if (document.getElementById("EJContent")){
                document.getElementById("EJContent").classList.toggle("show");
              }
           })
           $('.clockpicker').clockpicker({
              autoclose: true
           });
           $("#FormDJS").submit(function(e) {
              e.preventDefault();
           });

           if(document.getElementById("actTable")){
              $("#actTable").tablesorter();
           }

           function onReady(callback) {
            var intervalID = window.setInterval(checkReady, 1000);

            function checkReady() {
              if (document.getElementsByTagName('body')[0] !== undefined) {
                window.clearInterval(intervalID);
                callback.call(this);
              }
            }
           }
           function show(id, value) {
             document.getElementById(id).style.display = value ? 'block' : 'none';
           }

           onReady(function () {
             show('loadingpage', false);
           });

           function HLedit(event){
            var startDate = event.startDate.getFullYear() + '-' + ('0' + (event.startDate.getMonth()+1)).slice(-2) + '-' + ('0' + (event.startDate.getDate()+1)).slice(-2);
            var endDate = event.endDate.getFullYear() + '-' + ('0' + (event.endDate.getMonth()+1)).slice(-2) + '-' + ('0' + event.endDate.getDate()).slice(-2);
            $('#event-modal input[name="event-index"]').val(event ? event.id : '');
            $('#event-modal input[name="event-name"]').val(event ? event.name : '');
            $('#event-modal input[name="event-start-date"]').val(event ? startDate : '');
            $('#event-modal input[name="event-end-date"]').val(event ? endDate : '');
            $('#event-modal').modal();
           }
           function HLdelete(event){
              $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/deleteHL.php",             
                dataType: "html",   //expect html to be returned
                data: { 'id': event.id, 'name': event.name },               
                success: function(response){
                    alert(response);
                    getHLdata();
                }
              });
           }

           function saveEvent() {
              var event = {
                  id: $('#event-modal input[name="event-index"]').val(),
                  name: $('#event-modal input[name="event-name"]').val(),
                  startDate: $('#event-modal input[name="event-start-date"]').val(),
                  endDate: $('#event-modal input[name="event-end-date"]').val()
              }

              $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/updateHL.php",             
                dataType: "html",   //expect html to be returned
                data: { 'id': event.id,'name': event.name,'startDate': event.startDate,'endDate': event.endDate },               
                success: function(response){
                    alert(response);
                    getHLdata();
                }
              });

              $('#event-modal').modal('hide');
           }

           function getHLdata(){
            $.ajax({
              url:"ajax/getHL.php",
              type:"POST",
              dataType:"html",
              success:function(a){
                var input = JSON.parse(a);
                var data = new Array();
                var i = 0;
                while (i<input.length){
                  var start = new Date(input[i]['startDate'] * 1000);
                  start.setDate(start.getDate()-1);
                  data.push({
                    id: input[i]['id'],
                    name: input[i]['name'],
                    location: input[i]['location'],
                    startDate: start,
                    endDate: new Date(input[i]['endDate'] * 1000)
                  });
                  i++;
                }
                loadKalHL(data);
              }
            });
           }

           function loadKalHL(HLdata){
             $('#KalHariLibur').calendar({
                enableContextMenu: true,
                enableRangeSelection: true,
                contextMenuItems:[
                  {
                    text: 'Update',
                    click: HLedit
                  },
                  {
                    text: 'Delete',
                    click: HLdelete
                  }
                ],
                selectRange: function(e){
                  HLedit({ startDate: e.startDate, endDate: e.endDate });
                },
                mouseOnDay: function(e) {
                  if(e.events.length > 0) {
                    var content = '';
                        
                    for(var i in e.events) {
                      content += '<div class="event-tooltip-content">'
                        + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
                        + '<div class="event-location">' + e.events[i].location + '</div>'
                        + '</div>';
                    }
                    
                    $(e.element).popover({ 
                      trigger: 'manual',
                      container: 'body',
                      html:true,
                      content: content
                    });
                        
                    $(e.element).popover('show');
                  }
                },
                mouseOutDay: function(e) {
                  if(e.events.length > 0) {
                    $(e.element).popover('hide');
                  }
                },
                dayContextMenu: function(e) {
                  $(e.element).popover('hide');
                },
                dataSource: HLdata
             });
           }
           $('#save-event').click(function() {
              saveEvent();
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

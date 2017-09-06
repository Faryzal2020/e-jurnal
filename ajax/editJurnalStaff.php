<?php
            session_start();
            $nip = $_SESSION['nip'];
            include("../config.php");
            $id = $_POST['EDJSidJ'];
            $idAct = $_POST['EDJSidAct'];
            $vol = $_POST['edjsVolume'];
            $voltype = $_POST['edjsVolumeType'];
            $jamMulai = date('G:i', strtotime($_POST['edjsJamMulai']));
            $jamSelesai = date('G:i', strtotime($_POST['edjsJamSelesai']));
            $mulai = $_POST['edjsTglMulai'] .' '. $jamMulai . ':00';
            $selesai = $_POST['edjsTglSelesai'] .' '. $jamSelesai . ':00';
            
            if (isset($_POST['edjsActType'])){
                  $acttype = $_POST['edjsActType'];
            } else {
                  $acttype = "umum";
            }
            $ket = $_POST['edjsKeterangan'];
            $EDJsql = "UPDATE jurnal SET id_aktivitas = '$idAct', nip = '$nip', volume = '$vol', jenis_output = '$voltype', waktu_mulai = '$mulai', waktu_selesai = '$selesai', jenis_aktivitas = '$acttype', keterangan = '$ket' WHERE id_jurnal = '$id'";
            //echo "<script type='javascript'>alert($EDJsql);</script>";
            if(mysqli_query($db,$EDJsql)){
                  $string = "Editing jurnal dengan ID " . $id . " berhasil disimpan";
            } else {
                  $string = "Editing jurnal dengan ID " . $id . " gagal disimpan";
            }
            echo $string;
            
?>
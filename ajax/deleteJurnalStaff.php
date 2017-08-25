<?php
            session_start();
            $nip = $_SESSION['nip'];
            include("../config.php");
            $id = $_POST['id'];
            $DDJsql = "DELETE FROM jurnal WHERE id_jurnal = '$id'";
            //echo "<script type='javascript'>alert($EDJsql);</script>";
            if(mysqli_query($db,$DDJsql)){
                  $string = "Draft jurnal dengan ID " . $id . " berhasil dihapus";
            } else {
                  $string = "Draft jurnal dengan ID " . $id . " gagal dihapus";
            }
            echo $string;
            
?>
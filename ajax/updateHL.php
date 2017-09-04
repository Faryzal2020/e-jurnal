<?php
            include("../config.php");
            $id = $_GET['id'];
            $nama = $_GET['name'];
            $start = $_GET['startDate'];
            $end = $_GET['endDate'];

            $tipe = "";
            if($id != ""){
            	$tipe = "Update";
            	$sql = "UPDATE hari_libur as hl SET hl.keterangan = '$nama', hl.start_date = '$start', hl.end_date = '$end' WHERE hl.id = '$id'";
            } else {
            	$tipe = "Tambah";
            	$sql = "INSERT INTO hari_libur( keterangan, start_date, end_date ) VALUES ( '$nama', '$start', '$end' )";
            }
            //echo "<script type='javascript'>alert($EDJsql);</script>";
            if(mysqli_query($db,$sql)){
                  $string = $tipe . " hari libur dengan nama \"" . $nama . "\" berhasil";
            } else {
                  $string = $tipe . " hari libur dengan nama \"" . $nama . "\" gagal";
            }
            echo $string;
            
?>
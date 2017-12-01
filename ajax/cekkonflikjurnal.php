<?php
	session_start();
	include("../config.php");
	$tglJurnal = $_POST['tanggal'];
	$jamMulai = $_POST['jamMulai'] . ":00";
	$jamSelesai = $_POST['jamSelesai'] . ":00";
	$waktuMulai = date('Y-m-d H:i:s', strtotime("$tglJurnal $jamMulai"));
	$waktuSelesai = date('Y-m-d H:i:s', strtotime("$tglJurnal $jamSelesai"));
	$cekjurnal = "SELECT id_jurnal FROM jurnal WHERE '$waktuMulai' < waktu_selesai AND '$waktuSelesai' > waktu_mulai";
	$resultjurnal = mysqli_query($db,$cekjurnal);
	if(mysqli_num_rows($resultjurnal) > 0){
        while($data = mysqli_fetch_array($resultjurnal)){
        	echo "ID Jurnal: " . $data[0];
        }
	} else {
		echo "y";
	}
?>
<?php
	session_start();
	include("../config.php");
	$nip = $_SESSION['nip'];
	
	$cat = $_POST['cat'];
	if($cat == 'izin harian'){
		$tglMulai = $_POST['tanggal'];
		$tglSelesai = $_POST['tglSelesai'];
		$jamMulai = "00:00:00";
		$jamSelesai = "23:59:00";
		$waktuMulai = date('Y-m-d H:i:s', strtotime("$tglMulai $jamMulai"));
		$waktuSelesai = date('Y-m-d H:i:s', strtotime("$tglSelesai $jamSelesai"));
	} else {
		$tglJurnal = $_POST['tanggal'];
		$jamMulai = $_POST['jamMulai'] . ":00";
		$jamSelesai = $_POST['jamSelesai'] . ":00";
		$waktuMulai = date('Y-m-d H:i:s', strtotime("$tglJurnal $jamMulai"));
		$waktuSelesai = date('Y-m-d H:i:s', strtotime("$tglJurnal $jamSelesai"));
	}

	if(!empty($_POST['edit'])){
		$idj = $_POST['idjurnal'];
		$cekjurnal = "SELECT id_jurnal FROM jurnal WHERE '$waktuMulai' < waktu_selesai AND '$waktuSelesai' > waktu_mulai AND nip = '$nip' AND id_jurnal != '$idj'";
	} else {
		$cekjurnal = "SELECT id_jurnal FROM jurnal WHERE '$waktuMulai' < waktu_selesai AND '$waktuSelesai' > waktu_mulai AND nip = '$nip'";
	}
	
	$resultjurnal = mysqli_query($db,$cekjurnal);
	if(mysqli_num_rows($resultjurnal) > 0){
		echo "ID Jurnal: ";
        while($data = mysqli_fetch_array($resultjurnal)){
        	echo $data[0].", ";
        }
	} else {
		echo "y";
	}
?>
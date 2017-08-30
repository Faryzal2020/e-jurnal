<?php
	session_start();
	include("../config.php");
	$id_aktivitas = $_POST['id_aktivitas'];
	$cekjurnal = "SELECT id_jurnal FROM jurnal WHERE id_aktivitas = '$id_aktivitas' ";
	$resultjurnal = mysqli_query($db,$cekjurnal);
	if(mysqli_num_rows($resultjurnal) > 0){
        $jumlah = mysqli_num_rows($resultjurnal);
		echo $jumlah;
	} else {
		echo "n";
	}
?>
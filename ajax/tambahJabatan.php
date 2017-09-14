<?php
	session_start();
	include("../config.php");
	$nama = $_POST['nama'];
	$atasan = $_POST['atasan'];
	$eselon = $_POST['eselon'];
	$sql = "INSERT INTO jabatan( nama_jabatan, eselon, atasan) VALUES ( '$nama', '$eselon', '$atasan')";
	if(mysqli_query($db,$sql)){
		echo "y";
	} else {
		echo "n";
	}
?>
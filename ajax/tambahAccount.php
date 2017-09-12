<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
	$nipbaru = $_POST['nipbaru'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$password = $_POST['password'];
	$sql = "INSERT INTO user( nip, id_pegawai, nama_pegawai, id_jabatan, password, level) VALUES ( '$nip', '$nipbaru', '$nama', '$jabatan', '$password', 1)";
	if(mysqli_query($db,$sql)){
		echo "'$nip'";
	}
?>
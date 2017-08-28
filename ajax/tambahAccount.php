<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
	$nipbaru = $_POST['nipbaru'];
	$nama = $_POST['nama'];
	$bagian = $_POST['bagian'];
	$jabatan = $_POST['jabatan'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	$sql = "INSERT INTO user( nip, id_pegawai, nama_pegawai, jabatan, password, level, bagian ) VALUES ( '$nip', '$nipbaru', '$nama', '$jabatan', '$password', '$level', '$bagian' )"
	if(mysqli_query($db,$sql)){
		echo "'$nip'";
	}
?>
<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $password = $_POST['password'];
    $sql = "UPDATE user SET nama_pegawai = '$nama', id_jabatan = '$jabatan', password = '$password' WHERE nip = '$nip'";
	if(mysqli_query($db,$sql)){
		echo "Berhasil edit data pegawai";
	} else {
		echo "Gagal edit data pegawai";
	}
	
?>

<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $password = $_POST['password'];

    if(!is_numeric($jabatan)){
    	$sql2 = "SELECT jabatan.id_jabatan FROM jabatan WHERE jabatan.nama_jabatan = '$jabatan'";
    	$result = mysqli_query($db,$sql2);
    	while($data = mysqli_fetch_array($result)){
    		$jabatan = $data[0];
    	}
    }

    $sql = "UPDATE user SET nama_pegawai = '$nama', id_jabatan = '$jabatan', password = '$password' WHERE nip = '$nip'";
	if(mysqli_query($db,$sql)){
		echo "Berhasil edit data pegawai";
	} else {
		echo "Gagal edit data pegawai";
	}
	
?>

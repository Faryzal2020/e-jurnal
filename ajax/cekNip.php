<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
	$sql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan FROM user,jabatan WHERE user.nip =  '$nip' AND user.id_jabatan=jabatan.id_jabatan";
	$result = mysqli_query($db,$sql);
	$data = mysqli_fetch_row($result);
	if(mysqli_num_rows($result) > 0){
		$nama = $data[1];
        $jabatan = $data[2];
        $adaorang=$nama." menjabat sebagai ".$jabatan;
		echo "$adaorang ";
	} else {
		echo "y";
	}
?>
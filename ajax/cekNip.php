<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
	$sql = "SELECT nip, nama_pegawai FROM user WHERE nip = '$nip' ";
	$result = mysqli_query($db,$sql);
	$data = mysqli_fetch_row($result);
	if(mysqli_num_rows($result) > 0){
		$nama = $data[1];
		echo "$nama";
	} else {
		echo "y";
	}
?>
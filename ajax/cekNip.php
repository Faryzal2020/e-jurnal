<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
	$sql = "SELECT nip, nama_pegawai FROM user WHERE nip = '$nip' "
	$result = mysqli_query($db,$sql);
	if(mysqli_num_rows($result) > 0){
		echo "$result['nama_pegawai']";
	} else {
		echo "y";
	}
?>
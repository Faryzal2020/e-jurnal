<?php
	session_start();
	include("../config.php");
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$sql = "UPDATE jabatan SET nama_jabatan = '$nama' WHERE id_jabatan = '$id'";
	if(mysqli_query($db,$sql)){
		echo "y";
	} else {
		echo "n";
	}
	
?>

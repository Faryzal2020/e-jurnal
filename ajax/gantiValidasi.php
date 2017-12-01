<?php
	session_start();
	include("../config.php");
	$id = $_POST['id'];
	$pesan = $_POST['pesan'];
	if($pesan != ''){
		$sql = "UPDATE jurnal SET validasi = '$pesan' WHERE id_jurnal = '$id'";
	} else {
		$sql = "UPDATE jurnal SET validasi = '1' WHERE id_jurnal = '$id'";
	}
	if(mysqli_query($db,$sql)){
		echo "y";
	} else {
		echo "n";
	}
?>

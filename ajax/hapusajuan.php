<?php
	session_start();
	include("../config.php");
	$id_ajuan = $_POST['id_ajuan'];
	$hapusajuan = "DELETE FROM `ajuan_aktivitas` WHERE id_ajuan=$id_ajuan";
	mysqli_query($db,$hapusajuan);
?>
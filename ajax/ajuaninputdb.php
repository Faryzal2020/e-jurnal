<?php
	session_start();
	include("../config.php");
	$id_ajuan = $_POST['id_ajuan'];
	$nama_aktivitas = $_POST['nama_aktivitas'];
	$durasi = $_POST['durasi'];
	$id_kategori = $_POST['id_kategori'];
	$inputaktivitas = "INSERT INTO `aktivitas`( `id_kategori`, `nama_aktivitas`, `durasi`) VALUES ('$id_kategori','$nama_aktivitas','$durasi')";
	mysqli_query($db,$inputaktivitas);
	$hapusajuanoke = "DELETE FROM `ajuan_aktivitas` WHERE id_ajuan=$id_ajuan";
	mysqli_query($db,$hapusajuanoke);
?>
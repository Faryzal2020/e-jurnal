<?php
	session_start();
	include("../config.php");
	$id_aktivitas = $_POST['id_aktivitas'];
	$hapusaktivitas = "DELETE FROM aktivitas WHERE id_aktivitas = $id_aktivitas";
	mysqli_query($db,$hapusaktivitas);
?>
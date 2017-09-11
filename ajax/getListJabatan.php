<?php
	session_start();
	include("../config.php");
	$atasan = $_POST['atasan'];
	$eselon = $_POST['eselon'];
	if($atasan == "n"){
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE jabatan.eselon = $eselon";
	} else {
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE atasan.id_jabatan = '$atasan'";
	}
	$result = mysqli_query($db,$sql);
	$idTabel = "child-" . $atasan;
	if(mysqli_num_rows($result) > 0){
		echo "<table class=\"treeTable\" id=\"$idTabel\" border=\"0\" cellpadding=\"20\" align=\"center\" style=\"width: -webkit-fill-available; margin-left: 45px;\">";
		while($data = mysqli_fetch_array($result)){
			echo "<tr onclick=\"toggleChild('$data[0]','n','$data[1]')\" style=\"border: 1px solid #ccc;\"><td style='cursor: pointer; padding: 10px;'>$data[1]</td></tr>";
			echo "<tr><td id=\"$data[1]\"></td></tr>";
		}
		echo "</table>";
	} else {
		echo "";
	}
	
?>

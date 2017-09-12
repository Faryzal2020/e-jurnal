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
	$select = "inputSelect-" . $eselon;
	if(mysqli_num_rows($result) > 0){
		while($data = mysqli_fetch_array($result)){
			echo "<option value=\"$data[0]\">$data[1]</option>";
		}
	} else {
		echo "";
	}
	
?>

<?php
	session_start();
	include("../config.php");
	$atasan = $_POST['atasan'];
	$i = $_POST['i'];
	if($atasan == "n"){
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE jabatan.eselon = 2";
	} else {
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE atasan.id_jabatan = '$atasan'";
	}
	$result = mysqli_query($db,$sql);
	$id = "pilih-" . $i;
	$j = array("Biro", "Bagian", "SubBagian", "Staf");

	$label = $j[$i-1];
	if(mysqli_num_rows($result) > 0){
		echo "<option id=\"$id\" value=\"1\">Pilih $label</option>";
		while($data = mysqli_fetch_array($result)){
			echo "<option value=\"$data[0]\">$data[1]</option>";
		}
	} else {
		echo "";
	}
	
?>
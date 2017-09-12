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
			echo "<tr style=\"border-bottom: 2px solid #ECECEC;\">
					<td style=\"padding: 10px;\"'>";
			if($data[2] == 5){
				echo "<span style=\"text-decoration: none; cursor: default;\">$data[1]";
			} else {
				echo "<span onclick=\"toggleChild('$data[0]','n','$data[1]', this)\">
						<span class=\"glyphicon glyphicon-plus\" style=\"text-decoration: none; padding-right: 5px;\"></span>$data[1]";
			}
			echo		"</span>
					</td>
					<td style='background-color: white; border: 1px solid white; width: 200px;'> <a class=\"EJBbtn pencetan\" onclick=\"editJabatan('$data[0]','$data[1]')\">Edit</a> <a class=\"EJBbtn pencetan\" onclick=\"lihatPegawai('$data[0]')\">Lihat Pegawai</a></td>
				 </tr>";
			echo "<tr style='background-color: white; border: 1px solid white;'><td colspan=\"2\" id=\"$data[1]\"></td></tr>";
		}
		echo "</table>";
	} else {
		echo "";
	}
	
?>

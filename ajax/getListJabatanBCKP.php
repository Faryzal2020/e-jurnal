<?php
	session_start();

	function getBawahan($eselon){
		include("../config.php");
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE jabatan.eselon = '$eselon'";
		$result = mysqli_query($db,$sql);
		while($data = mysqli_fetch_array($result)){
			if($eselon == 0 || $eselon == 5){
				echo 
					"<tr>
						<td style=''> $data[0] </td>
						<td style=''> $data[1] </td>
						<td style=''> $data[3] </td>";
			} else if($eselon == 2) {
				echo 
					"<tr>
						<td style=''> $data[0] </td>
						<td style=''> $data[1] </td>
						<td style=''> $data[2] </td>";
			} else {
				echo 
					"<tr>
						<td style=''> $data[0] </td>
						<td style=''> $data[1] </td>
						<td style=''> $data[2] </td>
						<td style=''> $data[3] </td>";
			}
			echo 
				"
					<td style=\"text-align: center; width: 80px;\">
						<a onclick=\"editJabatan($data[0],$data[2],$data[4])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-list-alt\" title=\"Edit Jabatan\"></span></a>
						<a onclick=\"deleteJabatan($data[0])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-trash\" title=\"Hapus Jabatan\"></span></a>
					</td>
				</tr>";
		}
	}
	echo "<table class=\"EJTable\" id=\"EJTable\" border=\"1\" cellpadding=\"20\" align=\"center\">";
	$eselon = $_POST['kat'];
	if($eselon == 0 || $eselon == 5){
		echo 
			"<tr>
				<th style=''>ID</th>
				<th style=''>Nama Jabatan</th>
				<th style=''>Atasan</th>
				<th style=''></th>
			</tr>";
	} else if($eselon == 2) {
		echo 
			"<tr>
				<th style=''>ID</th>
				<th style=''>Nama Jabatan</th>
				<th style=''>Eselon</th>
				<th style=''></th>
			</tr>";
	} else {
		echo 
			"<tr>
				<th style=''>ID</th>
				<th style=''>Nama Jabatan</th>
				<th style=''>Eselon</th>
				<th style=''>Atasan</th>
				<th style=''></th>
			</tr>";
	}
	getBawahan($_POST['kat']);
	echo "</table>";
?>

<?php
	session_start();

	function getBawahan($nama_jabatan){
		include("../config.php");
		$sql = "SELECT jabatan.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, atasan.nama_jabatan, atasan.id_jabatan, atasan.eselon FROM jabatan LEFT JOIN jabatan as atasan ON atasan.id_jabatan = jabatan.atasan WHERE atasan.nama_jabatan = '$nama_jabatan'";
		$result = mysqli_query($db,$sql);
		while($data = mysqli_fetch_array($result)){
			echo 
				"<tr>
					<td style=''> $data[0] </td>
					<td style=''> $data[1] </td>
					<td style=''> $data[2] </td>
					<td style=''> $data[3] </td>
					<td style=\"text-align: center; width: 80px;\">
						<a onclick=\"editJabatan($data[0])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-list-alt\" title=\"Edit Jabatan\"></span></a>
						<a onclick=\"deleteJabatan($data[0])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-trash\" title=\"Hapus Jabatan\"></span></a>
					</td>
				</tr>";
			if($data[2] != 5){
				getBawahan($data[1]);
			}
		}
	}

	echo 
		"<table class=\"EJTable\" id=\"EJTable\" border=\"1\" cellpadding=\"20\" align=\"center\">
		<tr>
			<th style=''>ID</th>
			<th style=''>Nama Jabatan</th>
			<th style=''>Eselon</th>
			<th style=''>Atasan</th>
			<th style=''></th>
		</tr>
		<tr style=\"display:none;\">
			<td colspan=\"5\"><label id=\"EJTableMessage\" style=\"font-weight:normal; margin: auto\"></label></td>
		</tr>";
	getBawahan($_GET['nama_jabatan']);
	echo "</table>";
?>

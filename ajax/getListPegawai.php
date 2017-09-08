<?php
	session_start();

	function getBawahan($id_jabatan){
		include("../config.php");
		$sql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan, jabatan.eselon, jabatan.id_jabatan FROM user LEFT JOIN jabatan ON user.id_jabatan = jabatan.id_jabatan WHERE jabatan.atasan = '$id_jabatan'";
		$result = mysqli_query($db,$sql);
		while($data = mysqli_fetch_array($result)){
			echo 
				"<tr>
					<td style=''> $data[0] </td>
					<td style=''> $data[1] </td>
					<td style=''> $data[2] </td>
					<td style=\"text-align: center; width: 80px;\">
						<a class=\"selectActbtn\" title=\"Klik untuk melihat detail jurnal\" onclick=\"lihatJurnal('$data[0]','$data[1]')\"><span class=\"glyphicon glyphicon-list-alt\"></span></a>
					</td>
				</tr>";
			if($data[3] != 5){
				getBawahan($data[4]);
			}
		}
	}

	echo 
		"<table class=\"actTable\" id=\"JPTable\" border=\"1\" cellpadding=\"20\" align=\"center\">
		<thead>
		<tr>
			<th style=''>NIP</th>
			<th style=''>Nama Pegawai</th>
			<th style=''>Jabatan</th>
			<th style=''></th>
		</tr>
		</thead><tbody>";
	getBawahan($_GET['idjabatan']);
	echo "</tbody></table>";
?>

<?php
	session_start();

	function getBawahan($id_jabatan){
		include("../config.php");
		$sql = "SELECT user.nip, user.nama_pegawai, user.id_jabatan, jabatan.nama_jabatan, jabatan.eselon, jabatan.atasan, count(jurnal.id_jurnal) as jumlah_jurnal FROM user LEFT JOIN jabatan ON user.id_jabatan = jabatan.id_jabatan LEFT JOIN jurnal ON user.nip = jurnal.nip WHERE jabatan.atasan = '$id_jabatan' GROUP BY user.nip";
		$result = mysqli_query($db,$sql);
		while($data = mysqli_fetch_array($result)){
			echo 
				"<tr>
					<td style=''> $data[0] </td>
					<td style=''> $data[1] </td>
					<td style=''> $data[3] </td>
					<td style=\"text-align: center; width: 140px;\">";
			if($data[6] == 0){
				echo
					"<a class=\"tombol_detail disable\" style=\"font-weight: normal; padding: 3px;\">Jurnal Kosong</a>";
			} else {
				echo
					"<a class=\"tombol_detail\" title=\"lihat kalender jurnal pegawai ini\" onclick=\"lihatKalender('$data[0]','$data[1]')\" style=\"font-weight: normal; padding: 3px;\">Lihat Jurnal</a>";
			}
			echo
					"</td>
				</tr>";
			if($data[4] != 5){
				getBawahan($data[2]);
			}
		}
	}

	echo 
		"<table class=\"detail_actTable\" id=\"actTableDA\" border=\"1\" cellpadding=\"20\" align=\"center\">
		<thead>
		<tr>
			<th style=''>NIP</th>
			<th style=''>Nama Pegawai</th>
			<th style=''>Jabatan</th>
			<th style=''></th>
		</tr></thead><tbody>";
	getBawahan($_POST['idjabatan']);
	echo "</tbody></table>";
?>

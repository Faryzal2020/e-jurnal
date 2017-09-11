<?php
	session_start();

	function getList($kat){
		include("../config.php");

		if($kat == 1){
			$sql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan, user.password FROM user LEFT JOIN jabatan ON jabatan.id_jabatan = user.id_jabatan WHERE user.nama_pegawai LIKE '%.$search.%' OR user.nama_pegawai LIKE '%.$search.%' ";
		} else {
			$sql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan, user.password FROM user LEFT JOIN jabatan ON jabatan.id_jabatan = user.id_jabatan WHERE user.nama_pegawai LIKE '%.$search.%' OR user.nama_pegawai LIKE '%.$search.%' ";
		}
		$result = mysqli_query($db,$sql);
		if(mysqli_num_rows($result) > 0){
			while($data = mysqli_fetch_array($result)){
				echo 
					"<tr>
						<td style=''> $data[0] </td>
						<td style=''> $data[1] </td>
						<td style=''> $data[2] </td>
						<td style=\"text-align: center; width: 80px;\">
							<a onclick=\"lihatJurnal($data[0], $data[1])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-list-alt\" title=\"Lihat Jurnal\"></span></a>
							<a onclick=\"editAccount($data[0], $data[1], $data[2], $data[3])\" style=\"display: inline; font-size: 1.5em; padding-right: 5px;\"><span class=\"glyphicon glyphicon-edit\" title=\"Edit Account\"></span></a>
						</td>
					</tr>";
			}
		} else {
			echo
			"<tr style=\"display:none;\">
				<td colspan=\"4\"><label style=\"font-weight:normal; margin: auto\">Pegawai tidak ditemukan</label></td>
			</tr>";

		}
	}

	echo 
		"<table class=\"epTable\" id=\"epTable\" border=\"1\" cellpadding=\"20\" align=\"center\">
		<tr>
			<th style=\"min-width: 130px\">NIP</th>
			<th style=\"min-width: 320px\">Nama Pegawai</th>
			<th style=\"min-width: 220px\">Jabatan</th>
			<th style=\"min-width: 130px\"></th>
		</tr>"
	getList($_GET['kat']);
	echo "</table>";
?>

<?php
	session_start();
	include("../config.php");

	function getBawahan($id_jabatan,$dateType,$date){
		include("../config.php");
		$sql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan, jabatan.eselon, jabatan.id_jabatan FROM user LEFT JOIN jabatan ON user.id_jabatan = jabatan.id_jabatan WHERE jabatan.atasan = '$id_jabatan'";
		$result = mysqli_query($db,$sql);
		while($data = mysqli_fetch_array($result)){
			$nipPegawai = $data[0];
			if($dateType == 'day'){
				$sql2 = "SELECT j.id_jurnal, j.id_aktivitas, j.waktu_mulai, j.waktu_selesai, u.nama_pegawai, a.nama_aktivitas, j.jenis_aktivitas, j.keterangan, a.id_kategori, j.validasi FROM jurnal as j , user as u, aktivitas as a WHERE j.id_aktivitas = a.id_aktivitas AND j.nip = u.nip AND j.status_jurnal = 'draft' AND u.nip = '$nipPegawai' AND DAY(j.waktu_mulai) = '$date'";
			} elseif($dateType == 'month'){
				$sql2 = "SELECT j.id_jurnal, j.id_aktivitas, j.waktu_mulai, j.waktu_selesai, u.nama_pegawai, a.nama_aktivitas, j.jenis_aktivitas, j.keterangan, a.id_kategori, j.validasi FROM jurnal as j , user as u, aktivitas as a WHERE j.id_aktivitas = a.id_aktivitas AND j.nip = u.nip AND j.status_jurnal = 'draft' AND u.nip = '$nipPegawai' AND MONTH(j.waktu_mulai) = '$date'";
			}

			if($result2 = mysqli_query($db,$sql2)){
				if(mysqli_num_rows($result2) > 0){
					while($data2 = mysqli_fetch_array($result2)){
						if($data2[8] == '5'){
							$mulai = date("d F Y", strtotime($data2[2]));
							$selesai = date("d F Y", strtotime($data2[3]));
						} else {
							$mulai = date("G:i", strtotime($data2[2]));
							$selesai = date("G:i", strtotime($data2[3]));
						}
						$tanggal = date("d M", strtotime($data2[2]));
						echo "
						<tr>
							<td>$tanggal</td>
							<td>$data2[4]</td>
							<td>$data2[5]</td>
							<td>$data2[6]</td>
							<td>$mulai</td>
							<td>$selesai</td>
							<td>$data2[7]</td>";
						if($data2[9] == '1'){
							echo "<td class='validasiOK'><span>OK</span><button onclick=\"bukaModalValidasi('edit','$data2[0]')\">Ganti</button></td>";
						} else {
							echo "<td class='validasiNO'><span>NO</span><button onclick=\"bukaModalValidasi('lihat','$data2[9]')\">Lihat Pesan</button></td>";
						}
						echo "</tr>";
					}
				}
			}
			if($data[3] != 5){
				getBawahan($data[4],$dateType,$date);
			}
		}
	}

	$idJabatan = $_SESSION['idjabatan'];
	$nip = $_SESSION['nip'];
	$dateType = $_POST['type'];
	$date = $_POST['date'];
	echo "<table border='1' class='tabelVJ' id='tabelVJajax' cellpadding='20' style='font-size: 75%;'>";
	echo "
	<tr>
		<th>Tanggal</th>
		<th>Nama Pegawai</th>
		<th>Nama Aktivitas</th>
		<th>Jenis Aktivitas</th>
		<th>Mulai</th>
		<th>Selesai</th>
		<th>Keterangan</th>
		<th>Validasi</th>
	</tr>";
	getBawahan($idJabatan,$dateType,$date);
	echo "</table>";
	
?>

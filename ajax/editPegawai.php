<?php
	session_start();
	include("../config.php");
	$nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $tglGanti = $_POST['tglGanti'];
    $password = $_POST['password'];
    $gantiJabatan = 0;

    if(!is_numeric($jabatan)){
    	$sql2 = "SELECT jabatan.id_jabatan FROM jabatan WHERE jabatan.nama_jabatan = '$jabatan'";
    	$result = mysqli_query($db,$sql2);
    	while($data = mysqli_fetch_array($result)){
    		$jabatan = $data[0];
    	}
    }



    $query = mysqli_query($db,"SELECT nip, id_jabatan FROM user WHERE nip = '$nip'");
    $sql = "UPDATE user SET nama_pegawai = '$nama', id_jabatan = '$jabatan', password = '$password' WHERE nip = '$nip'";
	if(mysqli_query($db,$sql)){
        echo "Berhasil edit data pegawai, ";
        while($data = mysqli_fetch_array($query)){
            if($jabatan != $data[1]){
                $jabatanLama = $data[1];
                $query2 = mysqli_query($db,"INSERT INTO history_jabatan(nip,jabatan_lama,tanggal_pindah,jabatan_baru) VALUES ('$nip','$jabatanLama','$tglGanti','$jabatan')");
                if($query2){
                    echo "Jabatan Sebelumnya telah disimpan dalam history jabatan";
                } else {
                    echo "Jabatan Sebelumnya gagal disimpan dalam history jabatan";
                }
            }
        }
	} else {
		echo "Gagal edit data pegawai";
	}
	
?>

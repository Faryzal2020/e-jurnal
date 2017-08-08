<?php
	include_once "config.php";
if(isset($_POST['tombol'])){
    
    
    $tanggal_mulai = $_POST['tanggal_mulai'];
    //$tanggal_mulai_ex=explode('-',tanggal_mulai);
    //$tahun_mulai = $tanggal_mulai_ex[0];
    //$bulan_mulai = $tanggal_mulai_ex[1];
    //$tanggal_mulai = $tanggal_mulai_ex[2];
	$waktu_mulai = $_POST['waktu_mulai'];
    $tanggal_selesai = $_POST['tanggal_mulai'];
	$waktu_selesai = $_POST['waktu_selesai'];
    $saat_mulai = $tanggal_mulai .' '. $waktu_mulai . ':00';
    $saat_selesai = $tanggal_selesai .' '. $waktu_selesai . ':00';
    $sql = "INSERT INTO jurnal(`id_aktivitas`, `nip`, `volume`, `jenis_output`, `waktu_mulai`, `waktu_selesai`)  VALUES ('1','012f','1','lembar','".$saat_mulai."','".$saat_selesai."')";
    echo $saat_mulai;
    echo "<br>";
    
    echo $saat_selesai;
    

   
    mysqli_query($conn,$sql);
    /*
    $to_time = strtotime($saat_selesai);
    $from_time = strtotime($saat_mulai);
    echo round(abs($to_time - $from_time) / 60). " minute";
*/
}
?>
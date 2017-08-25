<?php
include("../config.php");

$nip = $_GET['nip'];
$tipeFilter = $_GET['tipeFilter'];
$LJSsql = "";
if( $tipeFilter == 'Harian'){
	$tahun = $_GET['tahun'];
	$bulan = $_GET['bulan'];
    $hari = $_GET['hari'];
	$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_simpan, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan , j.id_aktivitas, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.tanggal_simpan)='$tahun' AND month(j.tanggal_simpan)='$bulan' AND day(j.tanggal_simpan)='$hari' AND j.status_jurnal = 'simpan'";
} else if( $tipeFilter == 'Mingguan'){
    $tahun = $_GET['tahun'];
    $minggu = $_GET['minggu'];
    $LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_simpan, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan , j.id_aktivitas, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.tanggal_simpan)='$tahun' AND week(j.tanggal_simpan)='$minggu' AND j.status_jurnal = 'simpan'";
} else {
	$tahun = $_GET['tahun'];
	$bulan = $_GET['bulan'];
	$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_simpan, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan , j.id_aktivitas, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.tanggal_simpan)='$tahun' AND month(j.tanggal_simpan)='$bulan' AND j.status_jurnal = 'simpan'";
}
$result = mysqli_query($db, $LJSsql);

echo "<table border='1' class='tabelDJ' id='tabelDJajax' cellpadding='20'>";
echo "
    <tr>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>ID Jurnal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Nama Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Jenis Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Kategori</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Volume</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Jenis Output</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Waktu Mulai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em;'><b>Waktu Selesai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em; width:120px'><b>Tanggal Input Jurnal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em; width:120px'><b>Keterangan</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.9em; width:60px'><b>Edit / Delete</b></th>
    </tr>";

if(mysqli_num_rows($result) > 0){
    while($data = mysqli_fetch_row($result))
    {   
        $idJurnal = $data[0];
        $idAct = $data[11];
        $durasi = $data[12];
        //echo "<input type=hidden class='DJSidJurnal' value='$idJurnal' />";
        echo "<tr>";
        echo "<td align=center>$idJurnal</td>";
        echo "<td align=center style='padding: 10px; max-width: 410px; min-width: 140px; font-size:0.82em;'>$data[7]</td>";
        echo "<td align=center>$data[6]</td>";
        echo "<td align=center style='width:130px;'>$data[9]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>$data[2]</td>";
        echo "<td align=center style='width: 140px; font-size: 0.9em;'>$data[3]</td>";
        echo "<td align=center style='width: 140px; font-size: 0.9em;'>$data[4]</td>";
        echo "<td align=center style='width: 140px; font-size: 0.9em;'>$data[5]</td>";
        echo "<td align=center style='width: 18%; font-size: 0.8em;'>$data[10]</td>";
        echo "<td align=center style=\"font-size: 0.8em;\">
                <a class=\"editDJBtn\" onclick=\"editDJ($idJurnal,$idAct,$durasi)\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-edit\" title=\"Edit jurnal\"></span></a>
                <a class=\"deleteDJBtn\" onclick=\"deleteDJ($idJurnal)\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-trash\" title=\"Hapus jurnal\"></span></a>
            </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td id='noData' align=center colspan='11'>Tidak ada data</td>";
    echo "</tr>";
}
echo "</table>";
?>
<?php
include("config.php");

$nip = $_GET['nip'];
$tipeFilter = $_GET['tipeFilter'];
$LJSsql = "";
$LJStotalwaktu = "";
if( $tipeFilter == 'Mingguan'){
	$tahun = $_GET['tahun'];
	$minggu = $_GET['minggu'];
	$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.tanggal_jurnal)='$tahun' AND week(j.tanggal_jurnal)='$minggu'";
    $LJStotalwaktu = "SELECT sec_to_time(sum(time_to_sec(timediff(j.waktu_selesai,j.waktu_mulai)))) as total_waktu FROM jurnal as j WHERE j.nip = '$nip' AND year(j.tanggal_jurnal)='$tahun' AND week(j.tanggal_jurnal)='$minggu'";
} else {
	$tahun = $_GET['tahun'];
	$bulan = $_GET['bulan'];
	$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, timediff(j.waktu_selesai,j.waktu_mulai) as total_waktu FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.tanggal_jurnal)='$tahun' AND month(j.tanggal_jurnal)='$bulan'";
    $LJStotalwaktu = "SELECT sec_to_time(sum(time_to_sec(timediff(j.waktu_selesai,j.waktu_mulai)))) as total_waktu FROM jurnal as j WHERE j.nip = '$nip' AND year(j.tanggal_jurnal)='$tahun' AND month(j.tanggal_jurnal)='$bulan'";
}
$result = mysqli_query($db, $LJSsql);
$result2 = mysqli_query($db, $LJStotalwaktu);

echo "<table border='1' class='tabelLJ' cellpadding='20'>
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
</tr>";

if(mysqli_num_rows($result) > 0){
    $data2 = mysqli_fetch_row($result2);
    echo "<input type=hidden id='LJStotalwaktu' value='$data2[0]' />";
    while($data = mysqli_fetch_row($result))
    {   
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center style='padding: 10px; max-width: 410px;'>$data[7]</td>";
        echo "<td align=center>$data[6]</td>";
        echo "<td align=center style='width:130px;'>$data[9]</td>";
        echo "<td align=center>$data[1]</td>";
        echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>$data[2]</td>";
        echo "<td align=center style='width: 140px; font-size: 0.9em;'>$data[3]</td>";
        echo "<td align=center style='width: 140px; font-size: 0.9em;'>$data[4]</td>";
        echo "<td align=center style='width: 120px; font-size: 0.9em;'>$data[5]</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td align=center colspan='9'>Tidak ada data</td>";
    echo "</tr>";
    echo "</table>";
}
?>
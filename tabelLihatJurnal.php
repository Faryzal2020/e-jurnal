<?php
include("config.php");

$nip = $_GET['nip'];
$LJsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip'";
$result = mysqli_query($db, $LJsql);

echo "<table border='1' class='tabelLJ' cellpadding='20'>
<tr>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>ID Jurnal</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Nama Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Kategori</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Volume</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Output</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Mulai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Selesai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Tanggal Input Jurnal</b></th>
</tr>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center style='padding: 10px; max-width: 410px;'>$data[7]</td>";
    echo "<td align=center>$data[6]</td>";
    echo "<td align=center style='width:130px;'>$data[9]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>$data[2]</td>";
    echo "<td align=center style='width: 140px;'>$data[3]</td>";
    echo "<td align=center style='width: 140px;'>$data[4]</td>";
    echo "<td align=center>$data[5]</td>";
    echo "</tr>";
}
echo "</table>";
?>
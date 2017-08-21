<?php
include("config.php");
session_start();
$staff_tanggal = $_GET['staff_tanggal_tanggal'];
                                                
$xeSQL = "SELECT  jurnal.id_jurnal, jurnal.volume, jurnal.jenis_output, jurnal.waktu_mulai, jurnal.waktu_selesai, jurnal.tanggal_jurnal, jurnal.jenis_aktivitas, aktivitas.nama_aktivitas, aktivitas.id_kategori, kategori.nama_kategori,aktivitas.durasi,jurnal.keterangan FROM jurnal,aktivitas,user,kategori WHERE jurnal.id_aktivitas=aktivitas.id_aktivitas AND aktivitas.id_kategori=kategori.id_kategori AND jurnal.nip=user.nip AND jurnal.Tanggal_Jurnal = '$staff_tanggal' AND jurnal.nip = '".$_SESSION['nip']."'";
$detail = mysqli_query($db, $xeSQL);

echo "<table border='1' class='staff_tabledata' cellpadding='50' width= '100%'>
<tr>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>ID Jurnal</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Nama Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Kategori</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Efektif</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Volume</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Output</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Mulai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Selesai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Lama Kerja</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Tanggal Input Jurnal</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Keterangan</b></th>
</tr>";

while($data = mysqli_fetch_row($detail))
{   
    
    $to_time = strtotime($data[4]);
    $from_time = strtotime($data[3]);
    $durasi_pekerjaan = round(abs($to_time - $from_time) / 60);
    
    
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center style='padding: 10px; max-width: 410px;'>$data[7]</td>";
    echo "<td align=center>$data[6]</td>";
    echo "<td align=center style='width:130px;'>$data[9]</td>";
    echo "<td align=center style='width:130px;'>$data[10] Menit</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>$data[2]</td>";
    echo "<td align=center style='width: 140px;'>$data[3]</td>";
    echo "<td align=center style='width: 140px;'>$data[4]</td>";
    echo "<td align=center style='width: 140px;'>$durasi_pekerjaan Menit</td>";
    echo "<td align=center>$data[5]</td>";
    echo "<td align=center style='width: 140px;'>$data[11]</td>";
    
    echo "</tr>";
}
echo "</table>";
?>
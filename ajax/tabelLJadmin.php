<?php
include("../config.php");

$nip = $_GET['nip'];
$tipeFilter = $_GET['tipeFilter'];
$LJSsql = "";
if( $tipeFilter == 'Harian'){
	$tahun = $_GET['tahun'];
	$bulan = $_GET['bulan'];
    $hari = $_GET['hari'];
	$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_kirim, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan, j.status_jurnal, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND year(j.waktu_selesai)='$tahun' AND month(j.waktu_selesai)='$bulan' AND day(j.waktu_selesai)='$hari' AND j.status_jurnal = 'kirim'";
} else {
    $awal = $_GET['awal'];
    $minggu = $_GET['minggu'];
    $LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_kirim, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan, j.status_jurnal, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND j.waktu_selesai > '$awal' AND j.waktu_selesai < '$akhir' AND j.status_jurnal = 'kirim'";
}
$result = mysqli_query($db, $LJSsql);

echo "<table border='1' class='tabelLJ' id='tabelLJajaxADM' cellpadding='20'>";

if(mysqli_num_rows($result) > 0){
    echo "<caption class='btn-toolbar'>
    <button id='csvBtnADM' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to CSV</button>
    <button id='xlsBtnADM' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to XLS</button>
    <button id='pdfBtnADM' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to PDF</button>
    </caption>";
    echo "
    <tr>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>ID Jurnal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Nama Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Jenis Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Kategori</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Standar Lama Pengerjaan</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Volume</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Jenis Output</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Tanggal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Waktu Mulai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Waktu Selesai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em; width:120px'><b>Tanggal Input</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em; width:120px'><b>Keterangan</b></th>
    </tr>";
    echo "<input type=hidden id='$nip' value='' />";
    while($data = mysqli_fetch_row($result))
    {   
        $tanggal1 = date_create($data[3]);
        $tanggal2 = date_create($data[4]);
        $jamMulai = date_format($tanggal1, 'H:i');
        $jamSelesai = date_format($tanggal2, 'H:i');
        $tglJurnal = date_format($tanggal2, 'd-m-Y');

        date("d-m-Y",strtotime($data[5]));
        echo "<tr>";
        echo "<td align=center>$data[0]</td>";
        echo "<td align=center style='padding: 10px; max-width: 410px; font-size: 0.8em;'>$data[7]</td>";
        echo "<td align=center style='font-size: 0.8em;'>$data[6]</td>";
        echo "<td align=center style='width:130px; font-size: 0.8em;'>$data[9]</td>";
        echo "<td align=center style='width:130px; font-size: 0.8em;'>$data[12] Menit</td>";
        echo "<td align=center style='font-size: 0.8em;'>$data[1]</td>";
        echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px; font-size: 0.8em;'>$data[2]</td>";
        echo "<td align=center style='width: 180px; font-size: 0.8em;'>$tglJurnal</td>";
        echo "<td align=center style='width: 120px; font-size: 0.8em;'>$jamMulai</td>";
        echo "<td align=center style='width: 120px; font-size: 0.8em;'>$jamSelesai</td>";
        echo "<td align=center style='width: 180px; font-size: 0.8em;'>$data[5]</td>";
        echo "<td align=center style='width: 18%; font-size: 0.8em;'>$data[10]</td>";
        echo "</tr>";
    }
} else {
    echo "
    <tr>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>ID Jurnal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Nama Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Jenis Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Kategori</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Standar Lama Pengerjaan</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Volume</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Jenis Output</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Tanggal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Waktu Mulai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em;'><b>Waktu Selesai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em; width:120px'><b>Tanggal Input</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em; width:120px'><b>Keterangan</b></th>
    </tr>";
    echo "<tr>";
    echo "<td align=center colspan='12'>Tidak ada data</td>";
    echo "</tr>";
}
echo "</table>";
?>
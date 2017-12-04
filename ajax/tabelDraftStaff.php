<?php
include("../config.php");

function days_in_month($month, $year){
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31); 
} 

$nip = $_GET['nip'];
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$LJSsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_simpan, j.jenis_aktivitas, a.nama_aktivitas, a.id_kategori, k.nama_kategori, j.keterangan , j.id_aktivitas, a.durasi, j.validasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas LEFT JOIN kategori as k ON k.id_kategori = a.id_kategori WHERE j.nip = '$nip' AND j.status_jurnal = 'draft' AND month(j.waktu_mulai) = '$bulan' AND year(j.waktu_mulai) = '$tahun' ORDER BY date(waktu_mulai) ASC";
$result = mysqli_query($db, $LJSsql);
echo "<table border='1' class='tabelDJ' id='tabelDJajax' cellpadding='20' style='font-size: 75%; margin: auto;'>";
echo "
    <tr>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Tgl</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Mulai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Selesai</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Realisasi</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>ID Jurnal</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Nama Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Kategori</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Aktivitas</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Standar Waktu Pengerjaan</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Volume</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Output</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Keterangan</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Validasi</b></th>
    <th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px; font-size:0.8em; width:60px'><b>Edit / Delete</b></th>
    <th align='center' style='display: none;'></th>
    </tr>";

if(mysqli_num_rows($result) > 0){
    $maxCount = days_in_month($bulan, $tahun);
    $counter = 1;
    $jurnalExists = 0;
    while($data = mysqli_fetch_array($result))
    {
        $tgl = date('j', strtotime($data[3]));
        //
        
        while($counter <= $maxCount){
            if($counter == $tgl ){
                    //  echo $tgl;
                $jurnalExists = 1;
                break;
                
            } else {
                if($jurnalExists == 1){
                    $jurnalExists = 0;
                } else {
                    echo "<tr class='DJSnoJurnal'>
                    <td style='height:45px;'>$counter</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td align=center>Tidak ada Jurnal</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                    <a class=\"inputDJBtn\" onclick=\"bukaEIJ2('$counter')\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-edit\" title=\"Edit jurnal\"></span></a>
                    <a class=\"deleteDJBtn disabled\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-trash\" title=\"Hapus jurnal\"></span></a></td>
                    </tr>";
                    $jurnalExists = 0;
                }
            }
            $counter++;
        }
        if($jurnalExists == 0){
            break;
        }
        $idJurnal = $data[0];
        $idAct = $data[11];
        $durasi = $data[12];
        $kategori = $data[9];
        $actType = $data[6];
        echo "<tr>";
        echo "<td align=center>";
        echo $counter;
        echo "</td>";
        if ($kategori == "izin harian"){
            $pecah_jam_tanggal_selesai=explode(" ",$data[4]); 
            $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
            $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
            $pisah_tanggal_selesai = explode("-",$pecah_tanggal_selesai);
            $tahun_selesai = $pisah_tanggal_selesai[0];
            $bulan_selesai = $pisah_tanggal_selesai[1];
            $hari_selesai = $pisah_tanggal_selesai[2];
            switch ($bulan_selesai) {
                case "1":
                    $namabulan_selesai= "Januari";
                    break;
                case "2":
                    $namabulan_selesai= "Februari";
                    break;
                case "3":
                    $namabulan_selesai= "Maret";
                    break;
                case "4":
                    $namabulan_selesai= "April";
                    break;
                case "5":
                    $namabulan_selesai= "Mei";
                    break;
                case "6":
                    $namabulan_selesai= "Juni";
                    break;
                case "7":
                    $namabulan_selesai= "Juli";
                    break;
                case "8":
                    $namabulan_selesai= "Agustus";
                    break;
                case "9":
                    $namabulan_selesai= "September";
                    break;
                case "10":
                    $namabulan_selesai= "Oktober";
                    break;
                case "11":
                    $namabulan_selesai= "November";
                    break;
                case "12":
                    $namabulan_selesai= "Desember";
                    break;
                default:
                    break;    
            }
            $waktuselesai=$hari_selesai." ".$namabulan_selesai." ".$tahun_selesai;
            
            $pecah_jam_tanggal_mulai=explode(" ",$data[3]); 
            $pecah_tanggal_mulai = $pecah_jam_tanggal_mulai[0];
            $pecah_jam_mulai = $pecah_jam_tanggal_mulai[1];
            $pisah_tanggal_mulai = explode("-",$pecah_tanggal_mulai);
            $tahun_mulai = $pisah_tanggal_mulai[0];
            $bulan_mulai = $pisah_tanggal_mulai[1];
            $hari_mulai = $pisah_tanggal_mulai[2];
            switch ($bulan_mulai) {
                case "1":
                    $namabulan_mulai= "Januari";
                    break;
                case "2":
                    $namabulan_mulai= "Februari";
                    break;
                case "3":
                    $namabulan_mulai= "Maret";
                    break;
                case "4":
                    $namabulan_mulai= "April";
                    break;
                case "5":
                    $namabulan_mulai= "Mei";
                    break;
                case "6":
                    $namabulan_mulai= "Juni";
                    break;
                case "7":
                    $namabulan_mulai= "Juli";
                    break;
                case "8":
                    $namabulan_mulai= "Agustus";
                    break;
                case "9":
                    $namabulan_mulai= "September";
                    break;
                case "10":
                    $namabulan_mulai= "Oktober";
                    break;
                case "11":
                    $namabulan_mulai= "November";
                    break;
                case "12":
                    $namabulan_mulai= "Desember";
                    break;
                default:
                    break;    
            }
            $waktumulai=$hari_mulai." ".$namabulan_mulai." ".$tahun_mulai;
            $date1 = $data[3];
            $date2 = $data[4];

            $diff = abs(strtotime($date2) - strtotime($date1));

            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
            $lamacuti = $days + 1;
            echo "<td align=center style='min-width: 100px'>$waktumulai</td>";
            echo "<td align=center style='min-width: 100px'>$waktuselesai</td>";
            echo "<td align=center style=''>$lamacuti Hari</td>";
            echo "<td align=center style=''>$idJurnal</td>";
            echo "<td align=center style='min-width: 172px;'>$data[7]</td>";
            echo "<td align=center style=''>$kategori</td>";
            echo "<td align=center style=''>-</td>";
            echo "<td align=center style=''>-</td>";
            echo "<td align=center>-</td>"; 
            echo "<td align=center>-</td>";
            
            
            
        }else{
            
            $dateMulai = $data[3];
            $tanggal_mulai = date("d-m-Y", strtotime($dateMulai));
            $jam_mulai = date("H:i", strtotime($dateMulai));

            $dateSelesai = $data[4];
            $tanggal_selesai = date("d-m-Y", strtotime($dateSelesai));
            $jam_selesai = date("H:i", strtotime($dateSelesai));

            echo "<td align=center style=''>$jam_mulai</td>";
            echo "<td align=center style=''>$jam_selesai</td>";
            
            $to_time = strtotime($dateSelesai);
            $from_time = strtotime($dateMulai);
            $total_durasi = $to_time - $from_time;
            if( (int)date("w", strtotime($dateMulai)) == 5 ){ // IF HARI JUMAT
                if( $from_time < strtotime($tanggal_mulai . " 11:30:00") && $to_time > strtotime($tanggal_mulai . " 13:00:00") ){
                    $durasiKerja = $total_durasi - (strtotime("13:00:00") - strtotime("11:30:00"));
                } else {
                    $durasiKerja = $total_durasi;
                }
            } else {
                if( $from_time < strtotime($tanggal_mulai . " 12:00:00") && $to_time > strtotime($tanggal_mulai . " 13:00:00") ){
                    $durasiKerja = $total_durasi - (strtotime("13:00:00") - strtotime("12:00:00"));
                } else {
                    $durasiKerja = $total_durasi;
                }
            }
            $durasiKerjaMenit = $durasiKerja / 60;
            echo "<td align=center style=''>$durasiKerjaMenit Menit</td>";
            echo "<td align=center style=''>$idJurnal</td>";
            echo "<td align=center style='min-width: 172px;'>$data[7]</td>";
            echo "<td align=center style=''>$kategori</td>";
            echo "<td align=center style=''>$actType</td>";
            echo "<td align=center style=''>$durasi Menit</td>";
            echo "<td align=center>$data[1]</td>";
            echo "<td align=center style=''>$data[2]</td>";
        }
        $tglMulai = date("Y-m-d", strtotime($data[3]));
        $tglSelesai = date("Y-m-d", strtotime($data[4]));
        echo "<td align=center style='display: none;'>$tglMulai</td>";
        echo "<td align=center style='display: none;'>$tglSelesai</td>";
        echo "<td align=center style='min-width: 150px; max-width: 230px; word-wrap: break-word;'>$data[10]</td>";
        if($data[13] == '1'){
            echo "<td class='validasiOK'><span>OK</span></td>";
        } else {
            echo "<td class='validasiNO'><span>NO</span><button onclick=\"bukaModalValidasi('lihat','$data[13]')\">Lihat Pesan</button></td>";
        }
        echo "<td align=center style=\"\">
                <a class=\"editDJBtn\" onclick=\"editDJ($idJurnal,$idAct,$durasi)\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-edit\" title=\"Edit jurnal\"></span></a>
                <a class=\"deleteDJBtn\" onclick=\"deleteDJ($idJurnal)\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-trash\" title=\"Hapus jurnal\"></span></a>
            </td>";
        
    }
    $counter++;
    while($counter <= $maxCount){
        echo "<tr class='DJSnoJurnal'>
                    <td style='height:45px;'>$counter</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td align=center>Tidak ada Jurnal</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                    <a class=\"inputDJBtn\" onclick=\"bukaEIJ2('$counter')\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-edit\" title=\"Edit jurnal\"></span></a>
                    <a class=\"deleteDJBtn disabled\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-trash\" title=\"Hapus jurnal\"></span></a></td>
                    </tr>";
        $counter++;
    }
} else {
    $maxCount = date('t');
    $counter = 1;
    while($counter <= $maxCount){
        echo "<tr class='DJSnoJurnal'>
                <td style='height:45px;'>$counter</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td align=center>Tidak ada Jurnal</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>
                <a class=\"inputDJBtn\" onclick=\"bukaEIJ2('$counter')\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-edit\" title=\"Edit jurnal\"></span></a>
                <a class=\"deleteDJBtn disabled\" style=\"display: inline; font-size: 1.5em;\">
                    <span class=\"glyphicon glyphicon-trash\" title=\"Hapus jurnal\"></span></a></td>
                </tr>";
        $counter++;
    }
}
echo "</table>";
?>
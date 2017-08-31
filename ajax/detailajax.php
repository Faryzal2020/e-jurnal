<?php
include("../config.php");

$nip_beda = $_GET['nip_nip'];
$tanggal_beda = $_GET['tanggal_tanggal'];
                                                
$deSQL = "SELECT  jurnal.id_jurnal, jurnal.volume, jurnal.jenis_output, jurnal.waktu_mulai, jurnal.waktu_selesai, jurnal.tanggal_simpan, jurnal.jenis_aktivitas, aktivitas.nama_aktivitas, aktivitas.id_kategori, kategori.nama_kategori,aktivitas.durasi,jurnal.keterangan,jurnal.tanggal_kirim FROM jurnal,aktivitas,user,kategori WHERE jurnal.id_aktivitas=aktivitas.id_aktivitas AND aktivitas.id_kategori=kategori.id_kategori AND jurnal.nip=user.nip AND jurnal.tanggal_simpan = '$tanggal_beda' AND jurnal.nip = '$nip_beda'";
$detail = mysqli_query($db, $deSQL);

echo "<table border='1' class='tabledata' cellpadding='50' width= '100%'>
<tr>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>ID Jurnal</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Nama Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Kategori</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Standar Waktu Pekerjaan</b></th>
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
    
    
   
    echo "<tr>";
    echo "<td align=center style='width:4%;'>$data[0]</td>";
    echo "<td align=center style='padding: 10px; max-width: 410px; width: 25%;'>$data[7]</td>";
    echo "<td align=center style='width:130px;'>$data[9]</td>";
    if ($data[4] == "kehadiran"){
        
        echo "<td align=center  style='width:7.6%%;'>-</td>";
        echo "<td align=center style='width:7.6%%;'>-</td>";
        echo "<td align=center>-</td>";
        echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>-</td>";
        
        $pecah_jam_tanggal_selesai=explode(" ",$data['3']); 
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
        $waktuselesai=$hari_selesai."-".$bulan_selesai."-".$tahun_selesai;
        
        $pecah_jam_tanggal_mulai=explode(" ",$data['4']); 
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
        $waktumulai=$hari_mulai."-".$bulan_mulai."-".$tahun_mulai;
        echo "<td align=center style='min-width: 100px;'>$waktumulai</td>";
        echo "<td align=center style='min-width: 100px;'>$waktuselesai</td>";
        echo "<td align=center style='width: 7.6%'>-</td>";
        
    }else{
        
        echo "<td align=center  style='width:7.6%%;'>$data[6]</td>";
        echo "<td align=center style='width:7.6%%;'>$data[10] Menit</td>";
        echo "<td align=center>$data[1]</td>";
        echo "<td align=center style='width: 140px; padding-top: 5px; padding-bottom: 5px;'>$data[2]</td>";
        $pecah_jam_tanggal=explode(" ",$data[3]); 
        $pecah_tanggal = $pecah_jam_tanggal[0];
        $pecah_jam_mulai = $pecah_jam_tanggal[1];

        $pecah_jam_tanggal_selesai=explode(" ",$data[4]); 
        $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
        $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];

        echo "<td align=center style='min-width: 100px;'>$pecah_jam_mulai</td>";
        echo "<td align=center style='min-width: 100px;'>$pecah_jam_selesai</td>";
        
        $to_time = strtotime($data[4]);
        $from_time = strtotime($data[3]);
        $durasi_pekerjaan = round(abs($to_time - $from_time) / 60);
        echo "<td align=center style='width: 7.6%'>$durasi_pekerjaan Menit</td>";
    }
    $pisah_tanggal_jurnal = explode("-",$data[5]);
    $tahun_jurnal = $pisah_tanggal_jurnal[0];
    $bulan_jurnal = $pisah_tanggal_jurnal[1];
    $hari_jurnal = $pisah_tanggal_jurnal[2];
    switch ($bulan_jurnal) {
        case "1":
            $namabulan_jurnal= "Januari";
            break;
        case "2":
            $namabulan_jurnal= "Februari";
            break;
        case "3":
            $namabulan_jurnal= "Maret";
            break;
        case "4":
            $namabulan_jurnal= "April";
            break;
        case "5":
            $namabulan_jurnal= "Mei";
            break;
        case "6":
            $namabulan_jurnal= "Juni";
            break;
        case "7":
            $namabulan_jurnal= "Juli";
            break;
        case "8":
            $namabulan_jurnal= "Agustus";
            break;
        case "9":
            $namabulan_jurnal= "September";
            break;
        case "10":
            $namabulan_jurnal= "Oktober";
            break;
        case "11":
            $namabulan_jurnal= "November";
            break;
        case "12":
            $namabulan_jurnal= "Desember";
            break;
        default:
            break;    
    }
    $tanggal_jurnal =$hari_jurnal."-".$namabulan_jurnal."-".$tahun_jurnal;
    echo "<td align=center  style='width:10%;'>$tanggal_jurnal</td>";
    
    echo "<td align=center style='width: 15%; min-width: 150px;'>$data[11]</td>";
    echo "</tr>";
}
echo "</table>";
?>
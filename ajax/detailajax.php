<?php
include("../config.php");
session_start();

$nip = $_SESSION['nip'];
$nip_beda = $_GET['nip_nip'];
$tanggal_beda = $_GET['tanggal_tanggal'];
                                                
$deSQL = "SELECT  jurnal.id_jurnal, jurnal.volume, jurnal.jenis_output, jurnal.waktu_mulai, jurnal.waktu_selesai, jurnal.tanggal_simpan, jurnal.jenis_aktivitas, aktivitas.nama_aktivitas, aktivitas.id_kategori, kategori.nama_kategori,aktivitas.durasi,jurnal.keterangan,jurnal.tanggal_kirim,  jurnal.status_jurnal,user.nama_pegawai, jurnal.rating FROM jurnal,aktivitas,user,kategori WHERE jurnal.id_aktivitas=aktivitas.id_aktivitas AND aktivitas.id_kategori=kategori.id_kategori AND jurnal.nip=user.nip AND date(waktu_selesai) >= '$tanggal_beda' AND date(waktu_mulai) <= '$tanggal_beda' AND jurnal.nip = '$nip_beda'  ORDER BY date(waktu_mulai) DESC ";

$sql2 = "SELECT bawahan.nip FROM user as bawahan, user as atasan, jabatan as jabA, jabatan as jabB WHERE bawahan.id_jabatan = jabB.id_jabatan AND atasan.id_jabatan = jabA.id_jabatan AND jabB.atasan = jabA.id_jabatan AND atasan.nip = '$nip'";

$detail = mysqli_query($db, $deSQL);
$cekBawahan = mysqli_query($db, $sql2);


echo "<table border='1' class='tabledata' id='tabledata' cellpadding='50' width='100%' style='font-size:75%;'>
<caption class='btn-toolbar'>
    <button id='csvBtn_admin' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to CSV</button>
    <button id='xlsBtn_admin' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to XLS</button>
    <button id='pdfBtn_admin' class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save'/> Export to PDF</button>
</caption>

<tr>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>ID Jurnal</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Nama Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Kategori</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Aktivitas</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Standar Waktu Pengerjaan</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Volume</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Jenis Output</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Mulai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Waktu Selesai</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Realisasi</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Tanggal Kegiatan</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Status</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Keterangan</b></th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'><b>Rating</b></th>
</tr>";
$totalDurasiTabel = 0;
while($data = mysqli_fetch_row($detail))
{   
    
    echo "<tr>";
    echo "<td align=center style=''>$data[0]</td>";
    echo "<td align=center style='min-width: 250px'>$data[7]</td>";
    echo "<td align=center style=''>$data[9]</td>";
    if ($data[9] == "izin harian"){
        
        echo "<td align=center style=''>-</td>";
        echo "<td align=center style=''>-</td>";
        echo "<td align=center>-</td>";
        echo "<td align=center style=''>-</td>";
        
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
        echo "<td align=center style=''>$waktumulai</td>";
        echo "<td align=center style=''>$waktuselesai</td>";
        echo "<td align=center style=''>$lamacuti Hari</td>";
        echo "<td align=center  style=''>-</td>";
    
    }else{
        
        echo "<td align=center style=''>$data[6]</td>";
        echo "<td align=center style=''>$data[10] Menit</td>";
        echo "<td align=center>$data[1]</td>";
        echo "<td align=center style=''>$data[2]</td>";
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
        $totalDurasiTabel += $durasiKerjaMenit;
        echo "<td align=center style=''>$durasiKerjaMenit Menit</td>";
    
    $pecah_jam_tanggal_selesai=explode(" ",$data[4]); 
    $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
    $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
    $pisah_tanggal_jurnal = explode("-",$pecah_tanggal_selesai);
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
    $tanggal_jurnal =$hari_jurnal." ".$namabulan_jurnal." ".$tahun_jurnal;
    echo "<td align=center  style=''>$tanggal_jurnal</td>";
    }
    echo "<td align=center style=''>$data[13]</td>";
    echo "<td align=center style='min-width: 150px'>$data[11]</td>";
    if($data[15] == 0){
        if(mysqli_num_rows($cekBawahan) > 0){
            $ratingid = "rating-" . $data[0];
            echo "<td align=center style='min-width: 150px'>
                <div class='ratingDiv' id='$ratingid' style='display: none; font-size:200%'>
                <span onclick=\"giveRating('$data[0]','5','$tanggal_beda','$nip_beda','$data[14]')\">☆</span>
                <span onclick=\"giveRating('$data[0]','4','$tanggal_beda','$nip_beda','$data[14]')\">☆</span>
                <span onclick=\"giveRating('$data[0]','3','$tanggal_beda','$nip_beda','$data[14]')\">☆</span>
                <span onclick=\"giveRating('$data[0]','2','$tanggal_beda','$nip_beda','$data[14]')\">☆</span>
                <span onclick=\"giveRating('$data[0]','1','$tanggal_beda','$nip_beda','$data[14]')\">☆</span>
                </div><button class='ratingBtn' onclick=\"selectRating('$data[0]',this)\">Beri Rating</button></td>";
        } else {
            echo "<td align=center style='min-width: 150px'>Belum Diberikan Rating </td>";
        }
    } else {
        echo "<td align=center style='min-width: 150px'><div style='font-size:180%'>";
        for($i=1;$i<=5;$i++){
            if($i <= $data[15]){
                echo "<span>★</span>";
            } else {
                echo "<span>☆</span>";
            }
        }
        echo "</div></td>";
    }
    echo "<td align=center></td>";
    echo "</tr>";
}

echo "<tr><td colspan='14' style='text-align: end; padding: 10px 56px;'>Total waktu kerja Per-Hari: $totalDurasiTabel Menit</td></tr>";
echo "</table>";
?>

    
    <div class="content_detail">
					<div class="detail_select" id="detail_select">
                        <div class="detail_select-content">
                            <span class="tutup_detail">&times;</span>
                            <div id="detail_label">Detail</div>
							<div class="detail_jurnal">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" width=50% cellpadding=0 cellspacing=0 border=0 valign=top>

<?php
	include_once "object.php";
    include_once "config.php";
    
    
?>

                                    <tr>
                                        <td>ID Jurnal</td>
                                        <td>:</td>      
                                        <td><span id="labelID"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Aktivitas</td>
                                        <td>:</td>      
                                        <td><?php    echo $d['nama_aktivitas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat Oleh</td>
                                        <td>:</td>      
                                        <td><?php    echo $d['nama_pegawai']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Volume dan Satuan Output</td>
                                        <td>:</td>      
                                        <td><?php    echo $d['volume']; ?>  <?php echo $d['jenis_output']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Efektif</td>
                                        <td>:</td>      
                                        <td><?php    echo $d['durasi']; ?> menit</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Mulai</td>
                                        <td>:</td>      
                                        <td>
                                            <?php    
                                                $pecah_jam_tanggal=explode(" ",$d['waktu_mulai']);
                                                echo pecahTanggal($pecah_jam_tanggal);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Mulai</td>
                                        <td>:</td>      
                                        <td>
                                            <?php    
                                                $pecah_jam_tanggal=explode(" ",$d['waktu_mulai']); 
                                                $pecah_tanggal = $pecah_jam_tanggal[0];
                                                $pecah_jam = $pecah_jam_tanggal[1];
                                                echo $pecah_jam;
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Selesai</td>
                                        <td>:</td>      
                                        <td>
                                            <?php    
                                                $pecah_jam_tanggal_selesai=explode(" ",$d['waktu_selesai']); 
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
                                                echo $hari_selesai.' - '.$namabulan_selesai.' - '.$tahun_selesai;
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Selesai</td>
                                        <td>:</td>      
                                        <td>
                                            <?php    
                                                $pecah_jam_tanggal_selesai=explode(" ",$d['waktu_selesai']); 
                                                $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
                                                $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
                                                echo $pecah_jam_selesai;
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>Durasi Pekerjaan Selesai</td>
                                        <td>:</td>      
                                        <td>    <?php 
                                            $to_time = strtotime($d['waktu_selesai']);
                                            $from_time = strtotime($d['waktu_mulai']);
                                            $durasi_pekerjaan = round(abs($to_time - $from_time) / 60). " menit";
                                            echo $durasi_pekerjaan;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pembuatan jurnal</td>
                                        <td>:</td>      
                                        <td>
                                            <?php  
                                                $pisah_tanggal_jurnal = explode("-",$d['Tanggal_Jurnal']);
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
                                                echo $hari_jurnal.' - '.$namabulan_jurnal.' - '.$tahun_jurnal;
                                            ?></td>
                                    </tr>


                                        <a href="index.php"><span><---- Kembali Ke Kalender</span></a>
<?php


?>
                                            </table>
</html>
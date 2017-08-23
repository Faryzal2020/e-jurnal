<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
			getCalender($_POST['year'],$_POST['month']);
			break;
		case 'getEvents':
			getEvents($_POST['date']);
			break;
		default:
			break;
	}
}

/*
 * Get calendar full HTML
 */
function getCalender($year = '',$month = '')
{
	$dateYear = ($year != '')?$year:date("Y");
	$dateMonth = ($month != '')?$month:date("m");
	$date = $dateYear.'-'.$dateMonth.'-01';
	$currentMonthFirstDay = date("N",strtotime($date));
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
?>
	<div id="calender_section">
		<h2>
        	<a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');"><span class="glyphicon glyphicon-backward" style="pointer-events: none;"></a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');"><span class="glyphicon glyphicon-forward" style="pointer-events: none;"></a>
        </h2>
		<div id="event_list" class="none"></div>
		<div id="calender_section_top">
			<ul>
				<li>Minggu</li>
				<li>Senin</li>
				<li>Selasa</li>
				<li>Rabu</li>
				<li>Kamis</li>
				<li>Jumat</li>
				<li>Sabtu</li>
			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
			<?php 
				$dayCount = 1;
				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
						//Current date
						include("config.php");
                        if(!isset($_SESSION['nip'])){
                            session_start();
                        }
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						$kalendersql = "SELECT id_jurnal FROM jurnal WHERE tanggal_simpan = '".$currentDate."' AND nip='".$_SESSION['nip']."'";
						$result = mysqli_query($db, $kalendersql);
						$eventNum = $result->num_rows;
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						
						//Hover event popup
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
						echo '<div class="date_window">';
						echo '<div class="popup_event">Jurnal ('.$eventNum.')</div>';
                        echo ($eventNum > 0)?'<a href="javascript:;" onclick="staff_detail_selectActivity(\''.$currentDate.'\');">Lihat</a>':'';
                        echo '</div></div>';
						
						echo '</li>';
						$dayCount++;
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">
		function getCalendar(target_div,year,month){
			$.ajax({
				type:'POST',
				url:'functions_staff.php',
				data:'func=getCalender&year='+year+'&month='+month,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		/*function getEvents(date){
			$.ajax({
				type:'POST',
				url:'functions_staff.php',
				data:'func=getEvents&date='+date,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}*/
		
		
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$(document).click(function(){
				$('#event_list').slideUp('slow');
			});
		});
	</script>
<?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
	$options = '';
	for($i=2010;$i<=2030;$i++)
	{
		$selectedOpt = ($i == $selected)?'selected':'';
		$options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
	}
	return $options;
}

/*
 * Get events by date
 */
/*function getEvents($date = ''){
	//Include db configuration file
    session_start();
	include 'config.php';
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	$GEsql = "SELECT * FROM jurnal,aktivitas,user WHERE jurnal.id_aktivitas=aktivitas.id_aktivitas AND jurnal.nip=user.nip AND jurnal.Tanggal_Jurnal = '".$date."' AND user.nip='".$_SESSION['nip']."' AND nama_pegawai='".$_SESSION['nama']."'";
	$result = mysqli_query($db, $GEsql);
	if($result->num_rows > 0){?>
		<h2>Jurnal pada tanggal <?php echo date("l, d M Y",strtotime($date)) ?></h2>
		<ul>
        <?php
		while($row = mysqli_fetch_array($result)){
            $nomorIP = $row['nip'];
            if ($nomorIP == $_SESSION['nip']){
            ?>
            
            <li> Jurnal : <?php echo $row['nama_aktivitas'];?> 
                dibuat oleh <?php echo $row['nama_pegawai']; ?>
            <button class="tombol_detail" 
                    onclick="staff_detail_selectActivity('<?php echo $row['id_jurnal']; ?>',
                                                    '<?php echo $row['nama_aktivitas']; ?>',
                                                    '<?php echo $row['nama_pegawai']; ?>',
                                                    '<?php echo $row['volume']; ?>',
                                                    '<?php echo $row['jenis_output']; ?>',
                                                    '<?php echo $row['durasi']; ?>',
                                                    '<?php  
                                                            $pecah_jam_tanggal_mulai=explode(" ",$row['waktu_mulai']); 
                                                            $pecah_tanggal_mulai = $pecah_jam_tanggal_mulai[0];
                                                            $pecah_jam_mulai = $pecah_jam_tanggal_mulai[1];
                                                            $pisah_tanggal_mulai = explode("-",$pecah_tanggal_mulai);
                                                            $tahun_mulai = $pisah_tanggal_mulai[0];
                                                            $bulan_mulai = $pisah_tanggal_mulai[1];
                                                            $hari_mulai = $pisah_tanggal_mulai[2];
                                                            echo $hari_mulai; 
                                                ?>',
                                                    '<?php  
                                                            $pecah_jam_tanggal_mulai=explode(" ",$row['waktu_mulai']); 
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
                                                            echo $namabulan_mulai;
                                            ?>',
                                                '<?php  
                                                            $pecah_jam_tanggal_mulai=explode(" ",$row['waktu_mulai']); 
                                                            $pecah_tanggal_mulai = $pecah_jam_tanggal_mulai[0];
                                                            $pecah_jam_mulai = $pecah_jam_tanggal_mulai[1];
                                                            $pisah_tanggal_mulai = explode("-",$pecah_tanggal_mulai);
                                                            $tahun_mulai = $pisah_tanggal_mulai[0];
                                                            $bulan_mulai = $pisah_tanggal_mulai[1];
                                                            $hari_mulai = $pisah_tanggal_mulai[2];
                                                            echo $tahun_mulai;
                                            ?>',
                                                '<?php  
                                                            $pecah_jam_tanggal_selesai=explode(" ",$row['waktu_selesai']); 
                                                            $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
                                                            $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
                                                            $pisah_tanggal_selesai = explode("-",$pecah_tanggal_selesai);
                                                            $tahun_selesai = $pisah_tanggal_selesai[0];
                                                            $bulan_selesai = $pisah_tanggal_selesai[1];
                                                            $hari_selesai = $pisah_tanggal_selesai[2];
                                                            echo $hari_selesai; 
                                            ?>',
                                                    '<?php  
                                                            $pecah_jam_tanggal_selesai=explode(" ",$row['waktu_selesai']); 
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
                                                            echo $namabulan_selesai;
                                            ?>',
                                                '<?php  
                                                            $pecah_jam_tanggal_selesai=explode(" ",$row['waktu_selesai']); 
                                                            $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
                                                            $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
                                                            $pisah_tanggal_selesai = explode("-",$pecah_tanggal_selesai);
                                                            $tahun_selesai = $pisah_tanggal_selesai[0];
                                                            $bulan_selesai = $pisah_tanggal_selesai[1];
                                                            $hari_selesai = $pisah_tanggal_selesai[2];
                                                            echo $tahun_selesai;
                                            ?>',
                                                    '<?php    
                                                            $pecah_jam_tanggal=explode(" ",$row['waktu_mulai']); 
                                                            $pecah_tanggal = $pecah_jam_tanggal[0];
                                                            $pecah_jam = $pecah_jam_tanggal[1];
                                                            echo $pecah_jam;
                                            ?>',
                                                    '<?php    
                                                            $pecah_jam_tanggal_selesai=explode(" ",$row['waktu_selesai']); 
                                                            $pecah_tanggal_selesai = $pecah_jam_tanggal_selesai[0];
                                                            $pecah_jam_selesai = $pecah_jam_tanggal_selesai[1];
                                                            echo $pecah_jam_selesai;
                                            ?>',                                                    
                                                    '<?php 
                                                            $to_time = strtotime($row['waktu_selesai']);
                                                            $from_time = strtotime($row['waktu_mulai']);
                                                            $durasi_pekerjaan = round(abs($to_time - $from_time) / 60);
                                                            echo $durasi_pekerjaan;
                                            ?>',
                                                    '<?php  
                                                            $pisah_tanggal_jurnal = explode("-",$row['tanggal_jurnal']);
                                                            $tahun_jurnal = $pisah_tanggal_jurnal[0];
                                                            $bulan_jurnal = $pisah_tanggal_jurnal[1];
                                                            $hari_jurnal = $pisah_tanggal_jurnal[2];
                                                            echo $hari_jurnal; 
                                                ?>',
                                                    '<?php  
                                                            $pisah_tanggal_jurnal = explode("-",$row['tanggal_jurnal']);
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
                                                            echo $namabulan_jurnal;
                                            ?>',
                                                '<?php  
                                                            $pisah_tanggal_jurnal = explode("-",$row['tanggal_jurnal']);
                                                            $tahun_jurnal = $pisah_tanggal_jurnal[0];
                                                            $bulan_jurnal = $pisah_tanggal_jurnal[1];
                                                            $hari_jurnal = $pisah_tanggal_jurnal[2];
                                                            echo $tahun_jurnal;
                                            ?>'
                                                                           
                             
                             
                             
                             
                             
                             
                             
                             
                             )">
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <a href="#">Detail</a></button>
            <!--<a href="detail.php?menu=lihat&id_jurnal=<?php//echo $row['id_jurnal']?>">Detail</a>-->
            </li>
        <?php 
            }
        }
		?></ul>
<?php
	}
}

?>*/
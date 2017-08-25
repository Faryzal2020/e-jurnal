				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="pilihanJurnal">
				                    <a class="pjBtn" id="pjBtn1" onclick="selectJA('Pribadi')" href="#">Jurnal Saya</a>
				                    <a class="pjBtn" id="pjBtn2" onclick="selectJA('Pegawai')" href="#">Jurnal Pegawai</a>
				                </div>
				                <div class="PJAfilter" id="PJAfilter">
					                <div class="dropdownCat">
					                    <button class="dropbtn" id="filBtn"><span id="PJAbtnLabel" style="pointer-events: none;">Mingguan</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
					                    <div class="dropdownCat-content" id="filContent">
				                        	<a onclick="JAfilter('Harian')" href="#">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
					                        <a onclick="JAfilter('Mingguan')" href="#">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
					                        <a onclick="JAfilter('Bulanan')" href="#">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
					                    </div>
					                </div>
									<div class="LJAfilter" style="display: none">
										<div class="LJApilihHari">
											<input id="LJApilihHari" class="w163 h30" type="date" value="<?php echo date('Y-m-d');?>"/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;"></div>
										</div>
									</div>
					                <div class="LJAfilter">
										<div class="LJApilihMinggu">
											<input type="text" id="LJApilihMinggu" class="w163 h30" value="<?php echo date("Y-W");?>" />
										</div>
									</div>
									<div class="LJAfilter" style="display: none;">
										<div class="LJApilihTahun">
											<select id="LJApilihTahun" class="h30">
												<?php
													$lsjTahunA = date("Y") - 10;
													$lsjTahunB = date("Y");
													for($i=$lsjTahunA; $i < $lsjTahunB; $i++){
												?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php
													}
												?>
												<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
											</select>
										</div>
										<div class="LJApilihBulan">
											<select id="LJApilihBulan" class="h30">
												<?php
													$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
													for($i=1;$i<=12;$i++){
														$x = str_pad($i,2,0, STR_PAD_LEFT);
														if($x == date("m")){
													?>
												<option value="<?php echo $x; ?>" selected><?php echo $m[$i-1]; ?></option>
													<?php
														} else {
													?>
												<option value="<?php echo $x; ?>"><?php echo $m[$i-1]; ?></option>
													<?php
														}
													}
													?>
											</select>
										</div>
									</div>
									<input id="LJAfilterType" type="hidden" value="">
									<a class="LJAbtn" id="LJAbtn" onclick="lihatJurnalAdmin('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok"></span></a>
									<div class="wrapperTotalWaktu">
									Total Jam Produktif: 
									<label id="labelTotalWaktuAdm"></label>
								</div>
								</div>
							</div>
						</div>
						<div class="tCbody2" id="JAtabelA">
						</div>
						<div class="tCbody" id="JAtabelS" style="display:none">
							<table class="actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th style="min-width: 130px">NIP</th>
									<th style="min-width: 320px">Nama Pegawai</th>
									<th style="min-width: 220px">Bagian</th>
									<th style="min-width: 220px">Jabatan</th>
									<th style="min-width: 130px"></th>
								</tr>
								<?php
									if ( $level == 2 ){
										$Admquery = $DPSquery;
									} else {
										$Admquery = $DPquery;
									}
									while($al = mysqli_fetch_array($Admquery)) {
										$JAnip = $al['nip'];
										$JAnama = $al['nama_pegawai'];
										$JAbagian= $al['bagian'];
										$JAjabatan = $al['jabatan'];
								?>
								<tr>
									<td style="text-align: center;"><?php echo $JAnip; ?></td>
									<td><?php echo $JAnama ?></td>
									<td style="text-align: center;"><?php echo $JAbagian ?></td>
									<td><?php echo $JAjabatan ?></td>
									<td style="text-align: center; width: 80px;">
										<a class="selectActbtn" onclick="lihatJurnal(
											'<?php echo $JAnip; ?>',
											'<?php echo $JAnama; ?>'
										)">Lihat Jurnal</a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<div id="modalLJ" class="tCmodal">
			                    <div class="modalLJ-content">
			                        <span class="tutupLJ">&times;</span>
			                        <div id="tCModalLabel">Daftar jurnal milik: <label id="labelPemilikJurnal"></label></div>
			                        <div class="headerLJ">
			                        	<div class="dropdownCat">
						                    <button class="dropbtn" id="repBtn"><span class="glyphicon glyphicon-chevron-down"></span> <span id="repbtnLabel" style="pointer-events: none;">Mingguan</span></button>
						                    <div class="dropdownCat-content" id="repContent">
				                        		<a onclick="selectReport('Harian')" href="#">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
						                        <a onclick="selectReport('Mingguan')" href="#">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
						                        <a onclick="selectReport('Bulanan')" href="#">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
						                    </div>
						                </div>
										<div class="LJSfilter" style="display: none">
											<div class="LJSpilihHari">
												<input id="LJSpilihHari" class="w163 h30" type="date" value="<?php echo date('Y-m-d');?>"/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;"></div>
											</div>
										</div>
										<div class="LJSfilter" style="display: none">
											<div class="LJSpilihMinggu">
												<input id="LJSpilihMinggu" class="w163 h30" type="text" value="<?php echo date("Y-W");?>"/>
											</div>
										</div>
						                <div class="LJSfilter" style="display: none">
											<div class="LJSpilihTahun">
												<select id="LJSpilihTahun" class="h30">
													<?php
														$lsjTahunA = date("Y") - 10;
														$lsjTahunB = date("Y");
														for($i=$lsjTahunA; $i < $lsjTahunB; $i++){
													?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php
														}
													?>
													<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
												</select>
											</div>
											<div class="LJSpilihBulan">
												<select id="LJSpilihBulan" class="h30">
													<?php
														$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
														for($i=1;$i<=12;$i++){
															$x = str_pad($i,2,0, STR_PAD_LEFT);
															if($x == date("m")){
														?>
													<option value="<?php echo $x; ?>" selected><?php echo $m[$i-1]; ?></option>
														<?php
															} else {
														?>
													<option value="<?php echo $x; ?>"><?php echo $m[$i-1]; ?></option>
														<?php
															}
														}
														?>
												</select>
											</div>
										</div>
										<input id="LJSfilterType" type="hidden" value="">
										<input id="LJSnip" type="hidden" value="">
										<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok"></span></a>
				                        <div class="wrapperTotalWaktu">
											Total Jam Produktif: 
											<label id="labelTotalWaktu"></label>
										</div>
			                        </div>
			                        <div id="tabelLJstaffContainer">
			                        </div>
			                    </div>
			                </div>
						</div>
					</div>
				</div>
	
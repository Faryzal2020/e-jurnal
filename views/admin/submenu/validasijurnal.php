				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox relative">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="vjBtn" title=""><span id="vjbtnLabel" style="pointer-events: none;"></span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="vjContent">
				                        <a onclick="selectVJ('today', this.innerHTML)" href="#" title="lihat jurnal draft hari ini"><span class="glyphicon glyphicon-chevron-right"></span> Hari ini</a>
				                        <a onclick="selectVJ('tanggal', this.innerHTML)" href="#" title="lihat jurnal draft pada tanggal yang dipilih"><span class="glyphicon glyphicon-chevron-right"></span> Pilih Tanggal</a>
				                        <a onclick="selectVJ('bulan', this.innerHTML)" href="#" title="lihat jurnal draft bulan ini"><span class="glyphicon glyphicon-chevron-right"></span> Bulan ini</a>
				                    </div>
				                </div>
								<div class="vjFilter">
									<div id="VJpilihHari" style="display: none;">
										<select id="VJselectDay">
											<?php
			                                   	for ($n = 1; $n <= date('t',strtotime('today')); $n++){ ?>
			                                   		<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                <?php 
			                                	}
			                                ?>
										</select> <?php echo date('F Y') ?>
									</div>
								</div>
								<a class="VJbtn2" id="VJbtn" onclick="loadTabelVJ('day')" style="height: 30px; display: none;"><span class="glyphicon glyphicon-ok" title="klik untuk lihat jurnal"></span></a>
							</div>
						</div>
			            <div id="tabelVJContainer">
			            </div>
			            <div id="modalVJ" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="close VJclose">&times;</span>
			                    <div id="tCModalLabel">Edit jurnal</div>
			                    <form name="FormVJ" id="FormVJ" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableVJ" id="tableVJ">
			                                <tr><input type="hidden" name="VJidJ" id="VJidJ" value=""/></tr>
			                                <tr><input type="hidden" name="VJidAct" id="VJidAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td>:</td>
			                                    <td colspan="2"><label id="vjNamaAct"></label></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Standar Waktu</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="vjDurasi"></label> Menit</td>
			                                </tr>
			                                <tr>
			                                	<td><label>Kategori</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="vjNamaCat"></label></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Volume</label></td>
			                                    <td>:</td>
			                                    <td colspan="3" id="vjVolume"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Volume</label></td>
			                                	<td>:</td>
			                                    <td colspan="3" id="vjVolumeType"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Keterangan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3" id="vjKeterangan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Tanggal</label></td>
			                                	<td>:</td>
			                                    <td colspan="3" id="vjTglJurnal"> <?php echo date('F Y') ?></td>
			                                </tr>
			                                <tr id=edtanggalMulai>
			                                	<td><label>Dari tanggal</label></td>
			                                    <td>:</td>
			                                    <td id="vjTanggalM"></td>
			                                </tr>
			                                <tr id=vjwaktuMulai>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td style="width: 1px;">:</td>
			                                    <td id="vjJamM" style="width: 130px"></td>
												<td style="width: 70px"></td>
			                                </tr>
			                                <tr id=edtanggalSelesai>
			                                	<td><label>Sampai</label></td>
			                                    <td>:</td>
			                                    <td id="vjTanggalS"></td>
			                                </tr>
			                                <tr id=edwaktuSelesai>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>:</td>
			                                    <td id="vjJamS"></td>
												<td></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Aktifitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3" id="vjActType"></td>
			                                </tr>
			                                <tr><input type="hidden" name="edjsNamaCat2" id="edjsNamaCat2" value=""/></tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
			            <div id="modalEVJ" class="tCmodal">
			                <div class="tCmodal-content" style="width: 540px;">
			                    <span class="close EVJclose">&times;</span>
			                    <div id="VJModalLabel">Ganti status validasi jurnal</div>
			                    <form name="FormEVJ" id="FormEVJ" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" align="center" class="tableEVJ" id="tableEVJ">
			                                <tr><input type="hidden" name="EVJidJ" id="EVJidJ" value=""/></tr>
			                                <tr>
			                                	<td>Pesan:</td>
			                                </tr>
			                                <tr>
			                                	<td><textarea id="EVJpesan" name="EVJpesan" form="FormEVJ" rows="3" cols="40"></textarea></td>
			                                </tr>
			                                <tr><td>
			                                <button type="button" id="EVJeditBtn" class="VJbtn" onclick="gantiValidasi('no')" style="float: right; display: none;">OK</button>
			                        </table>
			                    </form>
			                </div>
			            </div>
					</div>
				</div>
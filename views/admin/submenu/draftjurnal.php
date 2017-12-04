				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader" style="">
							<div class="tchbox relative" style="">
								<div class="DJSpilihBulan">
									<label>Pilih Bulan: </label>
									<select id="DJSpilihBulan" class="h30" title="pilih bulan">
										<?php
											$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
											$prevMonth = date('m',strtotime('-1 months'));
											$thisMonth = date('m');
											$prevDate = date('Y-m',strtotime('-1 months'));
											$thisDate = date('Y-m'); ?>
										<option value="<?php echo $thisDate; ?>" selected><?php echo $m[$thisMonth-1]; ?></option>
										<option value="<?php echo $prevDate; ?>"><?php echo $m[$prevMonth-1]; ?></option>
									</select>
								</div>
								<a class="DJSbtn" id="DJSbtn" onclick="lihatDJS('<?php echo $nip; ?>')" style="height: 30px;"><span class="glyphicon glyphicon-ok" title="klik untuk lihat jurnal"></span></a>
							</div>
						</div>
			            <div id="tabelDJstaffContainer">
			            </div>
			            <div id="modalDJS" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="close DJSclose">&times;</span>
			                    <div id="tCModalLabel">Edit jurnal</div>
			                    <form name="FormDJS" id="FormDJS" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableEDJS" id="tableEDJS">
			                                <tr><input type="hidden" name="EDJSidJ" id="EDJSidJ" value=""/></tr>
			                                <tr><input type="hidden" name="EDJSidAct" id="EDJSidAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td>:</td>
			                                    <td colspan="2"><label id="edjsNamaAct"></label></td>
			                                    <td id="btnGantiAct" style="width: 1%;"><a class="gantiActDJ pencetan" onclick="DJSgantiAct()" title="klik untuk mengganti aktivitas" style="padding: 3px 0px 0px 8px;"><span class="glyphicon glyphicon-edit" style="pointer-events: none; display: inline-block;"></span> <label style="display: inline-block;">Ganti</label></a></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Standar Waktu</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="edjsDurasi"></label> Menit</td>
			                                </tr>
			                                <tr>
			                                	<td><label>Kategori</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="edjsNamaCat"></label></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Volume</label></td>
			                                    <td>:</td>
			                                    <td colspan="3"><select id="edjsVolume" name="edjsVolume" title="masukkan jumlah output yang dikerjakan">
			                                    <?php
			                                    	for ($n = 1; $n <= 10; $n++){
			                                    ?>
			                                    		<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                    <?php
			                                    	}
			                                    ?>
			                                    </select></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Volume</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 260px" type="text" id="edjsVolumeType" name="edjsVolumeType" placeholder="Contoh: Buku, Lembar, dll" title="masukan jenis output yang dikerjakan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Keterangan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea rows="3" cols="40" id="edjsKeterangan" name="edjsKeterangan" form="FormDJS" title="berikan detail dari aktivitas yang anda kerjakan"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Tanggal</label></td>
			                                	<td>:</td>
			                                    <td colspan="3">
			                                    	<input type="hidden" name="edjsTglJurnal" id="edjsTglJurnal" value="" title="masukkan tanggal mulai aktivitas pada jurnal anda">
			                                    	<select id="edjsPilihHari" title="pilih tanggal">
			                                    		<option selected><?php echo date('d'); ?></option>
			                                    	</select>
			                                    	<select onchange="updateTanggalEDJS(this,'tgl')" id="edjsPilihBulan" title="pilih bulan">
														<?php
															$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
															$prevMonth = date('m',strtotime('-1 months'));
															$thisMonth = date('m');
															$prevDate = date('Y-m',strtotime('-1 months'));
															$thisDate = date('Y-m'); ?>
														<option value="<?php echo $thisDate; ?>" selected><?php echo $m[$thisMonth-1]; ?></option>
														<option value="<?php echo $prevDate; ?>"><?php echo $m[$prevMonth-1]; ?></option>
													</select>
			                                    </td>
			                                </tr>
			                                <tr id=edtanggalMulai>
			                                	<td><label>Dari tanggal</label></td>
			                                    <td>:</td>
			                                    <td id="edjsTanggal">
			                                    	<input type="hidden" name="edjsTglMulai" id="edjsTglMulai" value="" title="masukkan tanggal mulai aktivitas pada jurnal anda">
			                                    	<select id="edjsPilihHariMulai" title="pilih tanggal">
			                                    		<option selected><?php echo date('d'); ?></option>
			                                    	</select>
			                                    	<select onchange="updateTanggalEDJS(this,'mulai')" id="edjsPilihBulanMulai" title="pilih bulan">
														<?php
															$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
															$prevMonth = date('m',strtotime('-1 months'));
															$thisMonth = date('m');
															$prevDate = date('Y-m',strtotime('-1 months'));
															$thisDate = date('Y-m'); ?>
														<option value="<?php echo $thisDate; ?>" selected><?php echo $m[$thisMonth-1]; ?></option>
														<option value="<?php echo $prevDate; ?>"><?php echo $m[$prevMonth-1]; ?></option>
													</select>
			                                    </td>
			                                </tr>
			                                <tr id=edwaktuMulai>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td style="width: 1px;">:</td>
			                                    <td id="edjsJam" style="width: 130px">
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="edjsJamMulai" id="edjsJamMulai" value="09:30" title="masukkan jam mulai pada aktivitas jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="edjsiconJM">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td style="width: 70px"></td>
			                                </tr>
			                                <tr id=edtanggalSelesai>
			                                	<td><label>Sampai</label></td>
			                                    <td>:</td>
			                                    <td id="tanggal2">
			                                    	<input type="hidden" name="edjsTglSelesai" id="edjsTglSelesai" value="<?php echo date("Y-m-d"); ?>" title="masukkan tanggal selesai aktivitas pada jurnal anda">
			                                    	<select id="edjsPilihHariSelesai" title="pilih tanggal">
			                                    		<option selected><?php echo date('d'); ?></option>
			                                    	</select>
			                                    	<select onchange="updateTanggalEDJS(this,'selesai')" id="edjsPilihBulanSelesai" title="pilih bulan">
														<?php
															$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
															$prevMonth = date('m',strtotime('-1 months'));
															$thisMonth = date('m');
															$prevDate = date('Y-m',strtotime('-1 months'));
															$thisDate = date('Y-m'); ?>
														<option value="<?php echo $thisDate; ?>" selected><?php echo $m[$thisMonth-1]; ?></option>
														<option value="<?php echo $prevDate; ?>"><?php echo $m[$prevMonth-1]; ?></option>
													</select>
			                                    </td>
			                                </tr>
			                                <tr id=edwaktuSelesai>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>:</td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="edjsJamSelesai" id="edjsJamSelesai" value="09:30" title="masukkan jam selesai aktivitas pada jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="edjsiconJS">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Aktifitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><select id="edjsActType" name="edjsActType" title="masukkan jenis aktivitas yang anda kerjakan">
			                                			<option value="umum">Umum</option>
			                                			<option value="skp">SKP</option>
			                                			<option value="tambahan">Tambahan</option>
			                                	</td>
			                                </tr>
			                                <tr><input type="hidden" name="edjsNamaCat2" id="edjsNamaCat2" value=""/></tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="DJSSubmit" class="SJbtnSubmit" onclick="validateEDJ()"  title="klik untuk selesai mengedit">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
			            <div id="modalDJS2" class="tCmodal zindex2">
			                <div class="tCmodal-content tableType">
			                    <span class="close DJS2close">&times;</span>
			                    <div id="tCModalLabel">Ganti aktivitas</div>
			                    <div class="tCheader">
									<div class="tchbox">
										<div class="dropdownCat">
						                    <button class="dropbtn" id="pacBtn"><span id="pacbtnLabel" style="pointer-events: none;"  title="klik untuk mengubah kategori">Pilih Kategori</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
						                    <div class="dropdownCat-content" id="pacContent">
						                        <a onclick="selectCat2('Semua')" href="#">Semua Kategori</a>
						                        <?php
						                            $i=0;
						                            while ($cat = mysqli_fetch_array($Catquery2)) {
						                                if($cat[$i]==null || $cat['nama_kategori'] == "izin harian"){
						                                    echo "";
						                                } else {
						                        ?>
						                        <a onclick="selectCat2('<?php echo $cat['nama_kategori'] ?>')" href="#"><?php echo $cat['nama_kategori']; ?></a>
						                        <?php
						                                }
						                            }
						                        ?>
						                    </div>
						                </div>
										<div class="SAwrapper">
											<div class="searchActivity">
												<div class="searchIconWrapperAct">
						                			<span id="iconSearchPeg" class="glyphicon glyphicon-search"></span>
						                		</div>
							                    <input type="text" id="pacSearch" onkeyup="searchAct2()" placeholder="Search Aktivitas"  title="mencari aktivitas yang ingin diganti">
							                </div>
								            Result: 
								            <label id="pacCount">0</label>
						                </div>
									</div>
								</div>
								<div class="tCbody">
									<table class="pacListTable" id="pacListTable" border="1" cellpadding="20" align="center">
										<tr>
											<th style="width: 60px">No</th>
											<th>Nama Aktivitas</th>
											<th style="width: 150px">Standar Waktu Pengerjaan</th>
											<th style="width: 130px">Kategori</th>
											<th style="width: 80px"></th>
										</tr>
										<tr>
											<td colspan="5"><label id="pacTableMessage" style="font-weight:normal; margin: auto">Mulai pencarian dengan mengetik pada kolom search atau pilih kategori</label></td>
										</tr>
										<?php
											while($al = mysqli_fetch_array($ALquery2)) {
												$idAct = $al['id_aktivitas'];
												$namaAct = $al['nama_aktivitas'];
												$durasi = $al['durasi'];
												$namaCateg = $al['nama_kategori'];
										?>
										<tr style="display: none">
											<td style="text-align: center;"><?php echo $idAct; ?></td>
											<td><?php echo $namaAct ?></td>
											<td style="text-align: center;"><?php echo $durasi . " Menit"?></td>
											<td style="text-align: center;"><?php echo $namaCateg ?></td>
											<td style="text-align: center; width: 80px;">
												<a class="selectActbtn" onclick="DJSpilihAct(
													'<?php echo $idAct; ?>',
													'<?php echo $namaAct; ?>',
													'<?php echo $durasi; ?>',
													'<?php echo $namaCateg; ?>'
												)"><span class="glyphicon glyphicon-ok"  title="klik untuk selesai mengganti aktivitas"></span></a>
											</td>
										</tr>
										<?php
											}
										?>
									</table>
								</div>
			                </div>
			            </div>
			            <div id="modalEIJ2" class="tCmodal">
			            	<span id="EIJ2tanggalDipilih" style="display:none"></span>
			                <div class="tCmodal-content tableType">
			                    <span class="close EIJ2close">&times;</span>
			                    <div id="tCModalLabel">Pilih Jenis Aktivitas</div>
			                    <div class="tCheader">
									<div class="tchbox">
										<div class="dropdownCat">
						                    <button class="dropbtn" id="EIJ2Btn"><span id="EIJ2btnLabel" style="pointer-events: none;"  title="klik untuk mengubah kategori">Pilih Kategori</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
						                    <div class="dropdownCat-content" id="EIJ2Content">
						                        <a onclick="selectCat4('Semua')" href="#">Semua Kategori</a>
						                        <?php
						                            $i=0;
						                            while ($cat = mysqli_fetch_array($Catquery4)) {
						                                if($cat[$i]==null){
						                                    echo "";
						                                } else {
						                        ?>
						                        <a onclick="selectCat4('<?php echo $cat['nama_kategori'] ?>')" href="#"><?php echo $cat['nama_kategori']; ?></a>
						                        <?php
						                                }
						                            }
						                        ?>
						                    </div>
						                </div>
										<div class="SAwrapper">
											<div class="searchActivity">
												<div class="searchIconWrapperAct">
						                			<span id="iconSearchPeg" class="glyphicon glyphicon-search"></span>
						                		</div>
							                    <input type="text" id="EIJ2Search" onkeyup="searchAct4()" placeholder="Search Aktivitas"  title="mencari aktivitas yang ingin diganti">
							                </div>
								            Result: 
								            <label id="EIJ2Count">0</label>
						                </div>
									</div>
								</div>
								<div class="tCbody">
									<table class="EIJ2ListTable" id="EIJ2ListTable" border="1" cellpadding="20" align="center">
										<tr>
											<th style="width: 60px">No</th>
											<th>Nama Aktivitas</th>
											<th style="width: 150px">Standar Waktu Pengerjaan</th>
											<th style="width: 130px">Kategori</th>
											<th style="width: 80px"></th>
										</tr>
										<tr>
											<td colspan="5"><label id="EIJ2TableMessage" style="font-weight:normal; margin: auto">Mulai pencarian dengan mengetik pada kolom search atau pilih kategori</label></td>
										</tr>
										<?php
											while($al = mysqli_fetch_array($ALquery3)) {
												$idAct = $al['id_aktivitas'];
												$namaAct = $al['nama_aktivitas'];
												$durasi = $al['durasi'];
												$namaCateg = $al['nama_kategori'];
										?>
										<tr style="display: none">
											<td style="text-align: center;"><?php echo $idAct; ?></td>
											<td><?php echo $namaAct ?></td>
											<td style="text-align: center;"><?php echo $durasi . " Menit"?></td>
											<td style="text-align: center;"><?php echo $namaCateg ?></td>
											<td style="text-align: center; width: 80px;">
												<a class="selectActbtn" onclick="EIJpilihAct(
													'<?php echo $idAct; ?>',
													'<?php echo $namaAct; ?>',
													'<?php echo $durasi; ?>',
													'<?php echo $namaCateg; ?>'
												)"><span class="glyphicon glyphicon-ok"  title="klik untuk selesai mengganti aktivitas"></span></a>
											</td>
										</tr>
										<?php
											}
										?>
									</table>
								</div>
			                </div>
			            </div>
			            <div id="modalEIJ" class="tCmodal zindex2">
			                    <div class="tCmodal-content">
			                        <span class="close EIJclose">&times;</span>
			                        <div id="tCModalLabel">Input Jurnal</div>
			                        <form name="FormEIJ" id="FormEIJ" method="post" action="">
			                            <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableSJ" id="tableEIJ">
			                                <tr><input type="hidden" name="EIJ_idAct" id="EIJ_idAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td style="width: 1px">:</td>
			                                    <td colspan="3"><label id="EIJNamaAct"></label></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Standar Waktu</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="EIJDurasi"></label> Menit</td>
			                                </tr>
			                                <tr>
			                                	<td><label>Kategori</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="EIJNamaCat"></label></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Volume</label></td>
			                                    <td>:</td>
			                                    <td colspan="3"><select name="EIJvolume"  title="masukkan jumlah output yang dikerjakan">
			                                    <?php
			                                    	for ($n = 1; $n <= 10; $n++){
			                                    ?>
			                                    		<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                    <?php
			                                    	}
			                                    ?>
			                                    </select> </td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Volume</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 260px" type="text" name="EIJvolumeType" id="EIJvolumeType" value="" placeholder="Contoh: Buku, Lembar, dll"  title="masukan jenis output yang dikerjakan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Keterangan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea rows="3" cols="40" id="EIJketerangan" name="EIJketerangan" form="FormEIJ" title="berikan detail dari aktivitas yang anda kerjakan"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Tanggal</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><div id="EIJtextTglJurnal"></div><input type="hidden" name="EIJtglJurnal" id="EIJtglJurnal" title="Tanggal anda mengerjakan aktivitas ini"></td>
			                                </tr>
			                                <tr id=EIJtanggalMulai>
			                                	<td><label>Dari tanggal</label></td>
			                                    <td>:</td>
			                                    <td id="EIJtanggal"><div id="EIJtextTglMulai"></div><input type="hidden" name="EIJtglMulai" id="EIJtglMulai" value="<?php echo date("Y-m-d"); ?>" title="masukkan tanggal mulai aktivitas pada jurnal anda"></td>
			                                </tr>
			                                <tr id=EIJwaktuMulai>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td style="width: 1px;">:</td>
			                                    <td id="EIJjam" style="width: 130px">
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="EIJjamMulai" id="EIJjamMulai" value="09:30" title="masukkan jam mulai pada aktivitas jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="EIJiconJamMulai">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td style="width: 70px"></td>
			                                </tr>
			                                <tr id=EIJtanggalSelesai>
			                                	<td><label>Sampai</label></td>
			                                    <td>:</td>
			                                    <td id="EIJtanggal2"><input type="hidden" name="EIJtglSelesai" id="EIJtglSelesai" data-format="YYYY-MM-DD" data-template="D MMM YYYY" value="<?php echo date("Y-m-d"); ?>" title="masukkan tanggal selesai aktivitas pada jurnal anda"></td>
			                                </tr>
			                                <tr id=EIJwaktuSelesai>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>:</td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="EIJjamSelesai" id="EIJjamSelesai" value="09:30" title="masukkan jam selesai aktivitas pada jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="EIJiconJamSelesai">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td></td>
			                                </tr>
			                                <tr id=EIJjenisAktivitas>
			                                	<td><label>Jenis Aktifitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><select name="EIJactType" title="masukkan jenis aktivitas yang anda kerjakan">
			                                			<option value="Umum">Umum</option>
			                                			<option value="SKP">SKP</option>
			                                			<option value="Tambahan">Tambahan</option>
			                                	</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="tcmSubmit" class="SJbtnSubmit" onclick="validateEIJ()" title="klik untuk menyimpan jurnal anda">OK</a></td>
			                                </tr>
			                            </table>
			                        </form>
			                    </div>
			            </div>
					</div>
				</div>
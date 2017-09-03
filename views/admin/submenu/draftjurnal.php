				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox relative">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="djsBtn" title="melihat draft jurnal berdasarkan :&#013;&#183; harian&#013;&#183; mingguan&#013;&#183; bulanan"><span id="djsbtnLabel" style="pointer-events: none;">Mingguan</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="djsContent">
				                        <a onclick="selectDJS('Harian')" href="#" title="melihat draft jurnal berdasarkan harian">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectDJS('Mingguan')" href="#" title="melihat draft jurnal berdasarkan mingguan">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectDJS('Bulanan')" href="#" title="melihat draft jurnal berdasarkan bulanan">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                    </div>
				                </div>
								<div class="DJSfilter" style="display: none">
									<div class="DJSpilihHari">
										<input id="DJSpilihHari" class="w163 h30" type="date" value="<?php echo date('Y-m-d');?>" title="pilih tanggal"/>/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;"></div>
									</div>
								</div>
								<div class="DJSfilter" style="display: none">
									<div class="DJSpilihMinggu">

										<input id="DJSpilihMinggu" class="w163" type="text" value="<?php echo date('Y-W');?>" title="pilih minggu"/>
									</div>
								</div>
				                <div class="DJSfilter" style="display: none">
									<div class="DJSpilihTahun">
										<select id="DJSpilihTahun" class="h30" title="pilih tahun">
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
									<div class="DJSpilihBulan">
										<select id="DJSpilihBulan" class="h30" title="pilih bulan">
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
								<input id="DJSfilterType" type="hidden" value="">
								<a class="DJSbtn" id="DJSbtn" onclick="lihatDJS('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok" title="klik untuk lihat draft jurnal"></span></a>
								<div class="kirimBtnWrapper">
									<a class="kirimBtn disable" id="kirimBtn" onclick="submitDraftS()" title="klik untuk mengirim jurnal&#013;jurnal yang dikirim tidak bisa diubah kembali">Submit Jurnal</a>
								</div>
							</div>
						</div>
			            <div id="tabelDJstaffContainer">
			            </div>
			            <div id="modalDJS" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="close DJSclose">&times;</span>
			                    <div id="tCModalLabel">Edit draft jurnal</div>
			                    <form name="FormDJS" id="FormDJS" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableEDJS">
			                                <tr><input type="hidden" name="EDJSidJ" id="EDJSidJ" value=""/></tr>
			                                <tr><input type="hidden" name="EDJSidAct" id="EDJSidAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td>:</td>
			                                    <td colspan="2"><label id="edjsNamaAct"></label></td>
			                                    <td><a class="gantiActDJ" onclick="DJSgantiAct()" title="klik untuk mengganti :&#013;&#183; aktivitas&#013;&#183; standar waktu &#013;&#183; kategori">Ganti</a></td>
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
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td>:</td>
			                                    <td><input type="date" id="edjsTglMulai" name="edjsTglMulai" value="" title="masukkan tanggal mulai aktivitas pada jurnal anda"></td>
			                                    <td style="width: 120px">
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" id="edjsJamMulai" name="edjsJamMulai" value="09:30"  title="masukkan jam mulai pada aktivitas jurnal anda">
													    <span class="input-group-addon">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td style="width: 70px"></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>:</td>
			                                    <td><input type="date" id="edjsTglSelesai" name="edjsTglSelesai" value=""  title="masukkan tanggal selesai aktivitas pada jurnal anda"></td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" id="edjsJamSelesai" name="edjsJamSelesai" value="09:30" title="masukkan jam selesai aktivitas pada jurnal anda">
													    <span class="input-group-addon">
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
						                                if($cat[$i]==null || $cat['nama_kategori'] == "kehadiran"){
						                                    echo "";
						                                } else {
						                        ?>
						                        <a onclick="selectCat2('<?php echo $cat['nama_kategori'] ?>')" href="#"><?php echo $cat['nama_kategori']; ?> <span class="glyphicon glyphicon-chevron-right"></span></a>
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
					</div>
				</div>
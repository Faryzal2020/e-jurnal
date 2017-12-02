				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="ddcBtn" title="klik untuk memilih kategori"><span id="ddcbtnLabel" style="pointer-events: none;">Pilih Kategori</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="ddcContent">
				                        <a onclick="selectCat('Semua')" href="#">Semua Kategori</a>
				                        <?php
				                            $i=0;
				                            while ($cat = mysqli_fetch_array($Catquery)) {
				                                if($cat[$i]==null){
				                                    echo "";
				                                } else {
				                        ?>
				                        <a onclick="selectCat('<?php echo $cat['nama_kategori'] ?>')" href="#"><?php echo $cat['nama_kategori']; ?></a>
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
					                    <input type="text" id="actSearch" onkeyup="searchAct()" placeholder="Search Aktivitas" style="width: 100%; padding-left: 10px;"  title="mencari aktivitas yang ingin anda input">
					                </div>
						            Result: 
						            <label id="actCount">0</label>
				                </div>
							</div>
						</div>
						<div class="tCbody">
							<table class="actListTable" id="actListTable" border="1" cellpadding="20" align="center">
								<tr>
									<th style="width: 60px">No</th>
									<th>Nama Aktivitas</th>
									<th id="headerStandarWaktu" style="width: 150px">Standar Waktu Pengerjaan</th>
									<th style="width: 130px">Kategori</th>
									<th style="width: 80px">Pilih</th>
								</tr>
								<tr>
									<td colspan="5"><label id="actTableMessage" style="font-weight:normal; margin: auto">Mulai pencarian dengan mengetik pada kolom search atau pilih kategori</label></td>
								</tr>
								<?php
									while($al = mysqli_fetch_array($ALquery)) {
										$idAct = $al['id_aktivitas'];
										$namaAct = $al['nama_aktivitas'];
										$durasi = $al['durasi'];
										$namaCateg = $al['nama_kategori'];
								?>
								<tr style="display: none">
									<td style="text-align: center;"><?php echo $idAct; ?></td>
									<td><?php echo $namaAct ?></td>
									<?php if($namaCateg != 'izin harian'){ ?>
									<td style="text-align: center;"><?php 
										if ($durasi == 0) {
											echo "-";
										} else {
											echo $durasi . " Menit";
										}
									?></td>
									<?php } else { ?>
									<td style="display: none"/>
									<?php } ?>
									<td style="text-align: center;"><?php echo $namaCateg ?></td>
									<td style="text-align: center; width: 80px;">
										<a class="selectActbtn" onclick="selectActivity(
											'<?php echo $idAct; ?>',
											'<?php echo $namaAct; ?>',
											'<?php echo $durasi; ?>',
											'<?php echo $namaCateg; ?>'
										)"><span class="glyphicon glyphicon-ok" title="klik untuk memilih aktivitas ini"></span></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<div id="tCModal" class="tCmodal">
			                    <div class="tCmodal-content">
			                        <span class="close">&times;</span>
			                        <div id="tCModalLabel">Input Jurnal</div>
			                        <form name="FormSJ" id="FormSJ" method="post" action="">
			                            <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableSJ" id="tableSJ">
			                                <tr><input type="hidden" name="tcm_idAct" class="tcm_idAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td style="width: 1px">:</td>
			                                    <td colspan="3"><label id="tcmNamaAct"></label></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Standar Waktu</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="tcmDurasi"></label> Menit</td>
			                                </tr>
			                                <tr>
			                                	<td><label>Kategori</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><label id="tcmNamaCat"></label></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Volume</label></td>
			                                    <td>:</td>
			                                    <td colspan="3"><select name="volume"  title="masukkan jumlah output yang dikerjakan">
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
			                                    <td colspan="3"><input style="width: 260px" type="text" name="volumeType" id="volumeType" value="" placeholder="Contoh: Buku, Lembar, dll"  title="masukan jenis output yang dikerjakan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Keterangan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea rows="3" cols="40" id="SJketerangan" name="SJketerangan" form="FormSJ" title="berikan detail dari aktivitas yang anda kerjakan"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Tanggal</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><select name="tglJurnal" title="Tanggal anda mengerjakan aktivitas ini">
			                                    <?php
			                                    	for ($n = 1; $n <= date('t',strtotime('today')); $n++){
			                                    		if(date('j') == $n){?>
			                                    		<option selected value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                    <?php } else { ?>
			                                    		<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                    <?php }
			                                    	}
			                                    ?>
			                                    </select> <?php echo date('F Y') ?></td>
			                                </tr>
			                                <tr id=tanggalMulai>
			                                	<td><label>Dari tanggal</label></td>
			                                    <td>:</td>
			                                    <td id="tanggal"><input type="hidden" name="tglMulai" id="tglMulai" data-format="YYYY-MM-DD" data-template="D MMM YYYY" value="<?php echo date("Y-m-d"); ?>"  title="masukkan tanggal mulai aktivitas pada jurnal anda"></td>
			                                </tr>
			                                <tr id=waktuMulai>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td style="width: 1px;">:</td>
			                                    <td id="jam" style="width: 130px">
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="jamMulai" id="jamMulai" value="09:30" title="masukkan jam mulai pada aktivitas jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="iconJamMulai">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td style="width: 70px"></td>
			                                </tr>
			                                <tr id=tanggalSelesai>
			                                	<td><label>Sampai</label></td>
			                                    <td>:</td>
			                                    <td id="tanggal2"><input type="hidden" name="tglSelesai" id="tglSelesai" data-format="YYYY-MM-DD" data-template="D MMM YYYY" value="<?php echo date("Y-m-d"); ?>" title="masukkan tanggal selesai aktivitas pada jurnal anda"></td>
			                                </tr>
			                                <tr id=waktuSelesai>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>:</td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input readonly type="text" class="form-control" name="jamSelesai" id="jamSelesai" value="09:30" title="masukkan jam selesai aktivitas pada jurnal anda" style="background-color: white">
													    <span class="input-group-addon" id="iconJamSelesai">
													        <span class="glyphicon glyphicon-time"></span>
													    </span>
													</div>
												</td>
												<td></td>
			                                </tr>
			                                <tr id=jenisAktivitas>
			                                	<td><label>Jenis Aktifitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><select name="actType" title="masukkan jenis aktivitas yang anda kerjakan">
			                                			<option value="Umum">Umum</option>
			                                			<option value="SKP">SKP</option>
			                                			<option value="Tambahan">Tambahan</option>
			                                	</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="tcmSubmit" class="SJbtnSubmit" onclick="validateSJ()" title="klik untuk menyimpan jurnal anda">OK</a></td>
			                                </tr>
			                            </table>
			                        </form>
			                    </div>
			                </div>
						</div>
					</div>
				</div>
	
				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="ddcBtn"><span id="iconDDC1" class="glyphicon glyphicon-chevron-down"></span><span id="iconDDC2" class="glyphicon glyphicon-chevron-right" style="display:none;"></span> <span id="ddcbtnLabel" style="pointer-events: none;">Pilih Kategori</span></button>
				                    <div class="dropdownCat-content" id="ddcContent">
				                        <a onclick="selectCat('Semua')" href="#">Semua Kategori</a>
				                        <?php
				                            $i=0;
				                            while ($cat = mysqli_fetch_array($Catquery)) {
				                                if($cat[$i]==null){
				                                    echo "";
				                                } else {
				                        ?>
				                        <a onclick="selectCat('<?php echo $cat['nama_kategori'] ?>')" href="#"><?php echo $cat['nama_kategori']; ?> <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <?php
				                                }
				                            }
				                        ?>
				                    </div>
				                </div>
								<div class="SAwrapper">
									<div class="searchActivity">
					                    <input type="text" id="actSearch" onkeyup="searchAct()" placeholder="Search Aktivitas" style="width: 100%">
					                </div>
						            Jumlah result: 
						            <label id="actCount">0</label>
				                </div>
							</div>
						</div>
						<div class="tCbody">
							<table class="actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th style="width: 60px">No</th>
									<th>Nama Aktivitas</th>
									<th style="width: 150px">Standar Waktu Pengerjaan</th>
									<th style="width: 130px">Kategori</th>
									<th style="width: 80px"></th>
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
									<td style="text-align: center;"><?php echo $durasi . " Menit"?></td>
									<td style="text-align: center;"><?php echo $namaCateg ?></td>
									<td style="text-align: center; width: 80px;">
										<a class="selectActbtn" onclick="selectActivity(
											'<?php echo $idAct; ?>',
											'<?php echo $namaAct; ?>',
											'<?php echo $durasi; ?>',
											'<?php echo $namaCateg; ?>'
										)"><span class="glyphicon glyphicon-ok"></span></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<div id="tCModal" class="tCmodal">
			                    <div class="tCmodal-content">
			                        <span class="close">&times;</span>
			                        <div id="tCModalLabel">Submit Jurnal</div>
			                        <form name="FormSJ" id="FormSJ" method="post" action="">
			                            <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableSJ">
			                                <tr><input type="hidden" name="tcm_idAct" class="tcm_idAct" value=""/></tr>
			                                <tr>
			                                    <td style="width: 220px"><label>Aktivitas yang dipilih</label></td>
			                                    <td>:</td>
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
			                                    <td colspan="3"><select name="volume">
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
			                                    <td colspan="3"><input style="width: 260px" type="text" name="volumeType" placeholder="Contoh: Buku, Lembar, dll"></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td>:</td>
			                                    <td><input type="date" name="tglMulai" value=""></td>
			                                    <td style="width: 120px">
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" name="jamMulai" value="09:30">
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
			                                    <td><input type="date" name="tglSelesai" value=""></td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" name="jamSelesai" value="09:30">
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
			                                    <td colspan="3"><select name="actType">
			                                			<option value="umum">Umum</option>
			                                			<option value="skp">SKP</option>
			                                	</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="tcmSubmit" class="SJbtnSubmit" onclick="validateSJ()">Submit</a></td>
			                                </tr>
			                            </table>
			                        </form>
			                    </div>
			                </div>
						</div>
					</div>
				</div>
	
				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
							</div>
						</div>
						<div class="tCbody">
							<table class="actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th style="min-width: 130px">NIP</th>
									<th style="min-width: 320px">Nama Pegawai</th>
									<th style="min-width: 220px">Email</th>
									<th style="min-width: 130px"></th>
								</tr>
								<?php
									while($al = mysqli_fetch_array($DPquery)) {
										$nip = $al['nip'];
										$nama = $al['nama_pegawai'];
										$email = $al['email_pegawai'];
								?>
								<tr>
									<td style="text-align: center;"><?php echo $nip; ?></td>
									<td><?php echo $nama ?></td>
									<td style="text-align: center;"><?php echo $email ?></td>
									<td style="text-align: center; width: 80px;">
										<a class="selectActbtn" onclick="lihatJurnal(
											'<?php echo $nip; ?>',
											'<?php echo $nama; ?>',
											'<?php echo $email; ?>'
										)">Lihat Jurnal</a>
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
	
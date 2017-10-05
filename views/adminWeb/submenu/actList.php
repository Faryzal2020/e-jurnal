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
									<div class="searchActivityadmin">
										<div class="searchIconWrapperAct">
				                			<span id="iconSearchPeg" class="glyphicon glyphicon-search"></span>
				                		</div>
					                    <input type="text" id="actSearch" onkeyup="searchAct()" placeholder="Search Aktivitas" style="width: 100%; padding-left: 10px;"  title="mencari aktivitas yang ingin anda input">
					                </div>
						            Result: 
						            <label id="actCount">0</label>
                                     <div class="tambahAktivitas">
						            	<button id="TAact" class="TAact" onclick="Actform()" title="Tambah Aktivitas Baru" style="height: 50px; width: 54px;"><span class="glyphicon glyphicon-plus"></span></button>
						            </div>
				                </div>
							</div>
						</div>
                        
						<div class="tCbody">
                            <div style="display: none;" id="hiddentabelContainer">
                            </div>
							<table class="actListTable" id="actListTable" border="1" cellpadding="20" align="center">
                                <div>
			                    	<caption class='btn-toolbar' id='btn-toolbar' style="display: none; padding-left: 10px;">
			                            <button id='csvBtn_activity' onclick="printTabel('csv')" style="border-radius: 5px; padding: 5px;" class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save' style='pointer-events: none;'/><span style="font-family: sans-serif; pointer-events: none;"> Export to CSV</span></button>
			                            <button id='xlsBtn_activity' onclick="printTabel('xls')" style="border-radius: 5px; padding: 5px;" class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save' style='pointer-events: none;'/><span style="font-family: sans-serif; pointer-events: none;"> Export to XLS</span></button>
			                            <button id='pdfBtn_activity' onclick="printTabel('pdf')" style="border-radius: 5px; padding: 5px;" class='btn-default' style='padding:7px; margin-left: 5px; border-radius: 5px;'><span class='glyphicon glyphicon-floppy-save' style='pointer-events: none;'/><span style="font-family: sans-serif; pointer-events: none;"> Export to PDF</span></button>
			                        </caption>
			                    </div>
								<tr>
									<th style="min-width: 60px">No</th>
									<th style="min-width: 320px">Nama Aktivitas</th>
									<th id="headerStandarWaktu" style="min-width: 220px">Standar Waktu Pengerjaan</th>
									<th style="min-width: 220px">Kategori</th>
									<th style="min-width: 130px"></th>
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
                                        $idCateg = $al['id_kategori'];
                                        
								?>
								<tr style="display: none">
									<td style="text-align: center;"><?php echo $idAct; ?></td>
									<td><?php echo $namaAct ?></td>
									<?php if($namaCateg != "izin harian"){ ?>
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
										<a onclick="editAktivitas(
											'<?php echo $idAct; ?>',
											'<?php echo $namaAct; ?>',
											'<?php echo $durasi; ?>',
											'<?php echo $idCateg; ?>'
										)" style="display: inline; font-size: 1.5em;"><span class="glyphicon glyphicon-edit" title="Edit Aktivitas"></span></a>
										<a class="deleteDJBtn" onclick="deleteAktivitas('<?php echo $idAct; ?>')" style="display: inline; font-size: 1.5em;">
                    					   <span class="glyphicon glyphicon-trash" title="Hapus Aktivitas"></span></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
                            <div id="ModalEact" class="tCmodal">
                            <div class="tCmodal-content">
			                    <span class="EActclose close">&times;</span>
			                    <div id="tCModalLabel">Edit Aktivitas : <label id="labelaktivitas"></label></div>
			                    <form name="FormTA_EAct" id="FormTA_EAct" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableTA">
			                                <tr><input type="hidden" name="id_aktivitas" id="id_aktivitas" value=""/></tr>
                                            <tr>
			                                	<td><label>Nama Aktivitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputaktivitas" name="inputaktivitas" value="" title="masukkan aktivitas yang ingin diubah"></td>
			                                </tr>
			                               <tr>
			                                    <td><label>Kategori</label></td>
			                                    <td>:</td>
			                                    <td colspan="3"><select name="input_idkategori" id="input_idkategori"  title="masukkan kategori dari aktivitas">
                                                <option value="">Pilih Aktivitas</option>
			                                    <?php 
                                                while ($que = mysqli_fetch_array($Catquery4))
                                                {
                                                 ?>
			                                    		<option value="<?php echo $que['id_kategori']; ?>"><?php echo $que['nama_kategori']; ?></option>
			                                    <?php
			                                    	}
			                                    ?>
			                                    </select> </td>
			                                </tr>
			                                <tr>
			                                	<td><label>Waktu Efektif</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 70%" type="text" id="inputdurasi" name="inputdurasi" value=""  title="masukkan durasi waktu efektif dari aktivitas yang dibuat"> Menit</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="TASubmit" class="TAbtnSubmit" onclick="validateTA_EAct()" title="Simpan Perubahan">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
							<div id="tCModal" class="tCmodal">
			                    <div class="tCmodal-content">
			                        <span class="close">&times;</span>
			                        <div id="tCModalLabel">Submit Jurnal</div>
			                        <form name="FormSJ" id="FormSJ" method="post" action="">
			                            <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableSJ" id="tableSJ">
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
			                                    <td colspan="3"><input style="width: 260px" type="text" name="volumeType" placeholder="Contoh: Buku, Lembar, dll"  title="masukan jenis output yang dikerjakan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Keterangan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea rows="3" cols="40" name="keterangan" form="FormSJ" value=""  title="berikan detail dari aktivitas yang anda kerjakan"></textarea></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td>:</td>
			                                    <td><input type="text" name="tglMulai" value=""  title="masukkan tanggal mulai aktivitas pada jurnal anda"></td>
			                                    <td style="width: 120px">
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" name="jamMulai" value="09:30" title="masukkan jam mulai pada aktivitas jurnal anda">
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
			                                    <td><input type="text" name="tglSelesai" value="" title="masukkan tanggal selesai aktivitas pada jurnal anda"></td>
			                                    <td>
			                                    	<div class="input-group clockpicker">
													    <input type="text" class="form-control" name="jamSelesai" value="09:30" title="masukkan jam selesai aktivitas pada jurnal anda">
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
			                                    <td colspan="3"><select name="actType" title="masukkan jenis aktivitas yang anda kerjakan">
			                                			<option value="umum">Umum</option>
			                                			<option value="skp">SKP</option>
			                                	</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="tcmSubmit" class="SJbtnSubmit" onclick="validateSJ()" title="klik untuk menyimpan jurnal anda dalam draft">Submit</a></td>
			                                </tr>
			                            </table>
			                        </form>
			                    </div>
			                </div>
                             <div id="ModalAct" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="Actclose close">&times;</span>
			                    <div id="tCModalLabel">Tambah Aktivitas</div>
			                    <form name="FormTA_Act" id="FormTA_Act" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableTA">
			                                <tr>
			                                	<td><label>Nama Aktivitas</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputAktivitas" name="aktivitas" value="" title="masukkan aktivitas baru"></td>
			                                </tr>
			                               <tr>
			                                    <td><label>Kategori</label></td>
			                                    <td>:</td>
			                                    <td colspan="3"><select name="kategori"  title="masukkan kategori dari aktivitas">
                                                <option value="">Pilih Kategori</option>
			                                    <?php 
                                                while ($que = mysqli_fetch_array($Catquery3))
                                                {
                                                 ?>
			                                    		<option value="<?php echo $que['id_kategori']; ?>"><?php echo $que['nama_kategori']; ?></option>
			                                    <?php
			                                    	}
			                                    ?>
			                                    </select> </td>
			                                </tr>
			                                <tr>
			                                	<td><label>Waktu Efektif</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 70%" type="text" id="inputdurasi" name="durasi" value=""  title="masukkan durasi waktu efektif dari aktivitas yang dibuat"> Menit</td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="TASubmit" class="TAbtnSubmit" onclick="validateTA_Act()" title="Simpan Aktivitas">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
                            
						</div>
					</div>
				</div>
	
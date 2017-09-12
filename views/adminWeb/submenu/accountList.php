				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
				                <div class="SAwrapper">
				                	<div class="searchIconWrapper">
				                		<span id="iconSearchPeg" class="glyphicon glyphicon-search"></span>
				                	</div>
									<div class="searchPegawai h30">
					                    <input type="text" id="pegSearch" class="h30" onkeyup="searchAcc()" title="Mencari nama pegawai" placeholder="Search Nama Pegawai" style="width: 100%; padding-left: 10px;">
					                </div>
						            Result: 
						            <label id="pegCount">0</label>
						            <div class="tambahAccount">
						            	<button id="TAbtn" class="TAbtn" onclick="openTAform()" title="Tambah account pegawai"><span class="glyphicon glyphicon-plus"></span></button>
						            </div>
				                </div>
							</div>
						</div>
						<div class="tCbody" id="epTableWrapper">
							<table class="epTable" id="epTable" border="1" cellpadding="20" align="center">
								<tr>
									<th style="min-width: 130px">NIP</th>
									<th style="min-width: 320px">Nama Pegawai</th>
									<th style="min-width: 220px">Bagian</th>
									<th style="min-width: 220px">Jabatan</th>
									<th style="min-width: 130px"></th>
								</tr>
								<tr style="display:none;">
									<td colspan="5"><label id="pegTableMessage" style="font-weight:normal; margin: auto"></label></td>
								</tr>
								<?php
									while($al = mysqli_fetch_array($ALLquery)) {
										$JAnip = $al['nip'];
										$JAnama = $al['nama_pegawai'];
										$JAbagian= $al['bagian'];
										$JAjabatan = $al['jabatan'];
										$JAlevel = $al['level'];
								?>
								<tr>
									<td style="text-align: center;"><?php echo $JAnip; ?></td>
									<td><?php echo $JAnama ?></td>
									<td style="text-align: center;"><?php echo $JAbagian ?></td>
									<td><?php echo $JAjabatan ?></td>
									<td style="text-align: center; width: 80px;">
										<a onclick="lihatJurnal(
											'<?php echo $JAnip; ?>',
											'<?php echo $JAnama; ?>'
										)" style="display: inline; font-size: 1.5em; padding-right: 5px;"><span class="glyphicon glyphicon-list-alt" title="Lihat jurnal"></span></a>
										<a onclick="editAccount(
											'<?php echo $JAnip; ?>',
											'<?php echo $JAnama; ?>',
											'<?php echo $JAbagian; ?>',
											'<?php echo $JAjabatan; ?>',
											'<?php echo $JAlevel; ?>',
											'<?php echo $al['password']; ?>'
										)" style="display: inline; font-size: 1.5em;"><span class="glyphicon glyphicon-edit" title="Edit account"></span></a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
						<div id="ModalEA" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="EAclose close">&times;</span>
			                    <div id="tCModalLabel">Edit account milik: <label id="labelPemilikAccount"></label></div>
			                    <form name="FormEA" id="FormEA" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableEA">
			                                <tr><input type="hidden" name="EAnip" id="EAnip" value=""/></tr>
			                                <tr>
			                                	<td><label>Nama</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputNama" name="nama" value="" title="Masukkan nama pegawai yang ingin diubah"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Bagian</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputBagian" name="bagian" value="" title="Masukkan bagian dari pegawai yang ingin diubah :&#013;-Kosong&#40; &#41; untuk Kepala Biro dan Kepala Bagian&#013;-bagian :&#013;  *pembinaan dan kesejahteraan pegawai&#013;  *pengembangan kompetensi pegawai&#013;  *tata usaha kepegawaian"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jabatan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea style="width: 100%" type="text" id="inputJabatan" name="jabatan" value="" form="FormEA" title="Jabatan dari pegawai yang ingin diubah"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Password</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputPassword" name="password" value="" title="Password dari akun pegawai yang ingin diubah"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Level</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input type="text" name="level" id="inputLevel" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' title="Masukkan level dari pegawai yang ingin diubah :&#013;1 &#40;level untuk staff &#41;&#013;2 &#40;level untuk kepala Sub-Bagian &#41; &#013;3 &#40;level untuk Kepala Bagian &#41; &#013;4 &#40;level untuk Kepala Biro &#41;"></td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="EASubmit" class="EAbtnSubmit" onclick="validateEA()" title="Simpan Perubahan">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
			            <div id="ModalTA" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="TAclose">&times;</span>
			                    <div id="tCModalLabel">Tambah account</div>
			                    <form name="FormTA" id="FormTA" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableTA">
			                                <tr>
			                                	<td><label>NIP</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputNip" name="nip" value="" title="Masukkan NIP Lama pegawai yang ingin ditambahkan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>NIP Baru</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputNipB" name="nipbaru" value="" title="Masukkan NIP Baru pegawai yang ingin ditambahkan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Nama</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputNama" name="nama" value="" title="Masukkan nama pegawai yang ingin ditambahkan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Bagian</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputBagian" name="bagian" value="" title="Masukkan bagian dari pegawai yang ingin ditambahkan :&#013;-Kosong&#40; &#41; untuk Kepala Biro dan Kepala Bagian&#013;-bagian :&#013;  *pembinaan dan kesejahteraan pegawai&#013;  *pengembangan kompetensi pegawai&#013;  *tata usaha kepegawaian"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jabatan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea style="width: 100%" type="text" id="inputJabatan" name="jabatan" value="" form="FormTA" title="Jabatan dari pegawai yang ingin ditambahkan"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Password</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputPassword" name="password" value="" title="Jabatan dari pegawai yang ingin ditambahkan"></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Level</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input type="text" name="level" id="inputLevel" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' title="Masukkan level dari pegawai yang ingin ditambahkan :&#013;1 &#40;level untuk staff &#41;&#013;2 &#40;level untuk kepala Sub-Bagian &#41; &#013;3 &#40;level untuk Kepala Bagian &#41; &#013;4 &#40;level untuk Kepala Biro &#41;"></td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="TASubmit" class="TAbtnSubmit" onclick="validateTA()" title="Tambah Account Pegawai">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
			            	<div id="modalLJ" class="tCmodal">
			                    <div class="modalLJ-content">
			                        <span class="tutupLJ">&times;</span>
			                        <div id="tCModalLabel">Daftar jurnal milik: <label id="labelPemilikJurnal"></label></div>
			                        <div class="headerLJ">
			                        	<div class="dropdownCat" title="Klik untuk melihat jurnal pegawai berdasarkan :&#013;-Harian&#013;-Mingguan&#013;-Bulanan">
						                    <button class="dropbtn" id="repBtn"><span class="glyphicon glyphicon-chevron-down"></span> <span id="repbtnLabel" style="pointer-events: none;">Mingguan</span></button>
						                    <div class="dropdownCat-content" id="repContent">
				                        		<a onclick="selectReport('Harian')" href="#">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
						                        <a onclick="selectReport('Mingguan')" href="#">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
						                        <a onclick="selectReport('Bulanan')" href="#">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
						                    </div>
						                </div>
										<div class="LJSfilter" style="display: none">
											<div class="LJSpilihHari">
												<input id="LJSpilihHari" class="w163 h30" type="date" value="<?php echo date('Y-m-d');?>"/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;" title="Pilih tanggal"></div>
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
										<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalSemua('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok" title="klik untuk selesai meihat jurnal"></span></a>
			                        </div>
			                        <div id="tabelLJstaffContainer">
			                        </div>
			                    </div>
			                </div>
					</div>
				</div>
	
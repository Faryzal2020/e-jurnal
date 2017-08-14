				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="pilihanJurnal">
				                    <a onclick="selectJA('Pribadi')" href="#">Jurnal Saya</a>
				                    <a onclick="selectJA('Pegawai')" href="#">Jurnal Pegawai</a>
				                </div>
							</div>
						</div>
						<div class="tCbody">
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
											'<?php echo $JAnama; ?>',
											'<?php echo $JAbagian; ?>',
											'<?php echo $JAjabatan; ?>'
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
			                        <div id="tCModalLabel">Daftar Jurnal</div>
			                        <div class="headerLJ">
			                        </div>
			                        <div id="tableContainer">
			                        </div>
			                    </div>
			                </div>
						</div>
					</div>
				</div>
	
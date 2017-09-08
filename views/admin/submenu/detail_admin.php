				<div class="detail_tabContent">
					<div class="detail_tCWrapper">
						<div class="detail_tCheader">
							<div class="detail_tchbox">
								<div class="detail_pilihanJurnal">
				                    <a class="pjkBtn" id="tombol1" onclick="selectTYPE('sendiri')" href="#" title="klik untuk melihat jurnal anda">Jurnal Saya</a>
				                    <a class="pjkBtn" id="tombol2" onclick="selectTYPE('staff',<?php echo $idjabatan; ?>)" href="#" title="klik untuk melihat jurnal pegawai anda">Jurnal Pegawai</a>
				                </div>
							</div>
						</div>
						<div class="tCbody2" id="JAtabelADMIN" style="display:none">
                            <table class="detail_actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th >NIP</th>
									<th >Nama Pegawai</th>
									<th >Jabatan</th>
									<th style="min-width: 140px"></th>
								</tr>
								<?php
                                    $GAUnip = $_SESSION['nip'];
                                    $GAUsql = "SELECT user.nip, user.nama_pegawai, jabatan.nama_jabatan, count(jurnal.id_jurnal) as jumlah_jurnal FROM user LEFT JOIN jabatan ON user.id_jabatan = jabatan.id_jabatan LEFT JOIN jurnal ON user.nip = jurnal.nip WHERE user.nip = '$GAUnip' GROUP BY user.nip";            
                                    $hasil = mysqli_query($db, $GAUsql);
                                    
                                    while($al = mysqli_fetch_array($hasil)){
                                    
										$JAnip = $al[0];
										$JAnama = $al[1];
										$JAjabatan= $al[2];
								?>
								<tr>
									<td style="text-align: center;"><?php echo $JAnip; ?></td>
									<td><?php echo $JAnama; ?></td>
									<td><?php echo $JAjabatan; ?></td>
									<td style="text-align: center; width: 140px;">
								<?php
									if($al[3] != 0){
								?>
										<button class="tombol_detail" title="klik untuk melihat detail jurnal anda" onclick="lihatKalender('<?php echo $JAnip ?>','<?php echo $JAnama ?>')" style="font-weight: normal; padding: 3px;">Lihat Jurnal</button>
								<?php
									} else {
								?>
										<button class="tombol_detail disable"  title="Tidak ada jurnal">Jurnal Kosong</button>
								<?php
									}
								?>
									</td>
								</tr>
								<?php
									}
								?>
							</table>

                        </div>
						<div class="tCbody" id="JAtabelSTAFF" style="display:none">
							
						</div>
						<div id="ModalKal" class="tCmodal">
                            <div class="modalLJ-content">
			                    <span class="Kalclose">&times;</span>
                                <div class="w3-content" style="max-width:1600px">
                                	<div class="w3-row w3-padding w3-border">
                                        <div class="w3-col l12 s12">
                                            <div class="w3-container w3-white w3-margin w3-padding-large">
                                            	<br>
                                            	<div id="calendar_div">
                                            	</div>
                                        	</div>
                                    	</div>
                                	</div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
                        

	
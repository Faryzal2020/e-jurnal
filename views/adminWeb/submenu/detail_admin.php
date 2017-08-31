				<div class="detail_tabContent">
					<div class="detail_tCWrapper">
						<div class="detail_tCheader">
							<div class="detail_tchbox">
								<div class="detail_pilihanJurnal">
				                    <a class="pjkBtn" id="tombol1" onclick="selectTYPE('sendiri')" href="#" title="klik untuk melihat jurnal anda">Jurnal Saya</a>
				                    <a class="pjkBtn" id="tombol2" onclick="selectTYPE('staff')" href="#" title="klik untuk melihat jurnal pegawai anda">Jurnal Pegawai</a>
				                </div>
							</div>
						</div>
						<div class="tCbody2" id="JAtabelADMIN" style="display:none">
                            <table class="detail_actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th >NIP</th>
									<th >Nama Pegawai</th>
									<th >Bagian</th>
									<th >Jabatan</th>
									<th style="min-width: 80px"></th>
								</tr>
								<?php
									$GUAsql = "SELECT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.nip = '".$_SESSION['nip']."'";
									 
                                    
                                    $dapat = mysqli_query($db, $GUAsql);
                                    if(mysqli_num_rows($dapat) > 0){
                                        
                                    while($row = $dapat->fetch_assoc()){
                                        $JA_nip = $row['nip'];
                                    }
                                    
                                    $GAUsql = "SELECT * FROM user WHERE nip='$JA_nip'";            
                                    $hasil = mysqli_query($db, $GAUsql);
                                    
                                    while($al = $hasil->fetch_assoc()){
                                    
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
									<td style="text-align: center;     width: 80px;">
										<button class="tombol_detail"  title="klik untuk melihat detail jurnal anda"
                    onclick="lihatKalender('<?php echo $JAnip ?>')">Detail</button>
									</td>
								</tr>
								<?php
									}
                                }else {
                                        echo "<tr>";
                                        echo "<td align=center colspan='9'>Tidak ada data</td>";
                                        echo "</tr>";
                                        
                                }
								?>
							</table>

                        </div>
						<div class="tCbody" id="JAtabelSTAFF" style="display:none">
							<table class="detail_actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<th >NIP</th>
									<th >Nama Pegawai</th>
									<th >Bagian</th>
									<th >Jabatan</th>
									<th style="min-width: 80px"></th>
								</tr>
								<?php
									if ( $level == 2 ){
                                        $GEsql = "SELECT DISTINCT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.level < '$level' AND user.bagian = '$bagian'";
									} else {
                                        $GEsql = "SELECT DISTINCT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.level < '$level'";
									}
                                     
                                    
                                    $result = mysqli_query($db, $GEsql);
                                    if(mysqli_num_rows($result) > 0){
                                    while($row = $result->fetch_assoc()){
                                        $JA_nip = $row['nip'];
                                    
                                    
                                    $GAUsql = "SELECT * FROM user WHERE nip='$JA_nip'";            
                                    $hasil = mysqli_query($db, $GAUsql);
                                    
                                    while($al = $hasil->fetch_assoc()){
                                    
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
										<button class="tombol_detail" title="klik untuk melihat detail jurnal"
                    onclick="lihatKalender('<?php echo $JAnip ?>')">Detail</button>
									</td>
								</tr>
								<?php
									}
                                    }
                                }else {
                                        echo "<tr>";
                                        echo "<td align=center colspan='9'>Tidak ada data</td>";
                                        echo "</tr>";
                                        
                                }
								?>
							</table>
						</div>
					</div>
				</div>
                        <div id="ModalKal" class="tCmodal">
                            <div class="modalLJ-content">
			                        <span class="Kalclose">&times;</span>
                                        <div class="w3-content" style="max-width:1600px">
                                          <div class="w3-row w3-padding w3-border">
                                            <div class="w3-col l12 s12">
                                              <div class="w3-container w3-white w3-margin w3-padding-large">
                                                <h2 style="text-align: center";>Kalender</h2>
                                                <br>
                                                <div id="calendar_div">

                                                </div>
                                                </div>
                                            </div>
                                          </div>
                                        </div>
                            </div>
                        </div>

	
				<div class="detail_tabContent">
					<div class="detail_tCWrapper">
						<div class="detail_tCheader">
							<div class="detail_tchbox">
								<div class="detail_pilihanJurnal">
				                    <a class="pjBtn" id="tombol1" onclick="selectTYPE('sendiri')" href="#">Jurnal Saya</a>
				                    <a class="pjBtn" id="tombol2" onclick="selectTYPE('staff')" href="#">Jurnal Pegawai</a>
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
									$GUAsql = "SELECT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.nip = '".$_SESSION['nip']."' AND jurnal.tanggal_jurnal='$date'";
									 
                                    
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
										<button class="tombol_detail" 
                    onclick="detail_selectActivity('<?php echo $JAnip ?>',
                                                    '<?php echo $JAnama ?>',
                                                    '<?php echo $date ?>')"><a href="#">Detail</a></button>
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
                                        $GEsql = "SELECT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.level < '$level' AND user.bagian = '$bagian' AND jurnal.tanggal_jurnal='$date'";
									} else {
                                        $GEsql = "SELECT user.nip FROM user,jurnal WHERE user.nip=jurnal.nip AND user.level < '$level' AND jurnal.tanggal_jurnal='$date'";
									}
                                     
                                    
                                    $result = mysqli_query($db, $GEsql);
                                    if(mysqli_num_rows($result) > 0){
                                        
                                    while($row = $result->fetch_assoc()){
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
									<td style="text-align: center; width: 80px;">
										<button class="tombol_detail" 
                    onclick="detail_selectActivity('<?php echo $JAnip ?>',
                                                    '<?php echo $JAnama ?>',
                                                    '<?php echo $date ?>')"><a href="#">Detail</a></button>
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
					</div>
				</div>

	
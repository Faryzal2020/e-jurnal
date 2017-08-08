				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
							</div>
						</div>
						<div class="tCbody">
							<table class="DPtable" border="1" cellpadding="20" align="center">
								<tr>
									<th>No</th>
									<th>Nama Aktivitas</th>
									<th>Durasi(Menit)</th>
									<th>Kategori</th>
									<th></th>
								</tr>
								<?php
									while($al = mysqli_fetch_array($ALquery)) {
										$idAct = $al['id_aktivitas'];
										$namaAct = $al['nama_aktivitas'];
										$durasi = $al['durasi'];
										$namaCateg = $al['nama_kategori'];
								?>
								<tr>
									<td style="text-align: center;"><?php echo $idAct; ?></td>
									<td><?php echo $namaAct ?></td>
									<td style="text-align: center;"><?php echo $durasi ?></td>
									<td><?php echo $namaCateg ?></td>
									<td style="text-align: center; width: 80px;">
										<a class="selectActbtn" onclick="selectActivity(
											'<?php echo $idAct; ?>',
											'<?php echo $namaAct; ?>',
											'<?php echo $durasi; ?>',
											'<?php echo $namaCateg; ?>'
										)">Pilih</a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
							<div id="tCModal" class="modal">
			                    <div class="modal-content">
			                        <span class="close">&times;</span>
			                        <div id="tCModalLabel">Submit Jurnal</div>
			                        <form name="FormSJ" method="post" action="">
			                            <table border="1" cellpadding="3" cellspacing="0" width="500" align="center" class="tableSJ">
			                                <tr><input type="hidden" name="tcm_idAct" class="tcm_idAct" value=""/></tr>
			                                <tr>
			                                    <td><label>Aktivitas yang dipilih</label></td>
			                                    <td>: <label id="tcmNamaAct"></label></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Durasi</label></td>
			                                	<td>: <label id="tcmDurasi"></label></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Kategori</label></td>
			                                	<td>: <label id="tcmNamaCat"></label></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Volume</label></td>
			                                    <td>: <select name="volume">
			                                    <?php
			                                    	for ($n = 1; $n <= 10; $n++){
			                                    ?>
			                                    		<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
			                                    <?php
			                                    	}
			                                    ?>
			                                    </select> </td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Volume</label></td>
			                                	<td>: <input type="text" name="volumeType" placeholder="Contoh: Buku, Lembar, dll"></td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                    <td><label>Waktu Mulai</label></td>
			                                    <td>: <input type="date" name="tglMulai" value=""></td>
			                                    <td> <input type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' max="24" min="0" maxlength="2">
												</td>
			                                </tr>
			                                <tr>
			                                    <td><label>Waktu Selesai</label></td>
			                                    <td>: <input type="date" name="tglSelesai" value=""></td>
			                                    <td>
												</td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jenis Aktifitas</label></td>
			                                	<td>: <select name="actType">
			                                			<option value="umum">Umum</option>
			                                			<option value="skp">SKP</option>
			                                	</td>
			                                    <td></td>
			                                </tr>
			                                <tr>
			                                    <td colspan="3" align="right"><input type="submit" name="tcmSubmit" value="Submit" class="btnSubmit"></td>
			                                </tr>
			                            </table>
			                        </form>
			                    </div>
			                </div>
			                <script type="text/javascript">
								var modal = document.getElementById('tCModal');
						        var namaAct = document.getElementById('tcmNamaAct');
						        var durasiAct = document.getElementById('tcmDurasi');
						        var namaCat = document.getElementById('tcmNamaCat');
						        var idInput = document.getElementsByClassName('tcm_IDAct')[0];
						        var span = document.getElementsByClassName("close")[0];
						        function selectActivity(id, nama, durasi, cat){
						        	console.log(id + nama + durasi + cat);
						            modal.style.display = "block";
						            namaAct.innerHTML = nama;
						            durasiAct.innerHTML = durasi;
						            namaCat.innerHTML = cat;
						            idInput.value = i;
						        }
						        span.onclick = function() {
						            modal.style.display = "none";
						        }
						        window.onclick = function(event){
						            if(event.target == modal){
						                modal.style.display = "none";
						            }
						        }
						    </script>
						</div>
					</div>
				</div>
	
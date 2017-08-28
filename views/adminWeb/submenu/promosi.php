				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
				                <div class="SAwrapper">
				                	<div class="searchIconWrapper">
				                		<span id="iconSearchPeg" class="glyphicon glyphicon-search"></span>
				                	</div>
									<div class="searchPegawai">
					                    <input type="text" id="pegSearch" onkeyup="searchAcc()" placeholder="Search Nama Pegawai" style="width: 100%; padding-left: 10px;">
					                </div>
						            Result: 
						            <label id="pegCount">0</label>
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
										<a class="selectActbtn" onclick="editAccount(
											'<?php echo $JAnip; ?>',
											'<?php echo $JAnama; ?>',
											'<?php echo $JAbagian; ?>',
											'<?php echo $JAjabatan; ?>',
											'<?php echo $JAlevel; ?>',
											'<?php echo $al['password']; ?>'
										)">Edit Account</a>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
						<div id="ModalEA" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="EAclose">&times;</span>
			                    <div id="tCModalLabel">Edit account milik: <label id="labelPemilikAccount"></label></div>
			                    <form name="FormEA" id="FormEA" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableEA">
			                                <tr><input type="hidden" name="EAnip" id="EAnip" value=""/></tr>
			                                <tr>
			                                	<td><label>Nama</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputNama" name="nama" value=""></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Bagian</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputBagian" name="bagian" value=""></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Jabatan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><textarea style="width: 100%" type="text" id="inputJabatan" name="jabatan" value="" form="FormEA"></textarea></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Password</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="inputPassword" name="password" value=""></td>
			                                </tr>
			                                <tr>
			                                	<td><label>Level</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input type="text" name="level" id="inputLevel" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="EASubmit" class="EAbtnSubmit" onclick="validateEA()">Submit</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
					</div>
				</div>
	
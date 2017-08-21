
				<div class="content_profile">
					<div class="content_wrapper_profile">
						<div class="profile_header">
							<label>DATA PEMILIK ACCOUNT</label>
						</div>
						<div class="body_profile">
							<table class="actTable" id="actTable" border="1" cellpadding="20" align="center">
								<tr>
									<td><label>NIP</label></td>
									
									<td><span id="nip"><?php echo $nip; ?></span></td>
								</tr>
								<tr>
									<td><label>NIP Baru</label></td>
									<td><span id="nipb"><?php echo $nipb; ?></span></td>
								</tr>
								<tr>
									<td><label>Nama</label></td>
									<td><span id="nama"><?php echo $nama; ?></span></td>
								</tr>
								<tr>
									<td><label>Jabatan</label></td>
									<td><span id="jabatan"><?php echo $jabatan; ?></span></td>
								</tr>
							</table>
						</div>
					</div>
                    <div class="UPwrapper">
                    	<button class="tombol_ubah" onclick="pass_selectActivity()">Ubah Password</button>
                    </div>
		            <div class="content">
                        <div class="ubah_ubah">
                            <div id="ubah_ubah1">
                                <?php require_once "views/admin/submenu/ubahpassword.php";?>
                            </div>
                        </div>
                    </div>
				</div>
	
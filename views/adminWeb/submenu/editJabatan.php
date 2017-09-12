				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								
							</div>
						</div>
						<div class="tCbody" id="EJBTableWrapper" style="padding-right: 45px;"></div>
						<div id="ModalTJ" class="tCmodal">
			                <div class="tCmodal-content">
			                    <span class="TJclose closeModal">&times;</span>
			                    <div id="tCModalLabel">Edit Jabatan <label id="labelAtasan"></label></div>
			                    <form name="FormEJB" id="FormEJB" method="post" action="">
			                        <table border="0" cellpadding="8" cellspacing="0" width="650" align="center" class="tableEJB">
			                                <tr><input type="hidden" name="TJidJabatan" id="TJidJabatan" value=""/></tr>
			                                <tr>
			                                	<td><label>Nama Jabatan</label></td>
			                                	<td>:</td>
			                                    <td colspan="3"><input style="width: 100%" type="text" id="TJnamaJabatan" name="nama" value="" title="Masukkan nama baru jabatan"></td>
			                                </tr>
			                                <tr>
			                                    <td colspan="5" align="right" style="height: 40px; padding: 10px; padding-top: 20px"><a name="EJBSubmit" class="EJBbtnSubmit pencetan" onclick="validateEJB()">Simpan</a></td>
			                                </tr>
			                        </table>
			                    </form>
			                </div>
			            </div>
                        <div class="lihat_pegawai" id="EJBlihat_pegawai">
                            <div class="lihat_pegawai-content">
                            <span class="EJBtutup_lihat closeModal">&times;</span>
                            <div id="detail_label">Detail Jurnal</div>
                            <div class="detail_jurnal">
                            </div>
                            <div id="tablelihat">
                            </div>
                            </div>
                        </div>
					</div>
				</div>
	
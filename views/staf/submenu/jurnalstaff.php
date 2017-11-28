				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="repBtn" title="klik untuk melihat jurnal anda dan pegawai anda berdasarkan :&#013;-Harian &#91;perhari&#93;&#013;-Periode &#91;perjenjang waktu yang dipilih&#93; "><span id="repbtnLabel" style="pointer-events: none;">Harian</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="repContent">
				                        <a onclick="selectReport('Harian')" href="#" title="melihat jurnal berdasarkan tanggal"><span class="glyphicon glyphicon-chevron-right"></span> Harian</a>
				                        <a onclick="selectReport('Periode')" href="#" title="melihat jurnal dari tanggal A sampai tanggal B"><span class="glyphicon glyphicon-chevron-right"></span> Periode</a>
				                    </div>
				                </div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihHari">
										<input id="LJSpilihHari" class="w163 h30" data-format="YYYY-MM-DD" data-template="D MMM YYYY" type="hidden" value="<?php echo date('Y-m-d');?>" title="pilih tanggal"/>
									</div>
								</div>
								<div class="LJSfilter" style="display: none">
									<div class="LJApilihPeriode">
										Dari:
											<input id="LJSpilihAwal" class="w163 h30" data-format="YYYY-MM-DD" data-template="D MMM YYYY" type="hidden" value="<?php echo date('Y-m-d', strtotime("-1 month", strtotime(date('Y-m-d'))));?>"/>
										Sampai:
											<input id="LJSpilihAkhir" class="w163 h30" data-format="YYYY-MM-DD" data-template="D MMM YYYY" type="hidden" value="<?php echo date('Y-m-d');?>"/>
									</div>
								</div>
								<input id="LJSfilterType" type="hidden" value="">
								<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')" style="height: 30px;"><span class="glyphicon glyphicon-ok" title="klik untuk lihat jurnal"></span></a>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
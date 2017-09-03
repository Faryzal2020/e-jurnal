				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="repBtn" title="melihat draft jurnal berdasarkan :&#013;&#183; harian&#013;&#183; mingguan&#013;&#183; bulanan"><span id="repbtnLabel" style="pointer-events: none;">Harian</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="repContent">
				                        <a onclick="selectReport('Harian')" href="#" title="melihat jurnal berdasarkan tanggal"><span class="glyphicon glyphicon-chevron-right"></span> Harian</a>
				                        <a onclick="selectReport('Periode')" href="#" title="melihat jurnal dari tanggal A sampai tanggal B"><span class="glyphicon glyphicon-chevron-right"></span> Periode</a>
				                    </div>
				                </div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihHari">
										<input id="LJSpilihHari" class="w163" type="date" value="<?php echo date('Y-m-d');?>" title="pilih tanggal"/>
									</div>
								</div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihPeriode">
										<input id="LJSpilihAwal" class="w163" type="date" value="<?php echo date("Y-m-d", strtotime("-1 month", strtotime(date("Y-m-d"))));?>" title="pilih minggu"/>
										<input id="LJSpilihAkhir" class="w163" type="date" value="<?php echo date('Y-m-d');?>" title="pilih minggu"/>
									</div>
								</div>
								<input id="LJSfilterType" type="hidden" value="">
								<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok" title="klik untuk lihat jurnal"></span></a>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="pilihanJurnal">
				                    <a class="pjBtn" id="pjBtn1" title="Klik untuk melihat jurnal anda" onclick="selectJA('Pribadi')" href="#">Jurnal Saya</a>
				                    <a class="pjBtn" id="pjBtn2" title="Klik untuk melihat jurnal pegawai anda" onclick="selectJA('Pegawai',<?php echo $idjabatan; ?>)" href="#">Jurnal Pegawai</a>
				                </div>
				                <div class="PJAfilter" id="PJAfilter">
					                <div class="dropdownCat">
					                    <button class="dropbtn" title="Pilih metode untuk melihat jurnal berdasarkan :&#013;-Harian &#91;perhari&#93;&#013;-Periode &#91;perjenjang waktu yang dipilih&#93; " id="filBtn"><span id="PJAbtnLabel" style="pointer-events: none;">Mingguan</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
					                    <div class="dropdownCat-content" id="filContent">
				                        	<a onclick="JAfilter('Harian')" href="#"><span class="glyphicon glyphicon-chevron-right"></span> Harian</a>
					                        <a onclick="JAfilter('Periode')" href="#"><span class="glyphicon glyphicon-chevron-right"></span> Periode</a>
					                    </div>
					                </div>
									<div class="LJAfilter" style="display: none">
										<div class="LJApilihHari">
											<input id="LJApilihHari" class="w163 h30" type="text" value="<?php echo date('Y-m-d');?>"/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;"></div>
										</div>
									</div>
					                <div class="LJAfilter">
										<div class="LJApilihPeriode">
                                            Dari:
											<input type="text" id="LJApilihAwal" class="w163 h30" title="Masukkan tanggal awal periode yang ingin anda lihat" value="<?php echo date("Y-m-d", strtotime("-1 month", strtotime(date('Y-m-d'))));?>" />
                                            Hingga:
											<input type="text" id="LJApilihAkhir" class="w163 h30" title="Masukkan tanggal akhir periode yang ingin anda lihat" value="<?php echo date("Y-m-d");?>" />

										</div>
									</div>
									<input id="LJAfilterType" type="hidden" value=""/>
									<a class="LJAbtn" id="LJAbtn" onclick="lihatJurnalAdmin('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok"></span></a>
								</div>
							</div>
						</div>
						<div class="tCbody2" id="JAtabelA">
						</div>
						<div class="tCbody" id="JAtabelS" style="display:none">
							<div id="JAtabelSContainer">
							</div>
							<div id="modalLJ" class="tCmodal">
			                    <div class="modalLJ-content">
			                        <span class="tutupLJ close">&times;</span>
			                        <div id="tCModalLabel">Daftar jurnal milik: <label id="labelPemilikJurnal"></label></div>
			                        <div class="headerLJ">
			                        	<div class="dropdownCat">
						                    <button class="dropbtn" title="Pilih metode untuk melihat jurnal berdasarkan :&#013;-Harian &#91;perhari&#93;&#013;-Periode &#91;perjenjang waktu yang dipilih&#93; " id="repBtn"><span class="glyphicon glyphicon-chevron-down"></span> <span id="repbtnLabel" style="pointer-events: none;">Mingguan</span></button>
						                    <div class="dropdownCat-content" id="repContent">
				                        		<a onclick="selectReport('Harian')" href="#" title="melihat jurnal berdasarkan tanggal"><span class="glyphicon glyphicon-chevron-right"></span> Harian</a>
				                        		<a onclick="selectReport('Periode')" href="#" title="melihat jurnal dari tanggal A sampai tanggal B"><span class="glyphicon glyphicon-chevron-right"></span> Periode</a>
						                    </div>
						                </div>
										<div class="LJSfilter" style="display: none">
											<div class="LJSpilihHari">
												<input id="LJSpilihHari" class="w163 h30" type="text" value="<?php echo date('Y-m-d');?>"/><div class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;"></div>
											</div>
										</div>
										<div class="LJSfilter" style="display: none">
											<div class="LJSpilihPeriode">
                                                Dari:
												<input id="LJSpilihAwal" class="w163" type="text" value="<?php echo date('Y-m-d', strtotime("-1 month", strtotime(date('Y-m-d'))));?>" title="Masukkan tanggal awal periode yang ingin anda lihat"/>
                                                Hingga:
												<input id="LJSpilihAkhir" class="w163" type="text" value="<?php echo date('Y-m-d');?>" title="Masukkan tanggal akhir periode yang ingin anda lihat"/>
											</div>
										</div>
										<input id="LJSfilterType" type="hidden" value="">
										<input id="LJSnip" type="hidden" value="">
										<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok" title="klik untuk  meihat jurnal pegawai"></span></a>
			                        </div>
			                        <div id="tabelLJstaffContainer">
			                        </div>
			                    </div>
			                </div>
						</div>
					</div>
				</div>
	
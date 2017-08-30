				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="repBtn" title="melihat draft jurnal berdasarkan :&#013;&#183; harian&#013;&#183; mingguan&#013;&#183; bulanan"><span id="repbtnLabel" style="pointer-events: none;">Harian</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="repContent">
				                        <a onclick="selectReport('Harian')" href="#" title="klik untuk melihat draft jurnal berdasarkan harian">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectReport('Mingguan')" href="#"title="klik untuk melihat draft jurnal berdasarkan mingguan">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectReport('Bulanan')" href="#" title="klik untuk melihat draft jurnal berdasarkan bulanan">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                    </div>
				                </div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihHari">
										<input id="LJSpilihHari" class="w163" type="date" value="<?php echo date('Y-m-d');?>" title="pilih tanggal"/>
									</div>
								</div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihMinggu">
										<input id="LJSpilihMinggu" class="w163" type="text" value="<?php echo date('Y-W');?>" title="pilih minggu"/>
									</div>
								</div>
				                <div class="LJSfilter" style="display: none">
									<div class="LJSpilihTahun">
										<select id="LJSpilihTahun" class="h30" title="pilih tahun">
											<?php
												$lsjTahunA = date("Y") - 10;
												$lsjTahunB = date("Y");
												for($i=$lsjTahunA; $i < $lsjTahunB; $i++){
											?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php
												}
											?>
											<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
										</select>
									</div>
									<div class="LJSpilihBulan">
										<select id="LJSpilihBulan" class="h30" title="pilih bulan">
											<?php
												$m = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
												for($i=1;$i<=12;$i++){
													$x = str_pad($i,2,0, STR_PAD_LEFT);
													if($x == date("m")){
												?>
											<option value="<?php echo $x; ?>" selected><?php echo $m[$i-1]; ?></option>
												<?php
													} else {
												?>
											<option value="<?php echo $x; ?>"><?php echo $m[$i-1]; ?></option>
												<?php
													}
												}
												?>
										</select>
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
				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="repBtn"><span id="repbtnLabel" style="pointer-events: none;">Harian</span> <span class="glyphicon glyphicon-triangle-bottom" style="pointer-events: none;"></span></button>
				                    <div class="dropdownCat-content" id="repContent">
				                        <a onclick="selectReport('Harian')" href="#">Harian <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectReport('Mingguan')" href="#">Mingguan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                        <a onclick="selectReport('Bulanan')" href="#">Bulanan <span class="glyphicon glyphicon-chevron-right"></span></a>
				                    </div>
				                </div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihHari">
										<input id="LJSpilihHari" class="w163" type="date" value="<?php echo date('Y-m-d');?>"/>
									</div>
								</div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihMinggu">
										<input id="LJSpilihMinggu" class="w163" type="text" value="<?php echo date('Y-W');?>"/>
									</div>
								</div>
				                <div class="LJSfilter" style="display: none">
									<div class="LJSpilihTahun">
										<select id="LJSpilihTahun" class="h30">
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
										<select id="LJSpilihBulan" class="h30">
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
								<a class="LJSbtn" id="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')"><span class="glyphicon glyphicon-ok"></span></a>
								<div class="wrapperTotalWaktu">
									Total Jam Produktif: 
									<label id="labelTotalWaktu"></label>
								</div>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
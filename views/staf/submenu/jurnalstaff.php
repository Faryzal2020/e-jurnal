				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="dropdownCat">
				                    <button class="dropbtn" id="repBtn"></button>
				                    <div class="dropdownCat-content" id="repContent">
				                        <a onclick="selectReport('Mingguan')" href="#">Mingguan</a>
				                        <a onclick="selectReport('Bulanan')" href="#">Bulanan</a>
				                    </div>
				                </div>
								<div class="LJSfilter" style="display: none">
									<div class="LJSpilihMinggu">
										<input id="LJSpilihMinggu" type="text" value="">
									</div>
								</div>
				                <div class="LJSfilter" style="display: none">
									<div class="LJSpilihTahun">
										<select id="LJSpilihTahun">
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
										<select id="LJSpilihBulan">
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
								<a class="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')">Ok</a>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
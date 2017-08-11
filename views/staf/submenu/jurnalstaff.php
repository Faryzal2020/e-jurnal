				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div id="LJSpilihTahun" class="LJSpilihTahun">
									<select>
										<?php
											$lsjTahunA = date("Y") - 10;
											$lsjTahunB = date("Y");
											for($i=$lsjTahunA; $i <= $lsjTahunB; $i++){
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div id="LJSpilihBulan" class="LJSpilihBulan">
									<select>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
									</select>
								</div>
								<a class="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')">Ok</a>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
	
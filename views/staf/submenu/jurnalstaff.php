				<div class="tabContent">
					<div class="tCWrapper">
						<div class="tCheader">
							<div class="tchbox">
								<div class="LJSpilihTahun">
									<select id="LJSpilihTahun">
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
								<div class="LJSpilihBulan">
									<select id="LJSpilihBulan">
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
								</div>
								<a class="LJSbtn" onclick="lihatJurnalStaff('<?php echo $nip; ?>')">Ok</a>
							</div>
						</div>
			            <div id="tabelLJstaffContainer">
			            </div>
					</div>
				</div>
	
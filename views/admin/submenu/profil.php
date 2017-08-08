				<?php
					$myuserid = $_SESSION['userid'];
					
					$sql = "SELECT * FROM users WHERE users.userid='$myuserid'";
					
					$result = mysqli_query($db,$sql);
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

					if(count($_POST)>0) {
						if($_POST["currentPassword"] == $row["Password"]) {
							mysqli_query($db,"UPDATE users SET Password='" . $_POST["newPassword"] . "' WHERE Username='" . $_SESSION["username"] . "'");
							$message = "Password Changed";
							echo '<script>window.onload=function(){setActive(2)}</script>';
						} else $message = "Current Password is not correct";
					}
				?>
				<table class="tabContent" align="center">
					<tr class="DPwrapper">
						<div class="DPfooter">
							<div class="DPheader">
								<label>DATA PEMILIK ACCOUNT</label>
							</div>
							<table class="DPtable" border="0" cellpadding="20" align="center">
								<tr>
									<td><label>ID</label></td>
									<td><span>:</span></td>
									<td><span id="ID"><?php echo $row["userid"]; ?></span></td>
								</tr>
								<tr>
									<td><label>Nama</label></td>
									<td><span>:</span></td>
									<td><span id="nama"><?php echo $row["Nama"]; ?></span></td>
								</tr>
								<tr>
									<td><label>Username</label></td>
									<td><span>:</span></td>
									<td><span id="username"><?php echo $row["Username"]; ?></span></td>
								</tr>
								<tr>
									<td><label>Email</label></td>
									<td><span>:</span></td>
									<td><span id="email"><?php echo $row["Email"]; ?></span></td>
								</tr>
								<tr>
									<td><label>No HP</label></td>
									<td><span>:</span></td>
									<td><span id="telepon"><?php echo $row["NoHP"]; ?></span></td>
								</tr>
									<td><label>TTL</label></td>
									<td><span>:</span></td>
									<td><span id="ttl"><?php echo $row["TempatLahir"];?> <?php echo $row["TanggalLahir"];?></span></td>
								</tr>
							</table>
						</div>
					</tr>
					<tr class="CPform">
						<div class="CPheader">
							MENU GANTI PASSWORD
						</div>
						<div class="form">
							<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
								<div class="form_container" >
									<table border="0" cellpadding="3" cellspacing="0" width="500" align="center" class="tblSaveForm">
										<tr>
											<td><label>Current Password</label></td>
											<td><input type="password" name="currentPassword" class="txtField"/></td>
										</tr>
										<tr>
											<td></td>
											<td class="required"><span id="currentPassword"> </span></td>
										</tr>
										<tr>
											<td><label>New Password</label></td>
											<td><input type="password" name="newPassword" class="txtField"/></td>
										</tr>
										<tr>
											<td></td>
											<td class="required"><span id="newPassword"> </span></td>
										</tr>
										<tr>
											<td><label>Confirm Password</label></td>
											<td><input type="password" name="confirmPassword" class="txtField"/></td>
										</tr>
										<tr>
											<td></td>
											<td class="required"><span id="confirmPassword"> </span></td>
										</tr>
										<tr >
											<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
										</tr>
									</table>
									<div id="message"><?php if(isset($message)) { echo $message; } ?></div>
								</div>
							</form>
						</div>
                	</tr>
				</table>
	
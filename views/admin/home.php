	<div class="wrapper">
	    <div class="header">
	        <div class="logo"></div>
			<div class="logo_panel"></div>
			<div class="logo_wrapper">
			    <img class="logo_setwapres" src="logoS.png" height="110" alt=""/>
			</div>
			<div class="judul">
				E-Jurnal
			</div>
			<div class="userpanel">
				<div class="userpanelwrapper">
				    <h1> LOGGED IN AS: </h1>
					<table class="userpaneltable" border="0">
						<tr>
							<td class="foto"><div class="userphoto">
                                <a onclick ="ubah_foto()" title='Klik untuk upload/ubah foto'>
									  <?php 
									  	  	$query = "SELECT * FROM user WHERE nip='".$_SESSION['nip']."'";
									  		$q = mysqli_query($db,$query);
									  		$row = mysqli_fetch_assoc($q);

									  		if(!empty($row['foto'])){
										  ?>
									  		<img style="width:100px;height:135px;" src=<?php echo "images/".$row['foto'];?>></a>
									  <?php }else{ ?>
									  		<img style="width:100px;height:135px;" src="images/empty.jpg"></a>
									  <?php } ?></div></td>
						</tr>
						<tr>
							<td class="username"> <?php echo $nama; ?> </td>
						</tr>
						<tr>
							<td class="jabatan"> <?php echo $jabatan; ?> </td>
						</tr>
						<tr>
							<td class="userid"> <?php echo $nip; ?> </td>
						</tr>
					</table> 
					<div class="logoutbtn"><a title="" href="logout.php">LOG OUT <span class="glyphicon glyphicon-log-out"></span></a></div>
				</div>
			</div>
	    </div>
	</div>
    <div class="pagebody">
    	<div class="sidenav">
    		<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-calendar"></span><a href="#">Kalender</a></li>
			</ul>
    		<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-file"></span><a href="#">Submit Jurnal</a></li>
			</ul>
    		<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-list-alt"></span><a href="#">Daftar Jurnal</a></li>
			</ul>
			<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-user"></span><a href="#">Profil Anda</a></li>
			</ul>
			<?php
				if ($level == 99){
			?>
			<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-edit"></span><a href="#">Edit Account</a></li>
			</ul>
			<?php
				}
			?>
        </div> 
		<div class="content">
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/admin/submenu/kalender.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/admin/submenu/submit.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/admin/submenu/jurnaladmin.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/admin/submenu/profil.php";?>
				</div>
			</div>
            <div class="ubahfoto">
				<div class="ubahfoto1">
					<?php require_once "views/admin/submenu/kalender.php";?>
				</div>
			</div>
			<?php
				if ($level == 99 || $level == 98){
			?>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/admin/submenu/promosi.php";?>
				</div>
			</div>
			<?php
				}
			?>
		</div>
    </div>


                <div class="content_profile">
					<div class="foto_select" id="foto_select">
                        <div class="foto_select-content">
                            <span class="foto_tutup">&times;</span>
                            <form action = "upload.php" method="post" enctype="multipart/form-data">
                            <table width=50% cellpadding=4 cellspacing=1 border=0 valign=top>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td><label>Pilih Foto</label></td>
                                    <td style="width:50px;"></td>
                                    <td><input type="file" name="pilihFoto" id="exampleInputFile" required="required"/><p class="help-block">Ukuran Maksimal foto harus 1 MB</p></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td colspan=2></td>
                                    <td><button type="submit" name="savefoto" class="btn blue">Upload</button></td>
                                </tr>
                            </table>
                        </form>

                            </div>
                        </div>
                    </div>
                </div>

                                      


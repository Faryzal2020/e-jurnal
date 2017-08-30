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
                                <a class="tampil-foto" onclick ="ubah_foto()" title='Klik untuk upload & ubah foto'>
									  <?php 
									  	  	$query = "SELECT * FROM user WHERE nip='".$_SESSION['nip']."'";
									  		$q = mysqli_query($db,$query);
									  		$row = mysqli_fetch_assoc($q);

									  		if(!empty($row['foto'])){
										  ?>
									  		<img  src=<?php echo "images/".$row['foto'];?>></a>
									  <?php }else{ ?>
									  		<img  src="images/empty.jpg"></a>
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
					<div class="logoutbtn" ><a class="logout" title="Log out session" href="logout.php" >Logout <span class="glyphicon glyphicon-log-out"></span></a></div>
				</div>
			</div>
	    </div>
	</div>
    <div class="pagebody">
    	<div class="sidenav">
    		<ul>
				<li class="menu-item" title="Di menu kalender ini anda dapat melihat&#013;semua jurnal milik semua pegawai&#013;dengan tampilan kalender." ><span class="glyphicon glyphicon-calendar"></span><a href="#">Kalender</a></li>
			</ul>
    		<ul>
				<li class="menu-item" title="Di menu activity list ini anda bisa&#013;melihat daftar activity yang ada,&#013;menambahkan activity baru dan&#013;mengedit detail activity." ><span class="glyphicon glyphicon-file"></span><a href="#">Activity List</a></li>
			</ul>
			<ul>
				<li class="menu-item" title="Di menu Account List ini anda dapat&#013;melihat jurnal draft dan jurnal terkirim&#013;dari tiap pegawai, menambah pegawai baru,&#013;dan mengedit profil account pegawai."><span class="glyphicon glyphicon-edit"></span><a href="#">Edit Account</a></li>
			</ul>
			<ul class="menuProfil">
				<li class="menu-item"  title="Di menu profile anda dapat melihat data&#013;anda dan mengubah password." ><span class="glyphicon glyphicon-user"></span><a href="#">Profile  </a></li>
			</ul>
        </div> 
		<div class="content">
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/kalender.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/actList.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/accountList.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/profil.php";?>
				</div>
			</div>
		</div>
    </div>


                <div class="content_profile">
					<div class="foto_select" id="foto_select">
                        <div class="foto_select-content">
                            <span class="foto_tutup">&times;</span>
                            <form action = "upload.php" method="post" enctype="multipart/form-data">
                            <table width=100% cellpadding=4 cellspacing=1 border=0 valign=top>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td style="width:20%;"><label>Pilih Foto</label></td>
                                    <td ></td>
                                    <td style="width:50px;"><input type="file" name="pilihFoto" id="exampleInputFile" required="required"/><p class="help-block">Ukuran Maksimal foto harus 1 MB</p></td>
                                </tr>
                                <tr>
                                    <td style="width:20px;"></td>
                                    <td colspan=2></td>
                                    <td><button type="submit" name="savefoto" class="btn left blue">Upload</button></td>
                                </tr>
                            </table>
                        </form>

                            </div>
                        </div>
                    </div>
                </div>

                                      


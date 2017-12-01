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
									  <?php 
									  	  	$query = "SELECT * FROM user WHERE nip='".$_SESSION['nip']."'";
									  		$q = mysqli_query($db,$query);
									  		$row = mysqli_fetch_assoc($q);

									  		if(!empty($row['foto'])){
										  ?>
                                            <a class="tampil-foto" onclick ="ubah_foto()" title='Klik untuk upload/ubah foto' style='background-image: url("<?php echo "images/".$row['foto'];?>"); background-size: cover; background-position: center;'></a>
									  <?php }else{ ?>
                                            <a class="tampil-foto" onclick ="ubah_foto()" title='Klik untuk upload/ubah foto' style='background-image: url("images/empty.jpg"); background-size: cover; background-position: center;'>
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
					<div class="logoutbtn" ><a class="logout" title="Log out session" href="logout.php" style="text-decoration: none;">Logout <span class="glyphicon glyphicon-log-out" ></span></a></div>
				</div>
			</div>
	    </div>
	</div>
    <div class="pagebody">
    	<div class="sidenav">
    		<ul>
				<li class="menu-item" title="Di menu Activity list ini anda bisa&#013;melihat daftar aktivitas yang ada,&#013;menambahkan aktivitas baru dan&#013;menghapus aktivitas." ><span class="glyphicon glyphicon-list"></span><a href="#">Activity List</a></li>
			</ul>
			<ul>
				<li class="menu-item" title="Di menu Jabatan ini anda dapat&#013;mengedit,menambah, dan menghapus jabatan&#013;melakukan promosi pegawai, dan menambah pegawai baru."><span class="glyphicon glyphicon-edit"></span><a href="#">Jabatan</a></li>
			</ul>
			<ul>
				<li class="menu-item" id="menuHL" title="Menu ini digunakan untuk menambahkan,&#013;mengedit, dan menghapus hari libur.&#013;sehingga submit jurnal bulanan dapat&#013;dipindah ke hari selanjutnya apabila jatuh&#013;pada hari libur."><span class="glyphicon glyphicon-calendar"></span><a href="#">Hari Libur</a></li>
			</ul>
			<ul>
				<li class="menu-item" id="menuHL" title="Menu ini digunakan untuk melihat,mengedit, dan menyetujui&#013;Aktivitas yang diajukan Eselon 1 dan 2."><span class="glyphicon glyphicon-calendar"></span><a href="#">List Aktivitas</a></li>
			</ul>
			<ul class="menuProfil">
				<li class="menu-item"  title="Di menu profile anda dapat melihat data&#013;anda dan mengubah password." ><span class="glyphicon glyphicon-user"></span><a href="#">Profile  </a></li>
			</ul>
        </div> 
		<div class="content">
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/actList.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/editJabatan.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/harilibur.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/adminWeb/submenu/listajuan.php";?>
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
                    <table width=100% cellpadding=4 cellspacing=1 border=0 valign=top>\
                        <tr>
                        	<td style="width:20%;"><label>Pilih Foto</label></td>
                        	<td ></td>
                        	<td style="width:50px;"><input type="file" name="pilihFoto" id="exampleInputFile" required="required"/><p class="help-block">Ukuran Maksimal foto harus 5 MB</p></td>
                        </tr>
                        <tr>
                            <td style="width:20px;"></td>
                            <td colspan=2></td>
                            <td style="width: 20%"><button type="submit" name="savefoto" class="btnGantiFoto">Upload</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

                                      


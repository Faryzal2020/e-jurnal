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
					<div class="logoutbtn" title=""><a class="logout" title="klik untuk log-out account" href="logout.php" >Logout <span class="glyphicon glyphicon-log-out"></span></a></div>
				</div>
			</div>
	    </div>
	</div>
   <div class="pagebody">
    	<div class="sidenav">
    		<ul>
				<li class="menu-item" title="klik untuk melihat jurnal anda" ><span class="glyphicon glyphicon-calendar"></span><a href="#">Lihat Jurnal</a></li>
			</ul>
    		<ul>
				<li class="menu-item" title="klik untuk membuat jurnal" ><span class="glyphicon glyphicon-file"></span><a href="#">Input Jurnal</a></li>
			</ul>
    		<ul>
				<li class="menu-item" title="klik untuk melihat :&#013;-Jurnal yang masih bisa diedit dan dihapus" ><span class="glyphicon glyphicon-list-alt"></span><a href="#">Edit Jurnal</a></li>
			</ul>
    		<ul>
				<li class="menu-item" title="klik untuk mencetak jurnal anda berdasarkan :&#013;-Harian &#91;perhari&#93;&#013;-Periode &#91;perjenjang waktu yang dipilih&#93; " ><span class="glyphicon glyphicon-list-alt"></span><a href="#">Print Jurnal</a></li>
			</ul>
			<ul class="menuProfil">
				<li class="menu-item"  title="klik untuk :&#013;-Melihat profil&#013;-Mengubah password" ><span class="glyphicon glyphicon-user"></span><a href="#">Profile  </a></li>
			</ul>
        </div> 
		<div class="content">
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/staf/submenu/kalender_staff.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/staf/submenu/submit.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/staf/submenu/draftjurnal.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/staf/submenu/jurnalstaff.php";?>
				</div>
			</div>
			<div class="tab">
				<div class="tabN">
					<?php require_once "views/staf/submenu/profil_staff.php";?>
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

                                      


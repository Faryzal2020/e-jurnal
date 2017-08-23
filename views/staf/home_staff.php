	<div class="wrapper">
	    <div class="header">
	        <div class="logo"></div>
			<div class="logo_panel"></div>
			<div class="logo_wrapper">
			    <img src="logoS.png" height="110" alt=""/>
			</div>
			<div class="judul">
				E-Jurnal
			</div>
			<div class="userpanel">
				<div class="userpanelwrapper">
				    <h1> LOGGED IN AS: </h1>
					<table class="userpaneltable" border="0">
						<tr>
							<td class="foto"><div class="userphoto"></div></td>
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
				<li class="menu-item"><span class="glyphicon glyphicon-list-alt"></span><a href="#">Draft Jurnal</a></li>
			</ul>
    		<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-list-alt"></span><a href="#">List Jurnal</a></li>
			</ul>
			<ul>
				<li class="menu-item"><span class="glyphicon glyphicon-user"></span><a href="#">Profil Anda</a></li>
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


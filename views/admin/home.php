	<div id="wrapper">
	    <div id="header">
	        <div id="logo">
			    <div id="logo_wrapper">
			        <img src="logo2.png" height="110" alt=""/>
			    </div>
			</div>
	    </div>
	    <div id="menu">
	        <div class="userpanel">
			    <h1> LOGGED IN AS: </h1>
				<table class="UPtable" border="0">
					<tr>
						<td class="username" colspan="2"> <?php echo $nama; ?> </td>
					</tr>
					<tr>
						<td class="userid"> <?php echo "User ID: " . $id; ?> </td>
						<td><a title="" href="logout.php">LOGOUT</a></td>
					</tr>
				</table> 
			</div>
	    </div>
	</div>
    <div id="pagebody">
    	<div class="sidenav">
			<ul>
				<li class="menu-item"><a href="#">Profil Anda</a></li>
			</ul>
        </div> 
		<div class="content">
			<div class="tab">
				<div id="tab1">
					<?php require "views/admin/submenu/profil.php";?>
				</div>
			</div>
		</div>
    </div>


	<script type="text/javascript">
		
    </script>

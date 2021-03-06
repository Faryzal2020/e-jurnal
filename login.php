<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login E-Jurnal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="css/loginpage.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="logo">
        <img src="logoS.png" height="110" alt=""/>
        <span style="display: block; color: #895700; font-weight: bold; font-family: monospace; font-size:  2em; padding-top: 6px; ">E-Jurnal</span>
    </div>
    <div id="main-panel">
        <div class="content">
            <div class="login-form">
                <div class="top_panel" id="top_panel">
                    LOGIN
                </div>
                <div class="bot_panel">
                    <div class="form">
                        <form action="validasi.php" method="POST" id="login">
                            <input type="text" name="nip" placeholder="NIP" title="Masukkan NIP Lama Anda" />
                            <input type="password" name="password" placeholder="Password" title="Masukkan Password Anda" />
                            <input type="submit" name="validasi" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

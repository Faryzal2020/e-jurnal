<?php
session_start();
include "config.php";
function Redirect($url, $permanent = false)
   {
       header('Location: ' . $url, true, $permanent ? 301 : 302);
       exit();
   }
if(isset($_POST['savefoto'])) 
{
	$allowed_filetypes = array('.JPG','.jpg','.jpeg','.png','.gif');
	$max_filesize = 50485760;
	$upload_path = 'images/';
    $temp = explode(".", $_FILES['pilihFoto']['name']);
	$filename = $nama_baru = $_SESSION['nip'] . '.' . end($temp);
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

	if(!in_array($ext,$allowed_filetypes))
	  die('<script>window.alert("File yang diunggah tidak diizinkan. Tipe file harus .jpg/.jpeg/.png"); window.location="index.php?";</script>');
	  //echo '<script language="javascript">window.location="account_page.php?action="uploadfoto"</script>';

	if(filesize($_FILES['pilihFoto']['tmp_name']) > $max_filesize)
	  die('<script>window.alert("File yang diunggah terlalu besar, maksimal 1MB;window.location="index.php?";</script>');

	if(!is_writable($upload_path))
	  die('You cannot upload to the specified directory, please CHMOD it to 777.');

	if(move_uploaded_file($_FILES['pilihFoto']['tmp_name'],$upload_path . $filename)) 
	{
       $query = "UPDATE user SET foto='".$filename."' WHERE nip='".$_SESSION['nip']."'"; 
       mysqli_query($db,$query);

       echo '<script>window.alert("Unggah foto berhasil!");</script>';
	   echo '<script language="javascript">window.location="index.php?"</script>';
    } 
	else 
	{
		echo '<script>window.alert("Terjadi kesalahan saat mengupload foto, silahkan coba lagi.");window.location="index.php?";</script>';
	}
}
?>
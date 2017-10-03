<?php
	session_start();
	include("../config.php");
	$id = $_POST['id'];
	$rating = $_POST['rating'];
	$sql = "UPDATE jurnal SET rating = '$rating' WHERE id_jurnal = '$id'";
	if(mysqli_query($db,$sql)){
		echo "y";
	} else {
		echo "n";
	}
?>

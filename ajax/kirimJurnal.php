<?php
	include("../config.php");
	$today = date("Y-m-d");
	$id = $_POST["id"];
	$sql = "UPDATE jurnal SET tanggal_kirim = '$today', status_jurnal = 'kirim' WHERE id_jurnal = '$id' ";

	if(mysqli_query($db,$sql)){
        $string = "1";
    } else {
        $string = "0";
    }
    echo $string;
?>
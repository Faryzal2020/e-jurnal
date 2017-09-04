<?php
	session_start();
	include("../config.php");
	$sql = "SELECT * FROM hari_libur";
	$result = mysqli_query($db,$sql);
	$out = array();
	$i = 0;
	while($data = mysqli_fetch_row($result)){
		$out[$i] = array(
			'id' => (int)$data[0],
			'name' => $data[1],
			'location' => "",
			'startDate' => strtotime($data[2]),
			'endDate' => strtotime($data[3])
		);
		$i++;
	}

	echo json_encode($out);
?>
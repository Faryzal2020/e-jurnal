<?php
      include("../config.php");
      $id = $_GET['id'];
      $nama = $_GET['name'];
      $sql = "DELETE FROM hari_libur WHERE id = '$id'";
      if(mysqli_query($db,$sql)){
            $string = "Hapus hari libur dengan nama \"" . $nama . "\" berhasil";
      } else {
            $string = "Hapus hari libur dengan nama \"" . $nama . "\" gagal";
      }
      echo $string;
?>
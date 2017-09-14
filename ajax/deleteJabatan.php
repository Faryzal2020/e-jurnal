<?php
            session_start();
            include("../config.php");
            $id = $_POST['id'];
            $nama = $_POST['nama'];

            $sql1 = "SELECT jabatan.id_jabatan FROM jabatan WHERE jabatan.atasan = '$id'";
            $result1 = mysqli_query($db,$sql1);
            if(mysqli_num_rows($result1) > 0){
                  echo "Jabatan ini memiliki bawahan, hapus terlebih dahulu jabatan-jabatan dibawahnya untuk bisa menghapus atasannya";
            } else {
                  $sql2 = "SELECT user.nip FROM user WHERE user.id_jabatan = '$id'";
                  $result2 = mysqli_query($db,$sql2);
                  if(mysqli_num_rows($result2) > 0){
                        echo "Ada pegawai yang memegang jabatan ini, pindahkan pegawai tersebut ke jabatan lain untuk bisa menghapus jabatan ini";
                  } else {
                        $sql3 = "DELETE FROM jabatan WHERE id_jabatan = '$id'";
                        if(mysqli_query($db,$sql3)){
                              echo "y";
                        } else {
                              echo "n";
                        }
                  }
            }
            
            
?>
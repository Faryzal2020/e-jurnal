<?php
   session_start();
    
   include("config.php");
   
   
   $error = 0;
   if (isset($_POST['validasi']))
   {
      if( empty( $_POST['nip'] ) || empty( $_POST['password'] ) )
      {
         echo "<script>eval(\"parent.location='login.php '\");
               alert ('Gagal login');
               </script>";
         $error++;
      }
      else
      {
         $nip = $_POST['nip'];
         $pass = $_POST['password'];
         $sql = "SELECT * FROM user WHERE nip='$nip'";
         $query = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($query);
         
         if( empty( $row['nip'] ) )
         {
            echo '<script>window.alert("NIP tidak dikenal");</script>';
            $error++;
         }
         else
         {
            $nip = $_POST['nip'];
            if( $row['password'] != $pass )
            {
               echo '<script>window.alert("Password salah");</script>';
               $error++;
            }
            else
            {
               $_SESSION['nip'] = $nip;
               $_SESSION['level'] = $row['level'];
               $_SESSION['nama'] = $row['nama_pegawai'];
               $_SESSION['bagian'] = $row['bagian'];
               $_SESSION['nipb'] = $row['id_pegawai'];
               $_SESSION['jabatan'] = $row['jabatan'];
               $_SESSION['tab'] = 0;
            } //end else
         } //end else
      }
    
      if($error == 0)
      {
            ?>
            <script language="JavaScript">
               window.location='index.php'</script>
            <?php
      }
      else 
      {
         ?>
         <script language="Javascript">window.location='login.php'</script>
         <?php
         //include("login.php");
      }
   }
?>
<?php
include("../config.php");

$id_jabatan= $_POST['id_jabatan'];              
$daiSQL = "SELECT user.nip,user.nama_pegawai,a.nama_jabatan as jabatan ,b.nama_jabatan as atasan,user.password FROM user,jabatan as a, jabatan as b WHERE user.level < 99 AND user.id_jabatan=a.id_jabatan AND a.atasan=b.id_jabatan AND user.id_jabatan='$id_jabatan' ORDER BY user.nama_pegawai";

$detail = mysqli_query($db, $daiSQL);


echo "<table border='1' class='tablelihat' cellpadding='50' width='100%'>

<tr>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>NIP</th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>Nama Pegawai</th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>Jabatan</th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>Kepala</th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>Password</th>
<th align='center' style='background-color: #2C383B; color: #ECECEC; text-align: center; height: 45px;'>Opsi</th>
</tr>";
while($al = mysqli_fetch_array($detail)) {
    echo "<tr>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'>$al[0]</td>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'>$al[1]</td>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'>$al[2]</td>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'>$al[3]</td>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'>$al[4]</td>";
    echo "<td align='center' style='background-color: white; border: 1px solid white; width: 200px;'> <a class=\"EJBbtn pencetan\" onclick=\"editAccount('$al[0]','$al[1]')\">Edit</a> <a class=\"EJBbtn pencetan\" onclick=\"lihatJurnal('$al[0]','$al[1]')\">Lihat Jurnal</a></td>";
    echo "</tr>";
}
?>              
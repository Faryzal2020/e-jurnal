<?php
include("config.php");

$nip = $_GET['nip'];
$LJsql = "SELECT j.id_jurnal, j.volume, j.jenis_output, j.waktu_mulai, j.waktu_selesai, j.tanggal_jurnal, j.jenis_aktivitas, a.nama_aktivitas, a.durasi FROM jurnal as j LEFT JOIN aktivitas as a ON a.id_aktivitas = j.id_aktivitas WHERE j.nip = '$nip'";
$result = mysqli_query($db, $LJsql);

echo "<table border='1' >
<tr>
<td align=center> <b>Roll No</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Address</b></td>
<td align=center><b>Stream</b></td></td>
<td align=center><b>Status</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "</tr>";
}
echo "</table>";
?>
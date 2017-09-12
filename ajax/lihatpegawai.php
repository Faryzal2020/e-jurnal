<?php
include("../config.php");

$id_jabatan= $_POST['id_jabatan'];              
$daiSQL = "SELECT user.nip,user.nama_pegawai,a.nama_jabatan as jabatan ,b.nama_jabatan as atasan,user.password FROM user,jabatan as a, jabatan as b WHERE user.level < 99 AND user.id_jabatan=a.id_jabatan AND a.atasan=b.id_jabatan AND user.id_jabatan='$id_jabatan' ORDER BY user.nama_pegawai";

$detail = mysqli_query($db, $daiSQL);


echo "<table border='1' class='tablelihat' id='tablelihat' cellpadding='50' width='100%'>

<tr>
<th style=\"min-width: 130px\">NIP</th>
<th style=\"min-width: 320px\">Nama Pegawai</th>
<th style=\"min-width: 220px\">Jabatan</th>
<th style=\"min-width: 220px\">Kepala</th>
<th style=\"min-width: 130px\"></th>
</tr>";
while($al = mysqli_fetch_array($detail)) {
    $JAnip = $al[0];
    $JAnama = $al[1];
    $JAjabatan= $al[2];
    $JAkepala = $al[3];
    $JApassword = $al[4];
<tr>
    <td style="text-align: center;"><?php echo $JAnip; ?></td>
    <td><?php echo $JAnama ?></td>
    <td style="text-align: center;"><?php echo $JAjabatan ?></td>
    <td><?php echo $JAkepala ?></td>
    <td style="text-align: center; width: 80px;">
        <a onclick="lihatJurnal(
                    '<?php echo $JAnip; ?>',
                    '<?php echo $JAnama; ?>'
                    )" style="display: inline; font-size: 1.5em; padding-right: 5px;"><span class="glyphicon glyphicon-list-alt" title="Lihat jurnal"></span></a>   
        <a onclick="editAccount(
                    '<?php echo $JAnip; ?>',
                    '<?php echo $JAnama; ?>',
                    '<?php echo $JAjabatan; ?>',
                    '<?php echo $JAkepala; ?>',
                    '<?php echo $JApassword; ?>'
                    )" style="display: inline; font-size: 1.5em;"><span class="glyphicon glyphicon-edit" title="Edit account"></span></a>
    </td>
}
?>              
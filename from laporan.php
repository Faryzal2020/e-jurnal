<html>
<table border="0" cellpadding="10" cellspacing="0">
<?php   
include_once "config.php";
echo "<h1> <font color='Black'><b>...</b></font> </h1>";
?>
    
<form name='form' method='post' action='simpan.php'>
<tr>
    <td>Search</td> 
    <td>:</td>
    <td><input type='text' name='search' style="width:200px;" placeholder="Mencari Aktivitas"></td>

    <td><select name='kategori'  style="width:200px;" >
		<option value=''>Pilih Kategori</option>
		<option value='1'>Teknis</option>
		<option value='2'>Operasional</option>
		<option value='3'>Administrasi</option>
		<option value='4'>Pelayanan</option>
		
        </select></td>
</tr>
<tr>    
    <td>Aktivitas dan Durasi</td>
    <td>:</td>
    <td><input type='text' name='aktivitas' style="width:200px;" placeholder="Aktivitas"> </td>
</tr>
    
<tr>
    <td>Volume</td>
    <td>:</td>
    <td><input type='text' name='volume' style="width:200px;" placeholder="Volume"></td>
 
     <td><input type='text' name='satuan_output' style="width:200px;" placeholder="Satuan"></td>   
</tr>
<tr>
    <td>Waktu Mulai</td>
    <td>:</td>
    <td><input type='date' name='tanggal_mulai' style="width:200px;"></td>

    <td><input type='text' name='waktu_mulai' style="width:200px;" placeholder="waktu mulai"></td>
</tr>
<tr>
    <td>Waktu Selesai</td>
    <td>:</td>
    <td><input type='date' name='tanggal_selesai' style="width:200px;"></td>

    <td><input type='text' name='waktu_selesai' style="width:200px;" placeholder="Waktu Selesai"></td>
</tr>
<tr><td><input type='submit' name='tombol' value='Simpan'/></td>
<td><input type='reset' name='tombol' value='Reset'/></td> 
</tr>
</form>

</table>
    
    

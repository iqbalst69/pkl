<table border="1px" cellpadding="2px">
<colgroup>
	<col>
	<col>
	<col width="200px">
	<col>
	<col>
</colgroup>
<tr>
	<th>No</th>
	<th>Username</th>
	<th>Nama</th>
	<th>Status</th>
	<th>Tanggal Aktivasi</th>
</tr>
<?php
//koneksi ke database
include 'koneksi.php';
//query menampilkan data
$data = mysqli_query($koneksi,"SELECT * FROM admin  order by status");
if($data == FALSE){
die(mysql_error());
}
$no = 1;
while($hasil = mysqli_fetch_array($data)){
  
$Tanggal = date('d/m/Y', strtotime($hasil['tgl_aktif']));
echo "
<tr>
<td> $no </td>
<td>$hasil[username]</td>
<td>$hasil[nama]</td>
<td>$hasil[status]</td>
<td>$Tanggal</td>
</tr>
";
$no++;
}
?>
</table>
<p><a href="export.php"><button>Export Data ke Excel</button></a></p>

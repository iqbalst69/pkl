<?php include '../../koneksi.php'; ?>

<!-- DATA REKANAN -->
<table border="1px" cellpadding="5px">
	<caption><b>DATA PERUSAHAAN REKANAN</b></caption>
	<colgroup>
		<col width="50px">
		<col width="250px">
		<col width="150px">
		<col width="300px">
	</colgroup>
	<tr>
		<th>No</th>
		<th>Perusahaan Rekanan</th>
		<th>Direktur Perusahaan</th>
		<th>Alamat</th>
	</tr>

	<?php 
$data = mysqli_query($koneksi,"SELECT * FROM tblrekan ORDER BY nama_rekan ");
$no = 1;
  while($hasil = mysqli_fetch_array($data)){ ?>
  	<tr>
  		<td><center><?php echo $no; ?></center></td>
  		<td><?php echo $hasil['nama_rekan']; ?></td>
  		<td><?php echo $hasil['pemimpin']; ?></td>
  		<td><?php echo $hasil['alamat_rekan'].", " .$hasil['kota_rekan']; ?></td>
  	</tr>

  <?php $no++; }?>
</table>
<?php include '../../koneksi.php'; ?>
<!-- Barang -->
<table border="1px" cellpadding="5px">
	<caption><b>DATA BARANG TERSEDIA</b></caption>
	<colgroup>
		<col width="50px">
		<col width="350px">
		<col width="100px">
	</colgroup>
	<tr>
		<th>No</th>
		<th>Uraian Barang</th>
		<th>Satuan</th>
	</tr>

	<?php 
$data = mysqli_query($koneksi,"SELECT * FROM tblbarang ORDER BY nama_barang ");
$no = 1;
  while($hasil = mysqli_fetch_array($data)){ ?>
  	<tr>
  		<td><center><?php echo $no; ?></center></td>
  		<td><?php echo $hasil['nama_barang']; ?></td>
  		<td><?php echo $hasil['satuan']; ?></td>
  	</tr>

  <?php $no++; }?>
</table>
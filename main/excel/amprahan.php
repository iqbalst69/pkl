<?php include '../../koneksi.php'; ?>

<!-- Amprahan -->
<table border="1px" cellpadding="5px">
	<caption><b>DATA AMPRAHAN</b></caption>
	<colgroup>
		<col width="50px">
		<col width="300px">
		<col width="150px">
		<col width="200px">
		<col width="150px">
		<col width="200px">
	</colgroup>
	<tr>
		<th>No</th>
		<th>Kegiatan</th>
		<th>Tanggal Pemesanan</th>
		<th>Rekanan Penyedia</th>
		<th>Total</th>
		<th>Untuk Pembayaran</th>
	</tr>

	<?php 
$data = mysqli_query($koneksi,"SELECT a.id_belanja, a.id, a.id_rekan, a.id_kegiatan, a.ket_belanja, a.subtotal, a.tgl_belanja, a.tgl_faktur, a.no_faktur, a.tgl_beritaacara, a.tgl_penerimaan, b.username, b.nama,  c.nama_rekan, c.alamat_rekan, c.kota_rekan, c.pemimpin, d.nama_kegiatan
FROM tblkegiatan d INNER JOIN (tblrekan c INNER JOIN (admin b INNER JOIN tblbelanja a ON b.id = a.id) ON c.id_rekan = a.id_rekan) ON d.id_kegiatan = a.id_kegiatan ORDER BY a.tgl_belanja");
$no = 1;
  while($hasil = mysqli_fetch_array($data)){ ?>
  	<tr>
  		<td><center><?php echo $no; ?></center></td>
  		<td><?php echo $hasil['nama_kegiatan']; ?></td>
  		<td style="text-align: right;"><?php echo date('d/m/Y', strtotime($hasil['tgl_belanja'])); ?></td>
  		<td><?php echo $hasil['nama_rekan']; ?></td>
  		<td style="text-align: right;"><?php echo "Rp. ". number_format($hasil['subtotal'],0,',','.') ?></td>
  		<td><?php echo $hasil['ket_belanja']; ?></td>
  	</tr>

  <?php $no++; }?>
</table>
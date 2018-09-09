<?php
$array1=explode('-',$view['tgl_beritaacara']);
$tahun=$array1[0];

$pdf->SetFont('Times','B',12);
$pdf->Cell(20); $pdf->Cell(170,5, 'BERITA ACARA PENERIMA HASIL PEKERJAAN', 0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(20); $pdf->Cell(170,5, 'Nomor : 027/BAP/______/'.$tahun, 0,1,'C');
$pdf->Ln();
$pdf->Cell(20); $pdf->MultiCell(170,5, 'Pada hari ini, '.namahari($view['tgl_beritaacara']).' '.tgl_indo($view['tgl_beritaacara']).', kami yang bertanda tangan di bawah ini :', 0,'J');

$pdf->Ln();
$pdf->Cell(20);		$pdf->Cell(30,5,'Nama',0,0,'L'); 		$pdf->Cell(50,5,': '.$pengurus_barang['nama_penjabat'],0,1,'L');
$pdf->Cell(20);		$pdf->Cell(30,5,'Jabatan',0,0,'L');		$pdf->Cell(50,5,': '.$pengurus_barang['status_penjabat'].' Dinas Kominfotik Kota Banda Aceh',0,0,'L');
$pdf->Ln();$pdf->Ln();
$pdf->Cell(20); $pdf->MultiCell(170,5, 'Berdasarkan keputusan Walikota Banda Aceh Nomor 25 Tahun 2018 Tanggal 29 Januari 2018 telah menerima barang yang diserahkan oleh penyedia barang '.$view['nama_rekan'].' '.$view['alamat_rekan'].' - '.$view['kota_rekan'].', Sesuai dengan Berita Acara Penerima Hasil Pekerjaan Nomor 027/BAPH/______/'.$tahun.' Tanggal '.tgl_indo($view['tgl_beritaacara']).' sebagaimana terlampir.', 0,'J');

$pdf->Cell(20); $pdf->MultiCell(170,5, 'Daftar barang yang diterima sebagai berikut :', 0,'J');
$pdf->Ln();
$pdf->Cell(20);		$pdf->Cell(30,5,$view['ket_belanja'],0,1,'L');

$detil = mysqli_query($koneksi, "SELECT a.id_dtl, a.id_belanja, a.id_barang, a.harga, a.jumlah, a.total, b.nama_barang, b.satuan FROM tblbarang b INNER JOIN dtlpembelian a ON a.id_barang = b.id_barang WHERE a.id_belanja = '$id_faktur'");
$no = 1;
while($row = mysqli_fetch_array($detil)){
	$pdf->Cell(20); $pdf->Cell(10,5,$no, 0,0,'L');
	$pdf->Cell(50,5,$row['nama_barang'], 0,0,'L');
	$pdf->Cell(30,5,$row['jumlah'], 0,0,'R');
	$pdf->Cell(60,5,$row['satuan'], 0,1,'C');
	$no++;
}
$pdf->Ln();$pdf->Ln();
$pdf->Cell(20); $pdf->MultiCell(170,5, 'Demikian Berita Acara Barang ini dibuat dalam 5 (lima) untuk digunakan sebagaimana mestinya.', 0,'J');
$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->Cell(110); 														$pdf->Cell(80,5,'Banda Aceh, '.tgl_indo($view['tgl_beritaacara']),0,1,'C');
$pdf->Ln();
$pdf->Cell(80,5,'Yang Menyerahkan,',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'Yang Menerima,',0,1,'C');
$pdf->Cell(80,5,'Penyedia Barang/Jasa',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'Pengurus Barang Dinas Komunikasi, Informatika',0,1,'C');
$pdf->Cell(80,5,$view['nama_rekan'],0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'dan Statistik Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(80,5,$view['pemimpin'],0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,$pengurus_barang['nama_penjabat'],0,1,'C');
$pdf->Cell(80,5,'Direktur',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,$pengurus_barang['nip'],0,1,'C');

?>
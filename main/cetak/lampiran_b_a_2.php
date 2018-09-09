<?php 
$array1=explode('-',$view['tgl_beritaacara']);
$tahun=$array1[0];

$pdf->SetFont('Times','B',11);
$pdf->Cell(70); 					$pdf->Cell(120,5, 'Lampiran Berita Acara Penerima Hasil Pekerjaan', 0,2,'L');
$pdf->SetFont('Times','',11);
									$pdf->Cell(40,5, 'Nomor', 0,0,'L');		$pdf->Cell(40,5, ': 027/BAP/______/'.$tahun, 0,1,'L');
$pdf->Cell(70);						$pdf->Cell(40,5, 'Tanggal', 0,0,'L');	$pdf->Cell(40,5, ': '.tgl_indo($view['tgl_beritaacara']), 0,1,'L');
$pdf->Cell(70);						$pdf->MultiCell(120,5,$view['ket_belanja'].' pada Kegiatan '.$view['nama_kegiatan'].' pada Diskominfotik Kota Banda Aceh' , 0,'J');

$pdf->Ln();

$detil = mysqli_query($koneksi, "SELECT a.id_dtl, a.id_belanja, a.id_barang, a.harga, a.jumlah, a.total, b.nama_barang, b.satuan FROM tblbarang b INNER JOIN dtlpembelian a ON a.id_barang = b.id_barang WHERE a.id_belanja = '$id_faktur'");

	$pdf->SetFont('Times','B',11);
	$pdf->SetWidths(array(10,50,20,20,30,30,30));
    $pdf->Row(array('No','Jenis Barang','Volume','Merk/ Type/ Model','Harga Satuan (Rp)','Jumlah (Rp)','Hasil Pemeriksaan (Baik/Tidak Baik)'));
    $no = 1;
	$pdf->SetFont('Times','',11);
	while ($row = mysqli_fetch_array($detil)) {
		$pdf->Cell(10,10,$no,1,0,'C');
		$pdf->Cell(50,10,$row['nama_barang'],1,0,'L');
		$pdf->Cell(20,10,$row['jumlah'].' '.$row['satuan'],1,0,'C');
		$pdf->Cell(20,10,'',1,0,'C');
		$pdf->Cell(30,10,number_format($row['harga'],0,",","."),1,0,'R');
		$pdf->Cell(30,10,number_format($row['total'],0,",","."),1,0,'R');	
		$pdf->Cell(30,10,'Baik',1,1,'C');	
	$no++;
	}
$pdf->SetFont('Times','B',11);
$pdf->Cell(10,10,'',1,0,'C');
$pdf->Cell(50,10,'Jumlah',1,0,'C');
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(20,10,'',1,0,'C');
$pdf->Cell(30,10,'',1,0,'R');
$pdf->Cell(30,10,'Rp. '.number_format($view['subtotal'],0,",","."),1,0,'R');	
$pdf->Cell(30,10,'',1,1,'C');

$pdf->SetFont('Times','',11);
$pdf->Ln();

$pdf->Cell(80,5,'Yang Menyerahkan,',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'Yang Menerima,',0,1,'C');
$pdf->Cell(80,5,'Penyedia Barang/Jasa',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'Pengurus Barang Dinas Komunikasi, Informatika',0,1,'C');
$pdf->Cell(80,5,$view['nama_rekan'],0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,'dan Statistik Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(80,5,$view['pemimpin'],0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,$pengurus_barang['nama_penjabat'],0,1,'C');
$pdf->Cell(80,5,'Direktur',0,0,'C'); 		$pdf->Cell(30); 	$pdf->Cell(80,5,$pengurus_barang['nip'],0,1,'C');
?>

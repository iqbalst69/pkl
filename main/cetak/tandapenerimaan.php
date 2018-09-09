<?php
$array1=explode('-',$view['tgl_penerimaan']);
$tahun=$array1[0];

$pdf->SetFont('Times','',11);
$pdf->Cell(50); $pdf->Cell(20,5,'No',0,0,'L'); 		$pdf->Cell(80,5,': ',0,0,'L');	$pdf->Cell(40,5,'Asli',0,1,'L');
$pdf->Cell(50); $pdf->Cell(20,5,'K.R',0,0,'L');		$pdf->Cell(80,5,': '.$view['id_kegiatan'],0,0,'L');	$pdf->Cell(40,5,'Kedua',0,1,'L');
$pdf->Cell(50); $pdf->Cell(20,5,'Tahun',0,0,'L');	$pdf->Cell(80,5,': '.$tahun,0,0,'L');	$pdf->Cell(40,5,'Ketiga',0,1,'L');
$pdf->Cell(150);									$pdf->Cell(40,5,'Keempat',0,1,'L');

$pdf->SetFont('Times','B',11);
$pdf->Cell(190,5,'TANDA PENERIMAAN',0,1,'C');
$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Times','',11);
$pdf->Cell(40,5,'Sudah terima dari',0,0,'L');
$pdf->Cell(150,5,': Bendahara Pengeluaran Dinas Komunikasi, Informatika dan Statistik Kota Banda Aceh',0,1,'L');
$pdf->Cell(40,5,'Banyaknya Uang',0,0,'L');
$pdf->Cell(150,5,': '.terbilang($view['subtotal']).' Rupiah',0,1,'L');
$pdf->Cell(40,5,'Yaitu',0,0,'L');
$pdf->Cell(2,5,': ',0,0,'L');
$pdf->MultiCell(143,5,'Pembayaran '.$view['ket_belanja'].' pada kegiatan '.$view['nama_kegiatan'].' pada Dinas Komunikasi, Informatika dan Statistik Kota Banda Aceh tahun 2018',0,'J');
$pdf->Ln();$pdf->Ln();

$pdf->Cell(90,5,'Setuju dibayar,',0,0,'C');							$pdf->Cell(100,5,'Banda Aceh, '.tgl_indo(date($view['tgl_penerimaan'])),0,1,'C');
$pdf->Cell(90,5,'Kepala Dinas Komunikasi, Informatika',0,0,'C');	$pdf->Cell(100,5,'Yang Menerima,',0,1,'C');	
$pdf->Cell(90,5,'dan Statistika Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->Cell(90,5,$kepala['nama_penjabat'],0,0,'C');	$pdf->Cell(40,5,'Nama',0,0,'L'); $pdf->Cell(60,5,': '.$view['pemimpin'],0,1,'L');
$pdf->Cell(90,5,'Pembina Tk I',0,0,'C');			$pdf->Cell(40,5,'Pekerjaan',0,0,'L'); $pdf->Cell(60,5,': Direktur '.$view['nama_rekan'],0,1,'L');
$pdf->Cell(90,5,$kepala['nip'],0,0,'C');			$pdf->Cell(40,5,'Alamat Terang',0,0,'L'); $pdf->Cell(60,5,': '.$view['alamat_rekan'],0,1,'L');

$pdf->SetFont('Times','B',11);
$pdf->Cell(90,5,'TERBILANG RP. '.number_format($view['subtotal'],0,",","."),0,1,'L');
$pdf->SetFont('Times','',11);
$pdf->Cell(90);														$pdf->Cell(100,5,'Lunas Dibayar',0,2,'C');
																	$pdf->Cell(100,5,'Bendahara Pengeluaran',0,2,'C');
																	$pdf->Cell(100,5,'Dinas Komunikasi, Informatika dan Statistik',0,1,'C');
$pdf->Cell(90,5,'Pengurus Barang/Pekerjaan',0,0,'C');				$pdf->Cell(100,5,'Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(90,5,$pengurus_barang['nama_penjabat'],0,0,'C');			$pdf->Cell(100,5,$bendahara['nama_penjabat'],0,1,'C');
$pdf->Cell(90,5,$pengurus_barang['nip'],0,0,'C');					$pdf->Cell(100,5,$bendahara['nip'],0,1,'C');
																	
$pdf->Ln();
$pdf->Cell(90);														$pdf->Cell(100,5,'Kepala Dinas Komunikasi, Informatika',0,2,'C');
																	$pdf->Cell(100,5,'dan Statistik Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(90);														$pdf->Cell(100,5,$kepala['nama_penjabat'],0,2,'C');
																	$pdf->Cell(100,5,$kepala['nip'],0,1,'C');
?>

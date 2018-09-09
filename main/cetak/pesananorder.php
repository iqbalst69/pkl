<?php
$array1=explode('-',$view['tgl_belanja']);
$tahun=$array1[0];

$pdf->Cell(190,5,'',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Times','B',12);
$pdf->Cell(190,5,'PESANAN ORDER',0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(190,5,'No. 021/_______/'.$tahun,0,1,'C');
$pdf->Ln();
$pdf->Cell(120); 		$pdf->Cell(70,5,'Banda Aceh, '.tgl_indo(date($view['tgl_belanja'])),0,2,'L');
						$pdf->Cell(70,5,'Kepada Yth, ',0,2,'L');
						$pdf->Cell(70,5,$view['nama_rekan'],0,2,'L');
						$pdf->Cell(70,5,$view['alamat_rekan'],0,2,'L');
						$pdf->Cell(70,5,'di- ',0,1,'L');
$pdf->Cell(140);		$pdf->Cell(50,5,$view['kota_rekan'] ,0,1,'L');
$pdf->Ln();$pdf->Ln();

$pdf->SetFont('Times','B',11);
$pdf->Cell(10,10,'No',1,0,'C');
$pdf->Cell(60,10,'Jenis Barang',1,0,'C');
$pdf->Cell(20,10,'Banyaknya',1,0,'C');
$pdf->Cell(30,10,'Satuan',1,0,'C');
$pdf->Cell(33,10,'Harga Satuan Rp.',1,0,'C');
$pdf->Cell(37,10,'Jumlah Harga Rp.',1,1,'C');

$detil = mysqli_query($koneksi, "SELECT a.id_dtl, a.id_belanja, a.id_barang, a.harga, a.jumlah, a.total, b.nama_barang, b.satuan FROM tblbarang b INNER JOIN dtlpembelian a ON a.id_barang = b.id_barang WHERE a.id_belanja = '$id_faktur'");
$no = 1;
$pdf->SetFont('Times','',11);
while ($row = mysqli_fetch_array($detil)) {
	$pdf->Cell(10,10,$no,1,0,'C');
	$pdf->Cell(60,10,$row['nama_barang'],1,0,'L');
	$pdf->Cell(20,10,$row['jumlah'],1,0,'C');
	$pdf->Cell(30,10,$row['satuan'],1,0,'C');
	$pdf->Cell(33,10,number_format($row['harga'],0,",","."),1,0,'R');
	$pdf->Cell(37,10,number_format($row['total'],0,",","."),1,1,'R');	
$no++;
}
$pdf->SetFont('Times','B',11);
$pdf->Cell(153,10,'Jumlah Total ---- ',1,0,'C');
$pdf->Cell(37,10,'Rp. '.number_format($view['subtotal'],0,",","."),1,1,'R');
$pdf->Cell(190,10,'Terbilang: '.terbilang($view['subtotal']).' Rupiah',1,1,'L');

$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(120); 		$pdf->Cell(70,5,'Kepala Dinas Komunikasi, Informatika',0,2,'C');
						$pdf->Cell(70,5,'dan Statistika Kota Banda Aceh',0,1,'C');
$pdf->Ln();$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->Cell(120);		$pdf->Cell(70,5,$kepala['nama_penjabat'],0,2,'C');
						$pdf->Cell(70,5,$kepala['nip'],0,1,'C');





?>
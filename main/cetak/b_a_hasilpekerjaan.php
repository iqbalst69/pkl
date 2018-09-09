<?php
$array1=explode('-',$view['tgl_beritaacara']);
$tahun=$array1[0];

$pdf->SetFont('Times','B',12);
$pdf->Cell(20); $pdf->Cell(170,5, 'BERITA ACARA PENERIMA HASIL PEKERJAAN', 0,1,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(20); $pdf->Cell(170,5, 'Nomor : 027/BAPH/______/'.$tahun, 0,1,'C');
$pdf->Ln();
$pdf->Cell(20); $pdf->MultiCell(170,5, 'Pada hari ini, '.namahari($view['tgl_beritaacara']).' '.tgl_indo($view['tgl_beritaacara']).', bertempat di Banda Aceh berdasarkan Surat Keputusan Kepala Dinas Komunikasi, Informatika dan Statistik Kota Banda Aceh Nomor 800.05/0076 Tahun 2018 Tanggal 25 Bulan Januari 2018 tentang Pembentukan Panitia / Penjabat Penerima Hasil Pekerjaan, Yang bertanda tangan dibawah ini :', 0,'J');

//==================================
$no = 1;
$in = mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Ketua'");
while($pan = mysqli_fetch_array($in)){
	$pdf->Cell(30); 
	$pdf->Cell(10,5,$no, 0,0,'L'); 	
	$pdf->Cell(70,5,$pan['nama_panitia'], 0,0,'L'); 	
	$pdf->Cell(50,5,'Jabatan', 0,0,'C');
	$pdf->Cell(30,5,$pan['jabatan'], 0,1,'L');
	$no++;
}
$in = mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Sekretaris'");
while($pan = mysqli_fetch_array($in)){
	$pdf->Cell(30); 
	$pdf->Cell(10,5,$no, 0,0,'L'); 	
	$pdf->Cell(70,5,$pan['nama_panitia'], 0,0,'L'); 	
	$pdf->Cell(50,5,'Jabatan', 0,0,'C');
	$pdf->Cell(30,5,$pan['jabatan'], 0,1,'L');
	$no++;
}
$in = mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Anggota'");
while($pan = mysqli_fetch_array($in)){
	$pdf->Cell(30); 
	$pdf->Cell(10,5,$no, 0,0,'L'); 	
	$pdf->Cell(70,5,$pan['nama_panitia'], 0,0,'L'); 	
	$pdf->Cell(50,5,'Jabatan', 0,0,'C');
	$pdf->Cell(30,5,$pan['jabatan'], 0,1,'L');
	$no++;
}
//==================================
$pdf->Ln();

$pdf->Cell(20); $pdf->MultiCell(170,5, 'Masing - masing karena jabatannya, dengan ini menyatakan dengan sebenarnya telah melaksanankan pemeriksaan dan menerima terhadap penyerahan Barang/ Jasa '.$view['ket_belanja'].' yang dipesan dari : ', 0,'J');
$pdf->Cell(20); $pdf->Cell(50,5,'Nama Perusahaan', 0,0,'L'); $pdf->Cell(50,5,': '.$view['nama_rekan'], 0,1,'L'); 
$pdf->Cell(20); $pdf->Cell(50,5,'Alamat Perusahaan', 0,0,'L'); $pdf->Cell(50,5,': '.$view['alamat_rekan'], 0,1,'L'); 
$pdf->Ln();

$array1=explode('-',$view['tgl_belanja']); $tahun2=$array1[0];
$pdf->Cell(20); $pdf->MultiCell(170,5, 'Sebagai realisasi Surat Pesanan/ Order No. 021/________/'.$tahun2.' tanggal '.tgl_indo($view['tgl_belanja']).' dengan jumlah / jenis barang :', 0,'J');

$pdf->Cell(20); $pdf->Cell(50,5,$view['ket_belanja'], 0,1,'L');

$detil = mysqli_query($koneksi, "SELECT a.id_dtl, a.id_belanja, a.id_barang, a.harga, a.jumlah, a.total, b.nama_barang, b.satuan FROM tblbarang b INNER JOIN dtlpembelian a ON a.id_barang = b.id_barang WHERE a.id_belanja = '$id_faktur'");
$no = 1;
while($row = mysqli_fetch_array($detil)){
	$pdf->Cell(20); $pdf->Cell(10,5,$no, 0,0,'L');
	$pdf->Cell(50,5,$row['nama_barang'], 0,0,'L');
	$pdf->Cell(30,5,$row['jumlah'], 0,0,'R');
	$pdf->Cell(60,5,$row['satuan'], 0,1,'C');
	$no++;
}

$pdf->Ln();
$pdf->Cell(20); $pdf->Cell(60,5,'Hasil pemeriksaan dinyatakan :', 0,1,'L');
$pdf->Cell(25); $pdf->Cell(60,5,'a. Baik', 0,1,'L');
$pdf->Cell(25); $pdf->Cell(60,5,'b. Kurang / Tidak Baik', 0,1,'L');

$pdf->Cell(20);  $pdf->MultiCell(170,5, 'Yang selanjutnya akan diserahkan oleh penyedia barang / jasa pada penyimpanan barang dan/atau pengurus barang.', 0,'J');
$pdf->Ln();
$pdf->Cell(20);  $pdf->MultiCell(170,5, 'Demikianlah Berita Acara ini dibuat dalam rangkap 5 (lima ) untuk dipergunakan sebagaimana mestinya', 0,'J');
$pdf->Ln();$pdf->Ln();
$pdf->Cell(20); $pdf->Cell(70,5,'Penyedia Barang / Jasa', 0,0,'C'); $pdf->Cell(100,5,'Panitia/Penjabat Penerima Hasil Pekerjaan', 0,1,'C');
$pdf->Cell(20); $pdf->Cell(70,5,$view['nama_rekan'], 0,0,'C'); $pdf->Cell(100,5,'DISKOMINFOTIK Kota Banda Aceh', 0,1,'C');
$pdf->Ln();$pdf->Ln();

//===================================================================
$ketua = mysqli_fetch_array( mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Ketua'"));
$sekretaris = mysqli_fetch_array( mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Sekretaris'"));
$anggota = mysqli_fetch_array( mysqli_query($koneksi, "SELECT * FROM tblpanitia WHERE jabatan = 'Anggota'"));
//====================================================================

$pdf->Cell(90); $pdf->Cell(15);$pdf->Cell(10,5,'1. ',0,0,'L');$pdf->Cell(30,5,'Nama',0,0,'L');$pdf->Cell(40,5,': '.$ketua['nama_panitia'],0,1,'L');
$pdf->Ln();
$pdf->Cell(20); $pdf->Cell(70,5,$view['pemimpin'], 0,1,'C');
$pdf->Cell(20); $pdf->Cell(70,5,'DIREKTUR', 0,0,'C'); $pdf->Cell(25);$pdf->Cell(30,5,'Tanda Tangan',0,0,'L');$pdf->Cell(40,5,': .............................. ',0,1,'L');

$pdf->Cell(105); $pdf->Cell(10,5,'2. ',0,0,'L');$pdf->Cell(30,5,'Nama',0,0,'L');$pdf->Cell(40,5,': '.$sekretaris['nama_panitia'],0,1,'L');
$pdf->Ln();$pdf->Ln();
$pdf->Cell(90);$pdf->Cell(25);$pdf->Cell(30,5,'Tanda Tangan',0,0,'L');$pdf->Cell(40,5,': .............................. ',0,1,'L');

$pdf->Cell(105); $pdf->Cell(10,5,'3. ',0,0,'L');$pdf->Cell(30,5,'Nama',0,0,'L');$pdf->Cell(40,5,': '.$anggota['nama_panitia'],0,1,'L');
$pdf->Ln();$pdf->Ln();
$pdf->Cell(90);$pdf->Cell(25);$pdf->Cell(30,5,'Tanda Tangan',0,0,'L');$pdf->Cell(40,5,': .............................. ',0,1,'L');


?>
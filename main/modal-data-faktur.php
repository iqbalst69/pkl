<?php 
include '../koneksi.php';

$id_belanja = $_POST['id'];
$queri = mysqli_query($koneksi,"SELECT a.id_belanja, a.id, a.id_rekan, a.id_kegiatan, a.ket_belanja, a.subtotal, a.tgl_belanja, a.tgl_faktur, a.no_faktur, a.tgl_beritaacara, a.tgl_penerimaan, b.username, b.nama,  c.nama_rekan, c.alamat_rekan, c.kota_rekan, c.pemimpin, d.nama_kegiatan
    FROM tblkegiatan d INNER JOIN (tblrekan c INNER JOIN (admin b INNER JOIN tblbelanja a ON b.id = a.id) ON c.id_rekan = a.id_rekan) ON d.id_kegiatan = a.id_kegiatan WHERE a.id_belanja = '$id_belanja'");
$view = mysqli_fetch_array($queri);
?>
<?php 
if (isset($_GET['aksi'])) :
 	$aksi = $_GET['aksi'];
 	if ($aksi == 'view') :
 ?>
<div class="modal-header">
	<center>
	<h4 class="modal-title text-left" >Detail Pemesanan Barang <?php echo $view['ket_belanja'] ?></h4>
	<h4 class="modal-title text-left" >Untuk Kegiatan <?php echo $view['nama_kegiatan'] ?></h4>
	</center>
</div>
<div class="modal-body">
	<div class="panel panel-body">
<h6>	
	<div class="row">
		<div class="col-md-4">Perusahaan Rekanan</div>
		<div class="col-md-5"><?php echo $view['nama_rekan'] ?></div>
		<div class="col-md-3">No Faktur : <?php echo $view['no_faktur'] ?></div>
	</div>
	<div class="row">		
		<div class="col-md-4">User Yang Melakukan Transaksi</div>
		<div class="col-md-8"><?php echo $view['nama']." - ". $view['username'] ?></div>
	</div>
	<div class="row">
		<div class="col-md-4">Tanggal Permintaan</div>
		<div class="col-md-8"><?php echo namahari($view['tgl_belanja']).", ".tgl_indo($view['tgl_belanja']) ?></div>
	</div>
	<div class="row">		
		<div class="col-md-4">Tanggal Faktur</div>
		<div class="col-md-8"><?php echo namahari($view['tgl_faktur']).", ". tgl_indo($view['tgl_faktur']) ?></div>
	</div>
	<div class="row">		
		<div class="col-md-4">Tanggal Berita Acara</div>
		<div class="col-md-8"><?php echo namahari($view['tgl_beritaacara']).", ". tgl_indo($view['tgl_beritaacara']) ?></div>
	</div>
	<div class="row">
		<div class="col-md-4">Tanggal Penerimaan Barang</div>
		<div class="col-md-8"><?php echo namahari($view['tgl_penerimaan']).", ". tgl_indo($view['tgl_penerimaan']) ?></div>
	</div>
</h6>
	<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
		<tr>
		<th>No</th>
		<th>Uraian Barang</th>
		<th>Banyak</th>
		<th>Satuan</th>
		<th>Harga Rp.(@)</th>
		<th>Total Rp.</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$no = 1;	
		$total = 0;
		$detil = mysqli_query($koneksi, "SELECT a.id_dtl, a.id_belanja, a.id_barang, a.harga, a.jumlah, a.total, b.nama_barang, b.satuan FROM tblbarang b INNER JOIN dtlpembelian a ON a.id_barang = b.id_barang WHERE a.id_belanja = '$id_belanja'");
		while ($row = mysqli_fetch_array($detil)) {
			echo 
			"<tr>
			<td>$no</td>
			<td>$row[nama_barang]</td>
			<td>$row[jumlah]</td>
			<td>$row[satuan]</td>
			<td>".number_format($row['harga'],0,",",".")."</td>
			<td>".number_format($row['total'],0,",",".")."</td>
			</tr>";
		}
		?>
		</tbody>
		</table>
	</div>
	</div>
      <h4 class="text-right"><b>Total : Rp. <?php echo number_format($view['subtotal'],2,",",".") ; ?></b></h4>
</div>
<div class="modal-footer">
	<a href="cetak.php?id=<?php echo $id_belanja ?>" class="btn btn-success">Cetak Amprahan</a>
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

	<?php elseif ($aksi == 'tanggal') :?>
<div class="modal-header">
	<center>
	<h4 class="modal-title text-left" >Detail Pemesanan Barang <?php echo $view['ket_belanja'] ?></h4>
	<h4 class="modal-title text-left" >Untuk Kegiatan <?php echo $view['nama_kegiatan'] ?></h4>
	</center>
</div>
<form action="aksi/aksidatafaktur.php?aksi=tanggal&id=<?php echo $id_belanja;?>" method="post">
<div class="modal-body">
<div class="col-md-12 text-center"><h5>Sesuaikan Tanggal</h5></div>
		<div class="row form-group">
			<div class="col-md-3"><h6>Tanggal Permintaan</h6></div>
			<div class="col-md-3">
				<input type="text" class="form-control" placeholder="<?php echo date('d/m/Y', strtotime($view['tgl_belanja'])) ?>" disabled> 
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3"><h6>Untuk Pembayaran</h6></div>
			<div class="col-md-9">
				<input type="text" name="ket_belanja" class="form-control" value="<?php echo $view['ket_belanja'] ?>">
				<p>Disesuaikan Apabila Masih Perlu Disesuaikan</p>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-3"><h6>Tanggal Faktur</h6></div>
			<div class="col-md-3"><input type="date" name="tgl_faktur" class="form-control" value="<?php echo $view['tgl_faktur'] ?>" ></div>
			<div class="col-md-2"><h6>Nomer Faktur</h6></div>
			<div class="col-md-4"><input type="text" name="no_faktur" class="form-control" value="<?php echo $view['no_faktur'] ?>"></div>
		</div>
		<div class="row form-group">
			<div class="col-md-3"><h6>Tanggal Berita Acara</h6></div>
			<div class="col-md-3"><input type="date" name="tgl_beritaacara" class="form-control" value="<?php echo $view['tgl_beritaacara'] ?>" ></div>
		</div>
		<div class="row form-group">
			<div class="col-md-3"><h6>Tanggal Penerimaan Barang</h6></div>
			<div class="col-md-3"><input type="date" name="tgl_penerimaan" id="datepicker" class="form-control" value="<?php echo $view['tgl_penerimaan'] ?>"></div>
		</div>
</div>
<div class="modal-footer">
	<button type="submit" name="simpan" class="btn btn-info">Save changes</button>       
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>

	<?php endif; ?>
<?php endif; ?>

<?php
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

//function terbilang
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

//function tanggal indonesia
	function tgl_indo($tanggal)
	{
	if (is_null($tanggal)) {
		return $tanggal;
	}
	else{		
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split = explode('-', $tanggal);
		return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		}
	}

//function nama hari 
	function namahari($tanggal){
    if (is_null($tanggal)) {
    	return "";
    }
    else{    	
	    $tgl=substr($tanggal,8,2);
	    $bln=substr($tanggal,5,2);
	    $thn=substr($tanggal,0,4);

	    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
	    
		    switch($info){
		        case '0': return "Minggu"; break;
		        case '1': return "Senin"; break;
		        case '2': return "Selasa"; break;
		        case '3': return "Rabu"; break;
		        case '4': return "Kamis"; break;
		        case '5': return "Jumat"; break;
		        case '6': return "Sabtu"; break;
		    };   
	    }
	}
?>
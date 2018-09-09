<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
  
if(isset($_GET['doc'])) {
	$doc = $_GET['doc'];
}

if ($doc == 'barang') {
	header("Content-Disposition: attachment; filename=DataBarang.xls");
	include 'barang.php';
}

elseif ($doc == 'amprahan') {
	header("Content-Disposition: attachment; filename=ListBelanja.xls");
	include 'amprahan.php';
}

elseif ($doc == 'rekanan') {
	header("Content-Disposition: attachment; filename=DataRekanan.xls");
	include 'rekanan.php';
}
?>
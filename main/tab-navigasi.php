<?php
$p=isset($_GET['page'])?$_GET['page']:null;
switch($p){
	default:
		include 'data-faktur.php';
	break;
	case "user":
		include 'datauser.php';
	break;          
	case "penjabat":
		include 'dataperusahaan.php';
	break;          
	case "panitia":
		include 'datapanitia.php';
	break;          
	case "rekanan":
		include 'datarekanan.php';
	break;
	case 'barang':
		include 'databarang.php';
	break;
	case 'pesan':
		include 'pemesanan.php';
	break;
	case 'pesan-next':
		include 'pemesanan-next.php';
	break;
	case "akunku":
		include "akunku.php";
	break;
	case "faktur":
		include "data-faktur.php";
	break;
}
?>
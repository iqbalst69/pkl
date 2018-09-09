<?php
include '../../koneksi.php';
if (isset($_GET['aksi'])) {
	$aksi = $_GET['aksi'];
	$id_belanja = $_GET['id'];

	if ($aksi == 'tanggal') {
		$ket_belanja = $_POST['ket_belanja'];
		$tgl_faktur = $_POST['tgl_faktur'];
		$no_faktur = $_POST['no_faktur'];
		$tgl_beritaacara = $_POST['tgl_beritaacara'];
		$tgl_penerimaan = $_POST['tgl_penerimaan'];


		$edit = mysqli_query($koneksi, "UPDATE tblbelanja SET ket_belanja = '$ket_belanja', tgl_faktur='$tgl_faktur', no_faktur='$no_faktur', tgl_beritaacara='$tgl_beritaacara', tgl_penerimaan='$tgl_penerimaan' WHERE id_belanja = '$id_belanja' ");

		if ($edit) {
			echo "<script> window.location.href='../index.php'</script>";
		}
		else{
			echo "error". $edit. "<br>". mysqli_error($koneksi). "<br>Failed to edit record";
		}
		mysqli_close($koneksi);
	}

	elseif ($aksi == 'hapus') {

		$tblbelanja = mysqli_query($koneksi, "SELECT * FROM tblbelanja WHERE id_belanja = '$id_belanja'");
      	$databelanja = mysqli_fetch_array($tblbelanja);
      	$delete1 = mysqli_query($koneksi, "DELETE FROM dtlpembelian WHERE id_belanja = '$databelanja[id_belanja]'");
		
		$hapus = mysqli_query($koneksi, "DELETE FROM tblbelanja WHERE id_belanja = '$id_belanja' ");

		if ($hapus) {
			echo "<script> window.location.href='../index.php'</script>";
		}
		else{
			echo "error". $hapus. "<br>". mysqli_error($koneksi). "<br>Failed to hapus record";
		}
		mysqli_close($koneksi);
	}
}

else{
	header("location:../index.php?");
}
?>
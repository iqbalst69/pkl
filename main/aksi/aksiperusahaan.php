<style type="text/css">
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
</style>
<script>
	$(document).ready(function(){
	$(".preloader").fadeOut();
	})
</script>
<div class="preloader">
	<div class="loading">
		<img src="../image/Spinner.gif" width="100">
	</div>
</div>

<?php  
include '../../koneksi.php'; //file koneksi kejauhan cuyy

if (isset($_GET['aksi'])) {
	$aksi = $_GET['aksi']; 

//aksi tambah		
	if ($aksi == 'add') {			
		$nip = $_POST['nip'];
		$nama_penjabat = $_POST['nama_penjabat'];
		$status_penjabat = $_POST['status_penjabat'];

		if (($nama_penjabat == "")||($nip == "") ){
			echo "<script>alert('Nama Penjabat dan Jabatan Tidak Boleh Kosong !'); window.location.href='../index.php?page=penjabat'</script>";
		}

		else{
			$add = mysqli_query($koneksi, "INSERT INTO tbljabatan (nip, nama_penjabat, status_penjabat) VALUES ('$nip','$nama_penjabat','$status_penjabat')");
			
			if ($add) {
				echo "<script>window.location.href='../index.php?page=penjabat'</script>";
			}
			else{
				echo "error". $add. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
			}
			mysqli_close($koneksi);
		}
	}
//aksi hapus	
	elseif ($aksi == 'delete') {
		$id = $_GET['id'];
		$delete = mysqli_query($koneksi, "DELETE FROM tbljabatan WHERE nip = '$id' ");

		if ($delete) {
				echo "<script> window.location.href='../index.php?page=penjabat'</script>";
			}
			else{
				echo "error". $delete. "<br>". mysqli_error($koneksi). "<br>Failed to delete record";
			}
			mysqli_close($koneksi);
	}

//aksi edit
	elseif ($aksi == 'edit') {
		$id = $_GET['id'];
		$nip = $_POST['nip'];
		$nama_penjabat = $_POST['nama_penjabat'];
		$status_penjabat = $_POST['status_penjabat'];


		if (($nama_penjabat == "")||($nip == "") ){
			echo "<script>alert('Nama Penjabat dan Jabatan Tidak Boleh Kosong !'); window.location.href='../index.php?page=penjabat'</script>";
		}

		else{
			$edit = mysqli_query($koneksi, "UPDATE tbljabatan SET nip = '$nip', nama_penjabat='$nama_penjabat', status_penjabat='$status_penjabat' WHERE nip = '$id' ");
			
			if ($edit) {
				echo "<script>window.location.href='../index.php?page=penjabat'</script>";
			}
			else{
				echo "error". $edit. "<br>". mysqli_error($koneksi). "<br>Failed to edit record";
			}
			mysqli_close($koneksi);
		}
	}
}

else{
	header("location:../index.php?");
}
?>
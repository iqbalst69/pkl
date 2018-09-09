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
		$nama_barang = $_POST['nama_barang'];
		$satuan = $_POST['satuan'];

		if (($nama_barang == "")||($satuan == "") ){
			echo "<script>alert('Uraian Barang dan Satuannya Tidak Boleh Kosong !'); window.location.href='../index.php?page=barang'</script>";
		}

		else{
			$add = mysqli_query($koneksi, "INSERT INTO tblbarang (satuan, nama_barang) VALUES ('$satuan','$nama_barang')");
			
			if ($add) {
				echo "<script>window.location.href='../index.php?page=barang'</script>";
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
		$delete = mysqli_query($koneksi, "DELETE FROM tblbarang WHERE id_barang = '$id' ");

		if ($delete) {
				echo "<script> window.location.href='../index.php?page=barang'</script>";
			}
			else{
				echo "error". $delete. "<br>". mysqli_error($koneksi). "<br>Failed to delete record";
			}
			mysqli_close($koneksi);
	}

//aksi edit
	elseif ($aksi == 'edit') {
		$id = $_GET['id'];
		$nama_barang = $_POST['nama_barang'];
		$satuan = $_POST['satuan'];

		if (($nama_barang == "")||($satuan == "") ){
			echo "<script>alert('Uraian Barang dan Satuannya Tidak Boleh Kosong !'); window.location.href='../index.php?page=barang'</script>";
		}

		else{
			$edit = mysqli_query($koneksi, "UPDATE tblbarang SET nama_barang = '$nama_barang', satuan='$satuan' WHERE id_barang = '$id' ");
			
			if ($edit) {
				echo "<script>window.location.href='../index.php?page=barang'</script>";
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
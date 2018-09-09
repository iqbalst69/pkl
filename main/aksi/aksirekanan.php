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
		$nama_rekan = $_POST['nama_rekan'];
		$pemimpin = $_POST['pemimpin'];
		$alamat_rekan = $_POST['alamat_rekan'];
		$kota_rekan = $_POST['kota_rekan'];
		if (($nama_rekan == "")||($pemimpin == "")||($alamat_rekan == "")||($kota_rekan == "") ){
			echo "<script>alert('Nama Perusahaan Rekanan, Direktur Perusahaan, Alamat dan Kota Rekanan Tidak Boleh Kosong !'); window.location.href='../index.php?page=rekanan'</script>";
		}

		else{
			$add = mysqli_query($koneksi, "INSERT INTO tblrekan (nama_rekan, alamat_rekan, kota_rekan, pemimpin) VALUES ('$nama_rekan','$alamat_rekan','$kota_rekan','$pemimpin')");
			
			if ($add) {
				echo "<script>window.location.href='../index.php?page=rekanan'</script>";
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
		$delete = mysqli_query($koneksi, "DELETE FROM tblrekan WHERE id_rekan = '$id' ");

		if ($delete) {
				echo "<script> window.location.href='../index.php?page=rekanan'</script>";
			}
			else{
				echo "error". $delete. "<br>". mysqli_error($koneksi). "<br>Failed to delete record";
			}
			mysqli_close($koneksi);
	}

//aksi edit
	elseif ($aksi == 'edit') {
		$id = $_GET['id'];
		$nama_rekan = $_POST['nama_rekan'];
		$pemimpin = $_POST['pemimpin'];
		$alamat_rekan = $_POST['alamat_rekan'];
		$kota_rekan = $_POST['kota_rekan'];

		if (($nama_rekan == "")||($pemimpin == "")||($alamat_rekan == "")||($kota_rekan == "") ){
			echo "<script>alert('Nama Perusahaan Rekanan, Direktur Perusahaan, Alamat dan Kota Rekanan Tidak Boleh Kosong !'); window.location.href='../index.php?page=rekanan'</script>";
		}

		else{
			$edit = mysqli_query($koneksi, "UPDATE tblrekan SET nama_rekan = '$nama_rekan', pemimpin='$pemimpin', alamat_rekan='$alamat_rekan', kota_rekan='$kota_rekan' WHERE id_rekan = '$id' ");
			
			if ($edit) {
				echo "<script>window.location.href='../index.php?page=rekanan'</script>";
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
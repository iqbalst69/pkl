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
			$username = $_POST['username'];
			$pass = md5($_POST['pass']);
			$status = $_POST['status'];
			$nama = $_POST['nama'];
			$tgl_aktif =  date("Y-m-d");
			

			if (($username == "")||($pass == "") ){
				echo "<script>alert('Username dan Password Tidak Boleh Kosong !'); window.location.href='../index.php?page=user'</script>";
			}

			else{
				$add = mysqli_query($koneksi, "INSERT INTO admin (username, pass, status, nama, tgl_aktif) VALUES ('$username','$pass','$status','$nama','$tgl_aktif')");
				if ($add) {
					echo "<script>window.location.href='../index.php?page=user'</script>";
				}
				else{
					echo "error". $add. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
				}
				mysqli_close($koneksi);
			}
		}
// end aksi tambah
//aksi hapus	
		elseif ($aksi == 'delete') {
			$id = $_GET['id'];
			$delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id ='$id' ");
			if ($delete) {
				echo "<script> window.location.href='../index.php?page=user'</script>";
			}
			else{
				echo "error". $delete. "<br>". mysqli_error($koneksi). "<br>Failed to delete record";
			}
			mysqli_close($koneksi);
		}
// end aksi hapus		

//aksi edit	
		elseif ($aksi == 'edit') {
			$id = $_GET['id'];
			
			$username = $_POST['username'];
			$pass = md5($_POST['pass']);
			$status = $_POST['status'];
			$nama = $_POST['nama'];

			if (($username == "")||($pass == "") ){
				echo "<script>window.location.href='../index.php?page=user'</script>";
			}

			else{
				$edit = mysqli_query($koneksi, "UPDATE admin SET username = '$username',nama = '$nama', pass = '$pass', status = '$status' WHERE id = '$id' ");
				if ($edit) {
					echo "<script>alert('Data Berhasil di Rubah !'); window.location.href='../index.php?page=user'</script>";
				}
				else{
					echo "error". $edit. "<br>". mysqli_error($koneksi). "<br>Failed to edit record";
				}
			}
			mysqli_close($koneksi);
		}
// end aksi edit

		elseif ($aksi == 'akunku') {
			$id = $_GET['id'];
			$username = $_POST['username'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$nama = $_POST['nama'];	

			if ($pass1 != $pass2) {
				echo "<script>alert('Error ! Password Baru dan Retype Password Tidak Sama'); window.location.href='../index.php?page=akunku'</script>";		
			}	
			elseif (($username == "")||($pass1 == "")) {
				echo "<script>alert('Username dan Password Baru Tidak Boleh Kosong !'); window.location.href='../index.php?page=akunku'</script>";
			}	
			else{
				$pass = md5($_POST['pass1']);
				$edit = mysqli_query($koneksi, "UPDATE admin SET username = '$username',nama = '$nama', pass = '$pass' WHERE id = '$id' ");
				if ($edit) {
					echo "<script>window.location.href='../index.php'</script>";
				}
				else{
					echo "error". $edit. "<br>". mysqli_error($koneksi). "<br>Failed to edit record";
				}
			}
		}
	}

	else{
		header("location:../index.php?");
	}
?>
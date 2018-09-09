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
		<img src="main/image/Spinner.gif" width="100">
	</div>
</div>
<?php 

include 'koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "select * from admin where username='$username' and pass='$password'");
$cek = mysqli_num_rows($login);

if ($cek <= 0) {
	header("location:index.php?pesan=error");
}

else{
	$ambildata = mysqli_fetch_array($login);
	$nama = $ambildata['nama'];
	$status = $ambildata['status'];
	$id = $ambildata['id'];

	if($cek > 0){
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['nama']  = $nama;
		$_SESSION['password'] = $password;
		$_SESSION['status'] = $status;
		$_SESSION['id'] = $id;
		header("location:main/index.php");
	}
	else{
		header("location:index.php");	
	}	
}

?>
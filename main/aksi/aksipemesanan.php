<?php  
include '../../koneksi.php'; //file koneksi kejauhan cuyy
date_default_timezone_set("ASIA/JAKARTA");

session_start(); //cara curang masuk seesion untuk login admin ke semua page
if (empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus Login Terlebih Dahulu !'); window.location.href='../index.php'</script>";
}


if (isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];

  if ($aksi == 'delete') {
    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "DELETE FROM tblsementara WHERE id_sementara = '$id' ");
    if ($query) {
      echo "<script>window.location.href='../pemesanan-next.php'</script>";
    }
    else{
      echo "error". $query. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
    }
    mysqli_close($koneksi);
  }

  elseif($aksi == 'tambah'){
    $id_belanja = $_GET['pesan'];
    $id_barang = $_POST['id_barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    

    if ($id_barang == "") {
      echo "<script>window.location.href='../pemesanan-next.php?error=kosong'</script>";
    }

    else{
      $total = $harga * $jumlah;
      $query = mysqli_query($koneksi, "INSERT INTO tblsementara (id_belanja, id_barang, harga, jumlah, total) VALUES('$id_belanja','$id_barang','$harga','$jumlah','$total')");
        if ($query) {
          echo "<script>window.location.href='../pemesanan-next.php'</script>";
        }
        else{
          echo "error". $query. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
        }
        mysqli_close($koneksi);
      }
    } 
} 

else{
  echo "<script>window.location.href='../index.php'</script>";
}
?>
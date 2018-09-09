<?php

include '../../koneksi.php'; //file koneksi kejauhan cuyy
date_default_timezone_set("ASIA/JAKARTA");

session_start(); //cara curang masuk seesion untuk login admin ke semua page
if (empty($_SESSION['username'])) {
    echo "<script>alert('Anda harus Login Terlebih Dahulu !'); window.location.href='../index.php'</script>";
}

    $id_belanja = $_GET['id'];
    $id =  $_SESSION['id']; //ambil id user
    $id_rekan = $_POST['id_rekan']; //ambil id rekanan
    $id_kegiatan = $_SESSION['id_kegiatan'];  //
    $ket_belanja = $_POST['ket_belanja']; //untuk belanja apa ?
    $subtotal = $_GET['total'];
    $tgl_belanja = date('Y-m-d');

    if ($id_rekan == "") {
      echo "<script>window.location.href='../pemesanan-next.php?error=rekanan'</script>";
    }

    else{
      $cekdata = mysqli_query($koneksi, "SELECT * from tblkegiatan WHERE id_kegiatan = '$id_kegiatan'");
      $row = mysqli_num_rows($cekdata);
      if (mysqli_num_rows($cekdata)<=0) 
      {
        $insert = mysqli_query($koneksi, "INSERT INTO tblkegiatan (id_kegiatan,nama_kegiatan) VALUES ('$_SESSION[id_kegiatan]','$_SESSION[nama_kegiatan]')");

        if ($insert) {
          $insert_data = mysqli_query($koneksi, "INSERT INTO tblbelanja (id_belanja, id, id_rekan, id_kegiatan, ket_belanja, subtotal, tgl_belanja) VALUES('$id_belanja', '$id', '$id_rekan','$id_kegiatan','$ket_belanja','$subtotal','$tgl_belanja')");

          if ($insert_data) {
            $duplicate_data = mysqli_query($koneksi, "INSERT INTO dtlpembelian(id_dtl, id_belanja, id_barang, harga, jumlah, total) SELECT id_sementara, id_belanja, id_barang, harga, jumlah, total FROM tblsementara");
            if ($duplicate_data) {
              $hapus = mysqli_query($koneksi, "DELETE FROM tblsementara");

              if ($hapus) {
                echo "<script>window.location.href='../index.php'</script>";
              }

              else{
                echo "error". $hapus. "<br>". mysqli_error($koneksi). "<br>Failed to add record";  
              }
            }
            else{
              echo "error". $duplicate_data. "<br>". mysqli_error($koneksi). "<br>Failed to add record";  
            }
          }
          else{
            echo "error". $insert_data. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
          }
        }

        else{
          echo "error". $insert. "<br>". mysqli_error($koneksi). "<br>Failed to add record";
        }
      }
      mysqli_close($koneksi);
    }

    

  ?>
<?php  
include '../../koneksi.php';

  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'delete_kegiatan') {
      $id = $_GET['id'];
      
      $tblbelanja = mysqli_query($koneksi, "SELECT * FROM tblbelanja WHERE id_kegiatan = '$id'");
      $databelanja = mysqli_fetch_array($tblbelanja);

      $delete1 = mysqli_query($koneksi, "DELETE FROM dtlpembelian WHERE id_belanja = '$databelanja[id_belanja]'");
      $delete2 = mysqli_query($koneksi, "DELETE FROM tblbelanja WHERE id_kegiatan = '$id'");
      $delete3 = mysqli_query($koneksi, "DELETE FROM tblkegiatan WHERE id_kegiatan = '$id'");

      if ($delete3) {
          echo "<script>window.location.href='../index.php?page=pesan'</script>";
      }

      else{
        echo "error". $delete3. "<br>". mysqli_error($koneksi). "<br>Failed to add record";  
      }
    }
  }

?>
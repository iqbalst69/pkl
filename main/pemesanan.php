<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Amprahan / </b></a>Pemesanan
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Nomer Rek Pemesanan Barang</h4>
        </div>

        <div class="panel-body">          
          <form action="" method="post">
            <div class="row form-group" >
              <div class="col-md-3">
               <h6>Nomer Rek. Kegiatan</h6>
              </div>
              <div class="col-sm-9">
                <input type="text" name="id" class="form-control">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-3">
               <h6>Uraian Kegiatan</h6>
              </div>
              <div class="col-sm-9">
                <input type="text" name="uraian" class="form-control">
              </div>
            </div> 
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Next</button>
              <button type="reset" class="btn btn-danger">Reset</button>
            </div>
          </form>
        </div>
        <div class="panel-footer">
<?php  
  if(isset($_POST['id'])){
    $_SESSION['id_kegiatan'] = $_POST['id'];
    $_SESSION['nama_kegiatan'] = $_POST['uraian'];

    $data = mysqli_query($koneksi, "SELECT * FROM tblkegiatan");
//teknik cek data ada gak disalah satu table
    $cek = "";
    while($cekdata = mysqli_fetch_array($data)){
      if ($_SESSION['id_kegiatan'] == $cekdata['id_kegiatan']) {
        $cek = "true";
        $id_kegiatan = $_SESSION['id_kegiatan'];
      }
    }
    if ($cek == "true") {
      $get = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM tblkegiatan WHERE id_kegiatan = $id_kegiatan"));
      echo "<h4 style='color: black'>Data Sudah Tersedia Untuk ".$_SESSION['id_kegiatan']." Dengan Kegiatan ".$get['nama_kegiatan']. "</h4>";
    }

//cek kalo nama uraian kosong
    elseif(($_SESSION['nama_kegiatan'] == "")||($_SESSION['id_kegiatan'] == "")){
      echo "<h4 style='color: black'>Nomer Rek Kegiatan dan Uraian Kegiatan Tidak Boleh Kosong !</h4>";
    }

    else{
      echo "<script>
        window.location.href='pemesanan-next.php?id=$_SESSION[id_kegiatan]&uraian=$_SESSION[nama_kegiatan]'
      </script>";
      
    }
  }
?>
    </div>
      </div>
      <!-- End Content -->
  </div> <!-- Start panel body -->

  <div class="panel-body">  <!-- Start panel body -->   
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Daftar Data Nomer Rek Pemesanan</h4>
        </div>

        <div class="panel-body"> 
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nomer Rek</th>
                  <th>Uraian Kegiatan</th>
<?php if ($_SESSION['status'] == 'admin') : ?>
                  <th></th>
<?php endif; ?>                 
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tblkegiatan");
                while ($row = mysqli_fetch_array($query)) {
                  echo 
                  "<tr>
                    <td>$no</td>
                    <td>$row[id_kegiatan]</td>
                    <td>$row[nama_kegiatan]</td>";
if ($_SESSION['status'] == 'admin') :                    
                      echo "<td class='text-center'> <a href=aksi/aksipesan.php?aksi=delete_kegiatan&id=$row[id_kegiatan] onClick='return confirm(\"Apakah Anda benar ingin menghapus $row[id_kegiatan] Kegiatan $row[nama_kegiatan] Beserta SELURUH pembeliannya ??\")' class='btn btn-danger btn-block' role ='button'><i class='fa fa-times'></i></a> </td>
                  </tr>
                  ";
endif;
                  $no++;
                }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
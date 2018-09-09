<?php  
include '../koneksi.php';
$kueri = mysqli_query($koneksi, "SELECT * FROM admin WHERE id = '$_SESSION[id]'");
$view = mysqli_fetch_array($kueri);
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>My Account / </b></a>Edit Account
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
  <!-- Button Tambah data -->
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Edit <?php echo $_SESSION['status']." - " .$_SESSION['nama'] ?> </h4>
        </div>
<form action="aksi/aksiuser.php?aksi=akunku&id=<?php echo $_SESSION['id'] ?>" method="post">        
        <div class="panel-body">
          <div class="row form-group">
            <div class="col-md-2"><h6>Status User</h6></div>
            <div class="col-md-3"><input type="text" placeholder="<?php echo $_SESSION['status']?>" class="form-control" disabled></div>
            <div class="col-md-2"><h6>Tanggal Aktivasi</h6></div>
            <div class="col-md-3"><input type="text" placeholder="<?php echo date('d/m/Y', strtotime($view['tgl_aktif']))?>" class="form-control" disabled></div>
          </div>
          <div class="row form-group">
            <div class="col-md-2"><h6>Nama Lengkap</h6></div>
            <div class="col-md-3"><input type="text" name="nama" value="<?php echo $_SESSION['nama']?>" class="form-control" ></div>
          </div>
          <div class="row form-group">
            <div class="col-md-2"><h6>Username</h6></div>
            <div class="col-md-3"><input type="text" name="username" value="<?php echo $_SESSION['username']?>" class="form-control" ></div>
          </div>
          <div class="row form-group">
            <div class="col-md-2"><h6>Password Baru</h6></div>
            <div class="col-md-3"><input type="password" name="pass1" class="form-control" ></div>
            <div class="col-md-2"><h6>Retype Password Baru</h6></div>
            <div class="col-md-3"><input type="password" name="pass2" class="form-control" ></div>
          </div>
          <div class="row form-group">
            <div class="col-md-10 text-center">
              <button type="submit" class="btn btn-info">Kirim</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        </div>
</form>
      </div>
      <!-- End Content -->
  </div> <!-- Start panel body -->
</div>
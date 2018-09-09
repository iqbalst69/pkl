<?php
if ($_SESSION['status'] != 'admin') {
  echo "<script>window.location.href='index.php'</script>";
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Master Data / </b></a>Data User
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
  <!-- Button Tambah data -->
  <div style="padding-bottom: 5px;">
    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#addModal'><i class="menu-icon fa fa-plus"></i> Tambah Data </button>
  </div>
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Data User Sistem Amprahan</h4>
        </div>

        <div class="panel-body">          
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Tanggal Aktivasi</th>
                  <th class="text-center">Edit</th>
                  <th class="text-center">Hapus</th>                  
                </tr>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM admin  order by status");

                if($data == FALSE){
                  die(mysql_error());
                }
  $no = 1;
  while($hasil = mysqli_fetch_array($data)){
  
  $Tanggal = date('d/m/Y', strtotime($hasil['tgl_aktif']));
  echo " <tr>
  <td> $no </td>
  <td>$hasil[username]</td>
  <td>$hasil[nama]</td>
  <td>$hasil[status]</td>
  <td>$Tanggal</td>
  <td class='text-center'> <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editModal$hasil[id]'><i class='fa fa-edit'></i> </td>
  <td class='text-center'> <a href=aksi/aksiuser.php?aksi=delete&id=$hasil[id] onClick='return confirm(\"Apakah Anda benar ingin menghapus $hasil[status] = $hasil[username]?\")' class='btn btn-danger' role ='button'><i class='fa fa-times'></i></a> </td>"; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal<?php echo $hasil['id']; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Edit User <?php echo $hasil['username']; ?></h4>
        <hr>
      </div>
    
    <form action="aksi/aksiuser.php?aksi=edit&id=<?php echo $hasil['id'];?>" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Username</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="username" class="form-control" placeholder="<?php echo $hasil['username']; ?>" value="<?php echo $hasil['username']; ?>" maxlength="10">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Password Baru</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="pass" class="form-control" placeholder="Password" maxlength="12">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Nama Lengkap</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama" class="form-control" placeholder="<?php echo $hasil['nama'];  ?>" value="<?php echo $hasil['nama'];?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Status</h6></label>
        </div>
        <div class="col-md-9">
          <select class="form-control" name="status">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Tanggal Aktivasi</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama" class="form-control" placeholder="<?php echo $hasil['tgl_aktif']; ?>" disabled>
        </div>
      </div>
    </div>
        <div class="modal-footer text-center">
          <div class="col-md-12">
            <button type="submit" name="simpan" class="btn btn-info">Save changes</button>       
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
    
    </div>
  </div>
</div>
<!-- Akhir Modal -->

<?php   $no++;
  }
  ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End Content -->
  </div> <!-- Start panel body -->
</div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Tambah User</h4>
      </div>
    
    <form action="aksi/aksiuser.php?aksi=add" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Username</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="username" class="form-control" placeholder="Username..." maxlength="10">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Password</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="pass" class="form-control" placeholder="Password..." maxlength="12">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Nama Lengkap</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap...">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Status</h6></label>
        </div>
        <div class="col-md-9">
          <select class="form-control" name="status">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
      </div>
    </div>
        <div class="modal-footer text-center">
          <div class="col-md-12">
            <button type="submit" name="simpan" class="btn btn-info">Save changes</button>       
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>

    </div>
  </div>
</div>
<!-- Akhir Modal -->
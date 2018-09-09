<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Amprahan / </b></a>Data Barang
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
  <!-- Button Tambah data -->
  <div style="padding-bottom: 5px;">
    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#addModal'><i class="menu-icon fa fa-plus"></i> Tambah Data </button>
    <a href="excel/cetakexcel.php?doc=barang" class="btn btn-default"><i class="menu-icon fa fa-print"></i> Cetak Excel</a>
  </div>
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Data Barang Untuk Pemesanan</h4>
        </div>

        <div class="panel-body">          
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Uraian Barang</th>
                  <th class="text-center">Satuan</th>
<?php if ($_SESSION['status'] == 'admin') : ?>
                  <th class="text-center">Edit</th>
                  <th class="text-center">Hapus</th>
<?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM tblbarang ");

                if($data == FALSE){
                  die(mysqli_error());
                }
  $no = 1;
  while($hasil = mysqli_fetch_array($data)){
  echo " <tr>
  <td> $no </td>
  <td>$hasil[nama_barang]</td>
  <td>$hasil[satuan]</td>";
if ($_SESSION['status'] == 'admin') :  
  echo"<td class='text-center'> <button type='button' class='btn btn-primary btn-block' data-toggle='modal' data-target='#editModal$hasil[id_barang]'><i class='fa fa-edit'></i> </td>
  <td class='text-center'> <a href=aksi/aksibarang.php?aksi=delete&id=$hasil[id_barang] onClick='return confirm(\"Apakah Anda benar ingin menghapus $hasil[nama_barang] ?\")' class='btn btn-danger btn-block' role ='button'><i class='fa fa-times'></i></a> </td>"; 
endif; ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal<?php echo $hasil['id_barang']; ?>">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Edit Barang <?php echo $hasil['nama_barang']; ?></h4>
      </div>
    
    <form action="aksi/aksibarang.php?aksi=edit&id=<?php echo $hasil['id_barang'];?>" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Uraian Barang</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama_barang" class="form-control" placeholder="<?php echo $hasil['nama_barang'] ?>" value="<?php echo $hasil['nama_barang'] ?>" maxlength="20">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Satuan</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="satuan" class="form-control" placeholder="<?php echo $hasil['satuan'] ?>" value="<?php echo $hasil['satuan'] ?>">
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
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Tambah Data Barang</h4>
      </div>
    
    <form action="aksi/aksibarang.php?aksi=add" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Uraian Barang</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama_barang" class="form-control" placeholder="Uraian Barang...">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Satuan</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="satuan" class="form-control" placeholder="Satuan..." maxlength="10">
          <p class="help-text">Diisi dengan pcs, unit, lembar, dan sebagainya...</p>
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
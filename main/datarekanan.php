<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Master Data / </b></a>Data Perusahaan Rekanan
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
  <div style="padding-bottom: 5px;">
<?php if ($_SESSION['status'] == 'admin') : ?>    
  <!-- Button Tambah data -->
    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#addModal'><i class="menu-icon fa fa-plus"></i> Tambah Data </button>
<?php endif; ?>  
    <a href="excel/cetakexcel.php?doc=rekanan" class="btn btn-default"><i class="menu-icon fa fa-print"></i> Cetak Excel</a>
  </div>
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Data Perusahaan Rekanan</h4>
        </div>

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Perusahaan Rekanan</th>
                  <th class="text-center">Direktur</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Kota</th>
<?php if ($_SESSION['status'] == 'admin') : ?>
                  <th class="text-center">Edit</th>
                  <th class="text-center">Hapus</th>                  
<?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM tblrekan  order by id_rekan");

                if($data == FALSE){
                  die(mysql_error());
                }
  $no = 1;
  while($hasil = mysqli_fetch_array($data)){
  echo " <tr>
  <td> $no </td>
  <td>$hasil[nama_rekan]</td>
  <td>$hasil[pemimpin]</td>
  <td>$hasil[alamat_rekan]</td>
  <td> $hasil[kota_rekan]</td>";
if ($_SESSION['status'] == 'admin') :  
  echo "<td class='text-center'> <button type='button' class='btn btn-primary btn-block' data-toggle='modal' data-target='#editModal$hasil[id_rekan]'><i class='fa fa-edit'></i> </td>
  <td class='text-center'> <a href=aksi/aksirekanan.php?aksi=delete&id=$hasil[id_rekan] onClick='return confirm(\"Apakah Anda benar ingin menghapus $hasil[nama_rekan] ?\")' class='btn btn-danger btn-block' role ='button'><i class='fa fa-times'></i></a> </td>"; 
endif;  ?>
<!-- Modal Edit Data-->
<div class="modal fade" id="editModal<?php echo $hasil['id_rekan']; ?>">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Edit Rekanan <?php echo $hasil['nama_rekan']; ?></h4>
      </div>
    
    <form action="aksi/aksirekanan.php?aksi=edit&id=<?php echo $hasil['id_rekan'];?>" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-4">
          <label ><h6>Nama Perusahaan</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="nama_rekan" class="form-control" placeholder="<?php echo $hasil['nama_rekan'] ?>" value="<?php echo $hasil['nama_rekan'] ?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Direktur Perusahaan</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="pemimpin" class="form-control"  placeholder="<?php echo $hasil['pemimpin'] ?>" value="<?php echo $hasil['pemimpin'] ?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Alamat</h6></label>
        </div>
        <div class="col-md-8">
          <textarea type="text" name="alamat_rekan" class="form-control" rows="3"><?php echo $hasil['alamat_rekan'] ?> </textarea>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Kota</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="kota_rekan" class="form-control"  placeholder="<?php echo $hasil['kota_rekan'] ?>" value="<?php echo $hasil['kota_rekan'] ?>">
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
        <h4 class="modal-title" id="myModalLabel">Form Tambah Perusahaan Rekanan</h4>
      </div>
    
    <form action="aksi/aksirekanan.php?aksi=add" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-4">
          <label ><h6>Nama Perusahaan</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="nama_rekan" class="form-control" placeholder="Nama Perusahaan Rekanan..." >
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Direktur Perusahaan</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="pemimpin" class="form-control" placeholder="Direktur Perusahaan Rekanan..." >
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Alamat</h6></label>
        </div>
        <div class="col-md-8">
          <textarea type="text" name="alamat_rekan" class="form-control" rows="3" > </textarea>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-4">
          <label><h6>Kota</h6></label>
        </div>
        <div class="col-md-8">
          <input type="text" name="kota_rekan" class="form-control" placeholder="Kota Perusahaan Rekanan..." >
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
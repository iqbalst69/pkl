<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Master Data / </b></a>Data Perusahaan
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body --> 

  <!-- Button Tambah data -->
<?php if ($_SESSION['status'] == 'admin') : ?>
  <div style="padding-bottom: 5px;">
    <button type='button' class='btn btn-info' data-toggle='modal' data-target='#addModal'><i class="menu-icon fa fa-plus"></i> Tambah Data </button>
  </div>
<?php endif; ?>
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Data Penjabat Diskominfotik Kota Banda Aceh</h4>
        </div>

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">NIP</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Jabatan</th>
<?php if ($_SESSION['status'] == 'admin') : ?>
                  <th class="text-center">Edit</th>
                  <th class="text-center">Hapus</th>                  
<?php endif; ?>                  
                </tr>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($koneksi,"SELECT * FROM tbljabatan ");

                if($data == FALSE){
                  die(mysql_error());
                }
  $no = 1;
  while($hasil = mysqli_fetch_array($data)){
  echo " <tr>
  <td> $no </td>
  <td>$hasil[nip]</td>
  <td>$hasil[nama_penjabat]</td>
  <td>$hasil[status_penjabat]</td>";
if ($_SESSION['status'] == 'admin') :
  echo"<td class='text-center'> <button type='button' class='btn btn-primary btn-block' data-toggle='modal' data-target='#editModal$hasil[nip]'><i class='fa fa-edit'></i> </td>
  <td class='text-center'> <a href=aksi/aksiperusahaan.php?aksi=delete&id=$hasil[nip] onClick='return confirm(\"Apakah Anda benar ingin menghapus $hasil[nip] atas nama $hasil[nama_penjabat]?\")' class='btn btn-danger btn-block' role ='button'><i class='fa fa-times'></i></a> </td>"; 
endif;?>

<!-- Modal Edit Data-->
<div class="modal fade" id="editModal<?php echo $hasil['nip']; ?>">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Form Edit NIP <?php echo $hasil['nip']; ?></h4>
      </div>
    
    <form action="aksi/aksiperusahaan.php?aksi=edit&id=<?php echo $hasil['nip']; ?>" method="post">
        <div class="modal-body">    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>NIP</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nip" class="form-control" placeholder="<?php echo $hasil['nip'] ?>" value="<?php echo $hasil['nip'] ?>" maxlength="20">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Nama Penjabat</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama_penjabat" class="form-control" placeholder="<?php echo $hasil['nama_penjabat'] ?>" value="<?php echo $hasil['nama_penjabat'] ?>"  maxlength="40">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Jabatan</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="status_penjabat" class="form-control" placeholder="<?php echo $hasil['status_penjabat'] ?>" value="<?php echo $hasil['status_penjabat'] ?>">
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
        <h4 class="modal-title" id="myModalLabel">Form Tambah Penjabat Diskominfotik</h4>
      </div>
    
    <form action="aksi/aksiperusahaan.php?aksi=add" method="post">
        <div class="modal-body" >    
          <div class="row form-group">
        <div class="col-md-3">
          <label><h6>NIP</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nip" class="form-control" placeholder="NIP..." maxlength="20">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Nama Penjabat</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="nama_penjabat" class="form-control" placeholder="Nama Lengkap..." maxlength="40">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-md-3">
          <label><h6>Jabatan</h6></label>
        </div>
        <div class="col-md-9">
          <input type="text" name="status_penjabat" class="form-control" placeholder="Jabatan...">
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
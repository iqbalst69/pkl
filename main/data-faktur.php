<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      <a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> 
      <a href="#"><b>Dashboard </b></a>
    </h3>
  </div>

  <div class="panel-body">  <!-- Start panel body -->   
  <!-- Button Tambah data -->
  <div style="padding-bottom: 5px;">
    <a href="index.php?page=pesan" class="btn btn-info"><i class="menu-icon fa fa-plus"></i> Pesan Baru</a>
    <a href="excel/cetakexcel.php?doc=amprahan" class="btn btn-default"><i class="menu-icon fa fa-print"></i> Cetak Excel</a>
  </div>
      <!-- Start Content -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title text-center text-uppercase">Data Amprahan Diskominfotik Kota Banda Aceh</h4>
        </div>

        <div class="panel-body">          
          <div class="table-responsive">
            <table class="table  table-bordered table-hover" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Kegiatan</th>
                  <th class="text-center">Tanggal Pesanan</th>
                  <th class="text-center">Rekanan</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">Untuk Pembayaran</th>
                  <th class="text-center">Date</th>
                  <th class="text-center">Detail</th>                  
                  <th class="text-center">Print</th>
<?php if ($_SESSION['status'] == 'admin') :?>                 
                  <th class="text-center">Delete</th>
<?php endif; ?>                  
                </tr>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($koneksi,"SELECT a.id_belanja, a.id, a.id_rekan, a.id_kegiatan, a.ket_belanja, a.subtotal, a.tgl_belanja, a.tgl_faktur, a.no_faktur, a.tgl_beritaacara, a.tgl_penerimaan, b.username, b.nama,  c.nama_rekan, c.alamat_rekan, c.kota_rekan, c.pemimpin, d.nama_kegiatan
                  FROM tblkegiatan d INNER JOIN (tblrekan c INNER JOIN (admin b INNER JOIN tblbelanja a ON b.id = a.id) ON c.id_rekan = a.id_rekan) ON d.id_kegiatan = a.id_kegiatan");

                
  $no = 1;
  while($hasil = mysqli_fetch_array($data)){
  
  $tgl_belanja = date('d/m/Y', strtotime($hasil['tgl_belanja']));

  echo " <tr>
  <td>$no </td>
  <td>$hasil[nama_kegiatan]</td>
  <td>$tgl_belanja</td>
  <td>$hasil[nama_rekan]</td>
  <td>Rp.". number_format($hasil['subtotal'],0,',','.') ."</td>
  <td>$hasil[ket_belanja]</td>
  <td class='text-center'><button type='button' class='Tanggal btn btn-info btn-block' role ='button' data-id=$hasil[id_belanja]><i class='fa fa-calendar'></i></td>
  <td class='text-center'> <button type='button' class=' Detail btn btn-primary btn-block' role ='button' data-id=$hasil[id_belanja]><i class='fa fa-th-list'></i> </td>
  <td class='text-center'><a href='cetak.php?id=$hasil[id_belanja]' class='btn btn-success btn-block'><i class='fa fa-print'></i></a> </td>";
if ($_SESSION['status'] == 'admin') :  
  echo "<td class='text-center'><a href='aksi/aksidatafaktur.php?aksi=hapus&id=$hasil[id_belanja]' class='btn btn-danger btn-block' onClick='return confirm(\"Apakah Anda benar ingin menghapus $hasil[ket_belanja] untuk kegiatan $hasil[nama_kegiatan]?\")'><i class='fa fa-times'></i></a></td>
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
      <!-- End Content -->
  </div> <!-- Start panel body -->
</div>

<!-- Modal -->
        <div class="modal fade" id="myModalView"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                </div>
            </div>
        </div>
<!-- -->

<script>
        $(function(){
            $(document).on('click','.Detail',function(e){
                e.preventDefault();
                $("#myModalView").modal('show');
                $.post('modal-data-faktur.php?aksi=view',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-content").html(html);
                    }   
                );
            });
        });
</script>
<script>
        $(function(){
            $(document).on('click','.Tanggal',function(e){
                e.preventDefault();
                $("#myModalView").modal('show');
                $.post('modal-data-faktur.php?aksi=tanggal',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-content").html(html);
                    }   
                );
            });
        });
</script>
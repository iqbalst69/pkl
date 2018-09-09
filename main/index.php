<?php include '../koneksi.php'; 
session_start();
if (empty($_SESSION['username'])) {
  echo "<script>alert('Anda harus Login Terlebih Dahulu !'); window.location.href='../index.php'</script>";
}
date_default_timezone_set("ASIA/JAKARTA");
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Amprahan Diskominfotik</title>
    <link rel="stylesheet" href="dist/css/site.min.css">
    <script type="text/javascript" src="dist/js/site.min.js"></script>
    <link rel="stylesheet" href="dist/css/datatable/dataTables.bootstrap.min.css">
<style type="text/css">
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
</style>
<script>
$(document).ready(function(){
$(".preloader").fadeOut();
})
</script>
  </head>

  <body>

<div class="preloader">
<div class="loading">
<img src="image/Spinner.gif" width="100">
</div>
</div>

    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="#" class="navbar-brand ">Amprahan Pemesanan Barang<br> Diskominfotik Kota Banda Aceh</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active">
                <a href="">
                  <div class="nav-link text-center">
                    <h6>
                    <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">                             
                    <?php echo namahari(date("Y/m/d"))." | ".date("d/m/Y |") ?>
                    <span id="clock" style="padding-right: 20px;"></span>
                    </h6>
                  </div>
                </a>
              </li>
              <li class="active"><a href="" data-toggle='modal' data-target='#logOut'><h6>LOGOUT</h6></a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

<!--header-->
    <div class="container-fluid">
    <!--documents-->
      <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
          <ul class="list-group panel">
            <li class="list-group-item text-center"><img src="image/pemko.png" width="100px"> </li>
            <li style="font-size: 14px;"><a href="index.php" class="list-group-item"><i class="glyphicon glyphicon-home"></i><b>DASHBOARD </b></a></li>
            <li style="font-size: 14px;" class="list-group-item"><b>MASTER DATA </b></li>
<?php if ($_SESSION['status'] == 'admin') : ?>            
            <li style="font-size: 14px;"><a class="list-group-item" href="?page=user" style="padding-left: 55px"><i class="fa fa-user"></i>Data User</a></li>
<?php endif; ?>            
            <li style="font-size: 14px;"><a class="list-group-item" href="?page=penjabat" style="padding-left: 55px"><i class="fa  fa-puzzle-piece"></i>Data Penjabat Perusahaan</a></li>
            <li style="font-size: 14px;"><a class="list-group-item" href="?page=panitia" style="padding-left: 55px"><i class="fa fa-tags"></i>Data Panitia</a></li>
            <li style="font-size: 14px;"><a class="list-group-item" href="?page=rekanan" style="padding-left: 55px"><i class="fa fa-navicon"></i>Data Perusahaan Rekanan</a></li>
            <li style="font-size: 14px;" class="list-group-item" ><b>AMPRAHAN </b></li>
            <li style="font-size: 14px;" ><a href="?page=barang" class="list-group-item" style="padding-left: 55px"><i class="fa fa-dropbox"></i>Data Barang </a></li>
            <li style="font-size: 14px;" ><a href="?page=pesan" class="list-group-item" style="padding-left: 55px"><i class="fa fa-windows"></i>Pemesanan</a></li>
            <li style="font-size: 14px;" class="list-group-item" ><b>MY ACCOUNT </b></li>
            <li style="font-size: 14px;"><a href="?page=akunku" class="list-group-item" style="padding-left: 55px"><i class="fa fa-cog"></i>Edit Accout</a></li>
            <li style="font-size: 14px;"><a href="" class="list-group-item" style="padding-left: 55px" data-toggle='modal' data-target='#logOut'><i class="fa fa-sign-out"></i>Logout</a></li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-9 content"><!-- Start content -->
          <?php include 'tab-navigasi.php'; ?>
        </div><!-- End content -->
      </div>
    </div>

  </body>
</html>
    
    
    <script src="dist/js/data-table/datatables.min.js"></script>
    <script src="dist/js/data-table/dataTables.bootstrap.min.js"></script>
    <script src="dist/js/data-table/dataTables.buttons.min.js"></script>
    <script src="dist/js/data-table/buttons.bootstrap.min.js"></script>
    <script src="dist/js/data-table/jszip.min.js"></script>
    <script src="dist/js/data-table/pdfmake.min.js"></script>
    <script src="dist/js/data-table/vfs_fonts.js"></script>
    <script src="dist/js/data-table/buttons.html5.min.js"></script>
    <script src="dist/js/data-table/buttons.print.min.js"></script>
    <script src="dist/js/data-table/buttons.colVis.min.js"></script>
    <script src="dist/js/data-table/datatables-init.js"></script>

<!-- Logout Modal-->
    <div class="modal fade" id="logOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">LOG OUT</h4>
          </div>
          <div class="modal-body"><h5>Apa anda yakin ingin Keluar ?</h5 ></div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

<?php  
//function tanggal indonesia
  function tgl_indo($tanggal)
  {
  if (is_null($tanggal)) {
    return $tanggal;
  }
  else{   
    $bulan = array (1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
  }

//function nama hari 
  function namahari($tanggal){
    if (is_null($tanggal)) {
      return "";
    }
    else{     
      $tgl=substr($tanggal,8,2);
      $bln=substr($tanggal,5,2);
      $thn=substr($tanggal,0,4);

      $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
      
        switch($info){
            case '0': return "Minggu"; break;
            case '1': return "Senin"; break;
            case '2': return "Selasa"; break;
            case '3': return "Rabu"; break;
            case '4': return "Kamis"; break;
            case '5': return "Jumat"; break;
            case '6': return "Sabtu"; break;
        };   
      }
  }    
?>
<?php
function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " Belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }
 
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil;
  }

?>
<!--menampilkan jam -->
<script type="text/javascript">    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function tampilkanwaktu(){
        //buat object date berdasarkan waktu saat ini
        var waktu = new Date();
        //ambil nilai jam, 
        //tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
        var sh = waktu.getHours() + ""; 
        //ambil nilai menit
        var sm = waktu.getMinutes() + "";
        //ambil nilai detik
        var ss = waktu.getSeconds() + "";
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<?php  
include '../koneksi.php';
$id_faktur = $_GET['id'];

//==============================================================
$data = mysqli_query($koneksi,"SELECT a.id_belanja, a.id, a.id_rekan, a.id_kegiatan, a.ket_belanja, a.subtotal, a.tgl_belanja, a.tgl_faktur, a.no_faktur, a.tgl_beritaacara, a.tgl_penerimaan, b.username, b.nama,  c.nama_rekan, c.alamat_rekan, c.kota_rekan, c.pemimpin, d.nama_kegiatan
    FROM tblkegiatan d INNER JOIN (tblrekan c INNER JOIN (admin b INNER JOIN tblbelanja a ON b.id = a.id) ON c.id_rekan = a.id_rekan) ON d.id_kegiatan = a.id_kegiatan WHERE id_belanja ='$id_faktur' ");

$view = mysqli_fetch_array($data) ;

  $kepala = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbljabatan WHERE status_penjabat = 'Kepala'"));
  $pengurus_barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbljabatan WHERE status_penjabat = 'Pengurus Barang'"));
  $bendahara = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbljabatan WHERE status_penjabat = 'Bendahara Pengeluaran'"));


if ((is_null($view['tgl_faktur']))||(is_null($view['tgl_beritaacara']))||(is_null($view['tgl_penerimaan']))) {
  echo "<script>alert('Tanggal Masih Kosong ! Silahkan Sesuaikan Tanggal Terlebih Dahulu'); window.location.href='index.php'</script>";
}

//==============================================================
require('dist/fpdf/mc_table.php');

$pdf=new PDF_MC_Table();

$pdf->AddPage();
  include 'cetak/tandapenerimaan.php';
$pdf->AddPage();
  include 'cetak/pesananorder.php';  
$pdf->AddPage();
  include 'cetak/faktur.php';  
$pdf->AddPage();
  include 'cetak/b_a_hasilpekerjaan.php';
$pdf->AddPage();
  include 'cetak/lampiran_b_a_1.php';    
$pdf->AddPage();
  include 'cetak/b_a_terimabarang.php';  
$pdf->AddPage();
  include 'cetak/lampiran_b_a_2.php';

$pdf->Output('Amprahan.pdf','D'); 



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

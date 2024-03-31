<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';
    $nim = $_SESSION['nim'];
    $kode_akses= $_SESSION['kode_akses'];
  
  $today = date('Y-m-d H:i:s');
  $hasil = mysqli_query($koneksi,"SELECT * FROM tanggal");
  $tgl = mysqli_fetch_array($hasil);
  $mulai = $tgl['tanggal'];
  $mks = mysqli_query($koneksi,"SELECT * FROM selesai");
  $tutup = mysqli_fetch_array($mks);
  $wes = $tutup['selesai'];
  $cek1 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_ekm WHERE nim='$nim'"));
  $cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_dpkm WHERE nim='$nim'"));
  $cek3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_abstain_ekm WHERE nim='$nim'"));
  $cek4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_abstain_dpkm WHERE nim='$nim'"));
  $cek5 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_login WHERE nim='$nim'"));
  
  if ($today > $wes){
    echo"<script>window.alert('Waktu pemilihan sudah ditutup!')
    window.location='selesai'</script>";
  }
  elseif ($today >= $mulai){
    if ($cek1 > 0){
      echo"<script>window.alert('Anda sudah menggunakan hak suara, tidak bisa melakukan voting lagi')
      window.location='selesai'</script>";
          }
    if ($cek2 > 0){
      echo"<script>window.alert('Anda tidak bisa melakukan voting lagi !')
            window.location='selesai'</script>";
          }
    if ($cek3 > 0){
      echo"<script>window.alert('Anda tidak bisa melakukan voting lagi !')
            window.location='selesai'</script>";
          }
    if ($cek4 > 0){
      echo"<script>window.alert('Anda tidak bisa melakukan voting lagi !')
            window.location='selesai'</script>";
          }
     if ($cek5 > 0){
      echo"<script>window.alert('Anda sudah masuk sebelumnya, tidak bisa masuk lagi')
      window.location='selesai'</script>";
          }
          else {
            mysqli_query($koneksi,"INSERT INTO tbl_login(nim)
              VALUES ('$nim')");
                
             echo"<script> window.location='indexekm'</script>";
          }
  }
  else{
    echo"<script>window.alert('Belum saatnya pemilihan!')
    window.location='selesai'</script>";
  }
  
 
 
 
 
 
 
  
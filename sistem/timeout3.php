<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';
    $nim = $_SESSION['nim'];
    $kode_akses= $_SESSION['kode_akses'];
  
    mysqli_query($koneksi,"INSERT INTO tbl_abstain_dpkm(nim)
              VALUES ('$nim')");    
    mysqli_query($koneksi, "UPDATE tbl_dpt SET status='(Sudah Memilih)', waktu='$waktu' WHERE nim='$nim'");
    

    echo"<script>window.location='selesai'</script>";
        
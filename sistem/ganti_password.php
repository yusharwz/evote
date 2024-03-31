<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}
include "../koneksi.php";


$nim = $_POST['nim'];
$password_baru = $_POST['pass_baru'];
$konfirmasi_password = $_POST['konfirmasi_pass'];

if ($password_baru == $konfirmasi_password) {
    $pass_ok = md5 ($konfirmasi_password);
    $ubah = mysqli_query($koneksi, "UPDATE tbl_akses SET kode_akses = '$pass_ok'  
                                    WHERE nim = '$nim' ");
    if ($ubah) {
        echo "<script>alert('Kode akses berhasil diubah. Anda akan otomatis LOGOUT');document.location='../logout'</script>";
    }
} else {
    echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='ubah_pass'</script>";
}

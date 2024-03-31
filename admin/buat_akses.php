<?php
session_start();
if ( !isset($_SESSION["login_admin"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';

if(isset($_POST['akses'])) {
  $nim = $_POST['nim'];
function acak($panjang)
{
    $kode_akses = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($kode_akses)-1);
  $string .= $kode_akses{$pos};
    }
    return $string;
}
//cara memanggilnya
$hasil= acak(6);
}

error_reporting(0);

if(isset($_POST['simpan'])) {
$nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
$kode_akses= mysqli_real_escape_string($koneksi, $_POST['kode_akses']);


    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_akses WHERE nim='$nim'"));
    if ($cek > 0){
    echo "<script>window.alert('Maaf Anda sdh terdaftar sebelumnya')
    window.location='buat_akses'</script>";
    }else {
    mysqli_query($koneksi,"INSERT INTO tbl_akses(nim, kode_akses)
    VALUES ('$nim','$kode_akses')");
 
    echo "<script>window.alert('kode akses telah aktif')
    window.location='buat_akses'</script>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/icon.png">
    <title>Aplikasi E-Voting</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style type="text/css">
     img{
      width: 100%;
      height: 500px;
      text-align: center;
     }
     img{
      border-radius: 10px;
     }
   </style>
</head>
<body>
                
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                      <!--  <img src="assets/img/logo.png" /> -->
                      <h4 style="color: white;">Aplikasi E-Voting</h4>
                    </a>
                    
                </div>
            <!--
                <span class="logout-spn" >
                  <a href="../logout.php" style="color:#fff;"><i class="fa fa-circle-o-notch"> Logout</i></a>  
                </span>
			-->
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <div class="menu">
                  <ul class="nav" id="main-menu">
                      
                      <h2><b>UNIVERSITAS BRAWIJAYA</b></h2>
                      <li>
                          <a href="index"><i class="fa fa-desktop"></i>Beranda</a>
                      </li>
                      <?php
                          $level = $_SESSION['level'] == 'admin';
                          if($level){
                      ?>

                      <li>
                          <a href="input_data_paslon"><i class="fa fa-user "></i>Input Data Paslon</a>
                      </li>

                      <li>
                          <a href="upload_dpt"><i class="fa fa-file"></i> Upload DPT</a>
                      </li>

                      <li>
                          <a href="buat_akses"><i class="fa fa-lightbulb-o "></i>Buat Akses </a>
                      </li>

                      <li>
                           <a href="hasil_suara"><i class="fa fa-chart-bar"></i>Hasil Suara Pres dan Wapres </a>
                      </li>

                      <li>
                            <a href="hasil_suaradpkm"><i class="fa fa-chart-bar"></i>Hasil Suara DPKM </a>
                </li>

                      <?php } ?>
                      <li>
                          <a href="../logout"><i class="fa fa-circle-o-notch "></i>Logout</a>
                      </li>
                      
                  </ul>
                </div>
             </div>

        </nav>
        <!-- /. NAV SIDE  -->
          

          <div id="page-wrapper" >
            <div id="page-inner">
              <div class="row">
                <div class="col-lg-12">
                  <h2><i class="fa fa-lightbulb-o"> Buat Akses</i></h2>   
                </div>
              </div>              

                <div class="row">
                  <div class="col-lg-6">
                    <form action="" method="post">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" required="required" placeholder="Masukan NIM" class="form-control" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="akses" value="Filter" class="form-control">
                      </div>                        
                    </form>

                    <form action="" method="post">
                       <div class="form-group">
                        <input type="text" style="background-color: yellow; font-size: 22px;" name="nim" placeholder="NIM" required="required" class="form-control" value="<?php echo $nim; ?>">
                      </div>
                      <div class="form-group">
                        <input type="text" style="background-color: yellow; font-size: 22px;" name="kode_akses" required="required" placeholder="Kode akses" class="form-control" autocomplete="off" value="<?php echo $hasil; ?>">
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-success" name="simpan" value="Aktifkan" class="form-control">
                      </div>                        
                    </form>
                  </div>
                </div>
                 
                  <!-- /. ROW  --> 
              </div>
             <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
          </div>


          <div class="footer">
            <div class="row">
              <div class="col-lg-12" >
                <a href="https://www.youtube.com/channel/UCOAdMyFuPTcmi1TExyynO6w" style="color:#fff;" target="_blank">
		&copy; PIT Pemilwa IKM UB <?php echo date('Y') ?></a>
              </div>
            </div>
          </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


    
   
</body>
</html>
<?php
session_start();
if ( !isset($_SESSION["login_admin"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  date_default_timezone_set('Asia/jakarta');
  $waktu = date('H:i:sa');
  $nim = $_SESSION['nim'];
  $kode_akses= $_SESSION['kode_akses'];
  

  $reset = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_akses WHERE level='admin'"));

if ($reset) {
    mysqli_query($koneksi, "DELETE FROM tbl_login");
    mysqli_query($koneksi, "DELETE FROM tbl_ekm");
    mysqli_query($koneksi, "DELETE FROM tbl_dpkm");
    mysqli_query($koneksi, "DELETE FROM tbl_fp");
    mysqli_query($koneksi, "DELETE FROM tbl_fpik");
    mysqli_query($koneksi, "DELETE FROM tbl_fapet");
    mysqli_query($koneksi, "DELETE FROM tbl_abstain_ekm");
    mysqli_query($koneksi, "DELETE FROM tbl_abstain_dpkm");
    mysqli_query($koneksi, "DELETE FROM tbl_abstain_fp");
    mysqli_query($koneksi, "DELETE FROM tbl_abstain_fpik");
    mysqli_query($koneksi, "DELETE FROM tbl_abstain_fapet");
    mysqli_query($koneksi, "DELETE FROM data_fapet");
    mysqli_query($koneksi, "DELETE FROM data_fp");
    mysqli_query($koneksi, "DELETE FROM data_fpik");
    mysqli_query($koneksi, "DELETE FROM data_ekm");
    mysqli_query($koneksi, "DELETE FROM data_dpkm");
    mysqli_query($koneksi, "UPDATE tbl_dpt SET status='Belum memilih',status2='Belum memilih',waktu='Belum memilih',waktu2='Belum memilih'");
    
    
    echo"<script>window.alert('Aplikasi berhasil di reset')
                window.location='reset_data'</script>";
}else {
          

          echo"<script>window.alert('Apliaski gagal di reset')
                window.location='reset_data'</script>";
        }
      }
      ?>
      <!DOCTYPE html>
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="images/icon1.png">
        <title>PEMILWA IKM UB</title>
        <!---------------------------------------------------------------------->
        <link rel="stylesheet" type="text/css" href="../fontawesome-free/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <style>
         img{
          width: 100%;
          height: 280px;
          text-align: center;
        }
        img{
          border-radius: 10px;
        }
        tr,td{
          border: none;
        }
      </style>
    </head>
    <body>

      <div id="wrapper">
       <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="adjust-nav">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              <!--  <img src="assets/img/logo.png" /> -->
              <h4 style="color: white;">Aplikasi E-Vote Pemilwa IKM Universitas Brawijaya</h4>
            </a> 
          </div>
          <span class="logout-spn" >
            <a href="../logout" style="color:#fff;"><i class="fa fa-circle-o-notch"> Logout</i></a>  
          </span>
        </div>
      </div>
      <!-- /. NAV TOP  -->
      <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
          <div class="menu">
            <ul class="nav" id="main-menu">

            
             

            <h2><b>UNIVERSITAS BRAWIJAYA</b></h2> 
              <?php
              $level = $_SESSION['level'] == 'admin';
              if($level){
                ?>
                
                <li>
                  <a href="index"><i class="fa fa-desktop"></i>Beranda</a>
                </li>
                
                <li>
                  <a href="../admin/input_data_paslon"><i class="fa fa-user "></i>Data Paslon</a>
                </li>
                
                <li>
                  <a href="../admin/input_data_paslon_dpkm"><i class="fa fa-user "></i>Data Paslon DPKM</a>
                </li>
                
                
                <li>
                  <a href="../admin/input_data_paslon_fpik"><i class="fa fa-user "></i>Data Paslon FPIK</a>
                </li>
                
                <li>
                  <a href="../admin/input_data_paslon_fp"><i class="fa fa-user "></i>Data Paslon FP</a>
                </li>
                
                <li>
                  <a href="input_data_paslon_fapet"><i class="fa fa-user "></i>Data Paslon FAPET</a>
                </li>

                <li>
                  <a href="../admin/upload_dpt"><i class="fa fa-file"></i>Daftar Pemilih Tetap</a>
                </li>

                <li>
                  <a href="hasil_suara"><i class="fa fa-chart-bar"></i>Hasil Suara EKM</a>
                </li>

                <li>
                  <a href="../admin/hasil_suaradpkm"><i class="fa fa-chart-bar"></i>Hasil Suara DPKM </a>
                </li>
                
                <li>
                  <a href="../admin/hasil_suarafpik"><i class="fa fa-chart-bar"></i>Hasil Suara FPIK </a>
                </li>
                
                <li>
                  <a href="../admin/hasil_suarafp"><i class="fa fa-chart-bar"></i>Hasil Suara FP </a>
                </li>
                
                <li>
                  <a href="../admin/hasil_suarafapet"><i class="fa fa-chart-bar"></i>Hasil Suara Fapet </a>
                </li>
                
                <li>
                  <a href="../admin/reset_data"><i class="fa fa-circle-o-notch "></i>Reset Aplikasi</a>
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
                 
            </div>
          </div>              
          <!-- /. ROW  -->
          <div class="row">
            <div class="col-lg-12 ">
              <div class="alert alert-info">
                <strong><h2><b>Selamat datang</b></h2></strong><b style="font-size: 18px;">
			          	<?php echo $_SESSION['nama_mhs']; ?></b> di Pemilwa IKM Universitas Brawijaya
              </div>    
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
             <div class="alert alert-success">
              <div class="row">
                <div class="col-lg-12">
                  <h2="center"><b>Klik 'RESET' pada tombol dibawah untuk me-reset semua data calon dan hasil suara</b></h2><br>
                  <!--<h5><b>Otomatis logout dalam <span id ="countdown">5</span></b></h5>-->
                  <form action="" method="post">
                    
                    <div class="row">
            
				
<?php
$gusmint = date('Y-m-d H:i:s');
$hasil = mysqli_query($koneksi,"SELECT * FROM tanggal");
$tgl = mysqli_fetch_array($hasil);
$cendekia = $tgl['tanggal'];
$bangka = mysqli_query($koneksi,"SELECT * FROM selesai");
$tutup = mysqli_fetch_array($bangka);
$wes = $tutup['selesai'];

if ($gusmint > $wes){
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='RESET' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')'>
        ";
}
elseif ($gusmint >= $cendekia){
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='RESET' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')'>
        ";
}
else{
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='RESET' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')'>
		";
}
?>
					
        <!--<input style="color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;" type="submit" name="simpan" value="Vote" class="btn btn-success" onclick="return confirm('YAKIN DENGAN PILIHAN ANDA')"> -->>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /. ROW  --> 

        <!-- /. ROW  -->   
        <div class="row">
          <div class="col-lg-12 ">
            
            
            </div>
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
	  
        <a href="https://www.instagram.com/pemilwaikmub" style="color:#fff;" target="_blank">
		&copy; PIT Pemilwa IKM UB 2022 
		
      </div>
    </div>
  </div>

  <script src="../js/sweetalert.min.js"></script>
  <!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>
  <!-- TIMER -->
  <script type="text/javascript">
    var seconds = 5; //total waktu tunggu

    function countdown(){
         seconds = seconds - 1;
        if (seconds < 0) {
          window.location="../logout";
          
        }else{
            document.getElementById("countdown").innerHTML = seconds;
            window.setTimeout("countdown()", 1000);
        }
    }
    countdown();
  </script>




</body>
</html>

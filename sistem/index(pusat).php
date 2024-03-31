<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  date_default_timezone_set('Asia/jakarta');
  $waktu = date('H:i:sa');
  $nim = $_SESSION['nim'];
  $kode_akses= $_SESSION['kode_akses'];
  

  $cek1 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_ekm WHERE nim='$nim'"));
  $cek2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_dpkm WHERE nim='$nim'"));
  $cek3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_abstain_ekm WHERE nim='$nim'"));
  $cek4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_abstain_dpkm WHERE nim='$nim'"));
  $cek5 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_login WHERE nim='$nim'"));
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
          $_SESSION["login_vote"] = true;
          mysqli_query($koneksi,"INSERT INTO tbl_login(nim)
            VALUES ('$nim')");
              
           echo"<script> window.location='indexekm'</script>";
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
              <!--  <img src="../images/ub1.png" /> -->
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

            
             <!--<img src="../images/ub1.png" alt="E-Vote Pemilwa" style="width:10px;"> <br>
              -->

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
                  <a href="../admin/input_data_paslon_fapet"><i class="fa fa-user "></i>Data Paslon FAPET</a>
                </li>

                <li>
                  <a href="../admin/upload_dpt"><i class="fa fa-file"></i>Daftar Pemilih Tetap</a>
                </li>

                <li>
                  <a href="../admin/hasil_suara"><i class="fa fa-chart-bar"></i>Hasil Suara EKM</a>
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
                <a href="ubah_pass"><i class="fa fa-circle-o-notch "></i>Ganti Kode Akses</a>
              </li>
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
			          	<?php echo $_SESSION['nama_mhs']; ?></b> di Pemilwa IKM Universitas Brawijaya 2022 
              </div>   
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
             <div class="alert alert-success">
              <div class="row">
                <div class="col-lg-12">
                <h1="center"><b>HARAP DIBACA!!! </b></h1><br>
                <form method="post" action="ubah_pass">
                <h2="center"><b>Klik <button type="submit" class="btn btn-primary">Ubah kode akses</button> untuk mengganti kode akses anda </b></h2><br> 
                </form> 
                <h2="center"><b>Klik 'MASUK' pada tombol dibawah untuk masuk ke Halaman Vote Presiden dan Wakil Presiden EKM lalu Anggota DPKM</b></h2><br>
                  <h2="center"><b>*saat masuk ke halaman vote, anda diberi waktu 30 detik untuk menentukan kandidat yang akan dipilih</b></h2><br>
                  <h5><b>Otomatis masuk dalam <span id ="countdown">5</span></b></h5>
                  <form action="" method="post">
                    
                    <div class="row">
            
				
<?php
$today = date('Y-m-d H:i:s');
$hasil = mysqli_query($koneksi,"SELECT * FROM tanggal");
$tgl = mysqli_fetch_array($hasil);
$mulai = $tgl['tanggal'];
$mks = mysqli_query($koneksi,"SELECT * FROM selesai");
$tutup = mysqli_fetch_array($mks);
$wes = $tutup['selesai'];

if ($today > $wes){
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='MASUK' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')' disabled>
        <center><h2 style='color:red;align:center;padding: 10px; border-radius: 15px; width: 100%;'><strong>- waktu pemilihan sudah ditutup -</strong></h2></center>
        ";
}
elseif ($today >= $mulai){
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='MASUK' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')'>
        ";
}
else{
	echo"
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='MASUK' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')' disabled>
        <center><h2 style='color:red;align:center;padding: 10px; border-radius: 15px; width: 100%;'><strong>- belum saatnya pemilihan -</strong></h2></center>
		";
}
?>
					
        <!--            <input style="color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;" type="submit" name="simpan" value="Vote" class="btn btn-success" onclick="return confirm('YAKIN DENGAN PILIHAN ANDA')"> -->
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
    var seconds = 11; //total waktu tunggu

    function countdown(){
         seconds = seconds - 1;
        if (seconds < 0) {
          window.location="timeout1";
          
        }else{
            document.getElementById("countdown").innerHTML = seconds;
            window.setTimeout("countdown()", 1000);
        }
    }
    countdown();
  </script>




</body>
</html>

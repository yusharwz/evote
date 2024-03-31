<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}

if ( !isset($_SESSION["login_fpik"]) ) {
  header("location:index");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  date_default_timezone_set('Asia/jakarta');
  $waktu = date('H:i:sa');
  $nim = $_SESSION['nim'];
  $kode_akses= $_SESSION['kode_akses'];
  $nomor_paslon =$_POST['nomor_paslon'];


  $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tbl_fpik WHERE nim='$nim'"));
  if ($cek > 0){
    echo"<script>window.alert('Anda tidak bisa melakukan voting lagi')
          window.location='selesai'</script>";
        }
        
        else {
          mysqli_query($koneksi, "UPDATE tbl_dpt SET status='(Sudah Memilih)', waktu='$waktu' WHERE nim='$nim'");
          mysqli_query($koneksi,"INSERT INTO tbl_fpik(nim, nomor_paslon)
            VALUES ('$nim','$nomor_paslon')");

          echo"<script>window.location='selesai'</script>";
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
                  <a href="input_data_paslon"><i class="fa fa-user "></i>Data Paslon</a>
                </li>
                
                <li>
                  <a href="upload_dpt"><i class="fa fa-file"></i>Daftar Pemilih Tetap</a>
                </li>

                <li>
                  <a href="hasil_suara"><i class="fa fa-chart-bar"></i>Hasil Suara Pres dan Wapres </a>
                </li>

                <li>
                  <a href="hasil_suaradpkm"><i class="fa fa-chart-bar"></i>Hasil Suara DPKM </a>
                </li>
                
                <li>
                    <a href="hasil_suarafpik"><i class="fa fa-chart-bar"></i>Hasil Suara FPIK </a>
                </li>
                
                <li>
                    <a href="hasil_suarafp"><i class="fa fa-chart-bar"></i>Hasil Suara FP </a>
                </li>
                
                <li>
                    <a href="hasil_suarafapet"><i class="fa fa-chart-bar"></i>Hasil Suara Fapet </a>
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
              <h2><i class="fa fa-desktop"> Halaman Vote</i></h2>   
              
            
               


         
         
         
            <!-- /. ROW  -->
          <div class="row">
            <div class="col-lg-12 ">
                
            </div>
          </div>
          <h3><b>Waktu Pilih <span id ="countdown">30</span></b></h3>
          <div class="row">
            <div class="col-lg-12">
             <div class="alert alert-success">
              <div class="row">
                <div class="col-lg-12">
                  <h2 align="center"><b>CALON KETUA DAN WAKIL KETUA</b></h2><br>
                  <form action="" method="post">
                    <?php
                    $data_paslon = mysqli_query($koneksi,"SELECT * FROM data_fpik");
                    while($d = mysqli_fetch_array($data_paslon)){
                      ?>
                      <div class="col-lg-6">
                        <table class="table table-striped table-bordered table-hover">
                          <tr>
                            <td colspan="2" style="background-color: #000961; color: white; font-size: 50px; text-align: center;"><b><?php echo $d['no_urut']; ?></b>
                            </td>
                          </tr>
                          <tr>
                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar1']; ?>"></td>
                            <td><img style="width: 100%;" src="<?php echo "foto/".$d['gambar2']; ?>"></td>
                          </tr>
                          <tr>
                            <td align="center"><h2><?php echo $d['nm_paslon_ketua']; ?></h2></td>
                            <td align="center"><h2><?php echo $d['nm_paslon_wakil']; ?></h2></td>
                          </tr>
						  <tr>
                            
                          </tr>
						  
                          <tr>
                            <td colspan="2" style="text-align: center; padding: 20px; background-color: #000961;"><input type="radio" style="width:25px;height:25px;background:#000961;" required="required" name="nomor_paslon" value="<?php echo $d['no_urut']; ?>"></td>
                          </tr>
                        </table>
                      </div>
                    <?php } ?>
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
        <input style='color: white; font-size: 20px; padding: 10px; border-radius: 15px; width: 100%;' type='submit' name='simpan' value='PILIH' class='btn btn-success' onclick='return confirm('YAKIN DENGAN PILIHAN ANDA')' disabled>
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
            <div class="alert alert-danger" style="text-align: center;">
              <strong>Voting hanya dapat dilakukan satu kali. </strong> 
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
  <!-- Timer -->
  <script type="text/javascript">
 
    var seconds = 30; //total waktu tunggu
    function countdown(){
         seconds = seconds - 1;
         if (seconds < 0) {
          window.location='timeout7';
          mysqli_query($koneksi, "UPDATE tbl_dpt SET status='(Sudah Memilih)', waktu='$waktu' WHERE nim='$nim'");
          mysqli_query($koneksi,"INSERT INTO tbl_paslon(kode_akses, nomor_paslon) VALUES ('$kode_akses','$nomor_paslon')");
          window.location='selesai';
          
        }else{
            document.getElementById("countdown").innerHTML = seconds;
            window.setTimeout("countdown()", 1000);
        }
    }
    countdown();
  </script>
  
   
</body>
</html>

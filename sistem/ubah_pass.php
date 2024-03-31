<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';


  $kode_akses= $_SESSION['kode_akses'];
  


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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
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
                 <div class="card">
                     <div class="card-header">
                        <h4><b>Ganti Kode Akses</b></h4>
                     </div>
                    <div class="card-body">
                       <form method="post" action="ganti_password">
                         <input type="hidden" name="nim" value="<?= $_SESSION['nim'] ?>">
                        <div class="form-group">
                          <label>Kode akses Baru</label>
                          <input type="password" class="form-control" name="pass_baru"required>
                         </div>
                        <div class="form-group">
                          <label>Konfirmasi Kode Akses Baru</label>
                          <input type="password" class="form-control" name="konfirmasi_pass"required>
                        </div>
                      <button type="submit" class="btn btn-primary">PROSES</button>
                      </form>
                    </div>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
             <div class="row">
                
            
				

					
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
  




</body>
</html>

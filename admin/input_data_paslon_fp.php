<?php
session_start();
if ( !isset($_SESSION["login_admin"]) ) {
  header("location:../index");
  exit;
}
include'../koneksi.php';

if(isset($_POST['simpan'])) {
  $nim_ketua= mysqli_real_escape_string($koneksi, $_POST['nim_ketua']);
  $nm_paslon_ketua= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_ketua']);
  $nim_wakil= mysqli_real_escape_string($koneksi, $_POST['nim_wakil']);
  $nm_paslon_wakil= mysqli_real_escape_string($koneksi, $_POST['nm_paslon_wakil']);
  $no_urut= mysqli_real_escape_string($koneksi, $_POST['no_urut']);

  if($_POST['simpan']){
    $ekstensi_diperbolehkan = array('png','jpg','JPG');
    $gambar1 = $_FILES['gambar1']['name'];
    $x = explode('.', $gambar1);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['gambar1']['size'];
    $file_tmp = $_FILES['gambar1']['tmp_name'];     
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran <= 2000000){          
        move_uploaded_file($file_tmp, 'foto/'.$gambar1);
        $query = mysqli_query($koneksi, "INSERT INTO data_fp VALUES(NULL, '$gambar1')");
        $gambar2 = $_FILES['gambar2']['name'];
        $x = explode('.', $gambar2);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['gambar2']['size'];
        $file_tmp = $_FILES['gambar2']['tmp_name'];     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran <= 2000000){          
            move_uploaded_file($file_tmp, 'foto/'.$gambar2);
            $query = mysqli_query($koneksi, "INSERT INTO data_fp VALUES(NULL, '$gambar2')");
			$gambar3 = $_FILES['gambar3']['name'];
			$x = explode('.', $gambar3);
			$ekstensi = strtolower(end($x));
			$ukuran = $_FILES['gambar3']['size'];
			$file_tmp = $_FILES['gambar3']['tmp_name'];     
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran <= 2000000){          
				move_uploaded_file($file_tmp, 'foto/'.$gambar3);
				$query = mysqli_query($koneksi, "INSERT INTO data_fp VALUES(NULL, '$gambar3')");
          }
        }
          }
        }
      }
    }
  }
  
  mysqli_query($koneksi,"INSERT INTO data_fp(id, nim_ketua, nm_paslon_ketua, gambar1, nim_wakil, nm_paslon_wakil, gambar2, gambar3,no_urut)
    VALUES ('','$nim_ketua','$nm_paslon_ketua','$gambar1','$nim_wakil','$nm_paslon_wakil','$gambar2','$gambar3','$no_urut')");
  
  echo "<script>window.alert('Data Berhasil ditambahkan')
  window.location='input_data_paslon_fp'</script>";
  
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="images/icon.png">
  <title>PEMILWA IKM UB</title>
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
          <!--  <img src="assets/img/logo1.png" /> -->
          <h4 style="color: white;">Aplikasi E-Vote PEMILWA</h4>
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
          <h2><i class="fa fa-user"> Input data paslon</i></h2>   
        </div>
      </div>              
      <!-- /. ROW  -->

      <div class="row">
        <div class="col-lg-6">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>NIM Calon Ketua</label>
              <input type="text" name="nim_ketua" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Calon Ketua</label>
              <input type="text" name="nm_paslon_ketua" required="required" autocomplete="off" class="form-control">
            </div>
            <div class="form-group">
              <label>Foto Calon</label>
              <input type="file" name="gambar1" required="required" class="form-control-file">
            </div>
            <div class="form-group">
              <label>NIM Wakil Ketua</label>
              <input type="text" name="nim_wakil" required="required" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Wakil Ketua</label>
              <input type="text" name="nm_paslon_wakil" required="required" autocomplete="off" class="form-control">
            </div>
            <div class="form-group">
              <label>Foto Wakil</label>
              <input type="file" name="gambar2" required="required" class="form-control-file">
            </div>
			
            <div class="form-group">
              <label>No Paslon</label>
              <input type="text" name="no_urut" required="required" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success" name="simpan" value="Input" class="form-control">
            </div>
          </form>
        </div>

        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>Data paslon</h2>  
              <div class="table-responsiv">
                <table class="table table-striped table-bordered table-hover">
                  <tr>
                    <th>Nama Calon Ketua</th>
					<th>Nama Calon Wakil</th>
                    <th>No paslon</th>
                    <th>Opsi</th>
                  </tr>
                  <?php
                  $data_paslon = mysqli_query($koneksi,"SELECT * FROM data_fp");
                  while($d = mysqli_fetch_array($data_paslon)){
                    ?>
                    <tr>
                      <td><?php echo $d['nm_paslon_ketua']; ?></td>
					  <td><?php echo $d['nm_paslon_wakil']; ?></td>
                      <td><?php echo $d['no_urut']; ?></td>
                      <td><a class="btn btn-danger btn-circle" onclick="return confirm('Yakin hapus data ini !!!')" href="hapus.php?no_urut=<?php echo $d['no_urut']; ?>">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                </table>
              </div> 
            </div>
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
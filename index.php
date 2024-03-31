<?php
session_start();
include'koneksi.php';

if(isset($_POST['login'])){
	$kode_akses = mysqli_real_escape_string($koneksi, md5 ($_POST['kode_akses']));
	$data_akses = mysqli_query($koneksi, "SELECT * FROM tbl_akses INNER JOIN tbl_dpt ON tbl_akses.nim = tbl_dpt.nim WHERE kode_akses='$kode_akses'");
	$r = mysqli_fetch_array($data_akses);
	$nim = $r['nim'];
	$kode_akses = $r['kode_akses'];
	$nama_mhs = $r['nama_mhs'];
	$level = $r['level'];
	if( mysqli_num_rows($data_akses) === 1 ){
		$_SESSION["login"] = true;
		$_SESSION['nim'] = $nim;
		$_SESSION['nama_mhs'] = $nama_mhs;
		$_SESSION['kode_akses'] = $kode_akses;
		$_SESSION['level'] = $level;
		header('location:sistem');
	}else{
		echo "<script type='text/javascript'>
		setTimeout(function () {
			swal({
				title: 'Kode Akses Salah',
				type: 'warning',
				timer: 3200,
				showConfirmButton: true
				});
				},10);
				window.setTimeout(function(){
					window.location.replace('index');
					},3000);
					</script>";
				}
			}
			?>
			<!DOCTYPE html>
			<html lang="en">
			<head>
				<title>E-Vote Pemilwa IKM Universitas Brawijaya</title>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="keywords" content="pemilwa ikm ub"/>
				<meta itemprop="description" content="Sistem Online Pemilwa IKM Universitas Brawijaya" />
				<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
				<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
				<link rel="icon" type="image/png" href="images/icons/123.png"/>
				<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
				<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
				<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
				<link rel="stylesheet" type="text/css" href="css/util.css">
				<link rel="stylesheet" type="text/css" href="css/main.css">
				
			</head>
			<body>

				<div class="limiter">
					<div class="container-login100">
						<div class="wrap-login100">
							<div class="login100-pic js-tilt" data-tilt>
								<h4>Aplikasi E-Vote Pemilwa </h4>
								<h4>UNIVERSITAS BRAWIJAYA</h4>
								<img src="images/logo2.png" alt="Pemira">
							</div>

							<form class="login100-form validate-form" action="" method="post">
								<span class="login100-form-title">
								<img src="images/logo1.png" alt="PEMILWA IKM UB" style="width:105px;">
								<img src="images/ub1.png" alt="E-Vote Pemilwa" style="width:80px;"> <br>
								PEMILWA IKM 2022 <br> UNIVERSITAS BRAWIJAYA
								</span>

								<div class="wrap-input100 validate-input">
									<input class="input100" type="text" name="nim" placeholder="NIM" autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input100 validate-input">
									<input class="input100" type="password" name="kode_akses" placeholder="Kode Akses" autocomplete="off" required="required">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-lock" aria-hidden="true"></i>
									</span>
								</div>

								<div class="container-login100-form-btn">
									<button class="login100-form-btn" name="login" id="login">
										Masuk
									</button>
									</div>
								<div class="text-center p-t-12">
								    <br>
									<a class="txt2" href="https://www.instagram.com/yusharwz" target="_blank">
										<p>&copy; PIT Pemilwa IKM UB <?php echo date('Y') ?></p>
									</a>
								</div>
								
								</form>
								
								<<div class="text-center p-t-12">
								<div>
									<p class="mb-1">
        						<a href data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >Dapatkan Kode Akses</a>
     								</p>
									 <br>
									 </br>
									
										
    							</div>
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  				<div class="modal-dialog" role="document">
								<div class="modal-content">
					  			<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Dapatkan Kode Akses</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 		<span aria-hidden="true">&times;</span>
								</button>
					 	 		</div>
					  			<div class="modal-body">
								<form action="send_email.php" method="POST">
						 		<div class="form-group">
								<label for="recipient-name" class="col-form-label">Inputkan Email Anda</label>
								<input type="email" name="email" class="form-control" >
						  		</div>
						 
						  		<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="submit_email">Submit</button>
						 		


							
						</div>
					</div>
				</div>

				<script src="js/sweetalert.min.js"></script>
				<!--===============================================================================================-->	
				<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/bootstrap/js/popper.js"></script>
				<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/select2/select2.min.js"></script>
				<!--===============================================================================================-->
				<script src="vendor/tilt/tilt.jquery.min.js"></script>
				<script >
					$('.js-tilt').tilt({
						scale: 1.1
					})
				</script>
				<!--===============================================================================================-->
				<script src="js/main.js"></script>

			</body>
			</html>
<?php 

$koneksi = mysqli_connect("localhost","root","Sudiang123.","pemilwa");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}

?>


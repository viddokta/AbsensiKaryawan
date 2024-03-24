<?php 
$koneksi = mysqli_connect("localhost", "root", "", "karyawansi", 3307);

if (mysqli_connect_errno()) {
	echo "koneksi gagal " . mysqli_connect_error();
}
 ?>
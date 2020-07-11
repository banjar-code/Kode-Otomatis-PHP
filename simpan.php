<?php 
$koneksi = mysqli_connect('localhost','root','','kodegenerator');
$kode = $_POST['kode'];
$nama_brg = $_POST['nama_brg'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
mysqli_query($koneksi,"INSERT INTO tabel VALUES ('$kode','$nama_brg','$harga','$jumlah')")or die(mysqli_error($koneksi));
header("location:index.php");
?>
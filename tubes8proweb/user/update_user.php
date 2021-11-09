<?php
// koneksi database
include '../Configurasi/koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_user'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama = $_POST['nama'];

// update data ke database
mysqli_query($koneksi,"UPDATE user SET username='$username', email='$email', nama='$nama' where id_user='$id'");

// mengalihkan halaman kembali ke index.php
header("location:crud.php");

?>
<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id_task        = $_POST['id_task'];
$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$task           = $_POST['task'];
// query SQL untuk insert data
$query="INSERT INTO pegawai SET id_task='$id_task',nip='$nip',nama='$nama',task='$task'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:../index.php?p=home");
?>
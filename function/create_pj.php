<?php
include(koneksi.php);
 
$errors = array(); 
 
// Escape user inputs for security
$id_task        = $_POST['id_task'];
$nip            = $_POST['nip'];
$nama           = $_POST['nama'];
$task           = $_POST['task'];
// Attempt insert query execution
$query="INSERT INTO tabel_pj SET id_task='$id_task',nip='$nip',nama='$nama',task='$task'";
mysqli_query($conn, $sql);
// mengalihkan ke halaman index.php
header("location:../index.php?p=home");

?>



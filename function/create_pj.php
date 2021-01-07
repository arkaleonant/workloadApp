<?php
include(koneksi.php);
 
$errors = array(); 
 
// Escape user inputs for security
$task = $_POST['task'];
$detail_task = $_POST['detail_task'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
 
    // Attempt insert query execution
$sql = "INSERT INTO tabel_task SET task='$task', detail_task='$detail_task', start_date='$start_date', end_date='$end_date'";
mysqli_query($conn, $sql);
    // mengalihkan ke halaman index.php
header("location:../tambah_pj.php");

?>


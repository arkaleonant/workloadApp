<?php
include 'koneksi.php';
$sql=mysqli_query($conn,"SELECT * FROM tabel_task");
$cek = mysqli_num_rows($sql);
$row= mysqli_fetch_array($sql);

  session_start();
  $_SESSION['id_task'] = $id_task;
  $_SESSION['task'] = $row['task'];

?>

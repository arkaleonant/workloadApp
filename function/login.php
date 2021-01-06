<?php
include 'koneksi.php';
$nip=$_POST['nip'];
$pass=$_POST['password'];
$sql=mysqli_query($conn,"SELECT * FROM pegawai where nip='$nip' AND password='$pass'");
$cek = mysqli_num_rows($sql);
$row= mysqli_fetch_array($sql);
if($cek>0){
  session_start();
  $_SESSION['nip'] = $nip;
  $_SESSION['hak_akses'] = $row['hak_akses'];
  $_SESSION['nama'] = $row['nama'];
  $_SESSION['jabatan'] = $row['jabatan'];
  $_SESSION['divisi'] = $row['divisi'];
  $_SESSION['email']=$row['email'];
  header('Location: ../index.php');
}else {
  header('Location: ../login_page.php?log=err');
}
?>

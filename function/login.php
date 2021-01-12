<?php
// Sesion Di jalankan
session_start();

include'koneksi.php';

$nip = $_POST['nip'];
$pass = $_POST['password'];
$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip' AND password='$pass'");
$cek = mysqli_num_rows($query);
$row  = mysqli_fetch_array($query);

if ($cek>0){
        session_start();
        $_SESSION['nip'] = $nip;
        $_SESSION['hak_akses'] = $row['hak_akses'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['jabatan'] = $row['jabatan'];
        $_SESSION['divisi'] = $row['divisi'];
        $_SESSION['email']=$row['email'];

        if($row['hak_akses']=="1"){
            header("location:../pages/user_1/dashboard_1.php");
        }else if($row['hak_akses']=="2"){
            header("location:../pages/user_2/dashboard_2.php");
        }
}
else{  
    header("location:../index.php");
    }
?>



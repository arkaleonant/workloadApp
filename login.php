<?php
// Sesion Di jalankan
session_start();

$nip = $_POST['nip'];
$password = $_POST['password'];
// membuat koneksi Ke MYSQL dan Database
$koneksi=mysqli_connect("localhost", "root","","magang_pal");
//include 'koneksi.php';

// mencari password berdasarkan email
$query = mysqli_query($koneksi,"SELECT * FROM pegawai
             WHERE nip ='$nip'");

$data  = mysqli_fetch_array($query);

if ($data['nip'] && $password==$data['password']){

    // jika sesuai, maka buat session
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['hak_akses'] = $data['hak_akses'];
        if($data['hak_akses']=="1"){
            header("location:../workloadApp/dashboard.html");
        }else if($data['hak_akses']=="2"){
            header("location:../workloadApp/dashboard2.html");
        }
}
else{  
    header("location:../index.html");
    }
?>
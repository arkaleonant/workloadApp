<?php
// Sesion Di jalankan
session_start();

include'koneksi.php';

$nip = $_POST['nip'];
$pass = $_POST['password'];
$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip' AND password='$pass'");
$cek = mysqli_num_rows($query);
$row  = mysqli_fetch_array($query);

$query2 = mysqli_query($conn,"SELECT * FROM user_admin WHERE username='$nip' AND password='$pass'");
$cek2 = mysqli_num_rows($query2);
$row2  = mysqli_fetch_array($query2);

if ($cek>0){
        session_start();
        $_SESSION['nip'] = $nip;
        $_SESSION['hak_akses'] = $row['hak_akses'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['jabatan'] = $row['jabatan'];
        $_SESSION['divisi'] = $row['divisi'];
        $_SESSION['email']=$row['email'];
            

        if($row['hak_akses']=="1"){ ?>
            <script language="JavaScript">
                alert('Login Berhasil !');
                document.location='../pages/user_1/dashboard_1.php?home';
            </script>
        <?php }else if($row['hak_akses']=="2"){ ?>
            <script language="JavaScript">
                alert('Login Berhasil !');
                document.location='../pages/user_2/index.php?home';
            </script>
        <?php }else if ($row['hak_akses']=="0"){ ?>
                <script language="JavaScript">
                    alert('Admin Login Berhasil !');
                    document.location='../hint.php';
                </script>
        <?php }
}
else{ ?>  
        <script language="JavaScript">
            alert('Username atau Password anda salah');
            document.location='../index.php';
        </script>
    <?php }
?>

        


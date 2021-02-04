<?php
 
$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if($_POST)
{
    $nip = $_POST["nip"]; 
    $nama = $_POST["nama"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];   
    $divisi = $_POST["divisi"];  
    $jabatan = $_POST["jabatan"];  
    $hak_akses = $_POST["hak_akses"];

    $query = ("INSERT INTO pegawai (nip, nama, email, password, divisi, jabatan, hak_akses) 
                            VALUES ('".$nip."', '".$nama."', '".$email."', '".$password."', '".$divisi."', '".$jabatan."'
                                    , '".$hak_akses."')");

    if(mysqli_query($connect, $query)){ ?>
        <script type="text/javascript"> alert("Pegawai berhasil ditambahkan !"); </script>
        <?php echo"<script>document.location='index.php?home'</script>"; ?>
    <?php }
}
?>
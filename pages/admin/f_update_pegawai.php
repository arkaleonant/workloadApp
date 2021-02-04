<?php

error_reporting(0);

$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if(!empty($_POST))
{
 $output = '';
    $nip = $_POST["nip"]; 
    $nama = $_POST["nama"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];   
    $divisi = $_POST["divisi"];  
    $jabatan = $_POST["jabatan"];  
    $hak_akses = $_POST["hak_akses"];

    $query = "UPDATE pegawai set nama = '".$nama."', email = '".$email."', password ='".$password."', 
                                  jabatan = '".$jabatan."', hak_akses = '".$hak_akses."' where nip = '".$_POST[nip]."'";
	
    if(mysqli_query($connect, $query))
    { ?>
     <script type="text/javascript"> alert("Pegawai berhasil diupdate !"); </script>
     <?php echo"<script>document.location='index.php?home'</script>"; ?>
<?php }
}
?>
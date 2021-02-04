<?php
 
$connect = mysqli_connect("localhost", "root", "", "magang_pal");

if(!empty($_POST))
{
 $output = '';
    $query = "DELETE FROM pegawai WHERE nip ='".$_POST[nip]."'";
    if(mysqli_query($connect, $query))
    { ?>
     <script type="text/javascript"> alert("Pegawai berhasil dihapus !"); </script>
     <?php echo"<script>document.location='index.php?home'</script>"; ?>
<?php }
}
?>

<?php $conn=mysqli_connect("localhost", "root", "", "magang_pal") ;?>
<?php $id_task=$_GET['id'];

$query="UPDATE tabel_task SET status = '1' WHERE id_task = '".$id_task."'";

if (mysqli_query($conn, $query)) {
    ?><script type="text/javascript">alert("Status berhasil di update !");
    </script><?php echo"<script>document.location='dashboard_1.php?task'</script>";
}

else {
    ?><script type="text/javascript">alert("Gagal update status !");
    </script><?php echo"<script>document.location='dashboard_1.php?task'</script>";
}

?>

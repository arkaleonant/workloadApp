
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
<?php
// 
// $jml_1=mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_task) FROM tabel_plan WHERE status='1' AND id_task =  '".$id_task."'"))[0];
// $jml_semua=mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_task) FROM tabel_plan WHERE id_task = '".$id_task."'"))[0];

// if($jml_1=$jml_semua) {
    // $update="UPDATE tabel_task SET status = '1' WHERE id_task = '".$id_task."'";
    // mysqli_query($conn, $update);
// }
// 
// ?>
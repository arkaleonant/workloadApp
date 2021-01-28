<?php  
$id_task=$_GET['id'];
 $conn = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "UPDATE tabel_task SET status = '2' WHERE id_task = '".$id_task."'";
 
 if (mysqli_query($conn, $query)){ ?>
    <?php echo"<script>document.location='dashboard_1.php?task'</script>";
}
else{?>		
   <script type="text/javascript"> alert("Gagal menambahkan task !"); </script>
    <?php echo"<script>document.location='dashboard_1.php?task'</script>"; 
}

?>

 
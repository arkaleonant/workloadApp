<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if(!empty($_POST))
{
	    $id_plan = $_POST["id_plan"];
        $id_task = $_POST["id_task"];  
        $date = $_POST["date"];  
        $plan = $_POST["plan"];
        $status = $_POST["status"];
        $kendala = $_POST["kendala"];
    
        $query = ("INSERT INTO tabel_realisasi(id_plan,id_task,date,plan,status,bukti,kendala) 
                   VALUES ('".$id_plan."','".$id_task."','".$date."','".$plan."','1','','".$kendala."')");
        
        $update = "UPDATE tabel_plan SET status='1' WHERE id_plan = '".$id_plan."'";
        
    if(mysqli_query($connect, $query))
    {
        mysqli_query($connect, $update); ?> 
        <script type="text/javascript"> alert("Realisasi berhasil !"); </script>
        <?php echo"<script>document.location='index.php?plan'</script>"; ?>
    <?php } else { ?>
        <script type="text/javascript"> alert("Realisasi gagal !"); </script>
        <?php echo"<script>window.history.back();</script>"; ?>
    <?php }
}
?>
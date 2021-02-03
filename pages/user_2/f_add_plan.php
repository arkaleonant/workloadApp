<?php

session_start();
error_reporting(0);

$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if(!empty($_POST))
{
 $output = '';
	$id_task = mysqli_real_escape_string($connect, $_POST["id_task"]);  
    $task = mysqli_real_escape_string($connect, $_POST["task"]);  
    $date = mysqli_real_escape_string($connect, $_POST["date"]);  
    $plan = mysqli_real_escape_string($connect, $_POST["plan"]);
    $query = "INSERT INTO tabel_plan SET id_plan= '', id_task = '$id_task', date ='$date', plan='$plan'";
	
    if(mysqli_query($connect, $query))
    { ?>
        <script type="text/javascript"> alert("Plan berhasil ditambahkan !"); </script>
        <?php echo"<script>document.location='index.php?task'</script>"; ?>
    <?php }
    echo $output;
}
?>
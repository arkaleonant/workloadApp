<?php

session_start();
error_reporting(0);

$connect = mysqli_connect("localhost", "root", "", "magang_pal");

    if(!empty($_POST)){
        $output = '';
        $id_plan = mysqli_real_escape_string($_POST["id_plan"]);
        $id_task = mysqli_real_escape_string($_POST["id_task"]);  
        $task = mysqli_real_escape_string($_POST["task"]);  
        $date = mysqli_real_escape_string($_POST["date"]);  
        $plan = mysqli_real_escape_string($_POST["plan"]);
        $status = mysqli_real_escape_string($_POST["status"]);
        $kendala = mysqli_real_escape_string($_POST["kendala"]);
        
		$query = "INSERT INTO tabel_realisasi SET id_plan= '$id_plan', id_task = '$id_task', date ='$date', 
													plan='$plan', status='1', bukti='', kendala='$kendala'";
        $query2="UPDATE tabel_plan SET status = '1' WHERE id_plan = '$id_plan'";

        if(mysqli_query($connect, $query)){
			mysqli_query($connect, $query2) ?>; 
			<script type="text/javascript"> alert("Realisasi berhasil !"); </script>
        	<?php echo"<script>document.location='index.php?plan'</script>"; ?>
		<?php }
		echo $output;
    }
?>

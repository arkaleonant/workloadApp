<?php

    include('../../function/koneksi.php');

    function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
        return $imageLayer;
    }

    if(!empty($_POST)){
        $output = '';
        $id_plan = $_POST["id_plan"];
        $id_task = $_POST["id_task"];  
        $task = $_POST["task"];  
        $date = $_POST["date"];  
        $plan = $_POST["plan"];
        $status = $_POST["status"];
        $kendala = $_POST["kendala"];
        
		$query = ("INSERT INTO tabel_realisasi(id_plan,id_task,date,plan,status,bukti,kendala)
		VALUES ('".$id_plan."', '".$id_task."','".$date."','".$plan."',
				'1','','$kendala')");

        $query2="UPDATE tabel_plan SET status = '1' WHERE id_plan = '".$id_plan."'";

        if(mysqli_query($conn, $query)){  
			mysqli_query($conn, $query2)?>
			<script type="text/javascript"> alert("Task berhasil ditambahkan !"); </script>
        	<?php echo"<script>document.location='index.php?plan'</script>"; ?>
		<?php }
    }
?>

<?php

    include('../../function/koneksi.php');

    if(!empty($_POST)){
        $output = '';
        $id_plan = $_POST["id_plan"];
        $id_task = $_POST["id_task"];  
        $task = $_POST["task"];  
        $date = $_POST["date"];  
        $plan = $_POST["plan"];
        $status = $_POST["status"];
        $kendala = $_POST["kendala"];

        $ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
        $nama = $_FILES['bukti']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['bukti']['size'];
        $file_tmp = $_FILES['bukti']['tmp_name'];	
        

        $query = ("INSERT INTO tabel_realisasi(id_plan,id_task,date,plan,status,bukti,kendala)
                    VALUES ('".$id_plan."', '".$id_task."','".$date."','".$plan."',
                            '1','','$kendala')");

        $query2=("UPDATE tabel_plan SET status = '1' WHERE id_plan = '".$id_plan."'");

        if(mysqli_query($conn, $query)){ 
            if(mysqli_query($conn, $query2)){
                $url1=$_SERVER['REQUEST_URI'];
                header("refresh: 1; URL=$url1"); ?>
                <meta http-equiv="refresh" content="1">
                <body onload=”javascript:setTimeout(“location.reload(true);”,1);”>
            <?php }
        }
    }
?>

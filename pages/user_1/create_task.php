<?php

include('../../function/koneksi.php');

if($_POST){
    
    $divisi = $_POST['divisi'];
    $task = $_POST['task'];
    $detail_task = $_POST['detail_task'];
    $start_date = $_POST['tanggal_mulai'];
    $end_date = $_POST['end_date'];
    $pj = $_POST['pj'];

    $query = ("INSERT INTO tabel_task(id_task,divisi,task,detail_task,start_date,end_date) VALUES ('','".$divisi."','".$task."','".$detail_task."','".$start_date."','".$end_date."')");
    
    //mysqli_query("INSERT INTO tabel_task values('$id_task','$divisi','$task','$detail_task','$start_date','$end_date')")
    if (mysqli_query($conn, $query)){ ?>
        <script type="text/javascript"> alert("Task berhasil ditambahkan !"); </script>
        <?php echo"<script>document.location='dashboard_1.php?tambah_pj'</script>";
    }
    else{?>		
       <script type="text/javascript"> alert("Gagal menambahkan task !"); </script>
        <?php echo"<script>document.location='dashboard_1.php?task'</script>"; 
    }
}

?>


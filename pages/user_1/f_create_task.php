<?php

include('../../function/koneksi.php');

if($_POST){
    
    $divisi = $_POST['divisi'];
    $task = $_POST['task'];
    $detail_task = $_POST['detail_task'];
    $start_date = $_POST['tanggal_mulai'];
    $end_date = $_POST['end_date'];

    $query = ("INSERT INTO tabel_task(id_task,divisi,task,detail_task,start_date,end_date) VALUES ('','".$divisi."','".$task."','".$detail_task."','".$start_date."','".$end_date."')");
        
    $sekarang = date('Y-m-d');
    if($sekarang > $start_date){?>
        <script type="text/javascript"> alert("Tanggal mulai <?php echo $start_date ?> tidak valid !"); </script>
        <?php echo"<script>document.location='dashboard_1.php?task'</script>"; ?>  
    <?php }else{ ?>   
        <?php if ($start_date < $end_date){ ?>
            <?php if (mysqli_query($conn, $query)){ ?>
            <script type="text/javascript"> alert("Task berhasil ditambahkan !"); </script>
            <?php echo"<script>document.location='dashboard_1.php?form_add_pj'</script>"; ?>
            <?php } else{?>		
            <script type="text/javascript"> alert("Gagal menambahkan task !"); </script>
            <?php echo"<script>document.location='dashboard_1.php?task'</script>"; ?>
            <?php } ?>
        <?php } else{?>		
            <script type="text/javascript"> alert("Tanggal jatuh tempo <?php echo $end_date ?> tidak valid untuk tanggal mulai <?php echo $start_date ?> !"); </script>
            <?php echo"<script>document.location='dashboard_1.php?task'</script>"; ?>
        <?php } ?>

    <?php } 
   
}
?>

<?php
    $koneksi = mysqli_connect("localhost", "root", "", "magang_pal");
 
    // Check connection
    if($koneksi === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $errors = array();
        
    $divisi = $_POST['divisi'];
    $task = $_POST['task'];
    $detail_task = $_POST['detail_task'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    $sql = "INSERT INTO tabel_task VALUES divisi='$divisi', task='$task', detail_task='$detail_task', start_date='$start_date', end_date='$end_date'";
    mysqli_query($koneksi, $sql);

    header("location:../index.php?p=home");

?>


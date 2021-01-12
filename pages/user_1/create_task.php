<?php

include('../../function/koneksi.php');

if($_POST){
    
    $divisi = $_POST['divisi'];
    $task = $_POST['task'];
    $detail_task = $_POST['detail_task'];
    $start_date = $_POST['tanggal_mulai'];
    $end_date = $_POST['end_date'];

    $query = ("INSERT INTO tabel_task(id_task,divisi,task,detail_task,start_date,end_date) VALUES ('','".$divisi."','".$task."','".$detail_task."','".$start_date."','".$end_date."')");
    
    mysqli_query($conn, $query);

    //mysqli_query("INSERT INTO tabel_task values('$id_task','$divisi','$task','$detail_task','$start_date','$end_date')")

    header("location:../user_1/dashboard_1.php");
}

?>


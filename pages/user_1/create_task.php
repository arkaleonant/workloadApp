<?php

include('../../function/koneksi.php');

if($_POST){
    
    $divisi = $_POST['divisi'];
    $task = $_POST['task'];
    $detail_task = $_POST['detail_task'];
    $start_date = $_POST['tanggal_mulai'];
    $end_date = $_POST['end_date'];
    $pj = $_POST['pj'];

    $query = ("INSERT INTO tabel_task(id_task,divisi,task,detail_task,start_date,end_date,pj) VALUES ('','".$divisi."','".$task."','".$detail_task."','".$start_date."','".$end_date."','".$pj."')");
    
    mysqli_query($conn, $query);
    //mysqli_query("INSERT INTO tabel_task values('$id_task','$divisi','$task','$detail_task','$start_date','$end_date')")

    header("location:../user_1/view_task.php");
}

?>


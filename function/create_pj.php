<?php

include('koneksi.php');

if($_POST){
    
    $id_task = $_POST['id_task'];
    $nama = $_POST['nama'];
    $task = $_POST['task'];

    $query = ("INSERT INTO tabel_pj(id_task,nama,task) VALUES ('','".$nama."','".$task."')");
    
    mysqli_query($conn, $query);

    header("location:../index.php?p=home");
}

?>


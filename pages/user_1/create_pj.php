<?php

include('../../function/koneksi.php');

if($_POST){
    
    $id_task = $_POST['id_task'];
    $task = $_POST['task'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];

    $query = "INSERT INTO tabel_pj VALUES ($id_task,$task,$nip,$nama)";
    
    mysqli_query($conn, $query);

    header("location:../user_1/view_task.php");
}

?>


<?php

include('../../function/koneksi.php');

if($_POST){
    
    $id_task = $_POST['id_task'];
    $nip = $_POST['nip'];

    $query = "INSERT INTO tabel_pj VALUES ($id_task,$nip)";
    
    mysqli_query($conn, $query);

    header("location:../user_1/view_task.php");
}

?>


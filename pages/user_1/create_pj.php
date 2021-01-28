<?php
    //membuat koneksi
    $con = mysqli_connect("localhost", "root", "", "magang_pal");

    
    //memasukkan data ke array
        $id_task       = $_POST['id_task'];
        $nip        = $_POST['nip'];

        $total = count($id_task);


    //melakukan perulangan input
    for($i=0; $i<$total; $i++){

        mysqli_query($con, "insert into tabel_pj set
            id_task    = '$id_task[$i]',
            nip      = '$nip[$i]'
        ");
    }

    //kembali ke halaman sebelumnya
    header("location: daftar_task.php");
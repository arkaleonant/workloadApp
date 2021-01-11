<?php
include '../function/koneksi.php';
include '../function/fungsi.php';
include '../function/session_task.php';
if (empty($_SESSION['nip'])) {
	header("Location:../login_page.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
<div class="panel panel-flat">
<div class="row mb-2">
          <div class="col-sm-6">
            <h2>Daftar Task</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Task</li>
            </ol>
          </div>
        </div>
    <div class="panel-heading">
        <div class="heading-elements">
        </div>
    </div>
      <table class="table datatable-pagination">

          <thead>
              <tr>
                    <th>No.</th>
                    <th>Id Task</th>
                    <th>Divisi</th>
                    <th>Task</th>
                    <th>Detail Task</th>
                    <th>Pegawai</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php
                  $koneksi = mysqli_connect("localhost", "root", "", "magang_pal");
                  $sel_query="SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task desc ;";
                  // $sel_query="SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' && nama='$_SESSION[nama]' ORDER BY id_task desc ;";
                  $result = mysqli_query($koneksi,$sel_query);
                  $no = 1;
                  while($row = mysqli_fetch_assoc($result)) { 
              ?>
                  <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $row['id_task'] ?></td>
                      <td><?php echo $row['divisi'] ?></td>
                      <td><?php echo $row['task'] ?></td>
                      <td><?php echo $row['detail_task'] ?></td>
                      <td><a class="btn btn-warning">lihat</a></td>
                      <td><?php echo $row['start_date'] ?></td>
                      <td><?php echo $row['end_date']?></td>
                      <td><a class="btn btn-success" name="kerjakan" href="./pages/tambah_plan.php?id=<?php echo $row["id_task"]; ?>">kerjakan</a></td>
                  </tr>
                  <?php $no++;
              } ?>

          </tbody>
      </table>
</div>
<!-- /pagination types -->
<script>
    $(document).ready(function() {

        /* ------------------------------------------------------------------------------
         *
         *  # Basic datatables
         *
         *  Specific JS code additions for datatable_basic.html page
         *
         *  Version: 1.0
         *  Latest update: Aug 1, 2015
         *
         * ---------------------------------------------------------------------------- */


    });
</script>
</html>

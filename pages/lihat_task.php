

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
                  <th>Nomor</th>
                  <th>Id Task</th>
                  <th>Task</th>
                  <th>Detail Task</th>
                  <th>Pegawai</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Progress Saat Ini</th>
              </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $row['id_task'] ?></td>
                      <td><?php echo $row['task'] ?></td>
                      <td><?php echo $row['detail_task'] ?></td>
                      <td><a class="btn btn-warning">lihat</a></td>
                      <td><?php echo $row['start_date'] ?></td>
                      <td><?php echo $row['end_date'] * $row['stock'] ?></td>
                      <td>45 %</td>
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

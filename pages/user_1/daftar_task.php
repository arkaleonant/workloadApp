<?php 
    session_start();
    $hak_akses = $_SESSION['hak_akses'];
    if(!isset($_SESSION['nip']) && $hak_akses!="password"){
		?>
<script language="JavaScript">
  alert('Anda Bukan Hak Akses 1. Silahkan Login kembali!');
  document.location = '../../index.php';
</script>
<?php
    }
    error_reporting(0);
?>

<?php
  $no=1;
  $connect = mysqli_connect("localhost", "root", "", "magang_pal");
  
  $query = "SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC";
  $result = mysqli_query($connect, $query);

?>

<br>

<head>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>

<body>

  <button type="button" name="addtask" id="addtask" data-toggle="modal" data-target="#create_task_modal"
    class="btn btn-success">Tambah Task</button>
  <a class="btn btn-info btn-xs" href="dashboard_1.php?laporan" target="_blank">Cetak Laporan</a>
  <br><br>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Task</h3>
    </div>
    <div class="card-body">
      <table id="tabel_task" class="table table-stripped table-hover" style="width:100%">

        <thead>
          <tr>
            <th>No.</th>
            <th >Id Task</th>
            <th>Divisi</th>
            <th>Task</th>
            <th>Detail Task</th>
            <th >Start Date</th>
            <th >End Date</th>
            <th>Status</th>
            <th>Detail PJ</th>
            <th>Action</th>
          </tr>
        </thead>

        

        <tbody>
        <?php
                  while($row = mysqli_fetch_array($result))
                  {
          ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row['id_task'] ?></td>
            <td><?php echo $row['divisi'] ?></td>
            <td><?php echo $row['task'] ?></td>
            <td><?php echo $row['detail_task'] ?></td>
            <td><?php echo $row['start_date'] ?></td>
            <td><?php echo $row['end_date']?></td>
            <td>

              <?php if($row['status']=='0') 
                      { ?>
              <a>PROSES</a>
            <?php } else if ($row['status']=='1'){ ?>
            <a>SUDAH SELESAI</a>
              <?php } else { ?>
              <a>TIDAK SELESAI</a>
                <?php }  ?>
                </td>
                <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id_task"]; ?>"
                    class="btn btn-info btn-xs view_data" /></td>
                <td>
                  <?php 
                    $jml_1 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(id_plan) FROM tabel_plan WHERE status='1' AND id_task = '".$row['id_task']."'"))[0];
                    $jml_semua = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(id_plan) FROM tabel_plan WHERE id_task = '".$row['id_task']."'"))[0];
                    mysqli_query($connect, "SELECT * FROM tabel_plan WHERE id_task = '".$row['id_task']."'")
                  ?>
                  <?php
                    $sekarang = date('Y-m-d');
                    if($row['status'] > 0 ){?>
                  <a class="btn btn-secondary btn-xs disabled">NO ACTION</a>
                <?php } else {
                     if($sekarang < $row['end_date'] && $jml_1 == $jml_semua && $jml_semua > 1){?>
                <a href='update_status_sudah_selesai.php?id=<?php echo $row[id_task] ?>'
                  class="btn btn-primary btn-xs">Sudah Selesai</a>
                  <?php }else if($sekarang > $row['end_date']){ ?>
                  <a href='update_status_tidak_selesai.php?id=<?php echo $row[id_task] ?>'
                    class="btn btn-danger btn-xs">Tidak Selesai</a>
                    <?php }else{ ?>
                    <a class="btn btn-secondary btn-xs disabled">NO ACTION</a>
                      <?php }
                    }?>

                      </td>
                      <?php $no++;
                  }
          ?>
          </tr>

        </tbody>
      </table>
  </div>
  </div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script href="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script href="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#tabel_task').DataTable();
} );
</script>
</body>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


<div id="create_task_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Task pada Divisi <?php echo $_SESSION['divisi'] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <form method="POST" action="f_create_task.php">
              <div class="form-group">
                <label>Divisi</label>
                <input type="text" name="divisi" class="form-control" required value="<?php echo $_SESSION['divisi'] ?>"
                  readonly />
                <br />
                <label>Task</label>
                <input type="text" name="task" class="form-control" placeholder="Enter Task"
                  style="border: 1px solid #000000" required>
                <br />
                <label>Detail Task</label>
                <input type="text" name="detail_task" class="form-control" placeholder="Enter Detail Task"
                  style="border: 1px solid #000000" required>
                <br />
                <label>Start Date</label>
                <div class="form-group">
                  <input type="date" name="tanggal_mulai" class="form-control float-right"
                    style="border: 1px solid #000000" required>
                </div> <br> <br>
                <label>End Date</label>
                <div class="form-group">
                  <input type="date" name="end_date" class="form-control float-right" style="border: 1px solid #000000"
                    required>
                </div> <br><br>
              </div><br><br>
              <br />
              <div class="right-card-footer">
                <button type="post" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div id="dataModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Penanggung Jawab</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="detail_pj">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '.view_data', function () {
    var id_task = $(this).attr("id");
    $.ajax({
      url: "detail_pj.php",
      method: "POST",
      data: {
        id_task: id_task
      },
      success: function (data) {
        $('#detail_pj').html(data);
        $('#dataModal').modal('show');
      }
    });
  });
</script>

</form>
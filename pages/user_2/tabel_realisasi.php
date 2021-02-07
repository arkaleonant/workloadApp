<?php 
    session_start();
    $hak_akses = $_SESSION['hak_akses'];
    if(!isset($_SESSION['nip']) && $hak_akses!="password"){
		?>
			<script language="JavaScript">
				alert('Anda Bukan Hak Akses 1. Silahkan Login kembali!');
				document.location='../../index.php';
			</script>
		<?php
    }
    error_reporting(0);
?>
<?php
  $no=1;
  $connect = mysqli_connect("localhost", "root", "", "magang_pal");
  $query = "SELECT * FROM  tabel_realisasi 
            INNER JOIN tabel_pj
            ON tabel_realisasi.id_task = tabel_pj.id_task
            WHERE tabel_pj.nip='$_SESSION[nip]'
            ORDER BY tabel_realisasi.id_task DESC";
  $result = mysqli_query($connect, $query);
?>

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
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Realisasi</h3>
    </div>
      <div class="card-body">
          <table id="tabel_realisasi" class="table table-striped table-bordered" style="width:100%"">
          <thead>
          <tr>
              <th width=5%    >  No.        </th>  
              <th width=5%    >  ID Plan    </th>
              <th width=5%    >  Id Task    </th>
              <th width=15%   >  Tanggal    </th>
              <th width=30%   >  Plan       </th>
              <th width=5%    >  Status     </th>
              <th width=15%   >  Kendala    </th>
          </tr>
          </thead>       
            <tbody>
            <?php
              while($row = mysqli_fetch_array($result))
              {
            ?>
              <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $row['id_plan'] ?></td>
                    <td><?php echo $row['id_task'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['plan'] ?></td>
                    <td>
                        <?php if($row['status']=='1') 
                            {
                          ?>
                              <a>Sudah Dikerjakan</a>
                          <?php }?>
                    </td>
                    <td><?php echo $row['kendala'] ?></td>
              </tr>
            <?php $no++;
                }
              ?>
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
      $('#tabel_realisasi').DataTable();
  } );
  </script>
</body>

<div id="dataModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lihat Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="detail_pegawai"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 
<div id="addModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
   <h4 class="modal-title">Realisasi</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
      <div class="modal-body" id="form_tambah">
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
  $(document).on('click', '.tambah_data', function(){
  var id_task = $(this).attr("id");
  $.ajax({
   url:"form_update.php",
   method:"POST",
   data:{id_task:id_task},
   success:function(data){
    $('#form_tambah').html(data);
    $('#addModal').modal('show');
   }
  });
 });

$(document).on('click', '.view_data', function(){
  var id_task = $(this).attr("id");
  $.ajax({
   url:"detail_plan.php",
   method:"POST",
   data:{id_task:id_task},
   success:function(data){
    $('#detail_pegawai').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
 </script>






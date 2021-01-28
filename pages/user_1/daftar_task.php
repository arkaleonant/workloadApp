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
  $query = "SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC";
  $result = mysqli_query($connect, $query);
?>

<?php 
  $sql = mysqli_query($conn, "SELECT * FROM pegawai where nip='$_SESSION[nip]'");
											$row = mysqli_fetch_array($sql);
?>
<button type="button" name="age" id="age" data-toggle="modal" data-target="#create_task_modal"
      class="btn btn-success">Tambah Task</button>
<h2>Daftar Task</h2>
      <div class="panel panel-flat">
        <div class="row mb-2"> 
          <div class="table-responsive">
            <div id="daftar_task">
              <table border="1" cellpadding="10" style="text-align:center;">
                <tr bgcolor="#343a40"  style="color:#ffffff;">
                  <th >No.</th>
                  <th width="6%" >Id Task</th>
                  <th >Divisi</th>
                  <th >Task</th>
                  <th >Detail Task</th>
                  <th width="10%">Start Date</th>
                  <th width="10%">End Date</th>
                  <th>Detail PJ</th>
                  <th>Action</th>
                </tr>
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
                    <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id_task"]; ?>" class="btn btn-info btn-xs view_data" /></td> 
                    <td><input type="button" name="add" value="Tambah PJ" id="<?php echo $row["id_task"]; ?>" class="btn btn-warning btn-xs tambah_data" /></td>  
                  </tr>
                  <?php $no++;
                  }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>

  

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
            <form method="POST" action="create_task.php">
              <div class="form-group">
                <label>Divisi</label>
                <input type="text" name="divisi" class="form-control" required value="<?php echo $_SESSION['divisi'] ?>"
                  readonly />
                <br />
                <label>Task</label>
                <input type="text" name="task" class="form-control" placeholder="Enter task"
                  style="border: 1px solid #000000" required>
                <br />
                <label>Detail Task</label>
                <textarea name="detail_task" style="width: 100%; height: 50px; font-size: 14px; 
                  line-height: 18px; border: 1px solid #000000; padding: 
                  10px;" required>
                </textarea>
                <br />
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
   <h4 class="modal-title">Detal Penanggung Jawab</h4>
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
  $(document).on('click', '.view_data', function(){
  var id_task = $(this).attr("id");
  $.ajax({
   url:"detail_pj.php",
   method:"POST",
   data:{id_task:id_task},
   success:function(data){
    $('#detail_pj').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
</script>

<script type="text/javascript">
		$(document).ready(function() {
		    $('#pj').select2({
          placeholder: " pilih pj",
				allowClear: true,
				language: "id"
		    });
		});
	</script>
</form>




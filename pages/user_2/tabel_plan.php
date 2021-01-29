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
  $query = "SELECT * FROM tabel_task 
            INNER JOIN tabel_plan 
            ON tabel_task.id_task = tabel_plan.id_task 
            INNER JOIN tabel_pj
            ON tabel_plan.id_task = tabel_pj.id_task 
            WHERE tabel_pj.nip='$_SESSION[nip]' 
            ORDER BY tabel_task.id_task DESC";
  $result = mysqli_query($connect, $query);
?>

<h2>Daftar Plan</h2>
<div class="row mb-2">
  <div class="table-responsive">
    <div id="daftar_plan">
      <table border="1" cellpadding="10" style="text-align:center;">
        <tr  bgcolor="#343a40"  style="color:#ffffff;">
            <th>No.</th>
            <th width=5%>ID Plan</th>
            <th width=10%>Id Task</th>
            <th width=15%>Start Date</th>
            <th width=50%>Plan</th>
            <th width=10%>Status</th>
            <th width=15%>Realisasi</th>
        </tr>
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
                        <a>Sudah Selesai</a>
                    <?php } else { ?>
                      <a>Belum Selesai</a>  
                    <?php }  
                    ?>  
                  </td>
              </td>
              <td>
              <input type="button" name="add" value="Realisasi" id="<?php echo $row["id_plan"]; ?>" class="btn btn-warning btn-xs tambah_data" />
              </td>
        </tr>
              <?php $no++;
                }
              ?>
      </table>
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






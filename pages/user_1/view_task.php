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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WORKLOAD | PT.PAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard_1.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard_1.php" class="brand-link">
		<?php $sql = mysqli_query($conn, "SELECT * FROM pegawai where nip='$_SESSION[nip]'");
											$row = mysqli_fetch_array($sql);
		?>
	  <h2 class="brand-text font-weight-light"><b><?php echo $_SESSION['divisi']; ?></b></h2>
	  <span class="brand-text font-weight-light"><?php echo $_SESSION['jabatan']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
			<?php $sql = mysqli_query($conn, "SELECT * FROM pegawai where nip='$_SESSION[nip]'");
										$row = mysqli_fetch_array($sql);
			?>
          <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="dashboard_1.php" class="nav-link">
                  <i class="fa fa-dashboard nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="view_task.php" class="nav-link active">
                  <i class="nav-icon fa fa-book"></i>
                  <p>Task</p>
                </a>
              <li class="nav-item">
                <a href="../../function/logout.php" class="nav-link">
                  <i class="nav-icon fa fa-gear"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Main content -->
        <div class="content-wrapper">
        <div class="panel panel-flat">
        <div align="left">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#create_task_modal" class="btn btn-success" >Tambah Task</button>
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
                  <th>Progress Saat Ini</th>
              </tr>
          </thead>
          <tbody>
              <?php
                  $koneksi = mysqli_connect("localhost", "root", "", "magang_pal");
                  $sel_query="SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task desc ;";
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
                      <td><button type="button" name="age" id="age" data-toggle="modal" data-target="#create_pj_modal" class="btn btn-success" href="index.php?p=view_task?id=<?php echo $row["divisi"]; ?>">Tambah PJ</button></td>
                      <td><?php echo $row['start_date'] ?></td>
                      <td><?php echo $row['end_date']?></td>
                      <td>45%</td>
                  </tr>
                  <?php $no++;
              } ?>
          </form>
          </tbody>
      </table>
</div>

        </div>
    <!-- /.content -->
  </div>

  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
</body>
</html>

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
     <input type="text" name="divisi" class="form-control" required value ="<?php echo $_SESSION['divisi'] ?>" readonly/>
     <br />
     <label>Task</label>
     <input type="text" name="task" class="form-control" placeholder="Enter task" style="border: 1px solid #000000" required>
     <br />
     <label>Detail Task</label>
     <textarea name="detail_task" placeholder="Place some text here"
        style="width: 100%; height: 200px; font-size: 14px; 
        line-height: 18px; border: 1px solid #000000; padding: 
        10px;" required>
      </textarea>
     <br />
     <br />  
     <label>Start Date</label>
     <div class="form-group">
      <input type="date" name="tanggal_mulai" class="form-control float-right" style="border: 1px solid #000000" required>
      </div><br><br>
     <label>End Date</label>
     <div class="form-group">
      <input type="date" name="end_date" class="form-control float-right" style="border: 1px solid #000000" required>
      </div>
      </div><br><br>
     <br />
     <div class="right-card-footer">
     <button type="post" name="submit" class="btn btn-primary" >Submit</button>
     </div>
     <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
    </div>
   </div>
   </div>
  </div>
 </div>
</div>
</form>


<div id="create_pj_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Tambah Penanggungjawab <?php echo $_SESSION['divisi'] ?></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
    <div class="modal-body">
    <section class="content">
    <div class="container-fluid">
    <form method="POST" action="create_pj.php"> 
                  <div class="form-group">
                    <label>ID Task</label>
                  </div>
                      <?php   
                          $con = mysqli_connect("localhost","root","","magang_pal");  
                      ?>  
                      <td>
                      <select name="id_task" id="id_task" class="form-control" onchange='changeValue(this.value)' required> 
                        <option value="none">- Pilih Id Task -</option> 
                          <?php     
                          $result = mysqli_query($con, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC ");  
                          $a          = "var task = new Array();\n;";    
                          while ($row = mysqli_fetch_array($result)) {  
                          echo '<option name="id_task" value="'.$row['id_task'] . '">' . $row['id_task'] . '</option>';   
                          $a .= "task['" . $row['id_task'] . "'] = {task:'" . addslashes($row['task'])."'};\n";  
                          }  
                          ?>  
                      </select>
                      </td><br>  
                    <div class="form-group">
                      <label >Task</label>
                      <div class="form-group control-group after-add-more">
                      <input type="task" class="form-control" id="task" name="task" placeholder="Enter task" style="border: 1px solid #000000"readonly>
                    </div><br>
                      <label>NAMA</label>
                      <select type="text"  class="form-control" id="nama" name="nama" required="required">
                      <option value='' selected>- Pilih nama -</option>
                        <?php              
                          $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                          $anggota = mysqli_query($conn ,"SELECT * FROM pegawai WHERE divisi='$_SESSION[divisi]' && hak_akses='2'");
                          while ($row = mysqli_fetch_array($anggota)) {
                            echo "<option value='$row[nama]'>$row[nama]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="copy hide">     
                    <div class="control-group">
                      <div class="form-group">
                      <div class="container-fluid">
                        <div class="form-group">
                            <label>NAMA</label>
                            <select type="text"  class="form-control" id="nama" name="nama" required="required">
                            <option value='' selected>- Pilih nama -</option>
                              <?php              
                                $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                                $anggota = mysqli_query($conn ,"SELECT * FROM pegawai WHERE divisi='$_SESSION[divisi]' && hak_akses='2'");
                                while ($row = mysqli_fetch_array($anggota)) {
                                  echo "<option value='$row[nama]'>$row[nama]</option>";
                                }
                              ?>
                            </select>
                          </div> 
                      </div>
                      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
                    </div><br>
                  </div>
                  <br>
                  <div class="right-card-footer">
                    <button type="submit" name="submit" class="btn btn-primary" href="index.php?p=home">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button class="btn btn-success add-more" type="button"> Add </button>
                  </div>
                  <br> 
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>     
   </div>
    </div>
   </div>
   </div>
  </div>
 </div>
</div>
</form>


<script> 
 $(document).ready(function() {
  $(".add-more").click(function(){ 
  var html = $(".copy").html();
  $(".after-add-more").after(html);
  });

  // saat tombol remove dklik control group akan dihapus 
  $("section").on("click",".remove",function(){ 
  $(this).parents(".control-group").remove();
  });
  });
    <?php   
      echo $a;?>  
      function changeValue(id){  
      document.getElementById('task').value = task[id].task;   
      };  
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nama').val() == "")  
  {  
   alert("Mohon Isi Nama ");  
  }  
  else if($('#alamat').val() == '')  
  {  
   alert("Mohon Isi Alamat");  
  }  
 
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert

// //Begin Tampil Detail Karyawan
//  $(document).on('click', '.view_data', function(){
//   var employee_id = $(this).attr("id");
//   $.ajax({
//    url:"select.php",
//    method:"POST",
//    data:{employee_id:employee_id},
//    success:function(data){
//     $('#detail_karyawan').html(data);
//     $('#dataModal').modal('show');
//    }
//   });
//  });
// //End Tampil Detail Karyawan
 
// //Begin Tampil Form Edit
//   $(document).on('click', '.edit_data', function(){
//   var employee_id = $(this).attr("id");
//   $.ajax({
//    url:"edit.php",
//    method:"POST",
//    data:{employee_id:employee_id},
//    success:function(data){
//     $('#form_edit').html(data);
//     $('#editModal').modal('show');
//    }
//   });
//  });
// //End Tampil Form Edit

// //Begin Aksi Delete Data
//  $(document).on('click', '.hapus_data', function(){
//   var employee_id = $(this).attr("id");
//   $.ajax({
//    url:"delete.php",
//    method:"POST",
//    data:{employee_id:employee_id},
//    success:function(data){
//    $('#employee_table').html(data);  
//    }
//   });
//  });
// }); 
//End Aksi Delete Data
 </script>

 <script type="text/javascript">
                $(document).ready(function() {
                  $(".add-more").click(function(){ 
                      var html = $(".copy").html();
                      $(".after-add-more").after(html);
                  });

                  // saat tombol remove dklik control group akan dihapus 
                  $("section").on("click",".remove",function(){ 
                      $(this).parents(".control-group").remove();
                  });
                });
                  <?php   
                  echo $b;?>  
                  function changeValue(id){  
                  document.getElementById('task').value = task[id].task;
                  document.getElementById('task2').value = task[id].task;   
                };  
          </script>
</body>



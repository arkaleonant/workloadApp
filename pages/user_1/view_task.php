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
  $no = 1;
  $connect = mysqli_connect("localhost", "root", "", "magang_pal");
  $query="SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task desc ;";
  $result = mysqli_query($connect,$query);
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
<!-- <<<<<<< HEAD -->
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#create_task_modal"
            class="btn btn-success">Tambah Task</button>
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#create_pj_modal"
            class="btn btn-success" href="index.php?p=view_task?id=<?php echo $row["divisi"]; ?>">Tambah PJ</button>
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
              <td> 
              <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_task']; ?>">Edit</a>
              </td>
              </td>
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
=======
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#create_task_modal" class="btn btn-success" >Tambah Task</button>
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#create_pj_modal" class="btn btn-success" href="index.php?p=view_task?id=<?php echo $row["divisi"]; ?>">Tambah PJ</button>
    </div>
    <div class="row mb-2">
   <br />  
   <div class="table-responsive">
    <br />
    <div id="view_task">
      <table class="table table-bordered">
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
              <?php
                  while($row = mysqli_fetch_array($result)) { 
              ?>
                  <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $row['id_task'] ?></td>
                      <td><?php echo $row['divisi'] ?></td>
                      <td><?php echo $row['task'] ?></td>
                      <td><?php echo $row['detail_task'] ?></td>
                      <td><input type="button" name="view" value="Lihat" id="<?php echo $row["id_task"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                      <td><?php echo $row['start_date'] ?></td>
                      <td><?php echo $row['end_date']?></td>
                      <td>45%</td>
                  </tr>
                  <?php $no++;
              } ?>
      </table>
      </div>
</div>
</div>
        </div>
<!-- >>>>>>> 3f4ecd7c594c5cc41b82072421a6561088abb6bb -->
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
                <input type="text" name="divisi" class="form-control" required value="<?php echo $_SESSION['divisi'] ?>"
                  readonly />
                <br />
                <label>Task</label>
                <input type="text" name="task" class="form-control" placeholder="Enter task"
                  style="border: 1px solid #000000" required>
                <br />
                <label>Detail Task</label>
                <textarea name="detail_task" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; 
        line-height: 18px; border: 1px solid #000000; padding: 
        10px;" required>
      </textarea>
                <br />
                <br />
                <label>Start Date</label>
                <div class="form-group">
                  <input type="date" name="tanggal_mulai" class="form-control float-right"
                    style="border: 1px solid #000000" required>
                </div><br><br>
                <label>End Date</label>
                <div class="form-group">
                  <input type="date" name="end_date" class="form-control float-right" style="border: 1px solid #000000"
                    required>
                </div>
              </div><br><br>
              <br />
              <div class="right-card-footer">
                <button type="post" name="submit" class="btn btn-primary">Submit</button>
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
              <div class="form-group control-group after-add-more">
              <div class="control-group">
                          <div class="form-group">
                      <div class="container-fluid">
                        <div class="form-group">
                          <label>ID Task</label>
                        </div>
                          <?php   
                                $con = mysqli_connect("localhost","root","","magang_pal");  
                            ?>  
                            <td>
                            <select name="id_task" id="id_task" class="form-control" onchange='changeValue(this.value)' required> 
                              <option value="none">- Pilih Task-</option> 
                                <?php     
                                $result = mysqli_query($con, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC");  
                                while ($row = mysqli_fetch_array($result)) {  
                                  echo "<option value='$row[id_task]'>$row[id_task] - $row[task]</option>";                                }  
                                ?>  
                            </select> 
                              </td><br>   
                  <div class="control-group">
                      <div class="form-group">
                      <div class="container-fluid">
                        <div class="form-group">
                          <label>NIP</label>
                        </div>
                          <?php   
                                $con = mysqli_connect("localhost","root","","magang_pal");  
                            ?>  
                            <td>
                            <select name="nip" id="nip" class="form-control" onchange='changeValue(this.value)' required> 
                              <option value="none">- Pilih NIP-</option> 
                                <?php     
                                $result = mysqli_query($con, "SELECT * from pegawai WHERE divisi='$_SESSION[divisi]' AND hak_akses='2' ORDER BY nip DESC");  
                                $a        = "var nama = new Array();\n;";    
                                while ($row = mysqli_fetch_array($result)) {  
                                echo '<option name="nip" value="'.$row['nip'] . '">' . $row['nip'] . '</option>';   
                                $a .= "nama['" . $row['nip'] . "'] = {nama:'" . addslashes($row['nama'])."'};\n";  
                                }  
                                ?>  
                            </select>
                            </td><br>  
                            <tr>
                          <div class="form-group">
                            <label >Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter task" style="border: 1px solid #000000"readonly>
                          </div></tr>
                             
                  <div class="right-card-footer">
                  <button type="post" name="submit" class="btn btn-primary" >Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                  </div>
                  <br>      
</div>
    </div>
    </form>

    
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Lihat Pegawai</h4>
   </div>
   <div class="modal-body" id="detail_pegawai">
    <form action="">
    <label for=""></label>
    <input type="text" name="" id="">
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
</div>
</div>
</form>

<div id="lihat_detail_modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Tambah Penanggungjawab </h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
    <div class="modal-body">
    <section class="content">
    <div class="container-fluid">
    <form method="POST" action="create_pj.php"> 
    <div class="form-group control-group after-add-more">  
      <div class="form-group">
      <label>ID Task</label>
      <div class="modal-body" id="detail_karyawan">   
      </div>
    </section>
  </div>
</div>
</form>


<script>
 $(document).on('click', '.view_data', function(){
  var id_task = $(this).attr("id");
  $.ajax({
   url:"",
   method:"POST",
   data:{id_task:id_task},
   success:function(data){
    $('#detail_pegawai').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
</script>

<script type="text/javascript">
<?php   
  echo $a; ?>  
  function changeValue(id){  
  document.getElementById('nama').value = nama[id].nama;   

};  
</script>

<!-- <script type="text/javascript">
<?php   
  echo $b; ?>  
  function changeValue(id){  
    document.getElementById('task').value = task[id].task;   

};  
</script>  -->
<?php
include '../function/koneksi.php';
include '../function/fungsi.php';
if (empty($_SESSION['nip'])) {
	header("Location:../login_page.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Tambah Penanggung Jawab </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Tambah Penanggungjawab</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
                <form method="post" action="./function/create_pj.php">
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
                          $result = mysqli_query($con, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC limit 1");  
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
                      <input type="task" class="form-control" id="task" name="task" placeholder="Enter task" style="border: 1px solid #000000"readonly>
                    </div><br>
                    <div class="form-group control-group after-add-more">
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
                    </div>
                    <echo>...........................................................................................................................................................................................................................................................................</echo><br>
                    <label>ID Task</label>
                    <?php   
                          $con = mysqli_connect("localhost","root","","magang_pal");  
                      ?>  
                      <td>
                      <select name="id_task" id="id_task" class="form-control" onchange='changeValue(this.value)' required> 
                        <option value="none">- Pilih Id Task -</option> 
                          <?php     
                          $result = mysqli_query($con, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC limit 1");  
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
                      <input type="task" class="form-control" id="task" name="task" placeholder="Enter task" style="border: 1px solid #000000"readonly>
                    </div><br>
                    <div class="form-group control-group after-add-more">
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
                          echo $a;?>  
                          function changeValue(id){  
                            document.getElementById('task').value = task[id].task;   
                          };  
                    </script>
                      <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
                    </div><br>
                  </div>
                  
                  <div class="form-group">
                  <div class="left-card-footer">
                    <button type="submit" name="submit" class="btn btn-primary" href="index.php?p=home?id">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button class="btn btn-success add-more" type="button"> Add </button>
                  </div>
                  <br>      
                </form>
                 
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
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
                  echo $a;?>  
                  function changeValue(id){  
                  document.getElementById('task').value = task[id].task;   
                };  
          </script>
</body>
</html>

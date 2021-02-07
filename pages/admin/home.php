<!DOCTYPE html>
<html lang="en">

<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');

    session_start();
    $hak_akses = $_SESSION['hak_akses'];
    if(!isset($_SESSION['nip']) && $hak_akses!="password"){
		?>
			<script language="JavaScript">
				alert('Silahkan Login kembali!');
				document.location='../../index.php';
			</script>
		<?php
    }
    error_reporting(0);

    $data_user = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(1) FROM pegawai WHERE divisi='$_SESSION[divisi]'"))[0];
    $jumlah_user = mysqli_num_rows($data_user);

    $no=1;
    $connect = mysqli_connect("localhost", "root", "", "magang_pal");
    $query = "SELECT * FROM  pegawai WHERE hak_akses!='0'";
    $result = mysqli_query($connect, $query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<br>
<button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Tambah Data Pegawai</button>
<br><br>
<div class="panel panel-flat">
    <div class="card-header">
        <h3 class="card-title">Daftar Pegawai</h3>
    </div>
        <div class="card-body">
            <table id="tabel_pegawai" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th >No.</th>
                            <th >NIP</th>
                            <th >Nama</th>
                            <th >Email</th>
                            <th >Password</th>
                            <th >Divisi</th>
                            <th >Jabatan</th>
                            <th >Hak Akses</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                            ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row['nip'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['divisi'] ?></td>
                            <td><?php echo $row['jabatan'] ?></td>
                            <td><?php echo $row['hak_akses'] ?></td>
                            <td><input type="button" name="edit" value="Edit" id="<?php echo $row["nip"]; ?>" class="btn btn-warning btn-xs edit_data" /></td> 
                            <td><input type="button" name="delete" value="Hapus" id="<?php echo $row["nip"]; ?>" class="btn btn-danger btn-xs hapus_data" /></td> 
                        
                        </tr>
                            <?php $no++;
                                }
                            ?>
                    </tbody>
            </table>
        </div>
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
</body>
</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form method="post" id="insert_form">
                
                    <label>NIP</label>
                    <input type="number" name="nip" id="nip" placeholder="Masukkan NIP" class="form-control" />
                    <br />

                    <label>Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="form-control" />
                    <br />

                    <label>Email</label>
                    <input type="text" name="email" id="email" placeholder="Masukkan Email" class="form-control" />
                    <br />
                    
                    <label>Password</label>
                    <input type="text" name="password" id="password" placeholder="Masukkan Password" class="form-control" />
                    <br />
                    
                    <label>Divisi</label>
                    <input type="text" name="divisi" id="divisi" placeholder="Masukkan Divisi" class="form-control"/>
                    <br />

                    <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control">
                        <option value="">- Pilih Jabatan -</option>
                        <option value="Kepala Divisi">Kepala Divisi</option>
                        <option value="Kepala Departemen">Kepala Departemen</option>
                        <option value="Kepala Bagian">Kepala Bagian</option>
                        <option value="Staff">Staff</option>
                    </select>
                    <br />

                    <label>Hak Akses</label>
                    <select name="hak_akses" id="hak_akses" class="form-control">
                        <option value="">- Pilih Hak Akses -</option>
                        <option value="1">Atasan</option>
                        <option value="2">Bawahan</option>
                    </select>
                    <br /> <br /> 
                    
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="form_edit">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    // Begin Aksi Insert
        $('#insert_form').on("submit", function(event){  
            event.preventDefault();  
            if($('#nip').val() == ""){  
                alert("Mohon Isi NIP ");  
            } else if($('#nama').val() == ''){  
                alert("Mohon Isi Nama");  
            } else if($('#email').val() == ''){  
                alert("Mohon Isi Email");  
            } else if($('#password').val() == ''){  
                alert("Mohon Isi Password");  
            } else if($('#jabatan').val() == ''){  
                alert("Mohon Isi Jabatan");  
            } else if($('#hak_akses').val() == ''){  
                alert("Mohon Isi Hak Akses");  
            } else {  
                $.ajax({  
                    url:"f_add_user.php",  
                    method:"POST",  
                    data:$('#insert_form').serialize(),  
                    beforeSend:function(){  
                        $('#insert').val("Inserting");  
                    },  
                    success:function(data){  
                        $('#insert_form')[0].reset();  
                        $('#add_data_Modal').modal('hide');  
                        $('#tabel_pegawai').html(data);  
                    }  
                });  
            }  
        });
        $(document).on('click', '.edit_data', function(){
            var nip = $(this).attr("id");
            $.ajax({
                url:"form_update_pegawai.php",
                method:"POST",
                data:{nip:nip},
                success:function(data){
                    $('#form_edit').html(data);
                    $('#editModal').modal('show');
                }
            });
        });
        $(document).on('click', '.hapus_data', function(){
            var nip = $(this).attr("id");
            $.ajax({
                url:"f_delete_pegawai.php",
                method:"POST",
                data:{nip:nip},
                success:function(data){
                    $('#tabel_pegawai').html(data);  
                }
            });
        });
    });
    

    $(document).ready(function() {
        $('#tabel_pegawai').DataTable();
    } );

</script>


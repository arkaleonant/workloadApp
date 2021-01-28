<html lang="en">

<?php   
                          $conn = mysqli_connect("localhost","root","","magang_pal");  
                      ?>
<?php     
 $query = mysqli_query($conn, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC limit 1"); 
 $row = mysqli_fetch_array($query);
?>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>

<body>
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Form Tambah Data Dinamis</div>
            <div class="panel-body">
                <!-- membuat form  -->
                <!-- gunakan tanda [] untuk menampung array  -->
                <form action="create_pj.php" method="POST">
                    <div class="control-group after-add-more">
                        <label>Task</label>
                        <input type="text" name="id_task[]" class="form-control"
                            value="<?php echo $row['id_task'] ?>" readonly>
                        <label>Nama</label>
                        <select type="text" class="form-control" id="nama" name="nama" required="required">
                            <option value='' selected>- Pilih nama -</option>
                            <?php              
                          $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                          $anggota = mysqli_query($conn ,"SELECT * FROM pegawai WHERE divisi='$_SESSION[divisi]' && hak_akses='2'");
                          while ($row = mysqli_fetch_array($anggota)) {
                            echo "<option value='$row[nip]'>$row[nip] - $row[nama]</option>";
                          }
                        ?>
                        </select>
                        <br>
                        <button class="btn btn-success add-more" type="button">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </button>
                        <hr>
                    </div>
                    <button class="btn btn-success" type="POST">Submit</button>
                </form>

                <!-- class hide membuat form disembunyikan  -->
                <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                <div class="copy hide">
                    <div class="control-group">
                        <?php   
                          $conn = mysqli_connect("localhost","root","","magang_pal");  
                      ?>
                        <?php     
 $query = mysqli_query($conn, "SELECT * from tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC limit 1"); 
 $row = mysqli_fetch_array($query);
?>
                        <label>Task</label>
                        <input type="text" name="id_task[]" class="form-control"
                            value="<?php echo $row['id_task'] ?>" readonly>
                        <label>Nama</label>
                        <select type="text" class="form-control" id="nama" name="nip" required="required">
                            <option value='' selected>- Pilih nama -</option>
                            <?php              
                          $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                          $anggota = mysqli_query($conn ,"SELECT * FROM pegawai WHERE divisi='$_SESSION[divisi]' && hak_akses='2'");
                          while ($row = mysqli_fetch_array($anggota)) {
                            echo "<option value='$row[nip]'>$row[nip] - $row[nama]</option>";
                          }
                        ?>
                        </select>
                        <br>
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i>
                            Remove</button>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- fungsi javascript untuk menampilkan form dinamis  -->
    <!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".add-more").click(function () {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function () {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
</body>

</html>
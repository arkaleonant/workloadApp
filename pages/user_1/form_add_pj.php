<html lang="en">
<?php
    session_start();
    $hak_akses = $_SESSION['hak_akses'];
    if(!isset($_SESSION['nip']) && $hak_akses!="password"){
		?>
<script language="JavaScript">
  alert('Silahkan Login kembali!');
  document.location = '../../index.php';
</script>
<?php
    }
    error_reporting(0);

    $connect = mysqli_connect("localhost", "root", "", "magang_pal");
    $query="SELECT * FROM tabel_task ORDER BY id_task DESC LIMIT 1";
    $sql=mysqli_query($connect, $query);
    $row=mysqli_fetch_array($sql);

?>

<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>

<body>
  <br>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Penanggung Jawab</h3>
    </div>
    <div class="card-body">
        <!-- membuat form  -->
        <!-- gunakan tanda [] untuk menampung array  -->
        <form action="f_create_pj.php" method="POST">
          <div class="control-group after-add-more">
            <label>Id Task</label>
            <input type="text" name="id_task[]" class="form-control" value="<?php echo $row['id_task'] ?>"
              style="width: 30%; height: 40px" readonly>
            <br>
            <label>NIP</label>
            <select id="nip" name="nip[]" class="form-control" style="width: 30%; height:40px; border:2px; color:black">
              <option value="none">- Pilih Penanggung Jawab -</option>
              <?php     
                $con = mysqli_connect("localhost","root","","magang_pal");
                $result = mysqli_query($con, "SELECT * from pegawai WHERE divisi='$_SESSION[divisi]'AND hak_akses='2' ORDER BY nip ASC");  
                while ($row = mysqli_fetch_array($result)) {  
                echo "<option value='$row[nip]'>$row[nip] - $row[nama]</option>";                                }  
              ?>
            </select>
            <br>
          </div>
          <div>
            <button class="btn btn-success" type="submit">Submit</button>&nbsp&nbsp

            <button class="btn btn-info add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> Add
            </button>
          </div>
        </form>

        <!-- class hide membuat form disembunyikan  -->
        <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
        <hr>
        <div class="copy hide"><?php
        $connect = mysqli_connect("localhost", "root", "", "magang_pal");
        $query="SELECT * FROM tabel_task ORDER BY id_task DESC LIMIT 1";
        $sql=mysqli_query($connect, $query);
        $row=mysqli_fetch_array($sql);?>
          <hr style="height:1px;border:none;color:#333;background-color:#333;">
          <div class="control-group">
            <label>Id Task</label>
            <input type="text" name="id_task[]" class="form-control" value="<?php echo $row['id_task'] ?>"
              style="width: 30%; height: 40px" >
            <br>
            <label>NIP</label>
            <select id="nip" name="nip[]" class="form-control" style="width: 30%; height:40px; border:2px; color:black">
              <option value="none">- Pilih Penanggung Jawab -</option>
              <?php     
                $con = mysqli_connect("localhost","root","","magang_pal");
                $result = mysqli_query($con, "SELECT * from pegawai WHERE divisi='$_SESSION[divisi]'AND hak_akses='2' ORDER BY nip ASC");  
                while ($row = mysqli_fetch_array($result)) {  
                echo "<option value='$row[nip]'>$row[nip] - $row[nama]</option>";                                }  
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
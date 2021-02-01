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

    $data_task = mysqli_query($conn,"SELECT * FROM tabel_task 
                                        INNER JOIN tabel_pj
                                        ON tabel_task.id_task = tabel_pj.id_task 
                                        WHERE tabel_pj.nip='$_SESSION[nip]' AND tabel_task.status = '0' limit 1");
    
    $jml_0 = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(1) FROM tabel_plan 
                                                        INNER JOIN tabel_pj
                                                        ON tabel_plan.id_task = tabel_pj.id_task 
                                                        WHERE tabel_pj.nip='$_SESSION[nip]' AND tabel_plan.status='0'"))[0];
    $jml_1 = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(1) FROM tabel_plan 
                                                        INNER JOIN tabel_pj
                                                        ON tabel_plan.id_task = tabel_pj.id_task 
                                                        WHERE tabel_pj.nip='$_SESSION[nip]' AND tabel_plan.status='1'"))[0];
    $jml_semua = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(1) FROM tabel_plan 
                                                        INNER JOIN tabel_pj
                                                        ON tabel_plan.id_task = tabel_pj.id_task 
                                                        WHERE tabel_pj.nip='$_SESSION[nip]'"))[0];

    $jumlah_task = mysqli_num_rows($data_task);    
    $jumlah_user = mysqli_num_rows($data_user);
    $persentase = number_format(($jml_1/$jml_semua)*100);
?>

<br>
<div class="panel panel-flat">
                <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $jumlah_task; ?></h3>
                                <p>Task Added</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="index.php?task" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $jml_0 ?> / <?php echo $jml_semua ?> Plan</h3>
                                <p>Belum Dikerjakan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="index.php?plan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $jml_1 ?> / <?php echo $jml_semua ?> Plan</h3>
                                <p>Sudah Dikerjakan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="index.php?realisasi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <h2>Cek Plan yang belum selesai</h2><br>
            <form class="form-group">
                <select name="users" onchange="showUser(this.value)" class="form-control" style="border:1px solid #000000">
                    <option value="none">- pilih task -</option>
                    <?php     
                        $con = mysqli_connect("localhost","root","","magang_pal");
                        $result = mysqli_query($con, "  SELECT * FROM tabel_task 
                                                        INNER JOIN tabel_pj
                                                        ON tabel_task.id_task = tabel_pj.id_task 
                                                        WHERE tabel_pj.nip='$_SESSION[nip]'
                                                        -- AND tabel_task.status = '0'
                                                        ORDER BY tabel_task.id_task DESC");  
                        while ($row = mysqli_fetch_array($result)) {  
                            echo "<option value='$row[id_task]'>$row[task]</option>";                                
                        }  
                    ?>
                </select>
    </form>
    <br>
    <div id="txtHint"><b>Data Akan Ditampilkan Disini..</b></div>
</div>


<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get_task.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>


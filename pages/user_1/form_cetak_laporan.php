<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
<br>
	<center>
    <?php $sekarang = date('d M Y')?>
		<h2>DATA LAPORAN TASK</h2>
		<h4>DIVISI <?php echo $_SESSION['divisi']?> PER TANGGAL <?php echo $sekarang ?></h4>

	</center>

  <?php
  $no=1;
  $connect = mysqli_connect("localhost", "root", "", "magang_pal");
  
  $query = "SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]' ORDER BY id_task DESC";
  $result = mysqli_query($connect, $query);

?>
<br><br>
	 <table border="1" cellpadding="10" style="text-align:center;">
          <tr bgcolor="white" style="color:black;">
          
            <th>No.</th>
            <th width="6%">Id Task</th>
            <th>Task</th>
            <th>Detail Task</th>
            <th width="10%">Start Date</th>
            <th width="10%">End Date</th>
            <th>Status</th>
            <th>Penanggung Jawab</th>
          </tr>
          <?php
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row['id_task'] ?></td>
            <td><?php echo $row['task'] ?></td>
            <td><?php echo $row['detail_task'] ?></td>
            <td><?php echo $row['start_date'] ?></td>
            <td><?php echo $row['end_date']?></td>
            <td>

              <?php if($row['status']=='0') 
                      { ?>
              <a>PROSES</td>
            <?php } else if ($row['status']=='1'){ ?>
            <a>SUDAH SELESAI</td>
              <?php } else { ?>
              <a>TIDAK SELESAI</td>
                <?php }  ?>
                </td>
                <td>
                <?php  
                $querylaporan = "SELECT pj.nip, pg.nama FROM tabel_pj pj, pegawai pg WHERE pj.id_task = '".$row['id_task']."'  && pj.nip = pg.nip";
                $laporan = mysqli_query($connect, $querylaporan); 
                $data = array();
                while ($r = mysqli_fetch_array($laporan)){ // data akan di ulang
                  $data[]=$r['nama'];
                }
              
                $implode = implode(",",$data);
                echo $implode;
 ?></td>
          </tr>
          <?php $no++;
                  }
                ?>
        </table>

	<script>
		window.print();
	</script>

</body>
</html>
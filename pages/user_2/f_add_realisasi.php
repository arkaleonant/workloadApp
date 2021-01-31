<?php
 
$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if(!empty($_POST))
{
 $output = '';
    $id_plan = mysqli_real_escape_string($connect, $_POST["id_plan"]);
	$id_task = mysqli_real_escape_string($connect, $_POST["id_task"]);  
    $task = mysqli_real_escape_string($connect, $_POST["task"]);  
    $date = mysqli_real_escape_string($connect, $_POST["date"]);  
    $plan = mysqli_real_escape_string($connect, $_POST["plan"]);
    $status = mysqli_real_escape_string($connect, $_POST["status"]);
    $kendala = mysqli_real_escape_string($connect, $_POST["kendala"]);

    $tempdir = "bukti/"; 
            if (!file_exists($tempdir))
            mkdir($tempdir,0755); 

            $target_path = $tempdir . basename($_FILES['bukti']['name']);

            //nama gambar
            $nama_gambar=$_FILES['bukti']['name'];
            //ukuran gambar
            $ukuran_gambar = $_FILES['bukti']['size']; 

            $fileinfo = @getimagesize($_FILES["bukti"]["tmp_name"]);
            //lebar gambar
            $width = $fileinfo[0];
            //tinggi gambar
            $height = $fileinfo[1]; 

            if($ukuran_gambar > 8192000){ 
                echo 'Ukuran gambar melebihi 8000kb';
            }else if ($width > "1280" || $height > "1280") {
                 echo 'Ukuran gambar harus tidak lebih dari 1280 x 1280';
            }else{
                if (move_uploaded_file($_FILES['bukti']['tmp_name'], $target_path)) {
                    $query = " INSERT INTO tabel_realisasi 
                                            SET id_plan= '$id_plan', id_task = '$id_task', 
                                                date ='$date', plan='$plan', status='$status',
                                                bukti ='$nama_gambar', kendala='$kendala'";
                    header("Location:index.php?realisasi");
                } else {
                    header("Location:index.php?realisasi");
                }
            } 
	
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Disimpan</label>';
     $no=1;
     $select_query = "SELECT * FROM  tabel_realisasi 
                        INNER JOIN tabel_pj
                        ON tabel_realisasi.id_task = tabel_pj.id_task
                        WHERE tabel_pj.nip='$_SESSION[nip]'
                        ORDER BY tabel_realisasi.id_task DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>
                        <th width=5%    >  No.        </th>  
                        <th width=5%    >  ID Plan    </th>
                        <th width=5%    >  Id Task    </th>
                        <th width=15%   >  Tanggal    </th>
                        <th width=30%   >  Plan       </th>
                        <th width=5%    >  Status     </th>
                        <th width=20%   >  Bukti      </th>
                        <th width=15%   >  Kendala    </th>
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
            <td>' . $no .             '</td>
            <td>' . $row["id_plan"] . '</td>
            <td>' . $row["id_task"] . '</td>
            <td>' . $row["date"] .    '</td>
            <td>' . $row["plan"] .    '</td>
            <td>' . $row["status"] .  '</td>
            <td>' . $row["bukti"] .   '</td>
            <td>' . $row["kendala"] . '</td>
        </tr> '. $no++ .'
      ';
     }
     $output .= '</table>';
    }else{
		$output .= mysqli_error($connect);
	}
    echo $output;
}
?>
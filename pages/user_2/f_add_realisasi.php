<?php
 
$connect = mysqli_connect("localhost", "root", "", "magang_pal");
if(!empty($_POST))
{
 $output = '';
	$id_task = mysqli_real_escape_string($connect, $_POST["id_task"]);  
    $task = mysqli_real_escape_string($connect, $_POST["task"]);  
    $date = mysqli_real_escape_string($connect, $_POST["date"]);  
    $plan = mysqli_real_escape_string($connect, $_POST["plan"]);
    $query = "INSERT INTO tabel_plan SET id_plan= '', id_task = '$id_task', date ='$date', plan='$plan'";
	
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Disimpan</label>';
     $no=1;
     $select_query = "SELECT * FROM tabel_task 
                        INNER JOIN tabel_plan 
                        ON tabel_task.id_task = tabel_plan.id_task 
                        INNER JOIN tabel_pj
                        ON tabel_plan.id_task = tabel_pj.id_task 
                        WHERE tabel_pj.nip='$_SESSION[nip]' 
                        ORDER BY tabel_task.id_task DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                    <th>No.</th>
                    <th width=5%>ID Plan</th>
                    <th width=10%>Id Task</th>
                    <th width=15%>Start Date</th>
                    <th width=50%>Plan</th>
                    <th width=10%>Status</th>
                    <th width=15%>Realisasi</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
       <td><?php echo $no ?></td>
              <td>' .$row["id_plan"]. '</td>
              <input type="button" name="add" value="Realisasi" id='.$row["id_plan"].' class="btn btn-warning btn-xs tambah_data" />
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
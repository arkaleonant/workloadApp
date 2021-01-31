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
     $select_query = "SELECT * FROM  tabel_plan 
                        INNER JOIN tabel_pj
                        ON tabel_plan.id_task = tabel_pj.id_task 
                        WHERE tabel_plan.status='0' AND tabel_pj.nip='$_SESSION[nip]'
                        ORDER BY tabel_plan.id_task DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                        <th >No.</th>
                        <th width="6%" >Id Task</th>
                        <th >Divisi</th>
                        <th >Task</th>
                        <th >Detail Task</th>
                        <th width="10%">Start Date</th>
                        <th width="10%">End Date</th>
                        <th>Action</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
            <td>' . $no . '</td>
            <td>' . $row["id_task"] . '</td>
            <td>' . $row["divisi"] . '</td>
            <td>' . $row["task"] . '</td>
            <td>' . $row["detail_task"] . '</td>
            <td>' . $row["start_date"] . '</td>
            <td>' . $row["end_date"] . '</td>
            <td><input type="button" name="add" value="Kerjakan" id="' . $row["id_task"] . '" class="btn btn-warning btn-xs tambah_data" /></td> 
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
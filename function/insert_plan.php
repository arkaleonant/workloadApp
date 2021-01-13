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
     $select_query = "SELECT * FROM tabel_task ORDER BY id_task DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="55%">Task</th>  
                         <th width="15%">Lihat</th>  
                         <th width="15%">Edit</th>  
                    </tr>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["task"] . '</td>  
                         <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id_task"] . '" class="btn btn-info btn-xs view_data" /></td>  
						 <td><input type="button" name="edit" value="Kerjakan" id="' . $row["id_task"] . '" class="btn btn-warning btn-xs edit_data" /></td> 	

                    </tr>
      ';
     }
     $output .= '</table>';
    }else{
		$output .= mysqli_error($connect);
	}
    echo $output;
}
?>
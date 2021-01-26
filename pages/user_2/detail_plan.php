<?php  
if(isset($_POST["id_task"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_plan WHERE id_task = '".$_POST["id_task"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
                <tr>
                    <th><label>Tanggal</label></th>  
                    <th><label>Plan</label></th>
                    <th><label>Progress</label></th>  
                </tr>';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
        <tr>  
            <td width="30%">'.$row["date"].'</td>
            <td width="50%">'.$row["plan"].'</td>
            <td width="30%">
                <select class="select select-success">
                    <option>Belum Selesai</option>
                    <option>Sudah Selesai</option>
                </select>
            </td>
        </tr>
     ';
    }
    $output .= '</table>
    </div>';
    echo $output;
}
?>

 
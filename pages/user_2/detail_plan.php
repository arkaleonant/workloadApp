<?php  
if(isset($_POST["id_task"]))
{
 $no='1';
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_plan WHERE id_task = '".$_POST["id_task"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th><label>No</label></th>
                    <th><label>Tanggal</label></th>  
                    <th><label>Plan</label></th>
                    <th><label>Status</label></th>  
                    <th><label>Action</label></th>
                </tr>';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
        <tr style="text-align:center;"> 
            <td width="30%">'.$no.'</td> 
            <td width="30%">'.$row["date"].'</td>
            <td width="50%">'.$row["plan"].'</td>
            <td width="30%" style="text-align:center;">'.$row["status"].'</td>
            <td width="20%"><button type="btn btn-success" value="selesai">selesai</button>
        </tr>
     ';$no++;
    } 
    $output .= '</table>
    </div>';
    echo $output;
}
?>

 
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
                    <th width="5%"><label>No</label></th>
                    <th><label>Tanggal</label></th>  
                    <th><label>Plan</label></th>
                    <th><label>Status</label></th>  
                </tr>';
    while($row = mysqli_fetch_array($result))
    { 
    $output .= '  <tr style="text-align:center;"> 
                        <td width="5%">'.$no.'</td> 
                        <td width="30%">'.$row["date"].'</td>
                        <td width="40%">'.$row["plan"].'</td>';
                        if($row["status"]=='1'){
                            $output .= '<td>Sudah</td>';
                        } else {
                            $output .= '<td>Belum</td>';
                        }
    $output .= '    </tr>';
     ;$no++;
    } 
    $output .= '</table>';
    echo $output;
}
?>

 
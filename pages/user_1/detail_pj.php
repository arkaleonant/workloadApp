<?php  
if(isset($_POST["id_task"]))
{
 $no='1';
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT pj.nip, pg.nama FROM tabel_pj pj, pegawai pg WHERE pj.id_task = '".$_POST["id_task"]."'  && pj.nip = pg.nip";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
                <tr style="text-align:center;">
                    <th><label>No</label></th>
                    <th><label>NIP</label></th>  
                    <th><label>Nama</label></th>
                </tr>';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
        <tr style="text-align:center;"> 
            <td width="30%">'.$no.'</td> 
            <td width="30%">'.$row["nip"].'</td>
            <td width="50%">'.$row["nama"].'</td>
        </tr>
     ';$no++;
    } 
    $output .= '</table>
    </div>';
    echo $output;
}
?>
<?php  
//select.php  
if(isset($_POST["id_task"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_pj WHERE id_task = '".$_POST["id_task"]."'";
 $result = mysqli_query($connect, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>NIP Pegawai</label></td>  
            <td width="70%">'.$row["nip"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Nama Pegawai</label></td>  
            <td width="70%">'.$row["nama"].'</td>  
        </tr>
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>
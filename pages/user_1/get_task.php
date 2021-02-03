<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border:1; 
        cellpadding:10;
        
    }

    table, td, th {
        border: 2px solid black;
        padding: 5px;
        text-align:center;
        border:1; 
        cellpadding:10;

    }

    th {
        text-align: center;
        background-color:#343a40;  
        color:#ffffff;
    }
</style>

<?php
    $q = intval($_GET['q']);

    $con = mysqli_connect('localhost', 'root', '', 'magang_pal');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"magang_pal");
    $sql="SELECT * FROM tabel_task WHERE id_task = '".$q."'";
    $lqs="SELECT * FROM tabel_plan WHERE id_task = '".$q."'";

    $jml_1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_task) FROM tabel_plan WHERE status='1' AND id_task = '".$q."'"))[0];
    $jml_semua = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(id_task) FROM tabel_plan WHERE id_task = '".$q."'"))[0];

    $persentase = 0;
    if($jml_semua > 1){
        $persentase = number_format(($jml_1/$jml_semua)*100);
    }

    
    $result = mysqli_query($con,$sql);
    $hasil = mysqli_query($con,$lqs);

    echo "<H3>TABEL TASK</H3>";
    echo "<table border='1' cellpadding='10' style='text-align:center;'>
            <tr bgcolor='#343a40'  style='color:#ffffff;'>
                <th>id task</th>
                <th width='20%'>task</th>
                <th width='60%'>detail task</th>
                <th width='10%'>start date</th>
                <th width='10%'>end date</th>
                <th width='10%'>progress</th>                
            </tr>";
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                    echo "<td>" . $row['id_task'] . "</td>";
                    echo "<td>" . $row['task'] . "</td>";
                    echo "<td>" . $row['detail_task'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $persentase ."%</td>";                   
                echo "</tr>";
            }
    echo "</table></br>";
    echo "<H3>TABEL PLAN</H3>";
    echo "<table>
                <tr>
                    <th>id_plan</th>
                    <th>date</th>
                    <th>plan</th>
                    <th>status</th>
                </tr>";
            while($row = mysqli_fetch_array($hasil)) {
                echo "<tr>";
                    echo "<td>" . $row['id_plan'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['plan'] . "</td>";
                    if($row['status']=='0'){
                        echo "<td><a>On Progress</a></td>";
                    }else{
                        echo "<td><a>Selesai</a></td>";
                    }

                echo "</tr>";
            }
    echo "</table><br>";

    mysqli_close($con);
?>

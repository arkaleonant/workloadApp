<script>
    $('#update_form').on("submit", function(event){  
        event.preventDefault();  
            $.ajax({  
                url:"f_update_pegawai.php",  
                method:"POST",  
                data:$('#update_form').serialize(),  
                beforeSend:function(){  
                $('#update').val("Updating");  
                },  
                success:function(data){  
                $('#update_form')[0].reset();  
                $('#editModal').modal('hide');  
                $('#tabel_pegawai').html(data);  
                }  
            });   
    });
</script>

<?php 

if(isset($_POST["nip"])){
    $output = '';
    $connect = mysqli_connect("localhost", "root", "", "magang_pal");
    $query = "SELECT * FROM pegawai WHERE nip = '".$_POST["nip"]."'";
    $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        $output .= '
            <form method="post" id="update_form">
                <label>Nama</label>
                <input type="hidden" name="nip" id="nip" value="'.$_POST["nip"].'" class="form-control" />
                <input type="text" name="nama" id="nama" value="'.$row['nama'].'" class="form-control" />
                <br />

                <label> Email </label>
                <input type="email" name="email" id="email" value="'.$row['email'].'" class="form-control" />
                <br />

                <label> Password </label>
                <input type="text" name="password" id="password" value="'.$row['password'].'" class="form-control" />
                <br />

                <label> Divisi </label>
                <input type="text" name="divisi" id="divisi" value="'.$row['divisi'].'" class="form-control" />
                <br />

                <label>Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                    <option value="'.$row['jabatan'].'">'.$row['jabatan'].'</option>
                    <option value="Kepala Divisi">Kepala Divisi</option>
                    <option value="Kepala Departemen">Kepala Departemen</option>
                    <option value="Kepala Bagian">Kepala Bagian</option>
                    <option value="Staff">Staff</option>
                </select>
                <br />

                <label>Hak Akses</label>
                <select name="hak_akses" id="hak_akses" class="form-control">
                    <option value="'.$row['hak_akses'].'">'.$row['hak_akses'].'</option>
                    <option value="1">Atasan</option>
                    <option value="2">Bawahan</option>
                </select>
                <br /> <br />   

                <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
            </form>
            ';
    echo $output;
}
?>

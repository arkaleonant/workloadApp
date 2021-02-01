<script>
$('#add_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#id-input-file-2').val() == "")  
  {  
   alert("Mohon Input Bukti ");  
  }  
  else  
  {  
   $.ajax({  
    url:"f_add_realisasi.php",  
    method:"POST",  
    data:$('#add_form').serialize(),  
    beforeSend:function(){  
     $('#add').val("merealilasikan");  
    },  
    success:function(data){  
     $('#add_form')[0].reset();  
     $('#addModal').modal('hide');  
     $('#tabel_task').html(data);  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["id_plan"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_plan WHERE id_plan = '".$_POST["id_plan"]."'";
 $result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
     $output .= '
        <form method="post" id="add_form" enctype="multipart/form-data">
            <div>
            <label>ID Plan</label>
            <input type="text" name="id_plan" id="id_plan" value="'.$_POST["id_plan"].'" class="form-control"  readonly/>
            </div>

            <div>
            <label class="hide">ID Task</label>
            <input type="text" name="id_task" id="id_task" value="'.$row['id_task'].'" class="form-control hide" readonly/>
            </div>

            <div>
            <label class="hide">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control hide"  value="'.$row['date'].'" readonly/>
            </div><br/>

            <div>
            <label>Plan</label>
            <textarea name="plan" id="plan" class="form-control">'.$row['plan'].'</textarea>
            </div><br/>

            <div>
            <label>Status *</label>
            <input type="text" name="status" id="status" class="form-control"  value="Sudah Dikerjakan" readonly/>
            </div><br/>

            <div>
            <label>Bukti Penyelesaian *</label>
            <td><input type="file" id="id-input-file-2" name="upload_image" class="form-control"></td>
            </div><br/>

            <div>
            <label>Kendala</label>
            <td><input type="text" name="kendala" id="kendala" class="form-control"></td>
            </div><br/>
            
            <div>
            <input type="submit" name="add" id="add" value="Realisasi" class="btn btn-success" />
            </div>
        </form>
     ';
    echo $output;
}
?>

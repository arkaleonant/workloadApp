<script>
$('#update_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#date').val() == "")  
  {  
   alert("Mohon Isi tanggal ");  
  }  
  else if($('#plan').val() == '')  
  {  
   alert("Mohon Isi plan anda");  
  }  
 
  else  
  {  
   $.ajax({  
    url:"update.php",  
    method:"POST",  
    data:$('#update_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     $('#update_form')[0].reset();  
     $('#editModal').modal('hide');  
     $('#tabel_plan').html(data);  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["id_task"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_task WHERE id_task = '".$_POST["id_task"]."'";
 $result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
     $output .= '
         <form method="post" id="update_form">
     <label>ID Task</label>
     <input type="text" name="id_task" id="id_task" value="'.$_POST["id_task"].'" class="form-control" />
     <br />
     <label>Task</label>
     <input type="text" name="task" id="task" value="'.$row['task'].'" class="form-control" />
     <label>Tanggal</label>
     <input type="date" name="date" id="date" value="'.$row['date'].'" class="form-control" />
     <label>Plan</label>
     <textarea name="plan" id="plan" class="form-control">'.$row['plan'].'</textarea>
     <br />
     <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />

    </form>
     ';
    echo $output;
}
?>

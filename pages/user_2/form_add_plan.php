 <script>
$('#add_form').on("submit", function(event){  
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
    url:"f_add_plan.php",  
    method:"POST",  
    data:$('#add_form').serialize(),  
    beforeSend:function(){  
     $('#add').val("adding");  
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
if(isset($_POST["id_task"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_task WHERE id_task = '".$_POST["id_task"]."'";
 $result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
     $output .= '
        <form method="post" id="add_form">
            <label>ID Task</label>
            <input type="text" name="id_task" id="id_task" value="'.$_POST["id_task"].'" class="form-control"  readonly/>

            <label>Task</label>
            <input type="text" name="task" id="task" value="'.$row['task'].'" class="form-control" readonly/>
            <br />

            <label>Tanggal</label>
            <input type="date" name="date" id="date" class="form-control"  value="'. date("Y-m-d") .'" required/>
            <br />

            <label>Plan</label>
            <textarea name="plan" id="plan" class="form-control"></textarea>
            <br />

            <input type="submit" name="add" id="add" value="Add Plan" class="btn btn-success" />

        </form>
     ';
    echo $output;
}
?>

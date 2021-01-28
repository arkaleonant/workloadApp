<script>
$('#add_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#date').val() == "")  
  {  
   alert("Mohon Isi tanggal ");  
  }  
  else if($('#kendala').val() == '')  
  {  
   alert("Mohon Isi kendala anda");  
  }  
 
  else  
  {  
   $.ajax({  
    url:"insert_kendala.php",  
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
if(isset($_POST["id_plan"]))
{
 $output = '';
 $connect = mysqli_connect("localhost", "root", "", "magang_pal");
 $query = "SELECT * FROM tabel_plan WHERE id_plan = '".$_POST["id_plan"]."'";
 $result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
     $output .= '
        <form method="post" id="add_form">
            <label>ID Plan</label>
            <input type="text" name="id_plan" id="id_plan" value="'.$_POST["id_plan"].'" class="form-control"  readonly/>
            <br />

            <label>Plan</label>
            <input type="text" name="plan" id="plan" value="'.$row['plan'].'" class="form-control" readonly/>
            <br />

            <label>Tanggal</label>
            <input type="date" name="date" id="date" value="'.$row['date'].'" class="form-control"readonly/>
            <br />

            <label>Kendala</label>
            <textarea name="kendala" id="kendala" class="form-control"></textarea>
            <br />

            <input type="submit" name="add" id="add" value="Add Plan" class="btn btn-success" />

        </form>
     ';
    echo $output;
}
?>

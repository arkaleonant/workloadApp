<div id="create_task_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Task pada Divisi <?php echo $_SESSION['divisi'] ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="container-fluid">
            <form method="POST" action="create_task.php">
              <div class="form-group">
                <label>Divisi</label>
                <input type="text" name="divisi" class="form-control" required value="<?php echo $_SESSION['divisi'] ?>"
                  readonly />
                <br />
                <label>Task</label>
                <input type="text" name="task" class="form-control" placeholder="Enter task"
                  style="border: 1px solid #000000" required>
                <br />
                <label>Detail Task</label>
                <textarea name="detail_task" style="width: 100%; height: 50px; font-size: 14px; 
                  line-height: 18px; border: 1px solid #000000; padding: 
                  10px;" required>
                </textarea>
                <br />
                <br />
                <label>Start Date</label>
                <div class="form-group">
                  <input type="date" name="tanggal_mulai" class="form-control float-right"
                    style="border: 1px solid #000000" required>
                </div> <br> <br>
                <label>End Date</label>
                <div class="form-group">
                  <input type="date" name="end_date" class="form-control float-right" style="border: 1px solid #000000"
                    required>
                </div> <br><br>
                <div class="form-group">
                  <label>Penanggung Jawab</label>
                  <select  id="pj" name="pj[]" multiple="" class="selec2" style="width: 100%; height:60px; border:2px; color:black">
                          <option value="none">- Pilih Penanggung Jawab -</option>
                          <?php     
                                $con = mysqli_connect("localhost","root","","magang_pal");
                                $result = mysqli_query($con, "SELECT * from pegawai WHERE divisi='$_SESSION[divisi]' AND hak_akses='2' ORDER BY nip ASC");  
                                while ($row = mysqli_fetch_array($result)) {  
                                  echo "<option value='$row[nama]'>$row[nama]</option>";                                }  
                          ?>
                  </select>
                </div>

              </div><br><br>
              <br />
              <div class="right-card-footer">
                <button type="post" name="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
		    $('#pj').select2({
          placeholder: " pilih pj",
				allowClear: true,
				language: "id"
		    });
		});
	</script>
</form>
<div class="panel panel-flat">
                <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <?php 
                            $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                            $data_task = mysqli_query($conn,"SELECT * FROM tabel_task WHERE divisi='$_SESSION[divisi]'");
    
                            // menghitung data barang
                            $jumlah_task = mysqli_num_rows($data_task);
                            ?>
                                <h3><?php echo $jumlah_task; ?></h3>
                                <p>Task Added</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="dashboard_2.php?task" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                            <?php 
                            $conn = mysqli_connect('localhost', 'root', '', 'magang_pal');
                            $data_user = mysqli_query($conn,"SELECT * FROM pegawai WHERE divisi='$_SESSION[divisi]'");
    
                            // menghitung data barang
                            $jumlah_user = mysqli_num_rows($data_user);
                            ?>
                                <h3><?php echo $jumlah_user; ?></h3>
                                <p>User Active</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>45 %</h3>
                                <p>Task Progress</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
</div>
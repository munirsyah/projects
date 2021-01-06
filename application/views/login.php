<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Gibran Sam" />
<!-- Document Title -->
<title>Klinik Restu Medika</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/web/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url();?>assets/web/images/favicon.ico" type="image/x-icon">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/web/rs-plugin/css/settings.css" media="screen" />

<!-- StyleSheets -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/web/css/responsive.css">

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">

<!-- JavaScripts -->
<script src="<?php echo base_url();?>assets/web/js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets2/health-512.ico'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
    <title>Klinik Restu Medika</title>
  </head>
  <body>

  <!-- Page Wrapper -->
<div id="wrap">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Selamat Datang di Klinik Restu Medika</p>
        </div>
        <div class="col-sm-6">
          <div class="social-icons"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-dribbble"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="header-style-2">
    <div class="container">
    
      <div class="head-info">
        </ul>
      </div>
    </div>

    <section class="material-half-bg" >
      <div class="cover"></div>
    </section>
    <section class="login-content">
    <centre><a href="#"><img src="<?php echo base_url();?>assets/web/images/Restu-Medika-Logo.png" alt=""> </a> </centre>
      <div class="logo">
        <h1>Klinik Restu Medika</h1>
      </div>
      <?php if ($this->session->flashdata('error')) { echo '<p style="color: white">'.$this->session->flashdata('error').'</p>'; } ?>
      <div class="login-box">
        <form class="login-form" action="<?php echo base_url('c_authentication/authenticate'); ?>" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
          <div class="form-group">
            <label class="control-label">Username</label>
            <input class="form-control" type="text" placeholder="Username" name="username" autofocus required oninvalid="this.setCustomValidity('Silahkan isi kolom username')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Silahkan isi kolom password')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block">LOGIN <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>
      </div>
    </section>
  </body>
  <script>
    <script type="text/javascript">
      $('#sl').click(function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
      });
  </script>
  <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/essential-plugins.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/pace.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</html>
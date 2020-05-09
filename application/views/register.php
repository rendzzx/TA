
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Tools | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>Tools</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Register</b></p>

    <form action="" method="post">
      <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
        <label> Nama*</label>
        <input type="text" name="fullname" value="<?=set_value('fullname') ?>" class="form-control">
        <span class="help-block"><?=form_error('fullname')?></span>
      </div>
      <div class="form-group <?=form_error('username') ? 'has-error' : null?>">
        <label> Username*</label>
        <input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
        <?=form_error('username')?>
      </div>
      <div class="form-group <?=form_error('password') ? 'has-error' : null?>">
        <label> Password*</label>
        <input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
        <?=form_error('password')?>
      </div>
      <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
        <label> Konfirmasi Password*</label>
        <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
        <?=form_error('passconf')?>
      </div>
      <div class="form-group <?=form_error('alamat') ? 'has-error' : null?>">
        <label> Alamat*</label>
        <textarea name="alamat" class="form-control"><?=set_value('alamat')?></textarea>
        <?=form_error('alamat')?>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <a href="<?= base_url('Auth/login') ?>" class="btn btn-md btn-flat"><b>Login</b></a>
        </div>
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> Register</button>
        </div>
      </div>
    </form>
  </div>

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>

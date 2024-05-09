<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Retania | KOST</title>

  <link href="<?php echo base_url() ?>public/img/SVG/Logo V!-1.svg" rel="icon">
  <link href="<?php echo base_url() ?>public/img/SVG/Logo V!-1.svg" rel="apple-touch-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/AdminLTE/dist/css/adminlte.min.css">
</head>
<style>
    body {
        background: url("img/bg.jpg") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-purple">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Retania</b>Kost</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><b>Administrator Login</b></p>
      <?php if ($this->session->flashdata('login_failed')) : ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('login_failed'); ?></div>
      <?php endif; ?>

      <!-- modal -->
      <div class="modal" id="pesanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($this->session->flashdata('pesan')): ?>
                    <?php echo $this->session->flashdata('pesan'); ?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<form action="<?= site_url('auth/login'); ?>" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
    <div class="row">
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-warning btn-block" style="color: whitesmoke;">Sign In</button>
        </div>
    </div>
</form>

      <p class="mt-3">Jika Belum Punya Akun klik <a href="<?= base_url("admin/req") ?>">Daftar</a></p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>public/admin/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>public/admin/AdminLTE/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('pesan')): ?>
            $('#pesanModal').modal('show');
        <?php endif; ?>
    });
</script>


</body>
</html>

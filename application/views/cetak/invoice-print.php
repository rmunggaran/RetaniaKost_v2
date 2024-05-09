<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/AdminLTE/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Retania Kost
                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Retania Kost</strong><br>
                    Phone: (62)8995349232<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= $penghuni['nama'] ?></strong><br>
                    Phone: <?= $penghuni['tlp'] ?><br>
                    Email: <?= $email ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>ID Order:</b> <?= $invoice['id_transaksi'] ?><br>
                  <b>Akhir Pembayaran:</b> <?= $invoice['tanggal_check_in_plus_10'] ?><br>
                  <b>Account:</b> <?= $invoice['id_penghuni'] ?><br>
                  <?php if ($invoice['status_pembayaran'] == 'Lunas') : ?>
                    <b>Status Pembayaran:</b> Lunas
                  <?php endif; ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Periode</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Bayar Kost</td>
                      <td><?= $periode_in ?> - <?= $periode_out ?></td>
                      <td><?= $tarif ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">cara Pembayaran:</p>
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/visa.png" alt="Visa">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/qris.png" alt="qris">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/shopeepay.png" alt="shopeepay">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/mandiri.png" alt="mandiri">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/bca.png" alt="bca">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/alfamart.png" alt="alfamart">
                  <img src="<?php echo base_url() ?>public/admin/AdminLTE/dist/img/credit/indomaret.png" alt="indomaret">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Jumlah yang Harus Dibayar</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td><?= $tarif ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>

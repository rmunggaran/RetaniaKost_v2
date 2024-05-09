<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              Pembayaran kosan paling maksimal sampai tanggal 20 jika melebihi tanggal berikut maka dianggap keluar
            </div>


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
                  <b>Account:</b> <?= $invoice['id_penghuni'] ?>
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
                    Klik bayar untuk bayar kosan lalu pilih metode Pembayaran
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

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?= base_url('user/invoice_print/' . $invoice['id_transaksi']) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                  <?php if ($invoice['status_pembayaran'] == 'Lunas') : ?>
                    <button type="submit" class="btn btn-success float-right " disabled><i class="far fa-credit-card"></i> Lunas</button>
                  <?php else: ?>
                  <form id="payment-form" action="<?= site_url('Payment/index'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $invoice['id_transaksi'] ?>" >
                    <input type="hidden" name="nama" value="<?= $penghuni['nama'] ?>" >
                    <input type="hidden" name="tlp" value="<?= $penghuni['tlp'] ?>" >
                    <input type="hidden" name="email" value="<?= $email ?>" >
                    <input type="hidden" name="total" value="<?= $invoice['total_biaya'] ?>" >
                    <input type="hidden" name="items" value="Bayar Kost" >
                    <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Bayar</button>
                  </form>
                  <?php endif; ?>

                  <a href="<?= base_url('user/invoice_pdf/' . $invoice['id_transaksi']) ?>"  class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Download PDF</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


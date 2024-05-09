v<!-- application/views/kamar_list.php -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">DATA TRANSAKSI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Tambahkan kode untuk menampilkan pesan notifikasi -->
<div class="container">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error') ?>
        </div>
    <?php endif; ?>
</div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <div class="row">
                                <div class="col mb-3">
                                <a href="<?= base_url('admin/laporanTransaksi_pdf' ) ?>"  class="btn btn-danger" style="margin-right: 5px;"><i class="fas fa-download"></i> Download PDF</a>
                                <a href="<?= base_url('admin/export_excel' ) ?>"  class="btn btn-success" style="margin-right: 5px;"><i class="fas fa-file-export"></i> Export Excel</a>
                                </div>
                                <div class="col-4 d-flex flex-row-reverse">
                                    <form action="<?php echo base_url('admin/searchTransaksi'); ?>" method="get">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="cari" placeholder="Id transaksi">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <thead>
                                <tr>
                                    <th>Id transaksi</th>
                                    <th>Id Penghuni</th>
                                    <th>Id Kamar</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Total bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $total_biaya = 0;
                                if (!empty($tagihan)) {
                                    foreach ($tagihan as $p) {
                                        $total_biaya += $p['total_biaya'];
                                ?>
                                    <tr>
                                        <td><?= $p['id_transaksi']?></td>
                                        <td><?= $p['id_penghuni']?></td>
                                        <td><?= $p['id_kamar']?></td>
                                        <td><?= $p['tanggal_check_in']?></td>
                                        <td><?= $p['tanggal_check_out']?></td>
                                        <td><?= $p['metode_pembayaran']?></td>
                                        <td><?= $p['status_pembayaran']?></td>
                                        <td><?= "Rp " . number_format($p['total_biaya'], 0, ',', '.');?></td>
                                        <td>
                                        <a href="<?php echo base_url() . 'admin/deleteTransaksi/' . $p['id_penghuni']; ?>" class="btn btn-sm bg-red" onClick="return confirm('Anda yakin ingin hapus data transaksi ?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                        
                                    <?php
                                    }
                                } elseif(!empty($results)) {
                                    foreach ($results as $p) {
                                        $total_biaya += $p['total_biaya'];
                                ?>
                                    <tr>
                                        <td><?= $p['id_transaksi']?></td>
                                        <td><?= $p['id_penghuni']?></td>
                                        <td><?= $p['id_kamar']?></td>
                                        <td><?= $p['tanggal_check_in']?></td>
                                        <td><?= $p['tanggal_check_out']?></td>
                                        <td><?= $p['metode_pembayaran']?></td>
                                        <td><?= $p['status_pembayaran']?></td>
                                        <td><?= "Rp " . number_format($p['total_biaya'], 0, ',', '.');?></td>
                                        <td>
                                        <a href="<?php echo base_url() . 'penghuni/deletePenghuni/' . $p['id_penghuni']; ?>" class="btn btn-sm bg-red" onClick="return confirm('Hapus Penghuni Yang Anda Pilih ?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                ?>
                                    <tr>
                                        <td colspan="3"><?= "Tidak Ada Data Kamar"; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total Transaksi</th>
                                    <th><?= "Rp " . number_format($total_biaya, 0, ',', '.'); ?></th>
                                </tr>
                            </tfoot>
                        </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



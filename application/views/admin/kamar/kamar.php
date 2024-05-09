<!-- application/views/kamar_list.php -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">LIST KAMAR</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Kamar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <a href="<?= base_url("kamar/tambahKamar/$id") ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Jenis Kamar Baru</a>
                            <thead>
                                <tr>
                                    <th>Nama/Nomor</th>
                                    <th>Tarif Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kamar)) {
                                    foreach ($kamar as $penghuni) {
                                ?>
                                    <tr>
                                        <td><?= ucwords($penghuni['nama_kamar']) ?></td>
                                        <td><?= "Rp " . number_format($penghuni['tarif_perbulan'], 0, ',', '.') . '/bln - ' . "Rp " . number_format($penghuni['tarif_pertahun'], 0, ',', '.') . '/thn' ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'kamar/editKamar/' . $penghuni['id_kamar']; ?>" class="btn btn-sm bg-teal">
                                                <i class="fas fa-pen"></i> Edit
                                            </a>
                                            <a href="<?php echo base_url() . 'kamar/deleteKamar/' . $penghuni['id_kamar']; ?>" class="btn btn-sm bg-red" onClick="return confirm('Hapus Kamar Yang Anda Pilih ?')">
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
                                    <th>Nama/Nomor</th>
                                    <th>Tarif Kamar</th>
                                    <th>Action</th>
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



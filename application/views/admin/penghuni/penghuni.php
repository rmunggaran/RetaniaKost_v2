<!-- application/views/kamar_list.php -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0">LIST PENGHUNI</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Penghuni</li>
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
                                    <!-- <a href="<?= base_url("penghuni/tambahPenghuni") ?>" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah Penghuni Baru</a> -->
                                </div>
                                <div class="col-4 d-flex flex-row-reverse">
                                    <form action="<?php echo base_url('penghuni/search'); ?>" method="get">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="cari" placeholder="Cari Penghuni">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Cari</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <thead>
                                <tr>
                                    <th>Nama Kosan</th>
                                    <th>Nama Penghuni</th>
                                    <th>Nomor HP</th>
                                    <th>Nama/Nomor kamar</th>
                                    <th>status Verifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($penghuni)) {
                                    foreach ($penghuni as $p) {
                                ?>
                                    <tr>
                                        <td><?= ucwords($p['kosan'])?></td>
                                        <td><?= strtoupper($p['nama'])?></td>
                                        <td><?= $p['tlp']?></td>
                                        <td><?= $p['nomor_kosan']?></td>
                                        <td><?= $p['status']?></td>
                                        <td>
                                        <a href="<?php echo base_url() . 'penghuni/editPenghuni/' . $p['id_penghuni']; ?>" class="btn btn-sm bg-teal">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
                                        <a href="<?php echo base_url() . 'penghuni/deletePenghuni/' . $p['id_penghuni']; ?>" class="btn btn-sm bg-red" onClick="return confirm('Kamu Yakin ingin mengahapus data penghuni beserta transaksinya ?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } elseif(!empty($results)) {
                                    foreach ($results as $p) {
                                ?>
                                    <tr>
                                        <td><?= ucwords($p['kosan'])?></td>
                                        <td><?= strtoupper($p['nama'])?></td>
                                        <td><?= $p['tlp']?></td>
                                        <td><?= $p['nomor_kosan']?></td>
                                        <td><?= $p['status']?></td>
                                        <td>
                                        <a href="<?php echo base_url() . 'penghuni/editPenghuni/' . $p['id_penghuni']; ?>"" class="btn btn-sm bg-teal">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
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
                                    <th>Nama Kosan</th>
                                    <th>Nama Penghuni</th>
                                    <th>Nomor HP</th>
                                    <th>Nama/Nomor kamar</th>
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



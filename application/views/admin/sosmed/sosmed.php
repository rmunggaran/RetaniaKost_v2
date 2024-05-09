<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sosial Media</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Sosial Media</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

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

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-purple card-outline">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 20%;">Sosial Media</th>
                                    <th>Link</th>
                                    <th style="width: 10%">Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td><i class="fab fa-instagram"></i> <b>Instagram</b></td>
                                    <td>
                                        <a href="<?= $ig['link']; ?>" target="_blank"><?= $ig['link'];  ?></a>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-ig">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td><i class="fab fa-facebook"></i> <b>Facebook</b></td>
                                    <td>
                                        <a href="<?= $fb['link']; ?>" target="_blank"><?= $fb['link'] ?></a>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-facebook">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td><i class="fas fa-phone-alt"></i> <b>Telp</b></td>
                                    <td>
                                        <a href="#"><?= $tlp['link']; ?></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-tlp">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td><i class="fa fa-envelope"></i> <b>Email</b></td>
                                    <td>
                                        <a href="#"><?= $email['link']; ?></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-sm-email">
                                            <i class="fas fa-pencil-alt"></i> edit
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-sm-email">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Email</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('sosmed/updateSosmed/' . $email['id_sosmed']); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link" value="<?= $email['link']; ?>" id="" placeholder="Nama Account email anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_email" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-sm-tlp">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link tlp</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('sosmed/updateSosmed/' . $tlp['id_sosmed']); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link" value="<?= $tlp['link']; ?>" id="" placeholder="Nama Account tlp anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_tlp" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-sm-facebook">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Facebook</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('sosmed/updateSosmed/' . $fb['id_sosmed']); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link" value="<?= $fb['link'] ?>" id="" placeholder="Nama Account Facebook anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_facebook" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-sm-ig">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Link Instagram</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo site_url('sosmed/updateSosmed/' . $ig['id_sosmed']); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" class="form-control form-control-sm" name="link" value="<?= $ig['link'] ?>" id="" placeholder="Nama Account Instagram anda">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="submit_ig" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>
    </div>
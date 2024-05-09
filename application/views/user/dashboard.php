<?php
// var_dump($out);
if (!empty($out)) {
    $tanggal_sekarang = date('Y-m-d');
    foreach ($out as $checkout) {
        if ($tanggal_sekarang == $checkout->tanggal_check_out) {
          if($checkout->anu == 1){
            echo "<script>
                     var result = confirm('Anda memiliki check-out hari ini! Apakah Anda ingin melanjutkan menginap?');
                     if (result) {
                        window.location.href = '";
            echo base_url('invoice/checkOutTransactions');
            echo "'; // Redirect ke halaman untuk menangani check-out
                     }
                  </script>";
            break; // Hentikan iterasi setelah menampilkan popup pertama kali
          }
            
        }
        // var_dump($checkout);
    }
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard User</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

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
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profile</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama:</strong> <?= $getUser['nama'] ?></p>
                            <p><strong>Email:</strong> <?= $getUser['email'] ?></p>
                            <p><strong>Nomor Telepon:</strong> <?= $getUser['nomor'] ?></p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Edit
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="<?= site_url('auth/editProfile/'. $getUser['id_user'] ); ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                          <input type="text" name="username" class="form-control"  placeholder="Username" value="<?= $getUser['username'] ?>">
                          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" name="nama" class="form-control"  placeholder="Nama" value="<?= $getUser['nama'] ?>">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="text" name="email" class="form-control"  placeholder="Email" value="<?= $getUser['email'] ?>">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="text" name="nomor" class="form-control" placeholder="No. WhatsApp" value="<?= $getUser['nomor'] ?>">
                            <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                        </div>
                    
                        <div class="input-group mb-3">
                          <input type="password" name="password1" class="form-control"  placeholder="Password">
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <input type="password" name="password2" class="form-control"  placeholder="Ulangi password">
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

                <?php if($id['status'] == 'ya'): ?>
                <div class="col-md-8">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Kamar yang kamu tempati</h3>
                      </div>
                      <div class="card-body">
                        <p><strong>Nama Kosan:</strong> <?= $kamar['nama_kosan'] ?></p>
                        <p><strong>Alamat Kosan:</strong> <?= $kosan['alamat'] ?></p>
                        <p><strong>Nomor admin Kosan:</strong> <?= $kosan['tlp'] ?></p>
                        <p><strong>Nomer Kamar:</strong> <?= $kamar['nama_kamar'] ?></p>
                        <?php if($id['bayaran'] == 'bulan'): ?>
                        <p><strong>Tarif:</strong> <?= "Rp " . number_format($id['tarif_perbulan'], 0, ',', '.'); ?></p>
                        <?php else: ?>
                        <p><strong>Tarif:</strong> <?= "Rp " . number_format($id['tarif_pertahun'], 0, ',', '.'); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>

            </div>

        <!-- TABLE: LATEST ORDERS -->
        <?php if(!empty($cek)) : ?>
        <div class="card">
          <div class="card-header border-transparent">
            <div class="card-title">List Pembay </div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Bulan-tahun</th>
                  <th>Status</th>
                  <th>aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice) : 
                      if ($id['id_penghuni'] == $invoice['id_penghuni']) :
                        ?>
                    <tr>
                        <td><a href="<?= base_url('invoice/detail/' . $invoice['id_transaksi']) ?>"><?= $invoice['id_transaksi'] ?></a></td>
                        <td><?= $invoice['tanggal_check_in'] ?></td>
                        <td>
                            <?php if ($invoice['status_pembayaran'] == 'Lunas') : ?>
                            <span class="badge badge-success">Lunas</span>
                            <?php else : ?>
                            <span class="badge badge-warning"><?= $invoice['status_pembayaran'] ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('user/detail/' . $invoice['id_transaksi']) ?>" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    <?php endif;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
          <?php if($id['status'] == 'tidak'): ?>
          <?php else : ?>
            <a href="<?= base_url('penghuni/berhentiKost/' . $id['id_penghuni']) ?>" class="btn btn-sm btn-danger float-left" onClick="return confirm('Apakah kamu yakin ingin berhenti kost ?')">Berhenti kost</a>          
            <?php endif; ?>
          </div>
            <!-- /.card-footer -->
        </div>
        <?php endif; ?>
        <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


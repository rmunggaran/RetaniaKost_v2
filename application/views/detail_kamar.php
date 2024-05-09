<br>
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="room-details-item">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php if ($kamars['foto_option1']) { ?>
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kamars['foto_option1'] ?>" style="height: 500px;">
                                </div>
                            <?php } ?>
                            <?php if ($kamars['foto_option2']) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kamars['foto_option2'] ?>" style="height: 500px;">
                                </div>
                            <?php } ?>
                            <?php if ($kamars['foto_option3']) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kamars['foto_option3'] ?>" style="height: 500px;">
                                </div>
                            <?php } ?>
                            <?php if ($kamars['foto_option4']) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kamars['foto_option4'] ?>" style="height: 500px;">
                                </div>
                            <?php } ?>
                            <?php if ($kamars['foto_option5']) { ?>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kamars['foto_option5'] ?>" style="height: 500px;">
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3><?= ucwords($kamars['nama_kamar']) ?></h3>
                            <div class="rdt-right">
                            <?php if ($this->session->userdata('admin_logged_in') || $this->session->userdata('user_logged_in')): ?>
                                <!-- Jika pengguna sudah login -->
                                <?php if($penghuni['status'] == 'ya'): ?>
                                    <button type="button" class="btn btn-danger" onclick="return confirm('Kamu masih tinggal di kamar yang lain. jika kamu ingin pindah klik berhenti di dashboard lalu kamu pilih kamar lagi')">
                                        Pesan Kamar
                                    </button>
                                <?php else : ?>
                                    <button type="button" class="btn btn-danger" onclick="openModal()">
                                        Pesan Kamar
                                    </button>
                                <?php endif; ?>
                            <?php else: ?>
                                <!-- Jika pengguna belum login -->
                                    <a href="<?= base_url() ?>admin/login" class="btn btn-danger">
                                        Masuk untuk Pesan
                                    </a>
                            <?php endif; ?>

                            </div>
                        </div>
                        <h2><?= "Rp " . number_format($kamars['tarif_perbulan'], 0, ',', '.'); ?><span>/PerBulan - </span><?= "Rp " . number_format($kamars['tarif_pertahun'], 0, ',', '.'); ?><span>/PerTahun</span></h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if (!empty($kamars['fasilitas'])): ?>
                                            <?php $datafasilitas = explode(',', $kamars['fasilitas']); ?>
                                            <?php foreach ($datafasilitas as $value): ?>
                                                <span class="badge badge-primary" style="font-size: 14px;"><?= $value ?></span>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>Tidak ada fasilitas tersedia.</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="f-para">
                        <h4><b>Cara Melakukan Pemesanan:</b></h4>
                        <pre>
    1. Klik tombol "Pesan" untuk memulai proses pemesanan.
    2. Isi formulir pemesanan, dan setelah selesai, klik tombol "Pesan" untuk mengirimkan data.
    3. Lakukan pembayaran.
    4. Lakukan verifikasi atau konfirmasi pemesanan dengan pihak kosan.
    5. selesai kosan bisa anda tempati
                        </pre>
                        <br>
                        <h4><b>Ketentuan Pembayaran untuk Penyewa:</b></h4>
                        <pre>
    - hanya dapat melakukan sewa per bulan atau per tahun.
    - 1 Akun hanya dapat sewa 1 kamar
                        </pre>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="reservationModal" class="modal">
<div class="modal-content">
<form action="<?php echo base_url() . 'penghuni/addPenghuni'; ?>" method="POST" enctype="multipart/form-data" >
    <div class="card-body">

        <input type="hidden" name="id_user" class="form-control" value="<?= $id_user  ?>" readonly>
        <input type="hidden" name="id_kamar" class="form-control" value="<?= $kamars['id_kamar']  ?>" readonly>

        <div class="form-group">
            <label for="exampleInputEmail1">Nik</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="ktp" placeholder="Masukan Nomor NIK KTP" required>
        </div>

        <div class="form-group">
            <label for="formFile" class="form-label">Foto KTP</label>
            <input class="form-control" type="file" id="formFile" name="foto_ktp" required>
        </div>

        <div class="form-group">
            <input type="hidden" name="nama" class="form-control" value="<?= $nama  ?>" readonly>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Jenis Kelamin</label>
            <div class="row">
                <div class="col-md-4">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="Laki - Laki" id="customRadio1" name="jk" checked>
                        <label for="customRadio1" class="custom-control-label">Laki - Laki</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="Perempuan" id="customRadio2" name="jk">
                        <label for="customRadio2" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12"><label for="selectKosan">Pilih Kosan - Nama/Nomor Kamar</label></div>
                <div class="col"> 
                    <input type="text" name="pilih_kosan" class="form-control" value="<?= $kamars['nama_kosan'] . ' - ' . $kamars['nama_kamar'] ?>" readonly>
                    <input type="hidden" name="kosan" class="form-control" value="<?= $kamars['nama_kosan'] ?>">
                    <input type="hidden" name="nomor" class="form-control" value="<?= $kamars['nama_kamar'] ?>">
                </div> 
            </div>
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="exampleInputPassword1" name="hp" placeholder="08122589085" value="<?= $nomor ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Bayar Kosan</label>
            <div class="row">
                <div class="col-md-4">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="bulan" id="Radio1" name="bayaran" checked>
                        <label for="Radio1" class="custom-control-label">Bulanan</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" value="tahun" id="Radio2" name="bayaran">
                        <label for="Radio2" class="custom-control-label">Tahunan</label>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="tarif_perbulan" class="form-control" value="<?= $kamars['tarif_perbulan'] ?>">
        <input type="hidden" name="tarif_pertahun" class="form-control" value="<?= $kamars['tarif_pertahun'] ?>">
    </div>

    <button type="submit">Pesan Sekarang</button>
    <button type="button" class="cancel" onclick="closeModal()">Batal</button>
</form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function openModal() {
        document.getElementById('reservationModal').style.display = 'flex';
    }

    document.getElementById('reservationForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Formulir terkirim! Logika pemrosesan formulir dapat ditambahkan di sini.');
        closeModal();
    });

    function closeModal() {
        document.getElementById('reservationModal').style.display = 'none';
    }
</script>
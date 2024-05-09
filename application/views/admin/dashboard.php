<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?=  $jumlah_kosan; ?></h3>
                        <p>Titik Kosan / Kontrakan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <a href="kosan" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?=  $jumlah_penghuni; ?></h3>
                        <p>Penghuni</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <a href="<?= base_url('penghuni/index') ?>" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
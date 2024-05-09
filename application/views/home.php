<section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Retania Kost</h1>
                        <p>Penyedia Kost dengan Wilayah Cukup Lengkap di Setiap Daerahnya</p>
                        <a href="#" class="primary-btn">Lihat Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>public/sona/img/hero1.jpeg"></div>
            <div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>public/sona/img/hero2.png"></div>
            <div class="hs-item set-bg" data-setbg="<?php echo base_url() ?>public/sona/img/hero3.jpg"></div>
        </div>
    </section>

    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>KOST TERBARU</span>
                        <h2>Recommendasi Kost Terbaru</h2>

                    </div>
                </div>
            </div>
            <div class="row">
            <?php $replace = array("KOTA", "ADM.", "KAB.");
            foreach ($kosan as $kosan_item): ?>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="<?php echo base_url('public/admin/img/db_images/' . $kosan_item['foto_utama']) ?>">
                        <div class="bi-text">
                            <span class="b-tag"><?= str_replace($replace, "", $kosan_item['wilayah']) ?> / <i class="icon_profile"></i> <?= $kosan_item['layanan'] ?></span>
                            <h4><a href="<?= site_url('kosan/detail/' . $kosan_item['id_kosan']) ?>"><?= ucwords($kosan_item['nama_kosan']) ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>




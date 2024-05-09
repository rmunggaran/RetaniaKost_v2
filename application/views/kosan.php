<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Daftar Kosan</h2>
                    <div class="bt-option">
                        <a href="pages/index">Home</a>
                        <span>Kosan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="rooms-section spad">
    <div class="container">
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


<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Pencarian "<?= $cari ?>"</h2>
                    <div class="bt-option">
                        <a href="index.php">Home</a>
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
        if (isset($results) && count($results) === 0): ?>
        <div class="col-12 text-center">
            <h4>ups , Kosan Tidak Ada</h4>
        </div>
        <?php else :
            foreach ($results as $kosan): ?>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="<?php echo base_url('public/admin/img/db_images/' . $kosan['foto_utama']) ?>">
                        <div class="bi-text">
                            <span class="b-tag"><?= str_replace($replace, "", $kosan['wilayah']) ?> / <i class="icon_profile"></i> <?= $kosan['layanan'] ?></span>
                            <h4><a href="<?= site_url('kosan/detail/' . $kosan['id_kosan']) ?>"><?= ucwords($kosan['nama_kosan']) ?></a></h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; 
        endif;
        ?>

        </div>
    </div>
</section>
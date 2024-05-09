<?php $replace = array("LatLng", "(", ")"); ?>

<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2><?= ucwords($kosan['nama_kosan']) ?></h2>
                    
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Alamat:</td>
                                <td><?= ucwords($kosan['alamat']) ?></td>
                            </tr>
                            <tr>
                                <td class="c-o">Telpon:</td>
                                <td><?= $kosan['tlp'] ?></td>
                            </tr>
                            <tr>
                                <td class="c-o">Layanan:</td>
                                <td><?= ucwords($kosan['layanan']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="" class="contact-form">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <img src="<?php echo base_url('public/admin/img/db_images/' . $kosan['foto_utama']) ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                        <img src="<?php echo base_url('public/admin/img/db_images/' . $kosan['foto_kamar']) ?>" alt="">
                        </div>
                        <div class="col-lg-6">
                        <img src="<?php echo base_url('public/admin/img/db_images/' . $kosan['foto_toilet']) ?>" alt="">
                        </div>
                        <div class="col-lg-12">
                            <a target="_blank" href="https://wa.me/<?= preg_replace('/^0/', '62', $kosan['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $kosan['nama_kosan'] ?>%20beralamat%20di%20<?= $kosan['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" class="btn btn-primary btn-block" style="background-color:#ff3d51;border: 1px solid #ff3d51;"><i class="fa fa-whatsapp fa-lg"> </i> Hubungi Pemilik</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe src="https://maps.google.com/maps?q=<?= str_replace($replace, "", $kosan['map']) ?>&hl=es;z=14&amp;output=embed" height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <h4 class="mt-5">Peraturan Kosan</h4>
        <p><?= $kosan['deskripsi'] ?></p>
    </div>
</section>

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>List Kamar</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <?php if(!empty($kamars)){
            foreach ($kamars as $kamar): ?>
                <?php
                $isOccupied = $this->db->where('id_kamar', $kamar['id_kamar'])
                                       ->get('penghuni')
                                       ->num_rows() > 0;
    
                if (!$isOccupied):
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="<?= base_url('public/admin/img/db_images/' . $kamar['foto_option1']) ?>" alt="" style="height:200px;">
                            <div class="ri-text">
                                <h4><?= ucwords($kamar['nama_kamar']) ?></h4>
                                <h3><?= "Rp " . number_format($kamar['tarif_perbulan'], 0, ',', '.');?><span>/ PerBulan</span></h3>
                                <a href="<?= site_url('kamar/detail/' . $kamar['id_kamar']) ?>" class="primary-btn">Lihat Details</a><br><br>
                                <a target="_blank" href="https://wa.me/<?= preg_replace('/^0/', '62', $kosan['tlp']) ?>?text=Hai,%20Saya%20tertarik%20dengan%20kosan%20<?= $kosan['nama_kosan'] ?>%20beralamat%20di%20<?= $kosan['alamat'] ?>.%20Apakah%20masih%20tersedia%20kamar%20?" class="btn btn-primary btn-block" style="background-color:#ff3d51;border: 1px solid #ff3d51;"><i class="fa fa-whatsapp fa-lg"> </i> Hubungi Pemilik</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach;
            }else{ ?>
            <h3><center>Kamar Tidak tersedia</center></h3>
            <?php } ?>
        </div>
    </div>
</section>


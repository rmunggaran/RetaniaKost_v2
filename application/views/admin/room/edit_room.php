<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>EDIT KOSAN</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">Edit kosan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="container-fluid">
        <?php
        error_reporting(0);
        ?>
        <div class="card  card-purple card-outline">
            <form action="<?php echo base_url() . 'index.php/admin/updateKosan/' . $kosan['id_kosan']; ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kosan['foto_utama']?>" id="image-preview-utama" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kosan['foto_utama']?>" id="image-preview" alt="Product Image"></div>
                                <div class="product-image-thumb">
                                    <?php if ($kosan['foto_kamar'] == null) { ?>
                                        <img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-kamar" alt="Product Image">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kosan['foto_kamar']?>" id="image-preview-kamar" alt="Product Image">
                                    <?php } ?>
                                </div>
                                <div class="product-image-thumb">
                                    <?php if ($kosan['foto_toilet'] == null) { ?>
                                        <img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-toilet" alt="Product Image">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() ?>public/admin/img/db_images/<?= $kosan['foto_toilet']?>" id="image-preview-toilet" alt="Product Image">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="my-3">
                                <div class="form-group">
                                    <label for="inputName">Nama Kosan / Kontrakan</label>
                                    <input type="text" name="namakosan" value="<?= $kosan['nama_kosan'] ?>" class="form-control" placeholder="KOSAN RETANIA ABADI MAKASSAR" required oninvalid="this.setCustomValidity('Nama Kosan Masih Kosong')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <p>
                            <div class="form-group">
                                <div class="select2-purple">
                                    <label for="inputName">Masukan Wilayah Kosan</label>
                                    <input type="text" name="wilayah" value="<?= $kosan['wilayah'] ?>" class="form-control" placeholder="Tasikmalaya" required oninvalid="this.setCustomValidity('Nama Kosan Masih Kosong')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            </p>

                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="rupiahbulan" name="tarif_bulan" class="form-control" placeholder="Rp. 300.000" hidden>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="rupiahtahun" name="tarif_tahun" class="form-control" placeholder="Rp. 5.000.000" hidden>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Hanya Melayani Penghuni</label>
                                <div class="row">
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Khusus Pria" type="radio" id="customRadio1" name="layanan" <?php echo ($kosan['layanan'] == 'Khusus Pria') ? 'checked' : ''; ?>>
                                            <label for="customRadio1" class="custom-control-label">Khusus Pria</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Khusus Wanita" type="radio" id="customRadio2" name="layanan" <?php echo ($kosan['layanan'] == 'Khusus Wanita') ? 'checked' : ''; ?>>
                                            <label for="customRadio2" class="custom-control-label">Khusus Wanita</label>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input custom-control-input-purple custom-control-input-outline" value="Pria & Wanita" type="radio" id="customRadio3" name="layanan" <?php echo ($kosan['layanan'] == 'Pria & Wanita') ? 'checked' : ''; ?>>
                                            <label for="customRadio3" class="custom-control-label">Pria & Wanita</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p><b><i><u>Upload Foto</u></i></b></p>
                            <div class="row">
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-utama" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Utama
                                    </label>
                                    <input id="file-upload-utama" name="foto_utama" type="file" onchange="previewImageUtama();" hidden />
                                </div>
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-kamar" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Optional
                                    </label>
                                    <input id="file-upload-kamar" name="foto_kamar" type="file" onchange="previewImageKamar();" hidden />
                                </div>
                                <div class="col-4 col-md-4">
                                    <label for="file-upload-toilet" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i> Foto Optional
                                    </label>
                                    <input id="file-upload-toilet" name="foto_toilet" type="file" onchange="previewImageToilet();" hidden />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label>No Telp / Whatsapp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name="notlp" value="<?= $kosan['tlp'] ?>" class="form-control" required oninvalid="this.setCustomValidity('No Telp Tidak Boleh Kosong')" oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputName">Peraturan Kosan</label>
                        <input id="x" type="hidden"  name="deskripsi" value="<?= $kosan['deskripsi'] ?>">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="inputName">Alamat Lengkap</label>
                        <input type="text" name="alamat" value="<?= $kosan['alamat'] ?>" autocomplete="FALSE" class="form-control" placeholder="Jl. Sukabangun 2 No.245" required oninvalid="this.setCustomValidity('Alamat Wajib di Isi')" oninput="this.setCustomValidity('')">
                    </div>
                    <label for="inputName">Buat Pin Map</label>
                    <div id="mapid" style="width:100%; height: 250px;"></div>
                    <input type="text" class="form-control" value="<?= $kosan['map'] ?>" id="latlong" name="latlong" hidden>
                    <br>
                    <button type="submit" name="update" class="btn btn-success btn-block"><b>UPDATE KOSAN BARU</b></button>

                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->

</section>
    </div>
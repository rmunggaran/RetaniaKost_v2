<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>TAMBAH KAMAR</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>" style="color:#ff3d51;">Home</a></li>
                    <li class="breadcrumb-item active">New Room</li>
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
        <form action="<?php echo base_url() . 'kamar/addKamar'; ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-utama" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-kamar" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-toilet" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-option1" alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="<?php echo base_url() ?>public/admin/img/noimages/defaultimages.png" id="image-preview-option2" alt="Product Image"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="my-3">
                                <div class="form-group">
                                    <label for="inputName">Nama Kosan / Kontrakan</label>
                                    <input type="text" name="" class="form-control" value="<?= $kosan['nama_kosan'] . ' - ' . $kosan['wilayah'] ?>" readonly>
                                    <input type="text" name="id" class="form-control" value="<?= $kosan['id_kosan'] ?>" hidden>
                                    <input type="text" name="namakosan" class="form-control" value="<?= $kosan['nama_kosan'] ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Nama/Nomor Kamar</label>
                                    <input type="text" name="namakamar" class="form-control" placeholder="Pelangi,C05,dll" required oninvalid="this.setCustomValidity('Nama Kamar Masih Kosong')" oninput="this.setCustomValidity('')">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Bulan</label>
                                        <input type="text" id="rupiahbulan" name="tarif_bulan" class="form-control" placeholder="Rp. 300.000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Tarif Kosan / Tahun</label>
                                        <input type="text" id="rupiahtahun" name="tarif_tahun" class="form-control" placeholder="Rp. 5.000.000">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p><b><i><u>Upload Foto Kamar</u></i></b></p>
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-utama" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 1
                                    </label>
                                    <input id="file-upload-utama" name="foto_option1" type="file" onchange="previewImageUtama();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-kamar" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 2
                                    </label>
                                    <input id="file-upload-kamar" name="foto_option2" type="file" onchange="previewImageKamar();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-toilet" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 3
                                    </label>
                                    <input id="file-upload-toilet" name="foto_option3" type="file" onchange="previewImageToilet();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-option1" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 4
                                    </label>
                                    <input id="file-upload-option1" name="foto_option4" type="file" onchange="previewImageOption1();" hidden />
                                </div>
                                <div class="col-3 col-md-3">
                                    <label for="file-upload-option2" class="custom-file-upload">
                                        <i class="fas fa-photo-video"></i>Foto 5
                                    </label>
                                    <input id="file-upload-option2" name="foto_option5" type="file" onchange="previewImageOption2();" hidden />
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Fasilitas Kamar</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" name="fasilitas[]" data-placeholder="Pilih Fasilitas" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                        <option value="Free Wifi 24 jam">Free Wifi 24 jam</option>
                                        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
                                        <option value="Kamar Mandi Luar">Kamar Mandi Luar</option>
                                        <option value="Listrik Token">Listrik Token</option>
                                        <option value="AC">AC</option>
                                        <option value="Kipas Angin">Kipas Angin</option>
                                        <option value="Lemari Pakaian">Lemari Pakaian</option>
                                        <option value="Dapur Umum">Dapur Umum</option>
                                        <option value="Air 24 Jam">Air Bersih 24 Jam</option>
                                        <option value="Meja Belajar">Meja Belajar</option>
                                        <option value="Tempat Tidur Spring Bed">Tempat Tidur Spring Bed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="add" class="btn btn-success btn-block"><b>TAMBAH KAMAR BARU</b></button>

                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->

</section>
    </div>
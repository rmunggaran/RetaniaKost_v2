<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="margin-top: 10px;">
                    <form action="<?php echo site_url('penghuni/updatePenghuni/' . $penghuni['id_penghuni']); ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <div class="col-12">
                                        <img src="<?php echo base_url() ?>public/admin/img/ktp/<?= $penghuni['ktp']?>" id="image-preview-utama" class="product-image" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="ktp" value="<?= $penghuni['ktp'] ?>" hidden>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nik</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name="nik" placeholder="Masukan Nomor NIK KTP" required value="<?= $penghuni['nik'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama" placeholder="Nama Lengkap" required value="<?= $penghuni['nama'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Jenis Kelamin</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" value="Laki - Laki" id="customRadio1" name="jk" <?php if ($penghuni['jk'] == 'Laki - Laki') echo 'checked'; ?>>
                                                    <label for="customRadio1" class="custom-control-label">Laki - Laki</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" value="Perempuan" id="customRadio2" name="jk" <?php if ($penghuni['jk'] == 'Perempuan') echo 'checked'; ?>>
                                                    <label for="customRadio2" class="custom-control-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Status Verifikasi</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" value="ya" id="radioya" name="status" <?php if ($penghuni['status'] == 'ya') echo 'checked'; ?>>
                                                    <label for="radioya" class="custom-control-label">ya</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" value="tidak" id="radiotodak" name="status" <?php if ($penghuni['status'] == 'tidak') echo 'checked'; ?>>
                                                    <label for="radiotodak" class="custom-control-label">tidak</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Kosan</label>
                                        <select class="form-control select2" name="kosan" id="selectKosan" style="width: 100%;">
                                        <?php
                                        foreach ($kosan as $row) {
                                            $selected = ($row['nama_kosan'] == $penghuni['kosan'] ) ? 'selected' : '';
                                            echo '<option value="' . $row['nama_kosan'] . '" ' . $selected . '>' . $row['nama_kosan'] . ' - ' . $row['wilayah'] . '</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama/Nomor Kamar</label>
                                        <select class="form-control" id="selectNomorKamar" name="nomor" required>
                                            <option value="" selected disabled>Select Nama/Nomor Kamar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nomor Handphone</label>
                                        <input type="number" class="form-control" id="exampleInputPassword1" name="hp" placeholder="08122589085" required value="<?= $penghuni['tlp'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Event listener untuk dropdown "Pilih Kosan"
        $('#selectKosan').on('change', function () {
            // Ambil nilai nama kosan yang dipilih
            var selectedKosan = $(this).val();

            // Kirim permintaan AJAX
            $.ajax({
                url: '<?php echo base_url('kamar/searchKamar'); ?>',
                type: 'POST',
                dataType: 'json',
                data: { nama_kosan: selectedKosan },
                success: function (response) {
                    // Manipulasi dropdown "Nama/Nomor Kamar" dengan hasil dari server
                    updateDropdown(response);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        // Fungsi untuk memperbarui dropdown "Nama/Nomor Kamar"
        function updateDropdown(data) {
            // Dapatkan elemen dropdown
            var selectNomorKamar = $('#selectNomorKamar');

            // Kosongkan dropdown
            selectNomorKamar.empty();

            // Tambahkan opsi default
            selectNomorKamar.append('<option value="" selected disabled>Select Nama/Nomor Kamar</option>');

            // Isi dropdown dengan data baru
            $.each(data, function (index, item) {
                console.log('Item:', item);
                selectNomorKamar.append('<option value="' + item.nama_kamar + '">' + item.nama_kamar + '</option>');
            });
        }
    });
</script>
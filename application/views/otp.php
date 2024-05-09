<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Verifikasi OTP</h5>
                        <?php if (!empty($update_data)): ?>
                            <form method="POST" action="<?php echo base_url('Auth/simpanNomor/'. $id_user); ?>">
                            <div class="form-group">
                                <label for="otp">Masukkan OTP yang Anda terima melalui nomor telepon:</label>
                                <input type="text" id="otp" name="otp" class="form-control" required>
                                <input type="hidden" id="username" name="username" class="form-control" required value="<?= $update_data['username'] ?>">
                                <input type="hidden" id="nama" name="nama" class="form-control" required value="<?= $update_data['nama'] ?>">
                                <input type="hidden" id="email" name="email" class="form-control" required value="<?= $update_data['email'] ?>">
                                <input type="hidden" id="nomor" name="nomor" class="form-control" required value="<?= $update_data['nomor'] ?>">
                                
                                <input type="hidden" id="password" name="password1" class="form-control" required <?php if (!empty($update_data['password'])) { ?> value="<?= $update_data['password'] ?>" <?php } ?>>
                                <input type="hidden" id="password" name="password2" class="form-control" required <?php if (!empty($update_data['password'])) { ?> value="<?= $update_data['password'] ?>" <?php } ?>>
                            </div>
                            <button type="submit" class="btn btn-warning">Verifikasi OTP dan Simpan Data</button>
                        </form>
                        <?php else: ?>
                        <form method="POST" action="<?php echo base_url('Auth/simpan_data'); ?>">
                            <div class="form-group">
                                <label for="otp">Masukkan OTP yang Anda terima melalui nomor telepon:</label>
                                <input type="text" id="otp" name="otp" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-warning">Verifikasi OTP dan Simpan Data</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

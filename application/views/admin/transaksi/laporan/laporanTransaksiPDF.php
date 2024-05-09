<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Laporan Transaksi</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 20px;
			}

			h1 , h3 {
				text-align: center;
				margin-bottom: 20px;
			}

			table {
				width: 100%;
				border-collapse: collapse;
			}

			table th,
			table td {
				border: 1px solid #ddd;
				padding: 8px;
				text-align: left;
			}

			table th {
				background-color: #f2f2f2;
			}

			.footer {
				text-align: center;
				margin-top: 20px;
			}
		</style>
	</head>
	<body>
		<h1>Laporan Transaksi Retania Kost</h1>
		<table>
			<thead>
				<tr>
					<th>Id transaksi</th>
					<th>Id Penghuni</th>
					<th>Id Kamar</th>
					<th>Check in</th>
					<th>Check out</th>
					<th>Metode Pembayaran</th>
					<th>Status Pembayaran</th>
					<th>Total bayar</th>
				</tr>
			</thead>
			<?php 
                $total_biaya = 0;
            if (!empty($transaksi)) {
                foreach ($transaksi as $p) {
                    $total_biaya += $p['total_biaya'];
            ?>
                <tr>
                    <td><?= $p['id_transaksi']?></td>
                    <td><?= $p['id_penghuni']?></td>
                    <td><?= $p['id_kamar']?></td>
                    <td><?= $p['tanggal_check_in']?></td>
                    <td><?= $p['tanggal_check_out']?></td>
                    <td><?= $p['metode_pembayaran']?></td>
                    <td><?= $p['status_pembayaran']?></td>
                    <td><?= "Rp " . number_format($p['total_biaya'], 0, ',', '.');?></td>
                </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="3"><?= "Tidak Ada Data Kamar"; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
		</table>
		<div class="footer">
			<p>Total Transaksi: <?= "Rp " . number_format($total_biaya, 0, ',', '.'); ?></p>
		</div>
	</body>
</html>

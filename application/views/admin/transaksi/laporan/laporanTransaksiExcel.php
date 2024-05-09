<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename='.$title.'.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
		<h1><center>Laporan Transaksi Retania Kost</center> </h1>
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


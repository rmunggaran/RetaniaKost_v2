<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .invoice-container {
      max-width: 800px;
      margin: 20px auto;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }
    .invoice-header {
      text-align: center;
      margin-bottom: 30px;
    }
    .invoice-header h1 {
      color: #333;
      font-size: 36px;
      margin: 0;
    }
    .invoice-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .invoice-details .from, .invoice-details .to {
      padding-right: 20px;
    }
    .invoice-details p {
      margin: 5px 0;
    }
    .invoice-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    .invoice-table th, .invoice-table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    .invoice-table th {
      background-color: #f2f2f2;
    }
    .total {
      text-align: right;
    }
    .total p {
      margin: 10px 0;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      color: #888;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="invoice-container">
    <div class="invoice-header">
      <h1>Invoice</h1>
    </div>
    <div class="invoice-details">
  <table>
    <tr>
      <td class="from">
        <p>From:</p>
        <address>
          <strong>Retania Kost</strong><br>
          Phone: (62)8995349232<br>
          Email: info@almasaeedstudio.com
        </address>
      </td>
      <td class="to">
        <p>To:</p>
        <address>
          <strong><?= $penghuni['nama'] ?></strong><br>
          Phone: <?= $penghuni['tlp'] ?><br>
          Email: <?= $email ?>
        </address>
      </td>
      <td class="additional-info">
        <b>ID Order:</b> <?= $invoice['id_transaksi'] ?><br>
        <b>Akhir Pembayaran:</b> <?= $invoice['tanggal_check_in_plus_10'] ?><br>
        <b>Account:</b> <?= $invoice['id_penghuni'] ?>
      </td>
    </tr>
  </table>
</div>

    <table class="invoice-table">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Periode</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Bayar Kost</td>
          <td><?= $periode_in ?> - <?= $periode_out ?></td>
          <td><?= $tarif ?></td>
        </tr>
      </tbody>
    </table>
    <div class="total">
      <p><strong>Total:</strong> <?= $tarif ?></p>
      <?php if ($invoice['status_pembayaran'] == 'Lunas') : ?>
        <p><strong>Lunas</strong></p>
      <?php endif; ?>
    </div>
    <div class="footer">
      <p>Thank you for your business!</p>
    </div>
  </div>
</body>
</html>

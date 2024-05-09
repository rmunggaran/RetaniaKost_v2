<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Payment Form</h1>

    <form id="payment-form" action="<?= base_url('payment/finish') ?>" method="post">
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $snapToken ?>"></script>
        <button id="pay-button" type="button">Bayar Sekarang</button>
    </form>
</div>

<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('<?= $snapToken ?>');
    });
</script>

</body>
</html>

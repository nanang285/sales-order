<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-xl">

        <h2 class="text-2xl font-semibold mb-6 text-center">Data Transaksi</h2>

        <div class="bg-gray-100 p-4 rounded-lg mb-4">
           
            <div class="mb-2">
                <strong>Nama Merchant:</strong> {{ $transactionData['data']['merchant_name'] }}
            </div>
            <div class="mb-2">
                <strong>Email Pembayar:</strong> {{ $transactionData['data']['payer_email'] }}
            </div>
            <div class="mb-2">
                <strong>Nama Perusahaan:</strong> {{ $transactionData['data']['description'] }}
            </div>
            <div class="mb-2">
                <strong>External ID:</strong> {{ $transactionData['data']['external_id'] }}
            </div>
            <div class="mb-2">
                <strong>Status:</strong> {{ $transactionData['data']['status'] }}
            </div>
            <div class="mb-2">
                <strong>Jumlah:</strong> Rp {{ number_format($transactionData['data']['amount'], 0, ',', '.') }}
            </div>
           
            <div class="mb-2">
                <strong>Tanggal Kedaluwarsa:</strong>
                {{ \Carbon\Carbon::parse($transactionData['data']['expiry_date'])->format('d-m-Y H:i:s') }}
            </div>
        </div>

        <div class="text-center">
            <a href="{{ $transactionData['data']['invoice_url'] }}" target="_blank"
                class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                Bayar
            </a>
        </div>
    </div>

</body>

</html>

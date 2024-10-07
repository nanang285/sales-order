<!-- resources/views/transaksi/show.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Data Transaksi</h1>
        
        <div class="bg-white shadow-md rounded-lg p-4 mb-4">
            <h1>Tidak Ada Transaksi</h1>
        </div>
        
        <a href="{{ $transactionData['data']['invoice_url'] }}" target="_blank" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Bayar
        </a>
    </div>
    

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card dengan Font Urbanist</title>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            font-family: 'Urbanist', sans-serif;
        }
    </style>
</head>
<body class="flex justify-center items-center bg-gray-100">

<div class="max-w-md rounded overflow-hidden shadow-lg bg-white">
    <img class="w-full" src="{{asset('dist/images/event.png')}}" alt="Gambar">
    <div class="py-2">
        <div class="font-bold text-center text-base mb-2">ZEN MULTIMEDIA EXPO 2024</div>
        <hr class="border-dashed border border-gray-600 mb-2">
        <p class="text-gray-700 text-center font-bold text-sm mx-2 mb-2">
            Terima kasih atas dukungan nya, Kami tunggu kehadiran Anda.
        </p>        
        <div class="mx-4">
            <div class="flex justify-between">
                <p class="text-gray-600 text-base font-bold">Nama Lengkap :</p>
                <span class="text-gray-600 text-base">Nanang Supriatna</span>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-600 text-base font-bold">Email :</p>
                <span class="text-gray-600 text-base">nngs.me@gmail.com</span>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-600 text-base font-bold">Nama Perusahaan :</p>
                <span class="text-gray-600 text-base">PT. ZEN MULTIMEDIAs</span>
            </div>
            <div class="flex justify-between mb-8">
                <p class="text-gray-600 text-base font-bold">Jabatan :</p>
                <span class="text-gray-600 text-base">DIREKTUR</span>
            </div>
            <div class="flex justify-end mb-6">
                <span class="text-gray-600 text-base">Rp. 240.000</span>
            </div>            
            <div class="flex justify-between">
                <span class="text-gray-600 font-bold text-sm">15 Oktober 2024, 10:00 WIB</span>
                <span class="text-gray-600 font-bold text-sm">Gedung Serbaguna, Bekasi</span>
            </div>
        </div>
        <hr class="border-dashed border border-gray-600 my-2">
        <p class="text-gray-600 text-center text-sm">Harap simpan tiket ini dan Jangan sampai hilang.</p>
    </div>    
</div>

</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEN MULTIMEDIA EVENT</title>

    <style>
        <style>@media screen and (max-width: 600px) {
            .content {
                width: 100% !important;
                display: block !important;
                padding: 10px !important;
            }

            .header,
            .body,
            .footer {
                padding: 20px !important;
            }
        }
    </style>
    </style>

</head>

<body style="font-family: 'Poppins', Arial, sans-serif">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table class="content" width="600" border="0" cellspacing="0" cellpadding="0"
                    style="border-collapse: collapse; border: 1px solid #cccccc;">
                    <!-- Header -->
                    <tr>
                        <td class="header"
                            style="background-color: #1b6cd6d5; padding: 40px; text-align: center; color: white; font-size: 24px;">
                            Bukti Pembelian Tiket
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Halo, <b>{{ $data['nama_lengkap'] }}</b><br>
                            Terima kasih atas dukungan dan Partisipasi Anda. Kami harap anda hadir dalam acara
                            "<b>{{ $data['jenis_produk'] }}</b>" ini.<br><br>
                            Kami percaya acara ini akan menjadi pengalaman yang bermakna, dan kehadiran Anda akan
                            semakin memperkaya momen berharga ini.
                            Sekali lagi, terima kasih, dan sampai jumpa di acara kami.
                        </td>
                    </tr>


                    <!-- Download Ticket Button -->
                    <tr>
                        <td style="padding: 20px 40px 40px 40px; text-align: center;">
                            <!-- Download Button -->
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center"
                                        style="background-color: #1b6cd6d5; padding: 10px 20px; border-radius: 5px;">
                                        <a href="{{ url('event/ticket/' . encrypt($data['kode_invoice'])) }}"
                                            style="color: #ffffff; text-decoration: none; font-weight: bold;">
                                            Lihat Tiket
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Silakan lihat dan download tiket Anda dan pastikan untuk menyimpannya dengan baik. Tiket ini
                            diperlukan untuk memasuki ke acara.
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td class="footer"
                            style="background-color: #000000; padding: 40px; text-align: center; color: white; font-size: 14px;">
                            Created By
                            <img src="https://zenmultimedia.co.id/dist/images/logo/zmi-logo-2.webp"
                                style="width: 100px; height: auto; vertical-align: middle;">
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
</body>

</html>

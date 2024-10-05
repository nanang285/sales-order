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
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Halo, <b>{{ $ticketData['nama_lengkap'] }}</b><br>
                            Terima kasih atas dukungan dan Partisipasi Anda. Kami harap anda hadir dalam acara "<b>{{ $ticketData['jenis_produk'] }}</b>" ini.<br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="body" style="padding: 40px; text-align: left; font-size: 16px; line-height: 1.6;">
                            Cek Email Anda Untuk Invoice dan tiket dapat di lihat di bawah ini
                        </td>
                    </tr>
                    
            
                    
                    <tr>
                        <td style="padding: 20px 40px 40px 40px; text-align: center;">
                            <table cellspacing="0" cellpadding="0" style="margin: auto;">
                                <tr>
                                    <td align="center"
                                        style="background-color: #1b6cd6d5; padding: 10px 20px; border-radius: 5px;">
                                        <a href="{{ route('event.ticket', ['kode' => $kode]) }}" 
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
                            Silakan lihat dan download tiket Anda dan pastikan untuk menyimpannya dengan baik. Tiket ini diperlukan untuk memasuki ke acara.
                        </td>
                    </tr>                    
            
                </table>
            </td>
            
        </tr>
    </table>
</body>

</html>

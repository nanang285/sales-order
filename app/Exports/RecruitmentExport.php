<?php

namespace App\Exports;

use App\Models\Recruitment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RecruitmentExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Recruitment::all(); // Ambil semua data rekrutmen
    }

    public function headings(): array
    {
        return [
            'UUID',
            'Email',
            'Nama',
            'NIK',
            'Alamat',
            'Nomor Telepon',
            'Pendidikan',
            'Posisi',
            'Gaji',
            'File Path',
            'Stage 1',
            'Stage 2',
            'Stage 3',
            'Stage 4',
            'Created At',
            'Updated At',
        ];
    }
}

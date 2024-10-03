<?php

namespace App\Exports;

use App\Models\Recruitment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class RecruitmentExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $recruitments = Recruitment::all();

        $failedStages = [
            'Administrasi' => [],
            'Test Project' => [],
            'Interview' => [],
            'Offering' => [],
        ];

        foreach ($recruitments as $recruitment) {
            if ($recruitment->failed_stage) {
                if (array_key_exists($recruitment->failed_stage, $failedStages)) {
                    $failedStages[$recruitment->failed_stage][] = $recruitment->name;
                }
            }
        }

        $stage1Count = Recruitment::where('stage1', 1)->count();
        $stage2Count = Recruitment::where('stage2', 1)->count();
        $stage3Count = Recruitment::where('stage3', 1)->count();
        $stage4Count = Recruitment::where('stage4', 1)->count();

        $totalFailed = count($failedStages['Administrasi']) + count($failedStages['Test Project']) + count($failedStages['Interview']) + count($failedStages['Offering']);
        $totalSuccess = Recruitment::where('stage4', 1)->count();

        $data = [
            ['Administrasi', $stage1Count],
            ['Gagal Administrasi', count($failedStages['Administrasi'])],
            ['Tes Project', $stage2Count],
            ['Gagal Tes Project', count($failedStages['Test Project'])],
            ['Interview', $stage3Count],
            ['Gagal Interview', count($failedStages['Interview'])],
            ['Offering', $stage4Count],
            ['Gagal Offering', count($failedStages['Offering'])],
            ['Total Gagal', $totalFailed],
            ['Total Sukses', $totalSuccess],
        ];

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'Tahapan Seleksi',
            'Jumlah',
        ];
    }
}

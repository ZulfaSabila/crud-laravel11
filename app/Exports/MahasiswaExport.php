<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MahasiswaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Ambil data dari tabel mahasiswa
     */
    public function collection()
    {
        return Mahasiswa::select('id', 'nama', 'nim', 'email', 'created_at', 'updated_at')->get();
    }

    /**
     * Tambahkan heading (judul kolom)
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Mahasiswa',
            'NIM',
            'Email',
            'Tanggal Dibuat',
            'Terakhir Diperbarui'
        ];
    }

    /**
     * Format isi data agar lebih rapi di Excel
     */
    public function map($mahasiswa): array
    {
        return [
            $mahasiswa->id,
            ucwords($mahasiswa->nama),
            $mahasiswa->nim,
            $mahasiswa->email,
            $mahasiswa->created_at->format('Y-m-d H:i:s'),
            $mahasiswa->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}

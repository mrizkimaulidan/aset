<?php

namespace Database\Seeders;

use App\Models\CommodityLocation;
use Illuminate\Database\Seeder;

class CommodityLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Ruang Guru',
            'Ruang Kepala Sekolah',
            'Ruang Staff Tata Usaha (TU)',
            'Ruang Gudang',
            'Perpustakaan Bawah',
            'Perpustakaan Atas',
            'Ruang OSIS',
            'Ruang Laboratorium',
            'Ruang Unit Kesehatan Sekolah (UKS)',
            'Ruang Koperasi',
            'Ruang Satpam/Pos Satpam',
            'Ruang Salat',
            'Ruang Kepala Tata Usaha (TU)',
            'Ruang Seni Musik',
            'Ruang Wakil Kepala Sekolah',
            'Ruang Komputer',
            'Ruang Praktek',
            'Ruang Serba Guna',
            'Ruangan Guru BP (Bimbingan Penyuluhan)',
            'Ruang Kegiatan Ekstrakurikuler'
        ];

        for ($i = 0; $i < count($locations); $i++) {
            CommodityLocation::create([
                'name' => $locations[$i],
                'description' => 'Deskripsi ' . $locations[$i]
            ]);
        }
    }
}

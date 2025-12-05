<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Route::create([
            'program_id' => 1,
            'start_point' => 'Kelenteng Dewi Kwan Im',
            'end_point' => 'Kampung Kapitan',
            'route_coordinates' => [
                ['lat' => -2.992448, 'lng' => 104.766472, 'label' => 'Kelenteng Dewi Kwan Im'],
                ['lat' => -2.993276, 'lng' => 104.764692, 'label' => 'Taman Bawah Proyek'],
                ['lat' => -2.993546, 'lng' => 104.763529, 'label' => 'Plaza 7 Ulu'],
                ['lat' => -2.995314, 'lng' => 104.763258, 'label' => 'Kampung Kapitan (Rumah Besar Kapitan)'],
            ],
        ]);

        Route::create([
            'program_id' => 2,
            'start_point' => 'Martabak Har Lamo',
            'end_point' => 'Agampisan Jilid 1',
            'route_coordinates' => [
                ['lat' => -2.986759, 'lng' => 104.760390, 'label' => 'Martabak Har Lamo'],
                ['lat' => -2.987399, 'lng' => 104.762400, 'label' => 'Lorong Basah'],
                ['lat' => -2.987478, 'lng' => 104.763398, 'label' => 'Tugu Kelinci'],
                ['lat' => -2.989186, 'lng' => 104.764840, 'label' => 'Tepian Musi 16 Ilir'],
                ['lat' => -2.985967, 'lng' => 104.766901, 'label' => 'Pergudangan 16 Ilir'],
                ['lat' => -2.985458, 'lng' => 104.768180, 'label' => 'Agampisan Jilid 1'],
            ],
        ]);

        Route::create([
            'program_id' => 3,
            'start_point' => 'Martabak Har Lamo',
            'end_point' => 'P&D Manis',
            'route_coordinates' => [
                ['lat' => -2.986759, 'lng' => 104.760390, 'label' => 'Martabak Har Lamo'],
                ['lat' => -2.986420, 'lng' => 104.761178, 'label' => 'Pasaraya Bandung & Megahria'],
                ['lat' => -2.984927, 'lng' => 104.761400, 'label' => 'Jalan Pengadilan'],
                ['lat' => -2.984522, 'lng' => 104.762953, 'label' => 'Musholla Sulukussalam'],
                ['lat' => -2.982193, 'lng' => 104.763191, 'label' => 'MI Quraniah Palembang'],
                ['lat' => -2.981784, 'lng' => 104.765311, 'label' => 'Pasar Kentut'],
                ['lat' => -2.980871, 'lng' => 104.765249, 'label' => 'P&D Manis'],
            ],
        ]);

        Route::create([
            'program_id' => 4,
            'start_point' => 'Masjid Agung',
            'end_point' => 'Lawang Borotan',
            'route_coordinates' => [
                ['lat' => -2.988235, 'lng' => 104.759801, 'label' => 'Masjid Agung'],
                ['lat' => -2.989029, 'lng' => 104.760253, 'label' => 'Monpera'],
                ['lat' => -2.990044, 'lng' => 104.762275, 'label' => 'Jembatan Ampera'],
                ['lat' => -2.990242, 'lng' => 104.761532, 'label' => 'Museum SMB II'],
                ['lat' => -2.992557, 'lng' => 104.759469, 'label' => 'Benteng Kuto Besak (BKB)'],
                ['lat' => -2.992135, 'lng' => 104.758106, 'label' => 'Lawang Borotan'],
            ],
        ]);

        Route::create([
            'program_id' => 5,
            'start_point' => 'Masjid Agung',
            'end_point' => 'Toko Palembang Harum',
            'route_coordinates' => [
                ['lat' => -2.988235, 'lng' => 104.759801, 'label' => 'Masjid Agung'],
                ['lat' => -2.989029, 'lng' => 104.760253, 'label' => 'Monpera'],
                ['lat' => -2.989342, 'lng' => 104.759443, 'label' => 'Kantor Pos Merdeka'],
                ['lat' => -2.989800, 'lng' => 104.757994, 'label' => 'Bapenda'],
                ['lat' => -2.990783, 'lng' => 104.756793, 'label' => 'Kantor Walikota Palembang'],
                ['lat' => -2.991564, 'lng' => 104.754778, 'label' => 'Toko Palembang Harum'],
            ],
        ]);

        Route::create([
            'program_id' => 6,
            'start_point' => 'Kantor Walikota',
            'end_point' => 'Tujuan Kopi',
            'route_coordinates' => [
                ['lat' => -2.990783, 'lng' => 104.756793, 'label' => 'Kantor Walikota'],
                ['lat' => -2.992670, 'lng' => 104.757295, 'label' => 'Balai Prajurit'],
                ['lat' => -2.993311, 'lng' => 104.757638, 'label' => 'Gedung Kesenian & Jacobson Van den Berg'],
                ['lat' => -2.994131, 'lng' => 104.756321, 'label' => 'Pasar Sekanak'],
                ['lat' => -2.994629, 'lng' => 104.755082, 'label' => 'Eks Bioskop Rosida'],
                ['lat' => -2.996054, 'lng' => 104.755273, 'label' => 'Tujuan Kopi'],
            ],
        ]);

        Route::create([
            'program_id' => 7,
            'start_point' => 'Hotel Swarna Dwipa',
            'end_point' => 'Tugu Tentara Pelajar',
            'route_coordinates' => [
                ['lat' => -2.990610, 'lng' => 104.746974, 'label' => 'Hotel Swarna Dwipa'],
                ['lat' => -2.990827, 'lng' => 104.745598, 'label' => 'GKSBS Siloam'],
                ['lat' => -2.992015, 'lng' => 104.749399, 'label' => 'Gedung AEKI'],
                ['lat' => -2.991751, 'lng' => 104.751480, 'label' => 'SMP Negeri 1 Palembang'],
                ['lat' => -2.991883, 'lng' => 104.752466, 'label' => 'Gereja Ayam'],
                ['lat' => -2.990907, 'lng' => 104.750805, 'label' => 'Rumah Juang'],
                ['lat' => -2.990357, 'lng' => 104.749683, 'label' => 'Tugu Tentara Pelajar'],
            ],
        ]);

        Route::create([
            'program_id' => 8,
            'start_point' => 'Agampisan Jilid 1',
            'end_point' => 'Masjid Darul Muttaqien',
            'route_coordinates' => [
                ['lat' => -2.985327, 'lng' => 104.768178, 'label' => 'Agampisan Jilid 1'],
                ['lat' => -2.984304, 'lng' => 104.768253, 'label' => 'PT Kodja'],
                ['lat' => -2.984059, 'lng' => 104.768809, 'label' => 'Jeramba Karangkuang'],
                ['lat' => -2.984243, 'lng' => 104.770019, 'label' => 'Mushola Al-Kautsar'],
                ['lat' => -2.983086, 'lng' => 104.770082, 'label' => 'Pabrik Kopi Mencong'],
                ['lat' => -2.982290, 'lng' => 104.771264, 'label' => 'Rumah Batu Sungi Bayas'],
                ['lat' => -2.980891, 'lng' => 104.771559, 'label' => 'Pasar Kuto'],
                ['lat' => -2.979658, 'lng' => 104.771392, 'label' => 'Masjid Darul Muttaqien'],
            ],
        ]);

        Route::create([
            'program_id' => 9,
            'start_point' => 'Rumah Singgah Soekarno',
            'end_point' => 'Rumah Saudagar Ong Boen Tjit',
            'route_coordinates' => [
                ['lat' => -3.001065, 'lng' => 104.758316, 'label' => 'Rumah Singgah Bung Karno'],
                ['lat' => -3.000649, 'lng' => 104.758036, 'label' => 'Kampung Palembang Lorong Firma Haji Akil'],
                ['lat' => -3.002394, 'lng' => 104.757987, 'label' => 'Sekolah Muhammadiyah'],
                ['lat' => -3.002821, 'lng' => 104.757310, 'label' => 'Lorong Jaya Laksana'],
                ['lat' => -3.001162, 'lng' => 104.754380, 'label' => 'Rumah Saudagar Ong Boen Tjit'],
            ],
        ]);

        Route::create([
            'program_id' => 10,
            'start_point' => 'Shailendra Institution',
            'end_point' => 'Museum Mir Senen Art Gallery',
            'route_coordinates' => [
                ['lat' => -2.981667, 'lng' => 104.761736, 'label' => 'Shailendra Institution'],
                ['lat' => -2.982301, 'lng' => 104.760665, 'label' => 'Eks Bioskop Sanggar'],
                ['lat' => -2.983040, 'lng' => 104.758898, 'label' => 'Eks Bioskop Majestic'],
                ['lat' => -2.983672, 'lng' => 104.757699, 'label' => 'International Plaza'],
                ['lat' => -2.984550, 'lng' => 104.757776, 'label' => 'Museum Mir Senen Art Gallery'],
            ],
        ]);

        Route::create([
            'program_id' => 11,
            'start_point' => 'Agampisan jilid 2',
            'end_point' => 'Bungalow Pulau Kemaro',
            'route_coordinates' => [
                ['lat' => -2.993899, 'lng' => 104.757968, 'label' => 'Titik Kumpul Agampisan Jilid 2'],
                ['lat' => -2.994334, 'lng' => 104.762171, 'label' => 'Kampung Kapitan'],
                ['lat' => -2.980599, 'lng' => 104.813528, 'label' => 'Pulau Kemaro & Pagoda'],
                ['lat' => -2.981415, 'lng' => 104.818566, 'label' => 'Kampung Air Pulau Kemaro'],
                ['lat' => -2.982092, 'lng' => 104.823841, 'label' => 'Bungalow Pulau Kemaro'],
            ],
        ]);

        Route::create([
            'program_id' => 12,
            'start_point' => 'Eks Kopi Tw',
            'end_point' => 'Nagara Coffeeshop',
            'route_coordinates' => [
                ['lat' => -2.995374, 'lng' => 104.748124, 'label' => 'Eks Kopi Tw'],
                ['lat' => -2.995099, 'lng' => 104.747594, 'label' => 'Ungkonan SMB 1'],
                ['lat' => -2.992886, 'lng' => 104.747723, 'label' => 'Kolam Renang Garuda'],
                ['lat' => -2.991139, 'lng' => 104.745484, 'label' => 'Gereja Siloam'],
                ['lat' => -2.988250, 'lng' => 104.743247, 'label' => 'Masjid Taqwa'],
                ['lat' => -2.987793, 'lng' => 104.742711, 'label' => 'Nagara Coffeeshop'],
            ],
        ]);

        Route::create([
            'program_id' => 13,
            'start_point' => 'Kantor Walikota',
            'end_point' => 'Agampisan Jilid II',
            'route_coordinates' => [
                ['lat' => -2.991504, 'lng' => 104.757010, 'label' => 'Kantor Walikota'],
                ['lat' => -2.992496, 'lng' => 104.757185, 'label' => 'Balai Prajurit'],
                ['lat' => -2.993046, 'lng' => 104.757939, 'label' => 'Gedung Kesenian'],
                ['lat' => -2.993308, 'lng' => 104.757393, 'label' => 'Jacobson van den Berg'],
                ['lat' => -2.993963, 'lng' => 104.757957, 'label' => 'Agampisan Jilid II'],
            ],
        ]);

        Route::create([
            'program_id' => 14,
            'start_point' => 'Rumah Sakit Charitas',
            'end_point' => 'Rumah Sakit Charitas',
            'route_coordinates' => [
                ['lat' => -2.988820, 'lng' => 104.748940, 'label' => 'Rumah Sakit Charitas'],
            ],
        ]);

        Route::create([
            'program_id' => 15,
            'start_point' => 'Tujuan Kopi',
            'end_point' => 'Rumah Ulu Ong Boentjit',
            'route_coordinates' => [
                ['lat' => -2.995745, 'lng' => 104.755193, 'label' => 'Tujuan Kopi'],
                ['lat' => -2.995362, 'lng' => 104.754946, 'label' => 'Rumah Ilir Ong Boentjit'],
                ['lat' => -2.997876, 'lng' => 104.753292, 'label' => 'Gudang Buncit'],
                ['lat' => -3.001233, 'lng' => 104.754631, 'label' => 'Rumah Ulu Ong Boentjit'],
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'name' => 'Kapitan',
            'description' => 'Chinatown-nya Palembang. Rute ini menampilkan Kelenteng tertua dan Rumah Kapitan yang megah, menghadirkan kisah komunitas Tionghoa dan pengaruhnya dalam sejarah kota.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'kapitan.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Pasar 16',
            'description' => 'Menelusuri pusat perekonomian Palembang sejak masa lampau, kawasan ini dipenuhi jejak gudang-gudang tua dan bekas perusahaan kolonial Belanda yang pernah menjadi nadi perdagangan di tepian Sungai Musi.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'pasar16.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Landraad',
            'description' => 'Rute yang membawa peserta ke kawasan bekas pengadilan kolonial. Kini, area ini berkembang menjadi pusat pertokoan legendaris Palembang yang masih menyimpan nuansa masa lalu di balik deretan tokonya.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'landraad.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Palembang Darussalam',
            'description' => 'Rute yang berfokus pada landmark penting Kota Palembang, lengkap dengan kisah sejarah, budaya, serta peran kawasan ini dalam perkembangan kota dari masa ke masa.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'palembang.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Merdeka',
            'description' => 'Menyusuri kawasan perkantoran pemerintah sejak era kolonial, dilengkapi cerita menarik tentang tempat hiburan dan gedung bioskop Belanda yang pernah meramaikan kota pada zamannya.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'merdeka.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Sekanak',
            'description' => 'Menghadirkan suasana kota tua Palembang, rute ini penuh dengan bangunan bersejarah yang dahulu menjadi pusat kantor dan perdagangan. Cocok bagi pencinta arsitektur dan sejarah perkotaan.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'sekanak.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Talang Semut Een Omstreken',
            'description' => 'Kawasan pemukiman kolonial yang asri dengan pepohonan rindang dan deretan rumah bergaya Indis. Rute ini menawarkan suasana damai sekaligus jejak arsitektur kolonial yang ikonik.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'talangsemut.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Kuto',
            'description' => 'Rute yang membawa peserta memasuki kawasan Kampung Arab di Palembang, kaya akan sejarah komunitas Arab dan peran penting mereka dalam perkembangan budaya serta perdagangan di kota ini.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'kuto.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Para Saudagar',
            'description' => 'Rute yang membahas kisah para artis terkenal yang berasal dari Palembang, disertai eksplorasi gedung-gedung bioskop tua yang pernah menjadi pusat hiburan warga kota.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'parasaudagar.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Para Artis',
            'description' => 'Tur sore hari menjelajahi kawasan saudagar Palembang dengan kisah perdagangan zaman kolonial dan budaya sungai.',
            'payment_type' => 'akhir',
            'program_type' => 'regular',
            'duration' => '2 jam',
            'program_photo' => 'paraartis.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Ngopi di Ketek',
            'description' => 'Tur sore hari menjelajahi kawasan saudagar Palembang dengan kisah perdagangan zaman kolonial dan budaya sungai.',
            'payment_type' => 'awal',
            'program_type' => 'event',
            'duration' => '3 jam',
            'program_photo' => 'ngopi.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Little Netherlands',
            'description' => 'Event Walking tour ini ialah Program kolaborasi antara Palembang Good Guide, Nagara Coffeeshop, dan Street photo project.
            Walking tour dikawasan Talang Semut yang dulunya merupakan pusat pemukiman Orang Belanda di kota Palembang.',
            'payment_type' => 'awal',
            'program_type' => 'event',
            'duration' => '2 jam',
            'program_photo' => 'littlenetherlands.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Sketsa Kenal Kota Rute Sekanak',
            'description' => 'Event walking tour ini ialah program kolaborasi antara Palembang good guide bersama Kala Art Lab (Sebuah Komunitas Event Organizer yang berfokus pada Seni melukis watercolor), Walking tour dilaksanakan di rute dan Beberapa titik yang akan kita Lukis atau Gambar Bangunan/Gedung Heritage nya dengan dibantu oleh Profesional artist dari KALA Art Lab',
            'payment_type' => 'awal',
            'program_type' => 'event',
            'duration' => '3 jam',
            'program_photo' => 'sketsa.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => 'Berkunjung ke Biara',
            'description' => 'Tour Spesial Hari Natal, Berkunjung ke biara di Rumah Sakit Charitas atau tepatnya Biara dan Mini Museum yang berada di Dalam Kawasan Rumah sakit Charitas.',
            'payment_type' => 'awal',
            'program_type' => 'special',
            'duration' => '1 jam',
            'program_photo' => 'biara.jpg',
            'status' => 'aktif',
        ]);

        Program::create([
            'name' => ' Jejak Ong Boentjit',
            'description' => 'Event tour hari besar spesial Imlek, Walking tour sekaligus musi tour karena kita akan Mengunjungi rumah Ong Boentjit yang berada di tepian sungai Musi.',
            'payment_type' => 'awal',
            'program_type' => 'special',
            'duration' => '2 jam',
            'program_photo' => 'jejak.jpg',
            'status' => 'aktif',
        ]);
    }
}

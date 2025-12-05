<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guide::create([
            'name' => 'Bung Zaim',
            'phone' => '085694643807',
            'role' => 'Founder & Senior Tour Guide',
            'email' => 'zaimtampan@gmail.com',
            'bio' => 'Pendiri Palembang Good Guide sekaligus master of receh jokes. Andal memecah suasana dengan pertanyaan legendaris: “Ayam apa yang kecil? Ayam suwir.”
            Selain humoris, Bung Zaim dikenal dengan pembawaan yang energik dan pengetahuan sejarah yang dalam.',
            'instagram' => '@bungzaim',
            'photo' => 'zaim.png'
        ]);

        Guide::create([
            'name' => 'Bung Joni',
            'phone' => '08817277111',
            'role' => 'Tour Guide (Ahli Kulineran)',
            'email' => 'joniday@wongkito.net',
            'bio' => 'Paling kalem di antara para guide, tapi urusan kuliner jangan diragukan. Bung Joni adalah kompas berjalan untuk makanan enak, khususnya ketika memimpin rute kulineran. Tenang, ramah, dan selalu tepat sasaran soal rekomendasi.',
            'instagram' => '@rembulanbundar',
            'photo' => 'joni.png'
        ]);

        Guide::create([
            'name' => 'Nona Kiki',
            'phone' => '08281312277859',
            'role' => 'Tour Guide (Ramah & Menyenangkan)',
            'email' => 'aginiariski@gmail.com',
            'bio' => 'Cantik, ramah, dan selalu membuat peserta nyaman. Tour bersama Nona Kiki itu seperti jalan bareng teman lama—hangat, santai, dan pasti betah dari awal sampai akhir.',
            'instagram' => '@aginnagain',
            'photo' => 'kiki.png'
        ]);

        Guide::create([
            'name' => 'Bung Yogi',
            'phone' => '0895370648331',
            'role' => 'Tour Guide (Humble & Insightful)',
            'email' => 'mhdyogisptra@gmail.com',
            'bio' => 'Humoris dengan jokes receh satu frekuensi dengan Bung Zaim. Tour bersama Bung Yogi terasa seperti nongkrong bareng teman, tapi pulang-pulang dapat banyak insight tentang sejarah dan budaya Palembang.',
            'instagram' => '@deyogies',
            'photo' => 'yogi.png'
        ]);

        Guide::create([
            'name' => 'Nona Balqis',
            'phone' => '0882282672271',
            'role' => 'Tour Guide (Queen of Fun Facts)',
            'email' => 'balqisedenia26@gmail.com',
            'bio' => 'Centil, ceria, dan punya stok fun facts yang seakan nggak ada habisnya. Tour bareng Nona Balqis bikin peserta merasa ikut kelas sejarah yang hidup—seru, informatif, dan bikin nagih.',
            'instagram' => '@_itsbalqeisss',
            'photo' => 'balqis.png'
        ]);

        Guide::create([
            'name' => 'Bung Mumtaz',
            'phone' => '0881994890252',
            'role' => 'Tour Guide (Si Arab Palembang)',
            'email' => 'mumtazsyahab@gmail.com',
            'bio' => 'Guide yang satu ini vibe-nya kayak jalan sama orang Arab… karena memang orang Arab beneran. Sapaan khasnya “Kayfa Haluk?” selalu bikin suasana seru dan unik. Penjelasan ringan, penyampaian asik, dan sangat easygoing.',
            'instagram' => '@mumtazsyahab',
            'photo' => 'mumtaz.png'
        ]);

        Guide::create([
            'name' => 'Nona Rati',
            'phone' => '0883833856184',
            'role' => 'GoodMin(Admin PGG)',
            'email' => 'mrtizarro@gmail.com',
            'bio' => 'Pahlawan di balik layar. Semua urusan Instagram, balas pesan WhatsApp, hingga konfirmasi pendaftaran ada di tangan Nona Imel. Tenang, cekatan, dan jadi penghubung penting antara peserta dan seluruh tim PGG.',
            'instagram' => '@imelmz_',
            'photo' => 'rati.png'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Story;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data 8 user dengan hobby berbeda
        $users = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Menangkap Momen Sunrise di Bromo', 'content' => 'Perjalanan ke Gunung Bromo untuk mengejar sunrise adalah pengalaman yang tak terlupakan. Berangkat jam 2 pagi, mendaki lautan pasir, dan menyaksikan matahari terbit yang memukau.'],
                    ['title' => 'Tips Fotografi Street Photography', 'content' => 'Street photography mengajarkan kita untuk menangkap kehidupan sehari-hari secara spontan. Bawa kamera, berjalanlah, dan siap untuk menangkap momen tak terduga.'],
                ]
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Resep Rendang Daging Sapi Empuk', 'content' => 'Rahasia rendang yang empuk adalah memasak dengan api kecil dan sabar. Butuh 6 jam untuk mendapatkan daging yang sempurna dengan bumbu yang meresap.'],
                    ['title' => 'Tips Membuat Roti Lembut di Rumah', 'content' => 'Membuat roti ternyata tidak sesulit yang dibayangkan. Kunci utamanya adalah adonan yang diuleni dengan benar dan proses proofing yang cukup.'],
                ]
            ],
            [
                'name' => 'Andi Pratama',
                'email' => 'andi@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Backpacking ke Labuan Bajo', 'content' => 'Labuan Bajo adalah surga tersembunyi di Indonesia. Dengan budget minim, saya berhasil menikmati keindahan Pulau Komodo dan pantai-pantai indah lainnya.'],
                    ['title' => 'Solo Traveling ke Jepang', 'content' => 'Solo traveling ke Jepang memberikan pengalaman yang sangat berbeda. Menjelajahi Tokyo sendirian, mencoba makanan lokal, dan bertemu orang-orang baru.'],
                ]
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Review Game RPG Terbaik 2024', 'content' => 'Tahun ini banyak game RPG rilis dengan kualitas yang luar biasa. Berikut adalah daftar game RPG terbaik yang wajib dimainkan para gamer.'],
                    ['title' => 'Turnamen E-Sports Pertama Saya', 'content' => 'Mengikuti turnamen e-sports adalah pengalaman yang seru dan menegangkan. Meski tidak menang, saya belajar banyak tentang teamwork dan strategi.'],
                ]
            ],
            [
                'name' => 'Rian Hidayat',
                'email' => 'rian@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Belajar Gitar Selama Pandemi', 'content' => 'Pandemi menjadi kesempatan bagi saya untuk belajar gitar. Setelah berbulan-bulan berlatih, kini saya bisa memainkan lagu favorit saya.'],
                    ['title' => 'Membuat Home Studio', 'content' => 'Dengan peralatan yang sederhana, saya berhasil membangun home studio untuk merekam musik sendiri. Hasilnya cukup bagus untuk demo.'],
                ]
            ],
            [
                'name' => 'Maya Putri',
                'email' => 'maya@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Menurunkan Berat Badan 20kg', 'content' => 'Dalam 8 bulan, saya berhasil menurunkan berat badan 20kg dengan kombinasi diet sehat dan olahraga rutin. Kunci utamanya adalah konsistensi.'],
                    ['title' => 'Manfaat Yoga untuk Mental', 'content' => 'Yoga tidak hanya baik untuk fisik tapi juga untuk mental. Setelah rutin yoga, saya merasa lebih tenang dan fokus dalam menjalani hari.'],
                ]
            ],
            [
                'name' => 'Feri Wijaya',
                'email' => 'feri@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Belajar Flutter dalam 30 Hari', 'content' => 'Flutter adalah framework yang powerful untuk mobile development. Dalam sebulan, saya sudah bisa membuat aplikasi pertama saya.'],
                    ['title' => 'Tips Menjadi Fullstack Developer', 'content' => 'Perjalanan menjadi fullstack developer tidak mudah. Tapi dengan ketekunan dan terus belajar, siapapun bisa menjadi developer yang handal.'],
                ]
            ],
            [
                'name' => 'Linda Kartika',
                'email' => 'linda@example.com',
                'password' => bcrypt('password123'),
                'stories' => [
                    ['title' => 'Rekomendasi Buku Terbaik 2024', 'content' => 'Tahun ini saya membaca banyak buku bagus. Berikut adalah rekomendasi buku-buku yang wajib dibaca untuk meningkatkan wawasan.'],
                    ['title' => 'Menulis Novel Pertama', 'content' => 'Mewujudkan mimpi menulis novel tidak mudah. Butuh 2 tahun untuk menyelesaikan novel pertama saya tentang perjalanan hidup.'],
                ]
            ]
        ];

        // Insert users dan stories
        $storyCount = 0;
        foreach ($users as $index => $userData) {
            $stories = $userData['stories'];
            unset($userData['stories']);

            // Create user
            $user = User::create($userData);

            // Create stories untuk user tersebut
            foreach ($stories as $storyData) {
                Story::create([
                    'user_id' => $user->id,
                    'title' => $storyData['title'],
                    'content' => $storyData['content'],
                    'image' => 'https://via.placeholder.com/800x600?text=Story+' . ($index + 1),
                ]);
                $storyCount++;
            }
        }

        $this->command->info("✅ Berhasil membuat " . count($users) . " user dengan {$storyCount} cerita.");
    }
}

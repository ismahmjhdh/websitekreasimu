<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlide;
use App\Models\Agenda;
use App\Models\MapImage;

class BerandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hero Slides
        $heroSlides = [
            ['image_path' => 'images/FOTO BERANDA/refleksi dan konitor 3 sep .JPG', 'title' => 'Refleksi dan Monitoring', 'order' => 1],
            ['image_path' => 'images/FOTO BERANDA/Monitoring Sekolah Mentuban 1.10.25.JPG', 'title' => 'Monitoring Sekolah Mentubang', 'order' => 2],
            ['image_path' => 'images/FOTO BERANDA/meeting kreasi bersama lptk.JPG', 'title' => 'Meeting Kreasi bersama LPTK', 'order' => 3],
            ['image_path' => 'images/FOTO BERANDA/learning revitais 18.9.25.JPG', 'title' => 'Learning Revitalisasi', 'order' => 4],
            ['image_path' => 'images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpeg', 'title' => 'Kampanye Perlindungan Anak', 'order' => 5],
        ];

        foreach ($heroSlides as $slide) {
            HeroSlide::create($slide);
        }

        // Agendas
        $agendas = [
            [
                'title' => 'Kampanye Perlindungan Anak',
                'image_path' => 'images/gambar1.jpg',
                'date' => '2025-08-10',
                'description' => 'Kegiatan kampanye perlindungan anak di wilayah Ketapang.'
            ],
            [
                'title' => 'Monitoring Sekolah Mentubang',
                'image_path' => 'images/gambar2.jpg',
                'date' => '2025-10-01',
                'description' => 'Monitoring rutin di Sekolah Mentubang.'
            ],
            [
                'title' => 'Kampanye Perlindungan Anak SD Negeri 12 Pelerang',
                'image_path' => 'images/gambar3.jpg',
                'date' => '2025-11-11',
                'description' => 'Edukasi perlindungan anak di SD Negeri 12 Pelerang.'
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create($agenda);
        }

        // Map Images
        $maps = [
            ['title' => 'Peta Ketapang', 'image_path' => 'images/FOTO BERANDA/KETAPANG OK OK.png', 'order' => 1],
            ['title' => 'Peta Kayong Utara', 'image_path' => 'images/FOTO BERANDA/PETA KAYONG UTARA.png', 'order' => 2],
            ['title' => 'Peta 3', 'image_path' => 'images/FOTO BERANDA/kayog.png', 'order' => 3],
        ];

        foreach ($maps as $map) {
            MapImage::create($map);
        }
    }
}

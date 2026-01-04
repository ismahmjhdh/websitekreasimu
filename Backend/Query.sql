-- Active: 1763383163407@@127.0.0.1@3306


GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE DATABASE kreasiku;

USE kreasiku;


CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE berita (

	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    youtube_link VARCHAR(255),
    image_url VARCHAR(255),
    video_url VARCHAR(255),
    created_by INT NOT NULL,
    status ENUM('draft', 'published') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES admins(id)
);

CREATE TABLE materi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    thumbnail_url VARCHAR(255),
    access_password VARCHAR(255) NOT NULL, 
    related_news_id INT NULL,              
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (related_news_id) REFERENCES berita(id),
    FOREIGN KEY (created_by) REFERENCES admins(id)
);

CREATE TABLE hero_slides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    title VARCHAR(255),
    `order` INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE agendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE map_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    `order` INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Seed Beranda Data
INSERT INTO hero_slides (image_path, title, `order`) VALUES
('images/FOTO BERANDA/refleksi dan konitor 3 sep .JPG', 'Refleksi dan Monitoring', 1),
('images/FOTO BERANDA/Monitoring Sekolah Mentuban 1.10.25.JPG', 'Monitoring Sekolah Mentubang', 2),
('images/FOTO BERANDA/meeting kreasi bersama lptk.JPG', 'Meeting Kreasi bersama LPTK', 3),
('images/FOTO BERANDA/learning revitais 18.9.25.JPG', 'Learning Revitalisasi', 4),
('images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpeg', 'Kampanye Perlindungan Anak', 5);

INSERT INTO agendas (title, image_path, `date`, description) VALUES
('Kampanye Perlindungan Anak', 'images/gambar1.jpg', '2025-08-10', 'Kegiatan kampanye perlindungan anak di wilayah Ketapang.'),
('Monitoring Sekolah Mentubang', 'images/gambar2.jpg', '2025-10-01', 'Monitoring rutin di Sekolah Mentubang.'),
('Kampanye Perlindungan Anak SD Negeri 12 Pelerang', 'images/gambar3.jpg', '2025-11-11', 'Edukasi perlindungan anak di SD Negeri 12 Pelerang.');

INSERT INTO map_images (title, image_path, `order`) VALUES
('Peta Ketapang', 'images/FOTO BERANDA/KETAPANG OK OK.png', 1),
('Peta Kayong Utara', 'images/FOTO BERANDA/PETA KAYONG UTARA.png', 2),
('Peta 3', 'images/FOTO BERANDA/kayog.png', 3);



ALTER TABLE berita ADD COLUMN category ENUM('berita', 'buletin', 'praktik-baik') DEFAULT 'berita' AFTER status;

UPDATE berita SET category = 'berita' WHERE id IN (1, 2, 3);
UPDATE berita SET category = 'buletin' WHERE id IN (4, 5, 6);
UPDATE berita SET category = 'praktik-baik' WHERE id IN (7, 8, 9);

INSERT INTO admins (username, password, created_at) VALUES
('admin', '0m3g44lf4', NOW()),
('superadmin', 'akuganteng', NOW());


INSERT INTO berita (title, content, youtube_link, image_url, video_url, created_by, status, created_at) VALUES
(
    'KREASI Kayong Utara Gelar Kampanye Perlindungan Anak',
    'Kampanye Perlindungan Anak digelar meriah di Pantai Pulau Datok, Sukadana, Kayong Utara pada Minggu (10/8/2025). Acara ini resmi dibuka Sekretaris Daerah Kabupaten Kayong Utara, Erwin Sudrajat, dan dihadiri oleh Direktur KREASI Kalimantan Barat, Gufron Amirullah. Kegiatan ini bertujuan untuk meningkatkan kesadaran masyarakat tentang pentingnya perlindungan anak dari segala bentuk kekerasan dan eksploitasi. Dalam acara tersebut, terdapat berbagai kegiatan edukatif seperti penyuluhan, games interaktif, dan kampanye kreatif yang melibatkan anak-anak, orang tua, guru, dan masyarakat umum. Para peserta sangat antusias mengikuti setiap sesi yang diberikan.',
    'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpeg',
    NULL,
    1,
    'published',
    '2025-08-10 10:00:00'
),
(
    'MAJELIS DIKDASMEN PNF PP MUHAMMADIYAH MENDAPATKAN PENGHARGAAN DARI BGTK KALIMANTAN BARAT',
    'Pada momen upacara peringatan HUT RI ke-80, Balai Guru dan Tenaga Kependidikan (BGTK) Provinsi Kalimantan Barat memberikan penghargaan kepada Majelis Dikdasmen PNF PP Muhammadiyah. Penghargaan ini diberikan sebagai bentuk apresiasi atas dedikasi dan kontribusi luar biasa dalam meningkatkan kualitas pendidikan di Kalimantan Barat. Majelis Dikdasmen PNF PP Muhammadiyah telah konsisten melakukan berbagai program inovatif untuk meningkatkan kompetensi guru dan tenaga kependidikan. Berbagai pelatihan, workshop, dan pendampingan telah dilaksanakan secara berkelanjutan untuk mewujudkan pendidikan yang berkualitas dan merata.',
    NULL,
    'images/FOTO BERITA/majelis dikdasmen 17.8.25.jpg',
    NULL,
    1,
    'published',
    '2025-08-17 14:30:00'
),
(
    'KREASI Kayong Utara Perkuat Unit Layanan Disabilitas',
    'KREASI Kayong Utara melakukan aktivasi penguatan Unit Layanan Disabilitas (ULD) di Bidang Pendidikan, sebagai bentuk komitmen bersama dalam mewujudkan pendidikan yang inklusif bagi semua anak, termasuk penyandang disabilitas di Sukadana pada Jumat (29/8/2025). Kegiatan ini melibatkan berbagai stakeholder pendidikan mulai dari Dinas Pendidikan, kepala sekolah, guru, dan komunitas peduli disabilitas. Dalam sesi penguatan ini, para peserta mendapatkan pemahaman mendalam tentang pentingnya layanan pendidikan inklusif, strategi pembelajaran yang adaptif, serta cara mengidentifikasi dan memenuhi kebutuhan khusus peserta didik penyandang disabilitas. ULD ini akan menjadi pusat layanan yang menyediakan asesmen, konsultasi, dan pendampingan bagi sekolah-sekolah yang memiliki siswa berkebutuhan khusus.',
    NULL,
    'images/FOTO BERITA/layanan disabilitas 29.8.25.JPG',
    NULL,
    1,
    'published',
    '2025-08-29 09:15:00'
);

INSERT INTO berita (title, content, youtube_link, image_url, video_url, created_by, status, created_at) VALUES
(
    'Buletin KREASI Edisi September 2025: Transformasi Pendidikan Berkelanjutan',
    'Buletin KREASI edisi September 2025 menghadirkan berbagai informasi terkini seputar program-program unggulan KREASI dalam mendukung transformasi pendidikan di Indonesia. Dalam edisi kali ini, kami menyoroti pencapaian luar biasa dari berbagai daerah mitra yang telah berhasil mengimplementasikan model pembelajaran inovatif. Beberapa highlight utama meliputi: peningkatan literasi digital di sekolah-sekolah pelosok, program pelatihan guru berbasis kompetensi, dan inisiatif pengembangan kurikulum yang responsif terhadap kebutuhan lokal. Buletin ini juga memuat testimoni dari para guru dan kepala sekolah yang merasakan dampak positif dari program KREASI, serta artikel inspiratif tentang best practices dalam pengelolaan kelas dan pembelajaran aktif.',
    NULL,
    'images/FOTO BERITA/buletin-september.jpg',
    NULL,
    1,
    'published',
    '2025-09-01 08:00:00'
),
(
    'Buletin Khusus: Inovasi Pembelajaran Pasca Pandemi',
    'Edisi khusus buletin KREASI kali ini mengulas bagaimana dunia pendidikan beradaptasi dengan kondisi new normal pasca pandemi. Berbagai inovasi pembelajaran hybrid yang menggabungkan tatap muka dan daring telah dikembangkan oleh para pendidik di berbagai daerah. Kami mewawancarai beberapa guru inspiratif yang berhasil menciptakan metode pembelajaran kreatif menggunakan teknologi sederhana namun efektif. Buletin ini juga membahas tantangan yang dihadapi sekolah-sekolah dalam memastikan tidak ada anak yang tertinggal dalam pembelajaran, serta solusi-solusi inovatif yang telah terbukti berhasil meningkatkan engagement dan hasil belajar siswa. Termasuk di dalamnya adalah panduan praktis penggunaan media pembelajaran digital yang dapat diterapkan dengan sumber daya terbatas.',
    'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'images/FOTO BERITA/buletin-inovasi.jpg',
    NULL,
    1,
    'published',
    '2025-09-15 10:30:00'
),
(
    'Buletin KREASI: Laporan Tahunan Program Literasi 2025',
    'Buletin laporan tahunan ini menyajikan evaluasi komprehensif terhadap program literasi KREASI sepanjang tahun 2025. Data menunjukkan peningkatan signifikan dalam kemampuan membaca dan menulis siswa di 150 sekolah mitra di 5 provinsi. Program reading corner yang diinisiasi di awal tahun telah berhasil meningkatkan minat baca siswa hingga 65%. Selain itu, pelatihan guru dalam mengintegrasikan literasi ke dalam berbagai mata pelajaran juga menunjukkan hasil positif. Buletin ini dilengkapi dengan infografis menarik, data statistik, dan cerita sukses dari berbagai sekolah. Kami juga menyertakan rekomendasi strategis untuk pengembangan program literasi di tahun mendatang, termasuk ekspansi ke daerah-daerah 3T (Terdepan, Terluar, Tertinggal) dan penguatan kemitraan dengan berbagai stakeholder pendidikan.',
    NULL,
    'images/FOTO BERITA/buletin-literasi.jpg',
    NULL,
    1,
    'published',
    '2025-12-20 13:00:00'
);

-- Insert data dummy untuk kategori Praktik Baik
INSERT INTO berita (title, content, youtube_link, image_url, video_url, created_by, status, created_at) VALUES
(
    'Praktik Baik: Pembelajaran Berbasis Proyek di SDN 05 Sukadana',
    'SDN 05 Sukadana berhasil mengimplementasikan pembelajaran berbasis proyek yang melibatkan siswa secara aktif dalam menyelesaikan masalah nyata di lingkungan sekitar. Guru-guru di sekolah ini mengembangkan proyek "Sekolahku Bersih dan Hijau" yang mengintegrasikan berbagai mata pelajaran seperti IPA, Matematika, Bahasa Indonesia, dan Seni Budaya. Siswa belajar membuat kompos dari sampah organik sekolah, menghitung volume dan berat sampah yang dikumpulkan, menulis laporan observasi, serta membuat poster kampanye kebersihan. Hasilnya sangat menggembirakan: siswa lebih antusias belajar, pemahaman konsep lebih mendalam, dan lingkungan sekolah menjadi lebih bersih dan asri. Kepala sekolah menyatakan bahwa pendekatan ini tidak hanya meningkatkan prestasi akademik, tetapi juga menumbuhkan karakter peduli lingkungan dan keterampilan abad 21 seperti kolaborasi, kreativitas, dan critical thinking.',
    'https://www.youtube.com/embed/dQw4w9WgXcQ',
    'images/FOTO BERITA/praktik-baik-pbp.jpg',
    NULL,
    1,
    'published',
    '2025-10-05 11:00:00'
),
(
    'Pertemuan Monitoring TPPK dan PATBM di Lingkungan Sekolah dan Masyarakat Kabupaten Kayong Utara',
    'Sukadana, Kamis, 4 September 2025, telah dilaksanakan Pertemuan Monitoring Tim Pencegahan dan Penanganan Kekerasan (TPPK) serta Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM) di lingkungan sekolah dan masyarakat Kabupaten Kayong Utara. Pertemuan ini menghadirkan berbagai pihak terkait seperti Dinas Pendidikan, Dinas Sosial, Kepolisian, perwakilan sekolah, dan tokoh masyarakat. Dalam monitoring ini, dilakukan evaluasi terhadap efektivitas sistem pelaporan dan penanganan kasus kekerasan terhadap anak di sekolah. Hasilnya menunjukkan bahwa sejak dibentuknya TPPK di sekolah-sekolah, terjadi peningkatan kesadaran warga sekolah dalam melaporkan dan mencegah kekerasan. Beberapa praktik baik yang ditemukan antara lain: pembentukan pojok curhat aman bagi siswa, pelatihan rutin guru tentang deteksi dini kekerasan, dan kolaborasi erat antara sekolah dengan PATBM di masyarakat.',
    NULL,
    'images/FOTO BERITA/monitoring tppk dan patmb 4.9.25.JPG',
    NULL,
    1,
    'published',
    '2025-09-04 15:45:00'
),
(
    'Praktik Baik: Model Pembelajaran Diferensiasi untuk Siswa Beragam',
    'SMPN 3 Kayong Utara menjadi sekolah percontohan dalam implementasi pembelajaran diferensiasi yang mengakomodasi keberagaman siswa. Bu Siti Aminah, guru Bahasa Indonesia, berbagi pengalamannya menerapkan strategi pembelajaran yang disesuaikan dengan kesiapan, minat, dan profil belajar siswa. Dalam kelasnya, siswa dengan kemampuan berbeda mendapatkan tugas yang sesuai dengan level mereka, namun tetap mengarah pada tujuan pembelajaran yang sama. Misalnya, untuk materi teks deskripsi, siswa yang lebih mahir diminta membuat deskripsi kompleks dengan berbagai majas, sementara siswa yang masih perlu bimbingan diberikan template dan contoh konkret. Bu Siti juga menggunakan berbagai media pembelajaran mulai dari visual, audio, hingga kinestetik. Hasilnya luar biasa: tidak ada siswa yang merasa tertinggal atau bosan, semua siswa terlibat aktif, dan nilai rata-rata kelas meningkat 20 poin. Praktik baik ini telah didiseminasikan ke sekolah-sekolah lain melalui workshop MGMP.',
    NULL,
    'images/FOTO BERITA/praktik-baik-diferensiasi.jpg',
    NULL,
    1,
    'published',
    '2025-11-10 09:30:00'
);
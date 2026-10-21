<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\CommunityService;
use App\Models\Education;
use App\Models\Experience;
use App\Models\PortfolioProject;
use App\Models\Profile;
use App\Models\ProjectCategory;
use App\Models\Publication;
use App\Models\ResearchProject;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Tag;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        $user = User::updateOrCreate(
            ['email' => 'erikaktama@parnaraya.ac.id'],
            [
                'name' => 'Gede Erik Aktama, S.Pd., M.Pd.',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Profile
        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => 'Gede Erik Aktama, S.Pd., M.Pd.',
                'nickname' => 'Erik',
                'title_prefix' => null,
                'title_suffix' => 'S.Pd., M.Pd.',
                'primary_role' => 'Dosen Program Studi Sistem Komputer, Universitas Parna Raya',
                'secondary_role' => 'Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) Kemdikdasmen',
                'tertiary_role' => 'Ketua Program Studi Sistem Komputer',
                'business_role' => 'CEO PT Aktama Digital Antika',
                'tagline' => 'Akademisi, Inovator Teknologi, dan Penggerak Transformasi Digital.',
                'short_bio' => 'Dosen pada Program Studi Sistem Komputer Universitas Parna Raya (UNIPAR) Manado, Fasilitator Nasional KKA Kemdikdasmen, serta CEO PT Aktama Digital Antika. Aktif dalam riset kecerdasan artifisial, computer vision, IoT, kurikulum OBE, dan tata kelola RPL.',
                'full_bio' => 'Gede Erik Aktama, S.Pd., M.Pd. adalah akademisi dan praktisi teknologi berbasis di Manado, Sulawesi Utara. Mengabdi sebagai Dosen Tetap dan Ketua Program Studi Sistem Komputer di Universitas Parna Raya (UNIPAR), beliau juga dipercaya sebagai Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) oleh Kemdikdasmen. Berfokus pada implementasi praktis model deep learning berbobot ringan, otomasi sistem kendali jarak jauh berbasis IoT, serta pendampingan UMKM dan instansi dalam adopsi teknologi cerdas.',
                'avatar_url' => 'images/profile.png',
                'cv_file_url' => null,
                'location' => 'Manado, Sulawesi Utara, Indonesia',
                'email' => 'erikaktama@parnaraya.ac.id',
                'phone' => '+62 821-xxxx-xxxx',
                'whatsapp' => '62821xxxxxxxx',
                'is_active' => true,
            ]
        );

        // 3. Educations
        $educations = [
            [
                'degree' => 'Magister Pendidikan (M.Pd.)',
                'institution' => 'Pendidikan Pascasarjana Terakreditasi',
                'field_of_study' => 'Teknologi Pendidikan & Ilmu Komputasi',
                'start_year' => '2019',
                'end_year' => '2021',
                'description' => 'Fokus kajian pada pengembangan model pembelajaran berbasis komputasi, kecerdasan artifisial, dan kurikulum pendidikan modern.',
                'order' => 1,
            ],
            [
                'degree' => 'Sarjana Pendidikan (S.Pd.)',
                'institution' => 'Pendidikan Sarjana',
                'field_of_study' => 'Pendidikan Teknologi Informasi & Komputer',
                'start_year' => '2014',
                'end_year' => '2018',
                'description' => 'Fokus pada fondasi rekayasa perangkat lunak, sistem komputer, algoritma pemrograman, dan jaringan komputer.',
                'order' => 2,
            ],
        ];
        foreach ($educations as $edu) {
            Education::updateOrCreate(['degree' => $edu['degree'], 'institution' => $edu['institution']], $edu);
        }

        // 4. Experiences
        $experiences = [
            [
                'position' => 'Ketua Program Studi Sistem Komputer',
                'organization' => 'Universitas Parna Raya (UNIPAR)',
                'category' => 'academic',
                'start_date' => '2023',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Memimpin tata kelola akademik, penyusunan kurikulum OBE, instrumen akreditasi program studi, dan penguatan riset dosen mahasiswa.',
                'order' => 1,
            ],
            [
                'position' => 'Dosen Tetap Program Studi Sistem Komputer',
                'organization' => 'Universitas Parna Raya (UNIPAR)',
                'category' => 'academic',
                'start_date' => '2021',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Mengampu mata kuliah Visi Komputer, Machine Learning, Deep Learning, Pemrograman Web, Internet of Things, dan Jaringan Komputer.',
                'order' => 2,
            ],
            [
                'position' => 'Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA)',
                'organization' => 'Kemdikdasmen RI',
                'category' => 'national',
                'start_date' => '2024',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Mengakselerasi literasi koding dan kecerdasan artifisial bagi pendidik di tingkat nasional dalam ekosistem pendidikan dasar dan menengah.',
                'order' => 3,
            ],
            [
                'position' => 'CEO & Founder',
                'organization' => 'PT Aktama Digital Antika (Aktama Digital)',
                'category' => 'industry',
                'start_date' => '2022',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Menyediakan solusi transformasi digital, pelatihan teknologi perkantoran, implementasi AI praktis, dan pelatihan jaringan.',
                'order' => 4,
            ],
            [
                'position' => 'Asesor & Pengelola Rekognisi Pembelajaran Lampau (RPL)',
                'organization' => 'Universitas Parna Raya (UNIPAR)',
                'category' => 'academic',
                'start_date' => '2023',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Mengelola instrumen asesmen dan implementasi Kepdirjen 91 Tahun 2024 untuk konversi portofolio profesional menjadi SKS akademik.',
                'order' => 5,
            ],
        ];
        foreach ($experiences as $exp) {
            Experience::updateOrCreate(['position' => $exp['position'], 'organization' => $exp['organization']], $exp);
        }

        // 5. Skills
        $skills = [
            ['name' => 'Artificial Intelligence & Machine Learning', 'category' => 'ai_data', 'proficiency' => 95, 'order' => 1],
            ['name' => 'Computer Vision & Human Detection', 'category' => 'ai_data', 'proficiency' => 93, 'order' => 2],
            ['name' => 'Lightweight Deep Learning', 'category' => 'ai_data', 'proficiency' => 90, 'order' => 3],
            ['name' => 'Python & TensorFlow / PyTorch', 'category' => 'ai_data', 'proficiency' => 92, 'order' => 4],
            ['name' => 'Internet of Things (IoT) & Smart Control', 'category' => 'systems_iot', 'proficiency' => 90, 'order' => 5],
            ['name' => 'Jaringan Komputer & Sistem Operasi', 'category' => 'systems_iot', 'proficiency' => 88, 'order' => 6],
            ['name' => 'Pemrograman Web (HTML, CSS, JS, PHP)', 'category' => 'web_software', 'proficiency' => 90, 'order' => 7],
            ['name' => 'WordPress CMS & Google Analytics', 'category' => 'digital_marketing', 'proficiency' => 88, 'order' => 8],
            ['name' => 'Penyusunan Kurikulum OBE & RPS 1-16', 'category' => 'academic_curriculum', 'proficiency' => 96, 'order' => 9],
            ['name' => 'Asesmen RPL (Kepdirjen 91 Tahun 2024)', 'category' => 'academic_curriculum', 'proficiency' => 95, 'order' => 10],
            ['name' => 'Digital Marketing & Content Strategy', 'category' => 'digital_marketing', 'proficiency' => 86, 'order' => 11],
            ['name' => 'Manajemen Sitasi (Mendeley / Zotero)', 'category' => 'academic_curriculum', 'proficiency' => 94, 'order' => 12],
        ];
        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // 6. Publications
        $publications = [
            [
                'title' => 'Speedy Vision-based Human Detection Using Lightweight Deep Learning Network',
                'slug' => 'speedy-vision-based-human-detection-using-lightweight-deep-learning-network',
                'authors' => 'Gede Erik Aktama, dkk.',
                'is_first_author' => true,
                'publication_year' => 2023,
                'journal_name' => 'Jurnal Nasional Teknologi Informasi Terakreditasi',
                'indexing_status' => 'SINTA 4',
                'volume' => 'Vol. 8',
                'issue' => 'No. 2',
                'pages' => '115-124',
                'abstract' => 'Penelitian ini menghadirkan rancangan arsitektur deep learning berbobot ringan untuk deteksi objek manusia berbasis visi komputer yang efisien dan cepat, optimal untuk perangkat komputasi tepi (edge computing) dengan keterbatasan daya.',
                'keywords' => 'Computer Vision, Deep Learning, Human Detection, Lightweight Neural Network',
                'category' => 'Computer Vision & AI',
                'url' => 'https://sinta.kemdikbud.go.id/',
                'is_published' => true,
                'order' => 1,
            ],
            [
                'title' => 'Desain Sistem Kendali Listrik Jarak Jauh Berbasis Internet of Things',
                'slug' => 'desain-sistem-kendali-listrik-jarak-jauh-berbasis-internet-of-things',
                'authors' => 'Gede Erik Aktama, dkk.',
                'is_first_author' => false,
                'publication_year' => 2022,
                'journal_name' => 'Jurnal Sistem Komputer dan Otomasi',
                'indexing_status' => 'SINTA 5',
                'volume' => 'Vol. 5',
                'issue' => 'No. 1',
                'pages' => '45-52',
                'abstract' => 'Rancang bangun sistem kendali daya listrik terdistribusi yang memanfaatkan protokol komunikasi IoT untuk pemantauan sakelar dan beban listrik jarak jauh secara aman, real-time, dan hemat energi.',
                'keywords' => 'Internet of Things, Smart Control, Embedded Systems, Remote Switching',
                'category' => 'Internet of Things (IoT)',
                'url' => 'https://sinta.kemdikbud.go.id/',
                'is_published' => true,
                'order' => 2,
            ],
            [
                'title' => 'Analisis Algoritma Klasifikasi Machine Learning pada Sistem Komputer Cerdas',
                'slug' => 'analisis-algoritma-klasifikasi-machine-learning-pada-sistem-komputer-cerdas',
                'authors' => 'Gede Erik Aktama',
                'is_first_author' => true,
                'publication_year' => 2023,
                'journal_name' => 'Jurnal Riset Komputasi dan Informatika',
                'indexing_status' => 'Jurnal Nasional Terindeks',
                'volume' => 'Vol. 6',
                'issue' => 'No. 2',
                'pages' => '88-97',
                'abstract' => 'Kajian komparatif performa algoritma Decision Tree dan Random Forest dalam mengoptimalkan akurasi pengenalan pola dan klasifikasi data sistem komputasi berkinerja tinggi.',
                'keywords' => 'Machine Learning, Decision Tree, Random Forest, Computational Performance',
                'category' => 'Machine Learning',
                'is_published' => true,
                'order' => 3,
            ],
        ];
        foreach ($publications as $pub) {
            Publication::updateOrCreate(['slug' => $pub['slug']], $pub);
        }

        // 7. Research Projects
        $researchProjects = [
            [
                'title' => 'Model Deteksi Objek Cerdas Berdaya Komputasi Ringan untuk Keamanan Lingkungan',
                'slug' => 'model-deteksi-objek-cerdas-berdaya-komputasi-ringan',
                'category' => 'research',
                'year' => '2023 - 2024',
                'role' => 'Ketua Peneliti',
                'funding_source' => 'Hibah Penelitian Perguruan Tinggi',
                'partner_institution' => 'Universitas Parna Raya',
                'summary' => 'Mengembangkan pipeline deteksi visi komputer yang dioptimasi untuk berjalan pada prosesor berdaya rendah tanpa kartu grafis khusus.',
                'output_results' => 'Prototipe sistem deteksi real-time, publikasi jurnal terakreditasi SINTA 4, dan modul pembelajaran Visi Komputer.',
                'image_url' => 'images/research-ai.jpg',
                'status' => 'completed',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Implementasi Jaringan Sensor IoT untuk Otomasi Pemantauan Energi Kampus',
                'slug' => 'implementasi-jaringan-sensor-iot-untuk-otomasi-pemantauan-energi-kampus',
                'category' => 'research',
                'year' => '2022 - 2023',
                'role' => 'Peneliti Utama',
                'funding_source' => 'Mandiri & Kemitraan',
                'partner_institution' => 'Laboratorium Sistem Komputer UNIPAR',
                'summary' => 'Rancang bangun sistem telemetri konsumsi daya listrik antar laboratorium berbasis dashboard web dan mikrokontroler.',
                'output_results' => 'Alat monitoring terpasang, artikel jurnal terakreditasi SINTA 5, dan dokumentasi open architecture.',
                'image_url' => 'images/research-ai.jpg',
                'status' => 'completed',
                'is_featured' => true,
                'order' => 2,
            ],
        ];
        foreach ($researchProjects as $rp) {
            ResearchProject::updateOrCreate(['slug' => $rp['slug']], $rp);
        }

        // 8. Community Services (PKM)
        $communityServices = [
            [
                'title' => 'Pemanfaatan Digital Marketing Dalam Pemasaran Produk Rumah Panggung di Kelurahan Woloan Kecamatan Tomohon Barat Kota Tomohon',
                'slug' => 'digital-marketing-rumah-panggung-woloan-tomohon',
                'location' => 'Kelurahan Woloan, Tomohon Barat, Kota Tomohon, Sulawesi Utara',
                'partner' => 'Woloan Jaya',
                'partner_website' => 'https://woloanjaya.com/',
                'year' => '2023',
                'role' => 'Ketua Pelaksana Pengabdian Masyarakat',
                'description' => 'Program pendampingan dan digitalisasi bagi pengrajin industri tradisional rumah panggung kayu khas Minahasa. Mencakup pelatihan dasar pemasaran digital, pengembangan situs resmi berbasis WordPress teroptimasi SEO, pemanfaatan Google Analytics untuk analisis pasar mancanegara, serta pelibatan mahasiswa dalam skema MBKM.',
                'outcomes' => 'Situs resmi woloanjaya.com aktif beroperasi, peningkatan jangkauan pemesanan rumah panggung antar-provinsi dan ekspor, serta peningkatan literasi digital mitra industri.',
                'image_url' => 'images/workshop-seminar.jpg',
                'is_featured' => true,
                'order' => 1,
            ],
        ];
        foreach ($communityServices as $cs) {
            CommunityService::updateOrCreate(['slug' => $cs['slug']], $cs);
        }

        // 9. Trainings
        $trainings = [
            [
                'title' => 'Pemanfaatan Artificial Intelligence (AI) dalam Meningkatkan Efisiensi Pekerjaan Administratif',
                'slug' => 'pemanfaatan-ai-efisiensi-pekerjaan-administratif-polres-mitra',
                'theme' => 'Kecerdasan Artifisial & Otomasi Perkantoran',
                'organizer' => 'Kepolisian Resor Minahasa Tenggara',
                'role' => 'Pemateri Utama',
                'event_date' => '2024-03-15',
                'location' => 'Polres Minahasa Tenggara, Sulawesi Utara',
                'description' => 'Pelatihan terapan bagi personil kepolisian untuk memanfaatkan AI dalam otomasi drafting dokumen dinas, perumusan laporan administratif terstruktur, serta penerapan tata kelola keamanan informasi dinas.',
                'image_url' => 'images/workshop-seminar.jpg',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Bimbingan Teknis Fasilitator Koding dan Kecerdasan Artifisial (KKA)',
                'slug' => 'bimtek-fasilitator-koding-dan-kecerdasan-artifisial-kemdikdasmen',
                'theme' => 'Diseminasi Literasi Digital & AI Pendidikan Indonesia',
                'organizer' => 'Kemdikdasmen RI',
                'role' => 'Fasilitator Nasional',
                'event_date' => '2024-06-20',
                'location' => 'Tingkat Nasional / Daring & Luring',
                'description' => 'Program penguatan kompetensi pedagogis dan komputasional bagi pendidik di seluruh penjuru Indonesia dalam mengadopsi modul KKA sesuai kurikulum nasional.',
                'image_url' => 'images/workshop-seminar.jpg',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Pelatihan Masterclass Microsoft Word & Manajemen Dokumen Akademik Formal',
                'slug' => 'pelatihan-microsoft-word-manajemen-dokumen-akademik',
                'theme' => 'Produktivitas & Standarisasi Dokumen',
                'organizer' => 'Aktama Digital (PT Aktama Digital Antika)',
                'role' => 'Instruktur Utama',
                'event_date' => '2024-05-10',
                'location' => 'Manado, Sulawesi Utara',
                'description' => 'Pelatihan mendalam penyusunan dokumen SK, SOP, LED Akreditasi, dan buku pedoman menggunakan fitur style otomatis, penomoran terpadu, dan sitasi terintegrasi.',
                'image_url' => 'images/workshop-seminar.jpg',
                'is_featured' => true,
                'order' => 3,
            ],
        ];
        foreach ($trainings as $tr) {
            Training::updateOrCreate(['slug' => $tr['slug']], $tr);
        }

        // 10. Project Categories & Portfolio Projects
        $catAi = ProjectCategory::updateOrCreate(
            ['slug' => 'ai-and-computer-vision'],
            ['name' => 'Artificial Intelligence & Computer Vision', 'order' => 1]
        );
        $catIot = ProjectCategory::updateOrCreate(
            ['slug' => 'iot-and-embedded-systems'],
            ['name' => 'Internet of Things (IoT) & Smart Control', 'order' => 2]
        );
        $catWeb = ProjectCategory::updateOrCreate(
            ['slug' => 'web-and-software-development'],
            ['name' => 'Web Development & Digital Marketing', 'order' => 3]
        );

        $projects = [
            [
                'project_category_id' => $catAi->id,
                'title' => 'Lightweight Vision Human Detection Engine',
                'slug' => 'lightweight-vision-human-detection-engine',
                'problem_statement' => 'Sistem deteksi objek konvensional seringkali memerlukan server GPU berbiaya tinggi yang tidak realistis untuk penggunaan skala luas di instansi daerah.',
                'solution_description' => 'Membangun arsitektur inferensi deep learning yang dipangkas dan dioptimasi sehingga mampu melakukan pelacakan manusia secara real-time pada CPU standar.',
                'technologies' => ['Python', 'TensorFlow', 'OpenCV', 'FastAPI'],
                'key_features' => "• Inferensi real-time >30 FPS pada CPU\n• Akurasi deteksi tinggi dalam berbagai sudut pencahayaan\n• Integrasi stream RTSP kamera pengawas",
                'image_url' => 'images/research-ai.jpg',
                'status' => 'completed',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'project_category_id' => $catIot->id,
                'title' => 'Smart Remote Electrical Switch & Monitoring System',
                'slug' => 'smart-remote-electrical-switch-monitoring-system',
                'problem_statement' => 'Pemborosan daya listrik dan risiko beban berlebih akibat sistem sakelar manual yang tidak dapat dipantau dari jarak jauh.',
                'solution_description' => 'Purwarupa sakelar pintar berbasis mikrokontroler dengan konektivitas cloud yang memungkinkan kontrol daya secara remote dan penjadwalan terotomasi.',
                'technologies' => ['IoT Firmware', 'ESP32', 'MQTT', 'Node.js', 'REST API'],
                'key_features' => "• Pengendalian sakelar multi-kanal real-time\n• Proteksi cut-off otomatis beban lebih\n• Dashboard analitik konsumsi daya listrik harian",
                'image_url' => 'images/research-ai.jpg',
                'status' => 'completed',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'project_category_id' => $catWeb->id,
                'title' => 'Website & Portal Digital Marketing Rumah Panggung Woloan',
                'slug' => 'portal-digital-marketing-rumah-panggung-woloan',
                'problem_statement' => 'Keterbatasan akses pasar bagi produk kerajinan kayu bernilai tinggi karena pemasaran yang sebelumnya masih bergantung pada promosi konvensional.',
                'solution_description' => 'Membangun web showcase interaktif woloanjaya.com dengan optimasi SEO internasional, katalog 3D visualisasi rumah panggung, dan integrasi analitik pengunjung.',
                'technologies' => ['WordPress', 'PHP', 'Google Analytics', 'SEO Architecture'],
                'key_features' => "• Tampilan responsif dengan katalog portofolio produk kayu\n• Integrasi lead generation via WhatsApp langsung\n• Pelacakan conversion Google Analytics",
                'image_url' => 'images/workshop-seminar.jpg',
                'demo_url' => 'https://woloanjaya.com/',
                'status' => 'completed',
                'is_featured' => true,
                'order' => 3,
            ],
        ];
        foreach ($projects as $proj) {
            PortfolioProject::updateOrCreate(['slug' => $proj['slug']], $proj);
        }

        // 11. Blog Categories, Tags, and Posts
        $catBlogAi = BlogCategory::updateOrCreate(
            ['slug' => 'kecerdasan-artifisial'],
            ['name' => 'Kecerdasan Artifisial', 'description' => 'Wawasan dan panduan implementasi praktis AI dan Machine Learning.']
        );
        $catBlogEdu = BlogCategory::updateOrCreate(
            ['slug' => 'pendidikan-dan-akademik'],
            ['name' => 'Pendidikan & Akademik', 'description' => 'Praktik kurikulum OBE, asesmen RPL, dan teknologi pembelajaran tinggi.']
        );

        $tagAi = Tag::updateOrCreate(['slug' => 'ai'], ['name' => 'Artificial Intelligence']);
        $tagEdu = Tag::updateOrCreate(['slug' => 'kurikulum-obe'], ['name' => 'Kurikulum OBE']);
        $tagRpl = Tag::updateOrCreate(['slug' => 'rpl'], ['name' => 'RPL 2024']);

        $blogPost1 = BlogPost::updateOrCreate(
            ['slug' => 'pemanfaatan-kecerdasan-artifisial-untuk-efisiensi-pekerjaan-administratif'],
            [
                'blog_category_id' => $catBlogAi->id,
                'user_id' => $user->id,
                'title' => 'Pemanfaatan Kecerdasan Artifisial untuk Efisiensi Pekerjaan Administratif',
                'summary' => 'Bagaimana asisten AI modern dapat merevolusi penyusunan dokumen, otomasi rekapitulasi, dan pelaporan dinas secara cepat dan beretika.',
                'content' => "<p>Dalam lanskap institusi dan birokrasi modern, beban kerja administratif kerap menyita porsi waktu terbesar aparatur maupun tenaga kependidikan. Pemanfaatan <strong>Kecerdasan Artifisial (KA / AI)</strong> bukan untuk menggantikan peran manusia, melainkan sebagai instrumen amplifikasi produktivitas.</p><p>Melalui penerapan structured prompt engineering, penyusunan naskah dinas, formulasi SOP, hingga ringkasan laporan operasional dapat diselesaikan dalam hitungan menit dengan tetap menjaga akurasi substansial.</p>",
                'featured_image' => 'images/workshop-seminar.jpg',
                'reading_time_minutes' => 4,
                'seo_title' => 'Pemanfaatan AI untuk Efisiensi Pekerjaan Administratif | Gede Erik Aktama',
                'meta_description' => 'Panduan praktis implementasi artificial intelligence dalam efisiensi dokumen dinas dan administrasi oleh Gede Erik Aktama.',
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'is_featured' => true,
                'views_count' => 142,
            ]
        );
        $blogPost1->tags()->sync([$tagAi->id]);

        $blogPost2 = BlogPost::updateOrCreate(
            ['slug' => 'panduan-implementasi-rpl-berdasarkan-kepdirjen-91-tahun-2024'],
            [
                'blog_category_id' => $catBlogEdu->id,
                'user_id' => $user->id,
                'title' => 'Panduan Implementasi RPL Berdasarkan Kepdirjen 91 Tahun 2024 di Perguruan Tinggi',
                'summary' => 'Memahami tata kelola Rekognisi Pembelajaran Lampau (RPL) untuk menjamin keabsahan konversi pengalaman profesional menjadi capaian pembelajaran lulusan.',
                'content' => "<p>Rekognisi Pembelajaran Lampau (RPL) merupakan terobosan krusial dalam memperluas akses pendidikan tinggi di Indonesia. Terbitnya <strong>Keputusan Direktur Jenderal Pendidikan Tinggi No. 91 Tahun 2024</strong> memberikan kepastian hukum dan tata kelola yang transparan bagi perguruan tinggi.</p><p>Sebagai asesor, penting untuk menyusun rubrik penilaian portofolio yang terukur dan berpadanan langsung dengan Capaian Pembelajaran Lulusan (CPL) program studi.</p>",
                'featured_image' => 'images/research-ai.jpg',
                'reading_time_minutes' => 6,
                'seo_title' => 'Tata Kelola RPL Sesuai Kepdirjen 91 Tahun 2024 | Gede Erik Aktama',
                'meta_description' => 'Ulasan akademik mengenai penerapan asesmen RPL dan SOP perguruan tinggi berbasis Kepdirjen 91/2024 oleh Gede Erik Aktama.',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'is_featured' => true,
                'views_count' => 98,
            ]
        );
        $blogPost2->tags()->sync([$tagEdu->id, $tagRpl->id]);

        // 12. Social Links
        $socialLinks = [
            ['platform' => 'Website Kampus', 'url' => 'https://www.parnaraya.ac.id', 'icon' => 'globe', 'label' => 'Universitas Parna Raya', 'order' => 1],
            ['platform' => 'Mitra PKM', 'url' => 'https://woloanjaya.com/', 'icon' => 'external-link', 'label' => 'Woloan Jaya', 'order' => 2],
            ['platform' => 'Email', 'url' => 'mailto:erikaktama@parnaraya.ac.id', 'icon' => 'mail', 'label' => 'erikaktama@parnaraya.ac.id', 'order' => 3],
        ];
        foreach ($socialLinks as $sl) {
            SocialLink::updateOrCreate(['platform' => $sl['platform']], $sl);
        }

        // 13. Site Settings
        $settings = [
            ['key' => 'site_title', 'value' => 'Gede Erik Aktama — Personal Portfolio', 'group' => 'general', 'type' => 'text'],
            ['key' => 'tagline', 'value' => 'Akademisi, Inovator Teknologi, dan Penggerak Transformasi Digital.', 'group' => 'general', 'type' => 'text'],
            ['key' => 'institution', 'value' => 'Universitas Parna Raya (UNIPAR) Manado', 'group' => 'general', 'type' => 'text'],
            ['key' => 'homebase_prodi', 'value' => 'Program Studi Sistem Komputer (S1)', 'group' => 'general', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'erikaktama@parnaraya.ac.id', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'location', 'value' => 'Manado, Sulawesi Utara, Indonesia', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'aktama_digital_brand', 'value' => 'Aktama Digital (PT Aktama Digital Antika)', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'aktama_music_brand', 'value' => 'Aktama Music', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'seo_meta_description', 'value' => 'Website portofolio resmi Gede Erik Aktama, S.Pd., M.Pd. - Dosen Sistem Komputer UNIPAR, Fasilitator Nasional KKA Kemdikdasmen, dan CEO Aktama Digital.', 'group' => 'seo', 'type' => 'textarea'],
        ];
        foreach ($settings as $st) {
            SiteSetting::updateOrCreate(['key' => $st['key']], $st);
        }
    }
}

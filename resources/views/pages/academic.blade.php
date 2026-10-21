@extends('layouts.app')

@section('title', 'Akademik, UNIPAR & Rekognisi Pembelajaran Lampau (RPL) | Gede Erik Aktama')
@section('meta_description', 'Aktivitas akademik, Program Studi Sistem Komputer Universitas Parna Raya, daftar program studi aktif, serta tata kelola RPL Kepdirjen 91/2024.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Homebase Akademik & Tata Kelola
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Universitas Parna Raya & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Pendidikan Tinggi</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Pusat pengabdian keilmuan sebagai Dosen dan Ketua Program Studi Sistem Komputer, pengelola Rekognisi Pembelajaran Lampau (RPL), dan pengembang kurikulum OBE.
            </p>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- UNIPAR Programs Box -->
        <div class="glass-card p-8 sm:p-10 rounded-3xl border border-blue-500/30">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-8 border-b border-white/10">
                <div>
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Institusi Pendidikan Tinggi</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">
                        Universitas Parna Raya (UNIPAR)
                    </h2>
                    <p class="text-sm text-slate-300 mt-1">
                        Kampus modern di Manado, Sulawesi Utara yang berorientasi pada kemajuan sains, teknologi, dan kewirausahaan digital.
                    </p>
                </div>
                <a href="https://www.parnaraya.ac.id" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg flex items-center gap-2 self-start md:self-auto hover:shadow-cyan-500/25 transition-all">
                    <span>www.parnaraya.ac.id</span>
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Active Study Programs (Verified List Only) -->
            <div class="pt-8">
                <h3 class="text-lg font-bold text-white mb-2">Daftar Program Studi Aktif UNIPAR</h3>
                <p class="text-xs text-slate-400 mb-6">Program studi resmi terdaftar yang beroperasi aktif di lingkungan Universitas Parna Raya:</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- S1 Sistem Komputer (Homebase) -->
                    <div class="p-4 rounded-xl bg-blue-600/15 border-2 border-blue-500/40 relative">
                        <div class="flex items-center justify-between mb-2">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500 text-white">S-1</span>
                            <span class="text-[10px] font-bold text-cyan-400 uppercase">Homebase Dosen</span>
                        </div>
                        <h4 class="text-sm font-bold text-white">Sistem Komputer</h4>
                        <p class="text-[11px] text-slate-300 mt-1">Kaprodi & Pengajar: Visi Komputer, AI, IoT, Jaringan Komputer.</p>
                    </div>

                    <!-- S1 Teknik Informatika -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/20 text-blue-300 mb-2 inline-block">S-1</span>
                        <h4 class="text-sm font-bold text-white">Teknik Informatika</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Rekayasa perangkat lunak, komputasi awan, dan arsitektur data.</p>
                    </div>

                    <!-- S1 Sistem Informasi -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/20 text-blue-300 mb-2 inline-block">S-1</span>
                        <h4 class="text-sm font-bold text-white">Sistem Informasi</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Manajemen basis data, tata kelola SI/TI, dan enterprise system.</p>
                    </div>

                    <!-- S1 Bisnis Digital -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/20 text-blue-300 mb-2 inline-block">S-1</span>
                        <h4 class="text-sm font-bold text-white">Bisnis Digital</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Pemasaran digital, e-commerce, dan analisis pasar modern.</p>
                    </div>

                    <!-- S1 Kewirausahaan -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/20 text-blue-300 mb-2 inline-block">S-1</span>
                        <h4 class="text-sm font-bold text-white">Kewirausahaan</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Inkubasi startup, inovasi bisnis, dan manajemen resiko.</p>
                    </div>

                    <!-- S1 Hukum Bisnis -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-blue-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-blue-500/20 text-blue-300 mb-2 inline-block">S-1</span>
                        <h4 class="text-sm font-bold text-white">Hukum Bisnis</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Hukum perseroan, kepatuhan korporat, dan regulasi siber.</p>
                    </div>

                    <!-- D3 Manajemen Informatika -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 hover:border-amber-500/30 transition-colors">
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-500/20 text-amber-300 mb-2 inline-block">D-3</span>
                        <h4 class="text-sm font-bold text-white">Manajemen Informatika</h4>
                        <p class="text-[11px] text-slate-400 mt-1">Aplikasi perkantoran, IT support, dan administrasi database.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- RPL Feature (Kepdirjen 91 Tahun 2024) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 space-y-4">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20">
                    Regulasi Resmi Pemerintah
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-white">
                    Rekognisi Pembelajaran Lampau (RPL) Berbasis Kepdirjen 91/2024
                </h2>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Sebagai pengelola dan asesor resmi RPL Universitas Parna Raya, saya bertanggung jawab dalam perumusan Standar Operasional Prosedur (SOP), penyusunan panduan akademik, serta perancangan instrumen asesmen portofolio sesuai ketentuan resmi <strong>Keputusan Direktur Jenderal Pendidikan Tinggi No. 91 Tahun 2024</strong>.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs text-slate-300">
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                        <span>Instrumen Asesmen Berbasis Portofolio</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                        <span>Konversi Pengalaman Kerja Menjadi SKS</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                        <span>Penyusunan Flowchart & SOP Terstandar</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                        <span>SK Tim Pengelola & Asesor Resmi UNIPAR</span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="glass-card p-6 rounded-2xl border border-cyan-500/30 space-y-4">
                    <h4 class="text-base font-bold text-white flex items-center gap-2">
                        <i data-lucide="award" class="w-5 h-5 text-cyan-400"></i>
                        <span>Keunggulan Program RPL UNIPAR</span>
                    </h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Memberi pengakuan formal bagi para profesional, teknisi, guru, karyawan swasta, dan aparatur sipil negara atas capaian pembelajaran dari pendidikan non-formal, informal, maupun pengalaman kerja untuk memperoleh gelar sarjana (S1) atau diploma (D3) dalam waktu yang lebih terukur.
                    </p>
                    <a href="{{ route('contact') }}" class="w-full py-2.5 px-4 rounded-xl text-xs font-semibold bg-blue-600 text-white text-center block hover:bg-blue-500 transition-colors">
                        Konsultasi Informasi Jalur RPL
                    </a>
                </div>
            </div>
        </div>

        <!-- Kurikulum OBE & RPS 1-16 -->
        <div class="glass-card p-8 rounded-2xl">
            <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                <i data-lucide="book" class="w-5 h-5 text-blue-400"></i>
                <span>Kurikulum Outcome-Based Education (OBE) & RPS Lengkap</span>
            </h3>
            <p class="text-sm text-slate-300 leading-relaxed mb-6">
                Implementasi kurikulum OBE di Program Studi Sistem Komputer berfokus pada penyelarasan Capaian Pembelajaran Lulusan (CPL) dengan Capaian Pembelajaran Mata Kuliah (CPMK) dan Sub-CPMK, didukung RPS terstruktur lengkap mulai Pertemuan 1 hingga 16 (termasuk UTS di pertemuan 8 dan UAS di pertemuan 16).
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                    <div class="font-bold text-cyan-400 uppercase mb-1">Mata Kuliah Utama</div>
                    <div class="text-slate-200 font-semibold">TIC-603 • Visi Komputer</div>
                    <p class="text-slate-400 mt-1">Deep learning, pemrosesan citra digital, deteksi objek real-time.</p>
                </div>
                <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                    <div class="font-bold text-cyan-400 uppercase mb-1">Sistem & Kecerdasan</div>
                    <div class="text-slate-200 font-semibold">Machine Learning & IoT</div>
                    <p class="text-slate-400 mt-1">Model klasifikasi Decision Tree, Random Forest, sakelar cerdas.</p>
                </div>
                <div class="p-4 rounded-xl bg-white/5 border border-white/5">
                    <div class="font-bold text-cyan-400 uppercase mb-1">Rekayasa Web</div>
                    <div class="text-slate-200 font-semibold">Pemrograman Web Terpadu</div>
                    <p class="text-slate-400 mt-1">HTML5, CSS3, JavaScript, framework modern, API deployment.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

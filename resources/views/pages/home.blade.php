@extends('layouts.app')

@section('title', 'Gede Erik Aktama, S.Pd., M.Pd. | Dosen Sistem Komputer & Fasilitator Nasional KKA')

@section('content')
<!-- ==========================================================================
     HERO SECTION
     ========================================================================== -->
<section class="relative pt-12 pb-20 lg:pt-20 lg:pb-32 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <!-- Status Badges -->
                <div class="inline-flex flex-wrap items-center justify-center lg:justify-start gap-2.5">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-semibold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Terbuka untuk Kolaborasi Akademik & Teknologi
                    </span>
                    <span class="px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-500/30 text-blue-400 text-xs font-semibold">
                        Manado, Sulawesi Utara
                    </span>
                </div>

                <!-- Main Name & Degrees -->
                <div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Gede Erik Aktama, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 text-3xl sm:text-4xl lg:text-5xl font-semibold">S.Pd., M.Pd.</span>
                    </h1>
                    <p class="mt-3 text-lg sm:text-xl font-medium text-slate-300">
                        Dosen Lektor <span class="text-white font-semibold">Sistem Komputer</span> • Fasilitator Nasional <span class="text-cyan-400 font-semibold">KKA Kemdikdasmen</span> • CEO <span class="text-blue-400 font-semibold">Aktama Digital</span>
                    </p>
                </div>

                <!-- Tagline & Short Bio -->
                <div class="space-y-3 max-w-2xl mx-auto lg:mx-0">
                    <p class="text-base sm:text-lg text-cyan-300 font-medium italic">
                        "{{ $profile->tagline ?? 'Akademisi Lektor, Inovator AI Terapan, dan Penggerak Transformasi Digital.' }}"
                    </p>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        {{ $profile->short_bio ?? 'Dosen Lektor (Kepakaran Resmi: Basis Data & Pemrograman) dan Ketua Program Studi Sistem Komputer Universitas Parna Raya (UNIPAR) Manado, Fasilitator Nasional KKA Kemdikdasmen, serta CEO PT Aktama Digital Antika.' }}
                    </p>
                </div>

                <!-- CTAs -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('publications') }}" class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-xl shadow-blue-500/25 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-300">
                        <i data-lucide="book-open" class="w-4 h-4"></i>
                        <span>Lihat Karya Buku & Riset</span>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2.5 px-6 py-3.5 rounded-xl font-semibold text-slate-200 bg-white/5 border border-white/10 hover:bg-white/10 hover:text-white hover:border-white/20 hover:-translate-y-0.5 transition-all duration-300">
                        <i data-lucide="message-square" class="w-4 h-4 text-cyan-400"></i>
                        <span>Hubungi Saya</span>
                    </a>
                </div>

                <!-- Quick Stats Strip -->
                <div class="grid grid-cols-3 gap-4 pt-8 border-t border-white/10 max-w-lg mx-auto lg:mx-0">
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 font-heading">
                            Lektor
                        </div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Penata Muda Tk. I (III/b)</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 font-heading">
                            5 Buku
                        </div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Ber-ISBN & HKI Resmi</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 font-heading">
                            Nasional
                        </div>
                        <div class="text-xs text-slate-400 font-medium mt-0.5">Fasilitator KKA Kemdikdasmen</div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 flex justify-center relative">
                <div class="relative w-full max-w-sm sm:max-w-md aspect-[4/5]">
                    <!-- Glow Behind -->
                    <div class="absolute -inset-4 bg-gradient-to-tr from-blue-600/30 to-cyan-500/20 rounded-3xl blur-2xl"></div>

                    <!-- Photo Container -->
                    <div class="relative h-full w-full rounded-2xl overflow-hidden border border-white/15 bg-slate-900 shadow-2xl p-2.5">
                        <img src="{{ asset('images/profile.png') }}" alt="Gede Erik Aktama, S.Pd., M.Pd." class="w-full h-full object-cover object-top rounded-xl">

                        <!-- Floating Badge 1 (Top Right) -->
                        <div class="absolute top-4 right-4 glass-panel border border-cyan-500/40 px-3.5 py-2 rounded-xl flex items-center gap-2.5 shadow-xl">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center">
                                <i data-lucide="award" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-xs font-bold text-white">Fasilitator Nasional</div>
                                <div class="text-[10px] text-cyan-400 font-medium">KKA Kemdikdasmen</div>
                            </div>
                        </div>

                        <!-- Floating Badge 2 (Bottom Left) -->
                        <div class="absolute bottom-5 left-5 glass-panel border border-blue-500/40 px-3.5 py-2 rounded-xl flex items-center gap-2.5 shadow-xl">
                            <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center">
                                <i data-lucide="briefcase" class="w-4 h-4"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-xs font-bold text-white">CEO Aktama Digital</div>
                                <div class="text-[10px] text-slate-300 font-medium">PT Aktama Digital Antika</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: EMPAT PILAR PERAN UTAMA
     ========================================================================== -->
<section class="py-20 border-t border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Pilar Profesional
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Empat Pilar <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Dedikasi & Kepemimpinan</span>
            </h2>
            <p class="mt-4 text-slate-400 text-base leading-relaxed">
                Kiprah aktif di bidang akademik perguruan tinggi, kepelatihan teknologi nasional, kewirausahaan digital, dan penjaminan mutu kurikulum.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pilar 1: Dosen Lektor Sistem Komputer -->
            <div class="glass-card p-6 rounded-2xl flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-500/15 border border-blue-500/30 text-blue-400 flex items-center justify-center mb-5">
                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Perguruan Tinggi</span>
                    <h3 class="text-lg font-bold text-white mt-1 mb-2">Dosen Lektor Sistem Komputer</h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Dosen Lektor dan Ketua Program Studi S1 Sistem Komputer di Universitas Parna Raya (UNIPAR) Manado. Kepakaran resmi: Basis Data dan Pemrograman.
                    </p>
                </div>
                <a href="{{ route('academic') }}" class="text-xs font-semibold text-blue-400 hover:text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <span>Selengkapnya</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Pilar 2: Fasilitator KKA Kemdikdasmen -->
            <div class="glass-card p-6 rounded-2xl flex flex-col justify-between border-cyan-500/30">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center mb-5">
                        <i data-lucide="sparkles" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Kemdikdasmen RI</span>
                    <h3 class="text-lg font-bold text-white mt-1 mb-2">Fasilitator Nasional KKA</h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) untuk menggerakkan literasi komputasional tenaga pendidik se-Indonesia.
                    </p>
                </div>
                <a href="{{ route('trainings') }}" class="text-xs font-semibold text-cyan-400 hover:text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <span>Lihat Pelatihan</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Pilar 3: CEO Aktama Digital -->
            <div class="glass-card p-6 rounded-2xl flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/15 border border-indigo-500/30 text-indigo-400 flex items-center justify-center mb-5">
                        <i data-lucide="building-2" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Industri & Bisnis</span>
                    <h3 class="text-lg font-bold text-white mt-1 mb-2">CEO PT Aktama Digital</h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Memimpin penyedia pelatihan teknologi, workshop AI praktis perkantoran, digital marketing terapan, dan solusi transformasi digital.
                    </p>
                </div>
                <a href="{{ route('ventures') }}" class="text-xs font-semibold text-blue-400 hover:text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <span>Layanan Bisnis</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Pilar 4: Asesor & Pengelola RPL -->
            <div class="glass-card p-6 rounded-2xl flex flex-col justify-between">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-amber-500/15 border border-amber-500/30 text-amber-400 flex items-center justify-center mb-5">
                        <i data-lucide="file-check" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Regulasi & Penjaminan Mutu</span>
                    <h3 class="text-lg font-bold text-white mt-1 mb-2">Asesor & Tim RPL</h3>
                    <p class="text-xs text-slate-400 leading-relaxed mb-4">
                        Mengelola sistem Rekognisi Pembelajaran Lampau (RPL) UNIPAR berlandaskan regulasi resmi Kepdirjen 91 Tahun 2024.
                    </p>
                </div>
                <a href="{{ route('academic') }}" class="text-xs font-semibold text-blue-400 hover:text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <span>Tata Kelola RPL</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: KARYA BUKU BER-ISBN & PUBLIKASI RISET
     ========================================================================== -->
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                    Karya Ilmiah & Kepakaran
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Karya Buku Ber-ISBN & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Riset Terakreditasi</span>
                </h2>
                <p class="mt-2 text-slate-400 text-sm sm:text-base">
                    Koleksi buku ber-ISBN resmi Perpustakaan Nasional RI, hak cipta Kemenkumham, serta artikel jurnal terindeks SINTA.
                </p>
            </div>
            <a href="{{ route('publications') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-cyan-400 hover:text-cyan-300 transition-colors">
                <span>Eksplorasi Seluruh Katalog Buku & Publikasi</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($publications as $pub)
                <div class="glass-card p-6 rounded-2xl flex flex-col justify-between hover:border-cyan-500/40 transition-all duration-300">
                    <div>
                        <!-- Optional Certificate Preview Thumbnail -->
                        @if($pub->file_path)
                            <div class="mb-4 h-40 rounded-xl overflow-hidden border border-white/10 bg-slate-900/60 relative group">
                                <img src="{{ asset($pub->file_path) }}" alt="{{ $pub->title }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-2.5">
                                    <span class="text-[10px] font-semibold text-cyan-300 flex items-center gap-1">
                                        <i data-lucide="award" class="w-3 h-3"></i>
                                        <span>Sertifikat Penulis Resmi</span>
                                    </span>
                                </div>
                            </div>
                        @endif

                        <!-- Badges -->
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            @if(str_contains($pub->indexing_status, 'ISBN'))
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-500/15 text-emerald-300 border border-emerald-500/30 flex items-center gap-1">
                                    <i data-lucide="book" class="w-3 h-3"></i>
                                    <span>{{ $pub->indexing_status }}</span>
                                </span>
                            @elseif(str_contains($pub->indexing_status, 'HKI'))
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-purple-500/15 text-purple-300 border border-purple-500/30 flex items-center gap-1">
                                    <i data-lucide="shield" class="w-3 h-3"></i>
                                    <span>{{ $pub->indexing_status }}</span>
                                </span>
                            @else
                                <span class="px-2.5 py-1 rounded-md text-xs font-bold bg-amber-500/15 text-amber-300 border border-amber-500/30">
                                    {{ $pub->indexing_status }}
                                </span>
                            @endif

                            @if($pub->is_first_author)
                                <span class="px-2 py-0.5 rounded text-[11px] font-medium bg-blue-500/15 text-blue-300 border border-blue-500/30">
                                    Penulis Pertama
                                </span>
                            @endif
                            <span class="px-2 py-0.5 rounded text-[11px] font-mono text-slate-400 bg-white/5">
                                {{ $pub->publication_year }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="text-base font-bold text-white mb-2 line-clamp-2 hover:text-cyan-400 transition-colors">
                            <a href="{{ route('publications.detail', $pub->slug) }}">{{ $pub->title }}</a>
                        </h3>

                        <!-- Publisher / Journal -->
                        <p class="text-xs text-cyan-400 font-medium mb-3">
                            {{ $pub->journal_name }}
                        </p>

                        <!-- Abstract snippet -->
                        <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                            {{ $pub->abstract }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                        <span class="text-[11px] text-slate-400">{{ $pub->category }}</span>
                        <a href="{{ route('publications.detail', $pub->slug) }}" class="text-xs font-semibold text-blue-400 hover:text-cyan-300 flex items-center gap-1">
                            <span>Detail & Verifikasi</span>
                            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: PENGABDIAN MASYARAKAT (PKM WOLOAN) & RISET LAB
     ========================================================================== -->
<section class="py-20 border-t border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Aksi Nyata & Dampak
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Pemberdayaan UMKM & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Implementasi Riset</span>
            </h2>
            <p class="mt-4 text-slate-400 text-base leading-relaxed">
                Menerjemahkan keilmuan akademis menjadi solusi yang dapat dimanfaatkan langsung oleh UMKM daerah dan instansi publik.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
            <!-- Box 1: Bapelkes Sulut -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ asset('images/pkm-bapelkes-sulut.jpg') }}" alt="PKM AI Bapelkes Prov Sulut" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-600 text-white shadow-lg">
                        Pengabdian Masyarakat (PKM)
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-cyan-400 font-bold uppercase tracking-wider mb-1">
                            UPTD Bapelkes Prov. Sulut • Pemateri Utama
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">
                            Pemanfaatan AI untuk Efisiensi & Produktivitas Kerja
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Bimbingan teknis intensif bagi jajaran pegawai serta tenaga kesehatan Bapelkes Sulut dalam mengadopsi AI generatif untuk penyusunan modul diklat, evaluasi pelatihan, dan naskah dinas.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Lokasi: Manado, Sulut</span>
                        <a href="{{ route('research.community') }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1.5">
                            <span>Detail PKM</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Box 2: DPMPTSP Kota Bitung -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ asset('images/pkm-dpmptsp-bitung.jpg') }}" alt="Workshop AI DPMPTSP Kota Bitung" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-semibold bg-blue-600 text-white shadow-lg">
                        Pelayanan Publik Terpadu
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-cyan-400 font-bold uppercase tracking-wider mb-1">
                            DPMPTSP Kota Bitung • Narasumber Utama
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">
                            Workshop AI Administrasi Perizinan & Layanan Publik
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Pelatihan langsung perumusan prompt kedinasan formula RCTDFC, verifikasi akurasi CVVU naskah dinas, formulasi FAQ regulasi OSS-RBA, dan analisis tren permohonan izin ASN Bitung.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Lokasi: Kota Bitung</span>
                        <a href="{{ route('trainings') }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1.5">
                            <span>Detail Pelatihan</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Box 3: PT Telin -->
            <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                <div class="h-56 overflow-hidden relative">
                    <img src="{{ asset('images/pkm-telin.jpg') }}" alt="Optimalisasi AI PT Telin" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-semibold bg-cyan-600 text-white shadow-lg">
                        Kemitraan Industri
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-xs text-cyan-400 font-bold uppercase tracking-wider mb-1">
                            PT Telin Network Indonesia Timur • Instruktur
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">
                            Optimalisasi Operasional Industri Telekomunikasi AI
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Seminar dan bimbingan teknis optimalisasi proses operasional industri telekomunikasi internasional menggunakan AI generative dan automasi pelaporan data teknis jaringan.
                        </p>
                    </div>
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Lokasi: Indonesia Timur</span>
                        <a href="{{ route('research.community') }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1.5">
                            <span>Detail PKM</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: PROYEK TEKNOLOGI UNGGULAN
     ========================================================================== -->
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                    Portfolio Showcases
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                    Proyek Teknologi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Solusi Rekayasa</span>
                </h2>
                <p class="mt-2 text-slate-400 text-sm sm:text-base">
                    Implementasi nyata arsitektur AI, IoT sakelar kendali jarak jauh, dan aplikasi web modern.
                </p>
            </div>
            <a href="{{ route('projects') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 text-sm font-semibold text-cyan-400 hover:text-cyan-300 transition-colors">
                <span>Katalog Semua Proyek</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ asset($project->image_url ?? 'images/research-ai.jpg') }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[11px] font-bold bg-blue-600/90 text-white backdrop-blur-sm">
                                {{ $project->category->name ?? 'Teknologi' }}
                            </span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-white mb-2 line-clamp-1 hover:text-cyan-400 transition-colors">
                                <a href="{{ route('projects.detail', $project->slug) }}">{{ $project->title }}</a>
                            </h3>
                            <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                                {{ $project->solution_description }}
                            </p>
                            @if($project->technologies)
                                <div class="flex flex-wrap gap-1.5 mb-2">
                                    @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                        <span class="px-2 py-0.5 rounded text-[11px] font-mono text-cyan-300 bg-white/5 border border-white/5">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('projects.detail', $project->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-cyan-400 hover:text-white transition-colors">
                            <span>Eksplorasi Studi Kasus</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: DUAL VENTURES (AKTAMA DIGITAL & AKTAMA MUSIC)
     ========================================================================== -->
<section class="py-20 border-t border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Ekosistem Inovasi
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Aktama Digital & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Aktama Music</span>
            </h2>
            <p class="mt-4 text-slate-400 text-base leading-relaxed">
                Kanalisasi profesional untuk layanan teknologi korporat serta eksplorasi karya multimedia digital bernuansa nusantara.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Aktama Digital -->
            <div class="glass-card p-8 rounded-2xl flex flex-col justify-between border-t-4 border-t-blue-500">
                <div>
                    <span class="text-xs font-bold text-blue-400 uppercase tracking-wider">PT Aktama Digital Antika</span>
                    <h3 class="text-2xl font-bold text-white mt-1 mb-3">Aktama Digital</h3>
                    <p class="text-sm text-slate-300 leading-relaxed mb-6">
                        Pusat pelatihan komputer dan solusi teknologi terapan: Pelatihan AI untuk efisiensi administrasi, Bimbingan KKA untuk pendidik, Masterclass Microsoft Word dokumen formal, dan pelatihan jaringan komputer.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-300 mb-6">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Pelatihan AI Terapan Perkantoran & Pendidikan</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Masterclass Microsoft Word (SK, SOP, Borang, LED)</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Solusi Digitalisasi & Web Development</li>
                    </ul>
                </div>
                <a href="{{ route('ventures') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-semibold bg-blue-600 text-white hover:bg-blue-500 transition-colors self-start">
                    <span>Layanan Aktama Digital</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Aktama Music -->
            <div class="glass-card p-8 rounded-2xl flex flex-col justify-between border-t-4 border-t-purple-500">
                <div>
                    <span class="text-xs font-bold text-purple-400 uppercase tracking-wider">Creative Multimedia Brand</span>
                    <h3 class="text-2xl font-bold text-white mt-1 mb-3">Aktama Music</h3>
                    <p class="text-sm text-slate-300 leading-relaxed mb-6">
                        Karya audio visual kreatif dengan pendekatan storytelling bertema kehidupan sehari-hari bernuansa Indonesia Timur, Manado, dan Bali, dikombinasikan dengan visual sinematik AI rasio 16:9 yang konsisten.
                    </p>
                    <ul class="space-y-2.5 text-xs text-slate-300 mb-6">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Karya Musik Berjiwa Nusantara & Ringan</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Video Klip & Konten Kreatif Sinematik</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i> Eksplorasi Visual AI Karakter Konsisten</li>
                    </ul>
                </div>
                <a href="{{ route('ventures') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-semibold bg-purple-600 text-white hover:bg-purple-500 transition-colors self-start">
                    <span>Eksplorasi Aktama Music</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: BLOG & ARTIKEL RESMI (TERPUSAT DI AKTAMA.COM)
     ========================================================================== -->
<section class="py-20 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-panel p-8 sm:p-12 rounded-3xl border border-cyan-500/30 relative overflow-hidden bg-gradient-to-r from-blue-950/40 via-slate-900/60 to-cyan-950/40">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-4 text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-semibold">
                        <i data-lucide="newspaper" class="w-3.5 h-3.5"></i>
                        <span>Blog & Publikasi Terpusat</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-tight">
                        Wawasan Teknologi, AI Terapan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Edukasi Digital</span>
                    </h2>
                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-2xl">
                        Seluruh artikel edukatif, panduan prompt engineering, tutorial dokumen Microsoft Word formal, dan analisis transformasi digital dipublikasikan secara terpusat di portal resmi <strong class="text-white">aktama.com</strong>.
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs text-slate-300 flex items-center gap-1.5">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-cyan-400"></i>
                            Kecerdasan Artifisial
                        </span>
                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs text-slate-300 flex items-center gap-1.5">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-cyan-400"></i>
                            Tutorial Microsoft Word Formal
                        </span>
                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs text-slate-300 flex items-center gap-1.5">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5 text-cyan-400"></i>
                            Strategi Transformasi Digital
                        </span>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col items-start lg:items-end justify-center gap-4">
                    <a href="https://aktama.com/artikel" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-6 py-4 rounded-2xl font-bold text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-xl shadow-blue-500/30 hover:shadow-cyan-500/40 hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto text-center justify-center">
                        <span>Baca di aktama.com/artikel</span>
                        <i data-lucide="external-link" class="w-5 h-5"></i>
                    </a>
                    <span class="text-xs text-slate-400 text-center lg:text-right">
                        Membuka di tab baru • Portal Resmi PT Aktama Digital Antika
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================================================
     SECTION: AJAKAN KOLABORASI (CTA)
     ========================================================================== -->
<section class="py-20 relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="glass-panel p-8 sm:p-12 rounded-3xl border border-blue-500/30 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -bottom-20 w-60 h-60 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-20 -top-20 w-60 h-60 bg-cyan-600/20 rounded-full blur-3xl pointer-events-none"></div>

            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Kemitraan & Riset
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Siap Berkolaborasi untuk Mewujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Dampak Nyata</span>
            </h2>
            <p class="mt-4 text-slate-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                Terbuka untuk undangan pemateri pelatihan AI, pembicara seminar, kolaborasi riset ilmiah, tata kelola kurikulum akademik, maupun implementasi digital UMKM.
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-xl shadow-blue-500/30 hover:shadow-blue-500/50 hover:-translate-y-0.5 transition-all">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                    <span>Kirim Pesan Kolaborasi</span>
                </a>
                <a href="{{ route('profile') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-semibold text-slate-200 bg-white/5 border border-white/10 hover:bg-white/10 hover:text-white transition-all">
                    <i data-lucide="user" class="w-4 h-4 text-cyan-400"></i>
                    <span>Tinjau Profil Lengkap</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

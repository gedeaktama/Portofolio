@extends('layouts.app')

@section('title', 'Profil Profesional | Gede Erik Aktama, S.Pd., M.Pd.')
@section('meta_description', 'Biografi lengkap, riwayat pendidikan, pengalaman karier, keahlian, dan dedikasi akademik Gede Erik Aktama, S.Pd., M.Pd.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Biografi Profesional
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Gede Erik Aktama, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">S.Pd., M.Pd.</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Dosen Lektor Sistem Komputer Universitas Parna Raya, Fasilitator Nasional KKA Kemdikdasmen, dan CEO PT Aktama Digital Antika.
            </p>
        </div>
    </div>
</section>

<!-- Content Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Sidebar Info -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Profile Card -->
                <div class="glass-card p-6 rounded-2xl text-center">
                    <div class="w-44 h-56 mx-auto rounded-2xl overflow-hidden border-2 border-cyan-500/30 p-1 mb-5 bg-slate-900/60 shadow-inner">
                        <img src="{{ asset('images/profile.png') }}" alt="Gede Erik Aktama" class="w-full h-full object-cover object-top rounded-xl shadow-md">
                    </div>
                    <h3 class="text-xl font-bold text-white">{{ $profile->full_name ?? 'Gede Erik Aktama, S.Pd., M.Pd.' }}</h3>
                    <p class="text-xs text-cyan-400 font-semibold uppercase tracking-wider mt-1">Dosen Lektor • Basis Data & Pemrograman</p>
                    
                    <div class="mt-6 pt-6 border-t border-white/10 text-left space-y-3 text-xs text-slate-300">
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="map-pin" class="w-4 h-4 text-cyan-400 shrink-0"></i>
                            <span>Manado, Sulawesi Utara, Indonesia</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="building" class="w-4 h-4 text-blue-400 shrink-0"></i>
                            <span>Universitas Parna Raya (UNIPAR)</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i data-lucide="mail" class="w-4 h-4 text-cyan-400 shrink-0"></i>
                            <span>{{ $profile->email ?? 'erikaktama@parnaraya.ac.id' }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('contact') }}" class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold text-xs inline-flex items-center justify-center gap-2 shadow-lg">
                            <i data-lucide="message-square" class="w-4 h-4"></i>
                            <span>Hubungi / Diskusi</span>
                        </a>
                    </div>
                </div>

                <!-- Academic Rank Box (SK Kemendiktisaintek) -->
                <div class="glass-panel p-6 rounded-2xl border-l-4 border-l-blue-500 space-y-3">
                    <h4 class="text-sm font-bold text-white flex items-center gap-2">
                        <i data-lucide="award" class="w-4 h-4 text-blue-400"></i>
                        <span>Jabatan Fungsional Akademik</span>
                    </h4>
                    <div class="space-y-2 text-xs text-slate-300">
                        <div class="flex justify-between border-b border-white/5 pb-1">
                            <span class="text-slate-400">Jabatan:</span>
                            <span class="font-bold text-white">Lektor (TMT 1 Jan 2026)</span>
                        </div>
                        <div class="flex justify-between border-b border-white/5 pb-1">
                            <span class="text-slate-400">Pangkat/Gol:</span>
                            <span class="text-cyan-300 font-medium">Penata Muda Tk. I (III/b)</span>
                        </div>
                        <div class="flex justify-between border-b border-white/5 pb-1">
                            <span class="text-slate-400">Kepakaran:</span>
                            <span class="text-white font-medium">Basis Data & Pemrograman</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-400">SK Resmi:</span>
                            <span class="font-mono text-[11px] text-slate-300">0044/LL16/KP.07.01/2026</span>
                        </div>
                    </div>
                </div>

                <!-- Indeksasi Akademik (SINTA & Scholar) -->
                <div class="glass-panel p-6 rounded-2xl border-l-4 border-l-cyan-500 space-y-3">
                    <h4 class="text-sm font-bold text-white flex items-center gap-2">
                        <i data-lucide="database" class="w-4 h-4 text-cyan-400"></i>
                        <span>Indeksasi Ilmiah Resmi</span>
                    </h4>
                    <div class="space-y-2.5">
                        <a href="https://sinta.kemdiktisaintek.go.id/authors/profile/6798063" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs transition-colors group">
                            <span class="text-slate-300 group-hover:text-cyan-300 font-medium">SINTA ID: 6798063</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5 text-cyan-400"></i>
                        </a>
                        <a href="https://scholar.google.com/citations?hl=en&authuser=1&user=ZMLrCEUAAAAJ" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between p-2.5 rounded-xl bg-white/5 hover:bg-white/10 border border-white/5 text-xs transition-colors group">
                            <span class="text-slate-300 group-hover:text-cyan-300 font-medium">Google Scholar Profile</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5 text-cyan-400"></i>
                        </a>
                    </div>
                </div>

                <!-- Academic Integrity Box -->
                <div class="glass-panel p-6 rounded-2xl border-l-4 border-l-emerald-500">
                    <h4 class="text-sm font-bold text-white mb-2 flex items-center gap-2">
                        <i data-lucide="shield-check" class="w-4 h-4 text-emerald-400"></i>
                        <span>Komitmen Integritas</span>
                    </h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Menjunjung tinggi etika akademik dengan data riset empiris yang valid, bebas dari fabrikasi sitasi atau DOI fiktif, serta berpedoman teguh pada regulasi resmi kementerian.
                    </p>
                </div>
            </div>

            <!-- Right: Detailed Sections -->
            <div class="lg:col-span-8 space-y-12">
                <!-- Biografi Lengkap -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <i data-lucide="user" class="w-5 h-5 text-cyan-400"></i>
                        <span>Biografi Profesional</span>
                    </h3>
                    <div class="text-sm text-slate-300 leading-relaxed space-y-4">
                        <p>
                            <strong>Gede Erik Aktama, S.Pd., M.Pd.</strong> adalah akademisi berjabatan fungsional <strong>Lektor (Kemendiktisaintek RI)</strong> dan praktisi teknologi berbasis di Manado, Sulawesi Utara. Beliau saat ini mengemban amanah sebagai <strong>Dosen Tetap sekaligus Ketua Program Studi S1 Sistem Komputer</strong> pada Fakultas Sains dan Teknologi di <strong>Universitas Parna Raya (UNIPAR)</strong> dengan Ranting Ilmu / Bidang Kepakaran Resmi: <strong>Basis Data dan Pemrograman</strong>.
                        </p>
                        <p>
                            Di ranah literasi dan karya tulis ilmiah, beliau adalah penulis <strong>5 buku referensi dan ajar</strong> ber-ISBN resmi Perpustakaan Nasional RI (termasuk karya bertema Python, Sistem Basis Data, dan SIG) serta pemegang sertifikat Hak Kekayaan Intelektual (HKI) Kemenkumham RI untuk modul pendidikan jaringan dan keamanan sistem komputer.
                        </p>
                        <p>
                            Selain aktivitas di kampus, beliau dipercaya di tingkat kementerian sebagai <strong>Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) Kemdikdasmen</strong>, berperan aktif dalam pelatihan dan diseminasi kurikulum komputasi bagi ribuan tenaga pendidik di seluruh penjuru Indonesia.
                        </p>
                        <p>
                            Dalam ranah bisnis dan industri teknologi, beliau adalah <strong>CEO PT Aktama Digital Antika</strong> dengan jenama <em>Aktama Digital</em> yang bergerak di bidang pelatihan AI perkantoran, masterclass Microsoft Word dokumen formal, bimbingan jaringan komputer, serta pengembangan software dan digital marketing.
                        </p>
                    </div>
                </div>

                <!-- Riwayat Pendidikan -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i data-lucide="graduation-cap" class="w-5 h-5 text-blue-400"></i>
                        <span>Riwayat Pendidikan</span>
                    </h3>
                    <div class="space-y-6">
                        @foreach($educations as $edu)
                            <div class="relative pl-6 border-l border-blue-500/30">
                                <span class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-blue-500"></span>
                                <div class="text-xs text-cyan-400 font-mono">{{ $edu->start_year }} — {{ $edu->end_year ?? 'Selesai' }}</div>
                                <h4 class="text-base font-bold text-white mt-0.5">{{ $edu->degree }}</h4>
                                <div class="text-xs text-slate-300 font-medium">{{ $edu->institution }} • {{ $edu->field_of_study }}</div>
                                @if($edu->description)
                                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">{{ $edu->description }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pengalaman Karier & Jabatan -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i data-lucide="briefcase" class="w-5 h-5 text-cyan-400"></i>
                        <span>Pengalaman Karier & Kepemimpinan</span>
                    </h3>
                    <div class="space-y-6">
                        @foreach($experiences as $exp)
                            <div class="relative pl-6 border-l border-cyan-500/30">
                                <span class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-cyan-400"></span>
                                <div class="flex flex-wrap items-center gap-2">
                                    <span class="text-xs text-cyan-400 font-mono">{{ $exp->start_date }} — {{ $exp->is_current ? 'Sekarang' : $exp->end_date }}</span>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-semibold uppercase {{ $exp->category === 'national' ? 'bg-amber-500/20 text-amber-300' : 'bg-blue-500/20 text-blue-300' }}">
                                        {{ $exp->category }}
                                    </span>
                                </div>
                                <h4 class="text-base font-bold text-white mt-1">{{ $exp->position }}</h4>
                                <div class="text-xs text-slate-300 font-medium">{{ $exp->organization }}</div>
                                @if($exp->description)
                                    <p class="text-xs text-slate-400 mt-2 leading-relaxed">{{ $exp->description }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Keahlian Berdasarkan Kategori -->
                <div class="glass-card p-8 rounded-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                        <i data-lucide="cpu" class="w-5 h-5 text-purple-400"></i>
                        <span>Kompetensi & Keahlian Teruji</span>
                    </h3>
                    <div class="space-y-6">
                        @foreach($skills as $category => $skillItems)
                            <div>
                                <h5 class="text-xs font-bold text-cyan-400 uppercase tracking-wider mb-3">
                                    {{ str_replace('_', ' ', strtoupper($category)) }}
                                </h5>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($skillItems as $skill)
                                        <div class="px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-xs text-slate-200 flex items-center gap-2 hover:border-cyan-500/40 transition-colors">
                                            <span>{{ $skill->name }}</span>
                                            <span class="text-[10px] text-cyan-400 font-mono">{{ $skill->proficiency }}%</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

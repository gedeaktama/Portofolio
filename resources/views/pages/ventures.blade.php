@extends('layouts.app')

@section('title', 'Aktama Digital & Aktama Music | Unit Bisnis & Kreatif Gede Erik Aktama')
@section('meta_description', 'Layanan pelatihan teknologi dan pengembangan software oleh PT Aktama Digital Antika serta karya musik digital kreatif Aktama Music.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Ekosistem Bisnis & Seni Digital
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Aktama Digital & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Aktama Music</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Sinergi antara transformasi teknologi korporasi terapan dan karya seni kreasi multimedia bernapas nusantara.
            </p>
        </div>
    </div>
</section>

<!-- Main Ventures Content -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Venture 1: Aktama Digital -->
        <div class="glass-card p-8 sm:p-12 rounded-3xl border-t-4 border-t-blue-500 space-y-8">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-8 border-b border-white/10">
                <div class="space-y-2">
                    <span class="text-xs font-bold text-blue-400 uppercase tracking-wider">Unit Usaha Resmi • PT Aktama Digital Antika</span>
                    <h2 class="text-3xl font-extrabold text-white">Aktama Digital</h2>
                    <p class="text-sm text-slate-300 max-w-2xl leading-relaxed">
                        Perusahaan penyedia solusi digital, pelatihan komputer, dan otomasi kecerdasan artifisial yang dirancang langsung pakai, sistematis, dan bernilai guna tinggi bagi perkantoran, perguruan tinggi, maupun instansi pemerintah.
                    </p>
                </div>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl text-xs font-semibold bg-blue-600 text-white hover:bg-blue-500 shadow-lg shadow-blue-500/25 transition-all self-start lg:self-auto">
                    Kemitraan & Pelatihan Perusahaan
                </a>
            </div>

            <!-- Service Pillars -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center mb-3">
                        <i data-lucide="bot" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Pelatihan AI Perkantoran</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Otomasi penyusunan draf surat dinas, resume laporan, analisis data, dan etika AI administratif.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center mb-3">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Masterclass Microsoft Word</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Penyusunan dokumen formal SK, SOP, LED Akreditasi, dan buku pedoman rapi siap cetak.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center mb-3">
                        <i data-lucide="network" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Jaringan & IT Support</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Pelatihan teknis routing, switching, instalasi server lokal, dan pemeliharaan komputer.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center mb-3">
                        <i data-lucide="globe" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Digital Marketing UMKM</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Pengembangan website WordPress, analitik Google Analytics, dan strategi promosi produk daerah.</p>
                </div>
            </div>
        </div>

        <!-- Venture 2: Aktama Music -->
        <div class="glass-card p-8 sm:p-12 rounded-3xl border-t-4 border-t-purple-500 space-y-8">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-8 border-b border-white/10">
                <div class="space-y-2">
                    <span class="text-xs font-bold text-purple-400 uppercase tracking-wider">Kanal Kreatif & Produksi Multimedia</span>
                    <h2 class="text-3xl font-extrabold text-white">Aktama Music</h2>
                    <p class="text-sm text-slate-300 max-w-2xl leading-relaxed">
                        Eksplorasi karya audio visual yang menggabungkan musik berkarakter khas Indonesia Timur, Manado, dan Bali dengan storytelling kehidupan yang segar, humor cerdas, serta estetika visual AI sinematik.
                    </p>
                </div>
                <a href="{{ route('contact') }}" class="px-6 py-3 rounded-xl text-xs font-semibold bg-purple-600 text-white hover:bg-purple-500 shadow-lg shadow-purple-500/25 transition-all self-start lg:self-auto">
                    Kolaborasi Karya Musik
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center mb-3">
                        <i data-lucide="music" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Karya Musik Nusantara</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Koleksi lagu bernuansa Manado, Indonesia Timur, dan Bali dengan melodi yang mudah diingat dan lirik yang membumi.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center mb-3">
                        <i data-lucide="video" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">Sinematografi 16:9</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Produksi video klip dan konten YouTube dengan komposisi visual kuat tanpa watermark yang mengganggu.</p>
                </div>

                <div class="p-5 rounded-2xl bg-white/5 border border-white/5 space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-pink-500/20 text-pink-400 flex items-center justify-center mb-3">
                        <i data-lucide="sparkles" class="w-5 h-5"></i>
                    </div>
                    <h4 class="text-base font-bold text-white">AI Art & Karakter Konsisten</h4>
                    <p class="text-xs text-slate-400 leading-relaxed">Pemanfaatan model AI Image & Video generatif dengan retensi konsistensi wajah, pakaian, dan suasana.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

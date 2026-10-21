@extends('layouts.app')

@section('title', 'Penelitian & Pengabdian kepada Masyarakat (PKM) | Gede Erik Aktama')
@section('meta_description', 'Dokumentasi proyek penelitian AI, IoT, serta Pengabdian kepada Masyarakat (PKM) digital marketing Rumah Panggung Woloan oleh Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Tri Dharma Perguruan Tinggi
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Penelitian & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Pengabdian Masyarakat</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Penerapan keilmuan sistem komputer dan kecerdasan artifisial untuk menjawab tantangan riil industri UMKM daerah dan pengembangan teknologi nasional.
            </p>
        </div>
    </div>
</section>

<!-- Filter Tabs & Content Section -->
<section class="py-16" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Filter Switch -->
        <div class="flex items-center justify-center gap-3">
            <button type="button" @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-blue-600 text-white shadow-lg' : 'bg-white/5 text-slate-300 hover:text-white'" class="px-5 py-2.5 rounded-xl text-xs font-semibold transition-all">
                Semua Program
            </button>
            <button type="button" @click="activeTab = 'research'" :class="activeTab === 'research' ? 'bg-blue-600 text-white shadow-lg' : 'bg-white/5 text-slate-300 hover:text-white'" class="px-5 py-2.5 rounded-xl text-xs font-semibold transition-all">
                Penelitian Ilmiah
            </button>
            <button type="button" @click="activeTab = 'pkm'" :class="activeTab === 'pkm' ? 'bg-blue-600 text-white shadow-lg' : 'bg-white/5 text-slate-300 hover:text-white'" class="px-5 py-2.5 rounded-xl text-xs font-semibold transition-all">
                Pengabdian Masyarakat (PKM)
            </button>
        </div>

        <!-- 1. Pengabdian Masyarakat (PKM Woloan Model) -->
        <div x-show="activeTab === 'all' || activeTab === 'pkm'" class="space-y-8">
            <div class="border-b border-white/10 pb-4">
                <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Aksi Nyata & Pemberdayaan</span>
                <h2 class="text-2xl font-bold text-white mt-1">Pengabdian Kepada Masyarakat (PKM)</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($communityServices as $cs)
                    <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                        <div class="h-64 overflow-hidden relative">
                            <img src="{{ asset($cs->image_url ?? 'images/workshop-seminar.jpg') }}" alt="{{ $cs->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-blue-600 text-white shadow-lg">
                                PKM Terverifikasi
                            </span>
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-mono bg-black/60 text-slate-200 backdrop-blur-sm">
                                {{ $cs->year }}
                            </span>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <div class="text-xs text-cyan-400 font-bold uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                    <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
                                    <span>{{ $cs->location }}</span>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ $cs->title }}</h3>
                                <p class="text-xs text-slate-300 mb-2"><strong>Peran:</strong> {{ $cs->role }} • <strong>Mitra:</strong> {{ $cs->partner }}</p>
                                <p class="text-xs text-slate-400 leading-relaxed mb-4">{{ $cs->description }}</p>

                                @if($cs->outcomes)
                                    <div class="p-3.5 rounded-xl bg-white/5 border border-white/5 mb-4">
                                        <div class="text-[11px] font-bold text-cyan-400 uppercase tracking-wider mb-1">Luaran & Dampak Nyata:</div>
                                        <p class="text-xs text-slate-300 leading-relaxed">{{ $cs->outcomes }}</p>
                                    </div>
                                @endif
                            </div>

                            @if($cs->partner_website)
                                <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                                    <span class="text-xs text-slate-400">Situs Web Mitra:</span>
                                    <a href="{{ $cs->partner_website }}" target="_blank" rel="noopener noreferrer" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1.5">
                                        <span>{{ parse_url($cs->partner_website, PHP_URL_HOST) }}</span>
                                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 2. Penelitian Ilmiah -->
        <div x-show="activeTab === 'all' || activeTab === 'research'" class="space-y-8 pt-8">
            <div class="border-b border-white/10 pb-4">
                <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Inovasi Laboratorium & Terapan</span>
                <h2 class="text-2xl font-bold text-white mt-1">Penelitian & Riset Rekayasa</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($researchProjects as $rp)
                    <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                        <div class="h-64 overflow-hidden relative">
                            <img src="{{ asset($rp->image_url ?? 'images/research-ai.jpg') }}" alt="{{ $rp->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-cyan-600 text-white shadow-lg">
                                Status: {{ ucfirst($rp->status) }}
                            </span>
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-mono bg-black/60 text-slate-200 backdrop-blur-sm">
                                {{ $rp->year }}
                            </span>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ $rp->title }}</h3>
                                <p class="text-xs text-slate-300 mb-2">
                                    <strong>Peran:</strong> {{ $rp->role }} • <strong>Mitra/Institusi:</strong> {{ $rp->partner_institution }}
                                </p>
                                <p class="text-xs text-slate-400 leading-relaxed mb-4">{{ $rp->summary }}</p>

                                @if($rp->output_results)
                                    <div class="p-3.5 rounded-xl bg-white/5 border border-white/5 mb-4">
                                        <div class="text-[11px] font-bold text-cyan-400 uppercase tracking-wider mb-1">Luaran Penelitian:</div>
                                        <p class="text-xs text-slate-300 leading-relaxed">{{ $rp->output_results }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection

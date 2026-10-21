@extends('layouts.app')

@section('title', 'Katalog Proyek Teknologi | Gede Erik Aktama, S.Pd., M.Pd.')
@section('meta_description', 'Katalog portofolio proyek teknologi rekayasa AI, Computer Vision, IoT, dan pengembangan web modern oleh Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Karya & Rekayasa Perangkat Lunak
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Katalog <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Proyek Teknologi</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Solusi nyata di bidang visi komputer berdaya komputasi ringan, kendali cerdas IoT, dan platform digital terintegrasi.
            </p>
        </div>
    </div>
</section>

<!-- Category Filter Pills -->
<section class="py-6 border-b border-white/5 bg-slate-900/40 sticky top-20 z-30 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center gap-2">
        <a href="{{ route('projects') }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors {{ !request('category') ? 'bg-blue-600 text-white shadow-md' : 'bg-white/5 text-slate-300 hover:text-white' }}">
            Semua Kategori
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('projects', ['category' => $cat->slug]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors {{ request('category') === $cat->slug ? 'bg-blue-600 text-white shadow-md' : 'bg-white/5 text-slate-300 hover:text-white' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($projects->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $proj)
                    <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                        <div>
                            <div class="h-52 overflow-hidden relative">
                                <img src="{{ asset($proj->image_url ?? 'images/research-ai.jpg') }}" alt="{{ $proj->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                                <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-blue-600/90 text-white backdrop-blur-sm">
                                    {{ $proj->category->name ?? 'Teknologi' }}
                                </span>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white mb-2 hover:text-cyan-400 transition-colors">
                                    <a href="{{ route('projects.detail', $proj->slug) }}">{{ $proj->title }}</a>
                                </h3>
                                
                                <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                                    {{ $proj->solution_description }}
                                </p>

                                @if($proj->technologies)
                                    <div class="flex flex-wrap gap-1.5 mb-4">
                                        @foreach($proj->technologies as $tech)
                                            <span class="px-2 py-0.5 rounded text-[11px] font-mono text-cyan-300 bg-white/5 border border-white/5">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 pt-0 border-t border-white/5 flex items-center justify-between">
                            <span class="text-xs text-slate-400 capitalize">Status: {{ $proj->status }}</span>
                            <a href="{{ route('projects.detail', $proj->slug) }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1">
                                <span>Detail Kasus</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        @else
            <div class="text-center py-16 glass-panel rounded-2xl p-8">
                <i data-lucide="layers" class="w-12 h-12 text-slate-500 mx-auto mb-3"></i>
                <h4 class="text-lg font-bold text-white">Belum ada proyek pada kategori ini</h4>
                <p class="text-xs text-slate-400 mt-1">Silakan pilih kategori lain untuk melihat portofolio proyek.</p>
                <a href="{{ route('projects') }}" class="mt-4 inline-block px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-cyan-400 hover:bg-white/10">
                    Lihat Semua Proyek
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

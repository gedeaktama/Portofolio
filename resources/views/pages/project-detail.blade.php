@extends('layouts.app')

@section('title', $project->title . ' | Proyek Rekayasa')
@section('meta_description', Str::limit(strip_tags($project->solution_description), 160))

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('projects') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-cyan-400 mb-6 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Katalog Proyek</span>
        </a>

        <div class="flex flex-wrap items-center gap-2 mb-4">
            <span class="px-3 py-1 rounded-md text-xs font-bold bg-blue-600 text-white shadow-md">
                {{ $project->category->name ?? 'Teknologi' }}
            </span>
            <span class="px-2.5 py-0.5 rounded text-xs font-mono text-emerald-300 bg-emerald-500/15 border border-emerald-500/30 capitalize">
                {{ $project->status }}
            </span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
            {{ $project->title }}
        </h1>
    </div>
</section>

<!-- Project Detail Content -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Main Media Preview -->
        <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl relative h-80 sm:h-96">
            <img src="{{ asset($project->image_url ?? 'images/research-ai.jpg') }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
        </div>

        <!-- Problem & Solution Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Problem Statement -->
            <div class="glass-card p-6 rounded-2xl border-l-4 border-l-amber-500">
                <h3 class="text-base font-bold text-white mb-3 flex items-center gap-2">
                    <i data-lucide="alert-triangle" class="w-5 h-5 text-amber-400"></i>
                    <span>Tantangan & Masalah Nyata</span>
                </h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                    {{ $project->problem_statement ?? 'Tantangan efisiensi, akurasi, dan optimalisasi komputasi pada skenario operasional standar.' }}
                </p>
            </div>

            <!-- Solution -->
            <div class="glass-card p-6 rounded-2xl border-l-4 border-l-cyan-500">
                <h3 class="text-base font-bold text-white mb-3 flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-5 h-5 text-cyan-400"></i>
                    <span>Solusi & Arsitektur Teknis</span>
                </h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                    {{ $project->solution_description }}
                </p>
            </div>
        </div>

        <!-- Technologies & Key Features -->
        <div class="glass-card p-8 rounded-2xl space-y-6">
            <div>
                <h3 class="text-base font-bold text-white mb-3 flex items-center gap-2">
                    <i data-lucide="cpu" class="w-5 h-5 text-blue-400"></i>
                    <span>Tumpukan Teknologi (Tech Stack)</span>
                </h3>
                @if($project->technologies)
                    <div class="flex flex-wrap gap-2">
                        @foreach($project->technologies as $tech)
                            <span class="px-3 py-1.5 rounded-lg text-xs font-mono font-medium text-cyan-300 bg-white/5 border border-white/10">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>

            @if($project->key_features)
                <div class="pt-6 border-t border-white/10">
                    <h3 class="text-base font-bold text-white mb-3 flex items-center gap-2">
                        <i data-lucide="list-checks" class="w-5 h-5 text-emerald-400"></i>
                        <span>Fitur Utama & Keunggulan</span>
                    </h3>
                    <div class="text-xs sm:text-sm text-slate-300 leading-relaxed whitespace-pre-line">
                        {{ $project->key_features }}
                    </div>
                </div>
            @endif
        </div>

        <!-- Links Action Bar -->
        @if($project->demo_url || $project->repository_url)
            <div class="glass-panel p-6 rounded-2xl flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h4 class="text-sm font-bold text-white">Tautan Akses Publik</h4>
                    <p class="text-xs text-slate-400 mt-0.5">Eksplorasi demonstrasi aplikasi atau kode sumber terbuka jika tersedia.</p>
                </div>
                <div class="flex items-center gap-3">
                    @if($project->repository_url)
                        <a href="{{ $project->repository_url }}" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-slate-200 hover:text-white hover:bg-white/10 flex items-center gap-1.5 transition-colors">
                            <i data-lucide="github" class="w-4 h-4"></i>
                            <span>Repositori GitHub</span>
                        </a>
                    @endif
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg flex items-center gap-1.5 hover:shadow-cyan-500/25 transition-all">
                            <span>Buka Live Demo</span>
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        <!-- Related Projects -->
        @if($relatedProjects->count() > 0)
            <div class="pt-6">
                <h3 class="text-lg font-bold text-white mb-4">Proyek Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($relatedProjects as $rel)
                        <a href="{{ route('projects.detail', $rel->slug) }}" class="glass-card p-4 rounded-xl block hover:border-cyan-500/40 transition-colors">
                            <span class="text-[10px] font-bold text-blue-400">{{ $rel->category->name ?? 'Teknologi' }}</span>
                            <h4 class="text-xs font-bold text-white mt-1 line-clamp-1">{{ $rel->title }}</h4>
                            <p class="text-[11px] text-slate-400 mt-2 line-clamp-2">{{ $rel->solution_description }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection

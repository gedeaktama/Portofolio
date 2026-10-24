@extends('layouts.app')

@section('title', ($post->seo_title ?? $post->title) . ' | Blog Gede Erik Aktama')
@section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->summary ?? $post->content), 160))
@section('og_type', 'article')
@section('og_image', asset($post->featured_image ?? 'images/workshop-seminar.jpg'))

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-cyan-400 mb-6 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Semua Artikel</span>
        </a>

        <div class="flex flex-wrap items-center gap-2 mb-4">
            <span class="px-3 py-1 rounded-md text-xs font-bold bg-blue-600 text-white shadow-md">
                {{ $post->category->name ?? 'Wawasan' }}
            </span>
            <span class="text-xs text-slate-400 flex items-center gap-1">
                <i data-lucide="calendar" class="w-3.5 h-3.5 text-cyan-400"></i>
                <span>{{ $post->published_at ? $post->published_at->format('d F Y') : date('d F Y') }}</span>
            </span>
            <span>•</span>
            <span class="text-xs text-slate-400 flex items-center gap-1">
                <i data-lucide="clock" class="w-3.5 h-3.5 text-cyan-400"></i>
                <span>{{ $post->reading_time_minutes }} menit baca</span>
            </span>
            <span>•</span>
            <span class="text-xs text-slate-400 flex items-center gap-1">
                <i data-lucide="eye" class="w-3.5 h-3.5 text-cyan-400"></i>
                <span>{{ $post->views_count }} tayangan</span>
            </span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
            {{ $post->title }}
        </h1>
    </div>
</section>

<!-- Article Body -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Featured Image -->
        @if($post->featured_image)
            <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl relative h-80 sm:h-96">
                <img src="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <!-- Summary Lead -->
        @if($post->summary)
            <div class="p-6 rounded-2xl bg-blue-500/10 border-l-4 border-l-cyan-400 text-sm sm:text-base text-cyan-200 leading-relaxed font-medium italic">
                {{ $post->summary }}
            </div>
        @endif

        <!-- Content -->
        <div class="glass-card p-8 sm:p-12 rounded-3xl text-slate-300 leading-relaxed space-y-6 text-sm sm:text-base text-justify">
            {!! $post->content !!}
        </div>

        <!-- Tags & Share Row -->
        <div class="glass-panel p-6 rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <!-- Tags -->
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-xs font-bold text-slate-400">Tag:</span>
                @forelse($post->tags as $tag)
                    <a href="{{ route('blog', ['tag' => $tag->slug]) }}" class="px-2.5 py-1 rounded-md text-xs font-medium bg-white/5 border border-white/10 text-cyan-300 hover:bg-white/10 transition-colors">
                        #{{ $tag->name }}
                    </a>
                @empty
                    <span class="text-xs text-slate-500">Umum</span>
                @endforelse
            </div>

            <!-- Share Buttons -->
            <div class="flex items-center gap-2" x-data="{ copied: false }">
                <span class="text-xs font-bold text-slate-400">Bagikan:</span>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-emerald-500/20 text-emerald-400 hover:bg-emerald-500/30 transition-colors" title="Bagikan ke WhatsApp">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-lg bg-blue-500/20 text-blue-400 hover:bg-blue-500/30 transition-colors" title="Bagikan ke LinkedIn">
                    <i data-lucide="linkedin" class="w-4 h-4"></i>
                </a>
                <button type="button" @click="navigator.clipboard.writeText('{{ url()->current() }}'); copied = true; setTimeout(() => copied = false, 2000)" class="p-2 rounded-lg bg-white/10 text-slate-300 hover:bg-white/20 transition-colors relative" title="Salin Tautan">
                    <i data-lucide="link" class="w-4 h-4"></i>
                    <span x-show="copied" x-cloak class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-0.5 rounded bg-blue-600 text-[10px] text-white whitespace-nowrap">Tersalin!</span>
                </button>
            </div>
        </div>

        <!-- Author Box -->
        <div class="glass-card p-6 sm:p-8 rounded-2xl flex flex-col sm:flex-row items-center gap-6">
            <div class="w-20 h-20 rounded-2xl overflow-hidden border border-cyan-500/30 shrink-0 bg-slate-900/60">
                <img src="{{ asset('images/profile.png') }}" alt="Gede Erik Aktama" class="w-full h-full object-cover object-top">
            </div>
            <div class="space-y-1 text-center sm:text-left">
                <h4 class="text-base font-bold text-white">{{ $post->author->name ?? 'Gede Erik Aktama, S.Pd., M.Pd.' }}</h4>
                <p class="text-xs text-cyan-400 font-semibold">Dosen Sistem Komputer & Fasilitator Nasional KKA</p>
                <p class="text-xs text-slate-400 leading-relaxed pt-1">
                    Akademisi Universitas Parna Raya dan CEO PT Aktama Digital Antika yang berdedikasi memajukan adopsi teknologi cerdas dan pendidikan bermutu di Indonesia.
                </p>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->count() > 0)
            <div class="pt-8">
                <h3 class="text-xl font-bold text-white mb-6">Artikel Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $rel)
                        <a href="{{ route('blog.detail', $rel->slug) }}" class="glass-card p-5 rounded-2xl block hover:border-cyan-500/40 transition-colors">
                            <span class="text-[10px] font-bold text-blue-400 uppercase tracking-wider">{{ $rel->category->name ?? 'Wawasan' }}</span>
                            <h4 class="text-sm font-bold text-white mt-1 mb-2 line-clamp-2">{{ $rel->title }}</h4>
                            <p class="text-xs text-slate-400 line-clamp-2">{{ $rel->summary }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection

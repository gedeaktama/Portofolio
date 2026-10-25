@extends('layouts.app')

@section('title', 'Blog, Wawasan AI & Edukasi Teknologi | Gede Erik Aktama')
@section('meta_description', 'Artikel, tutorial praktis kecerdasan artifisial, kurikulum pendidikan tinggi, dan teknologi rekayasa oleh Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Artikel & Gagasan
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Blog & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Wawasan Teknologi</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Ulasan mendalam seputar AI praktis, kurikulum OBE, asesmen RPL, dan strategi digitalisasi masyarakat.
            </p>

            <div class="mt-6 p-4 rounded-2xl bg-gradient-to-r from-blue-600/20 via-cyan-500/20 to-blue-900/30 border border-cyan-500/30 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
                        <i data-lucide="newspaper" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-white">Pusat Artikel & Edukasi Resmi</div>
                        <div class="text-xs text-slate-300">Artikel lengkap dan tutorial praktis dipublikasikan terpusat di aktama.com.</div>
                    </div>
                </div>
                <a href="https://aktama.com/artikel" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-blue-600 to-cyan-500 hover:shadow-lg hover:shadow-cyan-500/30 flex items-center gap-1.5 shrink-0">
                    <span>Kunjungi aktama.com/artikel</span>
                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Filter & Search Bar -->
<section class="py-6 border-b border-white/5 bg-slate-900/40 sticky top-20 z-30 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('blog') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-3">
            <div class="relative flex-grow w-full">
                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel, topik, atau kata kunci..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-cyan-400">
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select name="category" class="px-4 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-xs text-slate-200 focus:outline-none focus:border-cyan-400 w-full sm:w-auto">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-blue-600 text-white text-xs font-semibold hover:bg-blue-500 transition-colors shrink-0">
                    Cari
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Blog Listing -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                        <div>
                            <div class="h-52 overflow-hidden relative">
                                <img src="{{ asset($post->featured_image ?? 'images/workshop-seminar.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                                <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-blue-600/90 text-white backdrop-blur-sm">
                                    {{ $post->category->name ?? 'Wawasan' }}
                                </span>
                            </div>

                            <div class="p-6">
                                <div class="flex items-center gap-3 text-xs text-slate-400 mb-2">
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-cyan-400"></i>
                                        <span>{{ $post->published_at ? $post->published_at->format('d M Y') : date('d M Y') }}</span>
                                    </span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="clock" class="w-3.5 h-3.5 text-cyan-400"></i>
                                        <span>{{ $post->reading_time_minutes }} menit baca</span>
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold text-white mb-2 hover:text-cyan-400 transition-colors leading-snug">
                                    <a href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a>
                                </h3>

                                <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                                    {{ $post->summary }}
                                </p>
                            </div>
                        </div>

                        <div class="p-6 pt-0 border-t border-white/5 flex items-center justify-between">
                            <span class="text-xs text-slate-400">Oleh: {{ $post->author->name ?? 'Gede Erik Aktama' }}</span>
                            <a href="{{ route('blog.detail', $post->slug) }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1">
                                <span>Baca Artikel</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-16 glass-panel rounded-2xl p-8">
                <i data-lucide="newspaper" class="w-12 h-12 text-slate-500 mx-auto mb-3"></i>
                <h4 class="text-lg font-bold text-white">Belum ada artikel ditemukan</h4>
                <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci pencarian yang lain.</p>
                <a href="{{ route('blog') }}" class="mt-4 inline-block px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-cyan-400 hover:bg-white/10">
                    Lihat Semua Artikel
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

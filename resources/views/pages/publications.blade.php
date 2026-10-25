@extends('layouts.app')

@section('title', 'Katalog Buku Ber-ISBN & Publikasi Ilmiah | Gede Erik Aktama, S.Pd., M.Pd.')
@section('meta_description', 'Katalog 5 buku referensi/ajar ber-ISBN resmi Perpustakaan Nasional RI, karya cipta modul HKI Kemenkumham, serta publikasi jurnal SINTA oleh Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Karya Intelektual & Akademik
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Karya Buku Ber-ISBN & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Publikasi Riset</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Dokumentasi 5 buku referensi ber-ISBN terdaftar Perpusnas RI, karya cipta modul HKI Kemenkumham, serta publikasi ilmiah terindeks SINTA yang valid dan dapat diverifikasi.
            </p>
        </div>
    </div>
</section>

<!-- Filter & Search Section -->
<section class="py-8 border-b border-white/5 bg-slate-900/40 sticky top-20 z-30 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('publications') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-center">
            <!-- Search Box -->
            <div class="lg:col-span-5 relative">
                <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul buku, ISBN, penulis, kata kunci..." class="w-full pl-10 pr-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-sm text-white placeholder-slate-400 focus:outline-none focus:border-cyan-400 transition-colors">
            </div>

            <!-- Category Filter -->
            <div class="lg:col-span-3">
                <select name="category" class="w-full px-3 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-sm text-slate-200 focus:outline-none focus:border-cyan-400">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Year Filter -->
            <div class="lg:col-span-2">
                <select name="year" class="w-full px-3 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-sm text-slate-200 focus:outline-none focus:border-cyan-400">
                    <option value="">Semua Tahun</option>
                    @foreach($years as $yr)
                        <option value="{{ $yr }}" {{ request('year') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sort Order -->
            <div class="lg:col-span-2 flex gap-2">
                <select name="sort" class="w-full px-3 py-2.5 rounded-xl bg-slate-900 border border-white/10 text-sm text-slate-200 focus:outline-none focus:border-cyan-400">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-blue-600 text-white text-xs font-semibold hover:bg-blue-500 transition-colors">
                    Filter
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Publications Cards Listing -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($publications->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($publications as $pub)
                    <div class="glass-card p-6 rounded-2xl flex flex-col justify-between hover:border-cyan-500/40 transition-all duration-300">
                        <div>
                            <!-- Certificate Image Thumbnail if exists -->
                            @if($pub->file_path)
                                <div class="mb-4 h-44 rounded-xl overflow-hidden border border-white/10 bg-slate-900/60 relative group">
                                    <img src="{{ asset($pub->file_path) }}" alt="{{ $pub->title }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-2.5">
                                        <span class="text-[10px] font-semibold text-cyan-300 flex items-center gap-1">
                                            <i data-lucide="award" class="w-3.5 h-3.5"></i>
                                            <span>Sertifikat Penulis Resmi</span>
                                        </span>
                                    </div>
                                </div>
                            @endif

                            <!-- Header Badges -->
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

                            <!-- Authors & Publisher/Journal -->
                            <p class="text-xs text-slate-400 mb-1">
                                <span class="text-slate-300 font-medium">{{ $pub->authors }}</span>
                            </p>
                            <p class="text-xs text-cyan-400 font-medium mb-3">
                                {{ $pub->journal_name }}
                                @if($pub->volume) • {{ $pub->volume }} @endif
                            </p>

                            <!-- Abstract snippet -->
                            <p class="text-xs text-slate-400 line-clamp-3 leading-relaxed mb-4">
                                {{ $pub->abstract }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-white/5 flex items-center justify-between">
                            <span class="text-[11px] text-slate-400">{{ $pub->category }}</span>
                            <div class="flex items-center gap-3">
                                @if($pub->url)
                                    <a href="{{ $pub->url }}" target="_blank" rel="noopener noreferrer" class="text-xs text-slate-400 hover:text-cyan-400" title="Verifikasi Tautan">
                                        <i data-lucide="external-link" class="w-4 h-4"></i>
                                    </a>
                                @endif
                                <a href="{{ route('publications.detail', $pub->slug) }}" class="text-xs font-semibold text-blue-400 hover:text-cyan-300 flex items-center gap-1">
                                    <span>Detail & Verifikasi</span>
                                    <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $publications->links() }}
            </div>
        @else
            <div class="text-center py-16 glass-panel rounded-2xl p-8">
                <i data-lucide="file-question" class="w-12 h-12 text-slate-500 mx-auto mb-3"></i>
                <h4 class="text-lg font-bold text-white">Tidak ada publikasi ditemukan</h4>
                <p class="text-xs text-slate-400 mt-1">Coba gunakan kata kunci lain atau reset filter kategori.</p>
                <a href="{{ route('publications') }}" class="mt-4 inline-block px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-cyan-400 hover:bg-white/10">
                    Reset Filter
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

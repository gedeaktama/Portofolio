@extends('layouts.app')

@section('title', $publication->title . ' | Publikasi Ilmiah')
@section('meta_description', Str::limit(strip_tags($publication->abstract), 160))

@section('content')
<!-- Detail Header -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('publications') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-cyan-400 mb-6 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            <span>Kembali ke Direktori Publikasi</span>
        </a>

        <div class="flex flex-wrap items-center gap-2 mb-4">
            <span class="px-3 py-1 rounded-md text-xs font-bold bg-amber-500/15 text-amber-300 border border-amber-500/30">
                {{ $publication->indexing_status }}
            </span>
            @if($publication->is_first_author)
                <span class="px-3 py-1 rounded-md text-xs font-medium bg-blue-500/15 text-blue-300 border border-blue-500/30">
                    Penulis Pertama
                </span>
            @endif
            <span class="px-2.5 py-0.5 rounded text-xs font-mono text-slate-400 bg-white/5">
                Tahun {{ $publication->publication_year }}
            </span>
            <span class="px-2.5 py-0.5 rounded text-xs text-cyan-300 bg-cyan-500/10 border border-cyan-500/20">
                {{ $publication->category }}
            </span>
        </div>

        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight leading-snug">
            {{ $publication->title }}
        </h1>

        <div class="mt-4 pt-4 border-t border-white/10 text-xs sm:text-sm text-slate-300 flex flex-wrap gap-4">
            <div><strong>Penulis:</strong> {{ $publication->authors }}</div>
            <div><strong>Jurnal:</strong> {{ $publication->journal_name }}</div>
            @if($publication->volume)
                <div><strong>Volume/No:</strong> {{ $publication->volume }} {{ $publication->issue }}</div>
            @endif
            @if($publication->pages)
                <div><strong>Halaman:</strong> {{ $publication->pages }}</div>
            @endif
        </div>
    </div>
</section>

<!-- Main Article Info & Citation -->
<section class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Abstract Box -->
        <div class="glass-card p-8 rounded-2xl">
            <h3 class="text-lg font-bold text-white mb-3 flex items-center gap-2">
                <i data-lucide="book-open" class="w-5 h-5 text-cyan-400"></i>
                <span>Abstrak Penelitian</span>
            </h3>
            <p class="text-sm text-slate-300 leading-relaxed text-justify">
                {{ $publication->abstract }}
            </p>

            @if($publication->keywords)
                <div class="mt-6 pt-4 border-t border-white/10">
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider block mb-2">Kata Kunci (Keywords):</span>
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(explode(',', $publication->keywords) as $kw)
                            <span class="px-2.5 py-1 rounded text-xs font-medium bg-white/5 border border-white/10 text-slate-300">
                                {{ trim($kw) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Links and Direct Access -->
        <div class="glass-panel p-6 rounded-2xl flex flex-wrap items-center justify-between gap-4 border-l-4 border-l-blue-500">
            <div>
                <h4 class="text-sm font-bold text-white">Akses Naskah & Sitasi Resmi</h4>
                <p class="text-xs text-slate-400 mt-0.5">Tautan langsung ke penerbit jurnal dan verifikasi indeksasi.</p>
            </div>
            <div class="flex items-center gap-3">
                @if($publication->doi)
                    <a href="https://doi.org/{{ $publication->doi }}" target="_blank" rel="noopener noreferrer" class="px-4 py-2 rounded-xl text-xs font-semibold bg-white/5 border border-white/10 text-slate-200 hover:text-white hover:bg-white/10 transition-colors flex items-center gap-1.5">
                        <i data-lucide="link" class="w-3.5 h-3.5 text-cyan-400"></i>
                        <span>DOI: {{ $publication->doi }}</span>
                    </a>
                @endif
                @if($publication->url)
                    <a href="{{ $publication->url }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-xl text-xs font-semibold bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg flex items-center gap-1.5 hover:shadow-cyan-500/25 transition-all">
                        <span>Buka di Penerbit / SINTA</span>
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    </a>
                @endif
            </div>
        </div>

        <!-- Copyable Citation Box (APA 7th & BibTeX) -->
        <div class="glass-card p-6 rounded-2xl" x-data="{ format: 'apa', copied: false }">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-sm font-bold text-white flex items-center gap-2">
                    <i data-lucide="quote" class="w-4 h-4 text-cyan-400"></i>
                    <span>Kutipan Sitasi (Citation Format)</span>
                </h4>
                <div class="flex items-center gap-2 bg-white/5 p-1 rounded-lg border border-white/10 text-xs">
                    <button type="button" @click="format = 'apa'" :class="format === 'apa' ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white'" class="px-2.5 py-1 rounded font-medium transition-colors">
                        APA 7th
                    </button>
                    <button type="button" @click="format = 'bibtex'" :class="format === 'bibtex' ? 'bg-blue-600 text-white' : 'text-slate-400 hover:text-white'" class="px-2.5 py-1 rounded font-medium transition-colors">
                        BibTeX
                    </button>
                </div>
            </div>

            <!-- APA Block -->
            <div x-show="format === 'apa'" class="p-4 rounded-xl bg-slate-950 font-mono text-xs text-slate-300 leading-relaxed relative">
                <span id="citation-apa">{{ $publication->authors }} ({{ $publication->publication_year }}). {{ $publication->title }}. <em>{{ $publication->journal_name }}</em>@if($publication->volume), {{ $publication->volume }}@endif@if($publication->issue)({{ $publication->issue }})@endif@if($publication->pages), {{ $publication->pages }}@endif.@if($publication->doi) https://doi.org/{{ $publication->doi }}@endif</span>
                <button type="button" @click="navigator.clipboard.writeText(document.getElementById('citation-apa').innerText); copied = true; setTimeout(() => copied = false, 2000)" class="mt-3 px-3 py-1.5 rounded bg-white/10 hover:bg-white/20 text-xs text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                    <span x-text="copied ? 'Tersalin ke Clipboard!' : 'Salin Kutipan APA'"></span>
                </button>
            </div>

            <!-- BibTeX Block -->
            <div x-show="format === 'bibtex'" x-cloak class="p-4 rounded-xl bg-slate-950 font-mono text-xs text-slate-300 leading-relaxed relative">
                <pre id="citation-bibtex">@article{aktama{{ $publication->publication_year }},
  title={ {{ $publication->title }} },
  author={ {{ $publication->authors }} },
  journal={ {{ $publication->journal_name }} },
  year={ {{ $publication->publication_year }} },
  volume={ {{ $publication->volume ?? '1' }} }
}</pre>
                <button type="button" @click="navigator.clipboard.writeText(document.getElementById('citation-bibtex').innerText); copied = true; setTimeout(() => copied = false, 2000)" class="mt-3 px-3 py-1.5 rounded bg-white/10 hover:bg-white/20 text-xs text-cyan-300 flex items-center gap-1.5 transition-colors">
                    <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                    <span x-text="copied ? 'Tersalin ke Clipboard!' : 'Salin BibTeX'"></span>
                </button>
            </div>
        </div>

        <!-- Related Publications -->
        @if($relatedPublications->count() > 0)
            <div class="pt-6">
                <h3 class="text-lg font-bold text-white mb-4">Publikasi Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach($relatedPublications as $rel)
                        <a href="{{ route('publications.detail', $rel->slug) }}" class="glass-card p-4 rounded-xl block hover:border-cyan-500/40 transition-colors">
                            <span class="text-[10px] font-bold text-amber-400">{{ $rel->indexing_status }}</span>
                            <h4 class="text-xs font-bold text-white mt-1 line-clamp-2">{{ $rel->title }}</h4>
                            <p class="text-[11px] text-slate-400 mt-2 font-mono">{{ $rel->publication_year }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection

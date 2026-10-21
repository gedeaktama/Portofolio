@extends('layouts.app')

@section('title', 'Pelatihan, Seminar & Bimtek Nasional | Gede Erik Aktama')
@section('meta_description', 'Direktori kegiatan pelatihan AI perkantoran Polres Mitra, Bimtek KKA Kemdikdasmen, serta seminar teknologi oleh Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Fasilitasi & Kepelatihan
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Pelatihan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Seminar Nasional</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Penyampaian materi aplikatif dan terstruktur berbasis studi kasus nyata untuk instansi kepolisian, pendidik nasional, dan korporasi.
            </p>
        </div>
    </div>
</section>

<!-- Trainings Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($trainings as $tr)
                <div class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="h-52 overflow-hidden relative">
                            <img src="{{ asset($tr->image_url ?? 'images/workshop-seminar.jpg') }}" alt="{{ $tr->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0e172c] via-transparent to-transparent"></div>
                            <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-blue-600/90 text-white backdrop-blur-sm">
                                {{ $tr->role }}
                            </span>
                            @if($tr->event_date)
                                <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-mono bg-black/60 text-slate-200 backdrop-blur-sm">
                                    {{ $tr->event_date->format('d M Y') }}
                                </span>
                            @endif
                        </div>

                        <div class="p-6">
                            <div class="text-xs text-cyan-400 font-bold uppercase tracking-wider mb-1">
                                {{ $tr->organizer }}
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2">
                                {{ $tr->title }}
                            </h3>
                            <p class="text-xs text-slate-300 font-medium mb-3">
                                <strong>Tema:</strong> {{ $tr->theme }}
                            </p>
                            <p class="text-xs text-slate-400 leading-relaxed mb-4">
                                {{ $tr->description }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0 border-t border-white/5 flex items-center justify-between">
                        <span class="text-xs text-slate-400 flex items-center gap-1">
                            <i data-lucide="map-pin" class="w-3.5 h-3.5 text-cyan-400"></i>
                            <span>{{ $tr->location ?? 'Sulawesi Utara' }}</span>
                        </span>
                        <a href="{{ route('contact') }}" class="text-xs font-semibold text-cyan-400 hover:text-white flex items-center gap-1">
                            <span>Undang Pemateri</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $trainings->links() }}
        </div>
    </div>
</section>
@endsection

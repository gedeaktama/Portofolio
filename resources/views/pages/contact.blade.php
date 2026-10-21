@extends('layouts.app')

@section('title', 'Hubungi & Kolaborasi | Gede Erik Aktama, S.Pd., M.Pd.')
@section('meta_description', 'Kirimkan permohonan narasumber, pelatihan AI instansi, konsultasi kurikulum OBE / RPL, atau kemitraan riset kepada Gede Erik Aktama.')

@section('content')
<!-- Header Banner -->
<section class="py-16 border-b border-white/5 bg-[#0a0f20]/60 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 mb-3">
                Saluran Komunikasi Resmi
            </span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight">
                Hubungi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">Mulai Kolaborasi</span>
            </h1>
            <p class="mt-3 text-base sm:text-lg text-slate-300">
                Terbuka untuk undangan narasumber, pelatihan kecerdasan artifisial terapan, konsultasi akademik RPL/OBE, dan kemitraan riset.
            </p>
        </div>
    </div>
</section>

<!-- Contact Form and Channels Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Info Panel -->
            <div class="lg:col-span-5 space-y-6">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-2">Informasi Kontak & Domisili</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Silakan hubungi melalui kanal resmi institusi atau kirimkan formulir untuk penjadwalan agenda narasumber dan kerjasama teknologi.
                    </p>
                </div>

                <!-- Channels List -->
                <div class="space-y-4">
                    <!-- Location -->
                    <div class="glass-card p-4 rounded-2xl flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Domisili & Kampus</h4>
                            <p class="text-xs text-slate-400 mt-0.5">Manado, Sulawesi Utara, Indonesia</p>
                            <p class="text-xs text-cyan-400 mt-0.5">Universitas Parna Raya (UNIPAR)</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="glass-card p-4 rounded-2xl flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Alamat Surel Resmi</h4>
                            <p class="text-xs text-slate-400 mt-0.5">Korespondensi akademik & undangan pelatihan:</p>
                            <a href="mailto:erikaktama@parnaraya.ac.id" class="text-xs font-semibold text-cyan-400 hover:text-white transition-colors">
                                erikaktama@parnaraya.ac.id
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp Quick Reach -->
                    <a href="https://wa.me/?text=Halo%20Pak%20Gede%20Erik%20Aktama,%20saya%20tertarik%20untuk%20berdiskusi%20kolaborasi." target="_blank" rel="noopener noreferrer" class="glass-card p-4 rounded-2xl flex items-start gap-4 border-emerald-500/30 hover:bg-emerald-500/10 block transition-all">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Pesan Langsung WhatsApp</h4>
                            <p class="text-xs text-slate-400 mt-0.5">Klik untuk memulai percakapan cepat via WhatsApp</p>
                            <span class="text-xs font-semibold text-emerald-400 mt-0.5 inline-block">Kirim Pesan WhatsApp →</span>
                        </div>
                    </a>
                </div>

                <!-- Administrative Notice -->
                <div class="glass-panel p-6 rounded-2xl border-l-4 border-l-cyan-400">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-1">Catatan Persuratan Resmi</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Untuk kebutuhan Surat Tugas Narasumber, draft Perjanjian Kerjasama (MoU/MoA), atau SK Pelatihan, format administratif formal siap disiapkan sesuai tata kelola baku.
                    </p>
                </div>
            </div>

            <!-- Right Form Panel -->
            <div class="lg:col-span-7">
                <div class="glass-card p-8 sm:p-10 rounded-3xl border border-white/10 shadow-2xl">
                    <h3 class="text-2xl font-bold text-white mb-2">Formulir Permohonan & Pesan</h3>
                    <p class="text-xs sm:text-sm text-slate-400 mb-8">
                        Lengkapi rincian formulir di bawah ini. Pesan Anda akan langsung tersimpan secara aman di sistem.
                    </p>

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        <!-- Anti-spam Honeypot (hidden from real users) -->
                        <div class="hidden" aria-hidden="true">
                            <input type="text" name="website_url_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                                Nama Lengkap / Instansi <span class="text-rose-400">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Panitia Seminar / Humas Polres / Dosen LPPM" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 @error('name') border-rose-500 @enderror">
                            @error('name')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email & Phone Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                                    Alamat Email <span class="text-rose-400">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@instansi.ac.id" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 @error('email') border-rose-500 @enderror">
                                @error('email')
                                    <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                                    Nomor Telepon / WhatsApp
                                </label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400">
                            </div>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                                Subjek Permohonan <span class="text-rose-400">*</span>
                            </label>
                            <select id="subject" name="subject" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-white/10 text-sm text-white focus:outline-none focus:border-cyan-400 @error('subject') border-rose-500 @enderror">
                                <option value="Undangan Pemateri Pelatihan AI" {{ old('subject') == 'Undangan Pemateri Pelatihan AI' ? 'selected' : '' }}>Undangan Pemateri Pelatihan AI Administratif</option>
                                <option value="Bimtek KKA Kemdikdasmen" {{ old('subject') == 'Bimtek KKA Kemdikdasmen' ? 'selected' : '' }}>Bimbingan Teknis Koding & AI (KKA Kemdikdasmen)</option>
                                <option value="Konsultasi RPL UNIPAR" {{ old('subject') == 'Konsultasi RPL UNIPAR' ? 'selected' : '' }}>Konsultasi Rekognisi Pembelajaran Lampau (RPL 2024)</option>
                                <option value="Kolaborasi Riset Ilmiah" {{ old('subject') == 'Kolaborasi Riset Ilmiah' ? 'selected' : '' }}>Kolaborasi Riset & Publikasi Jurnal</option>
                                <option value="Layanan Aktama Digital" {{ old('subject') == 'Layanan Aktama Digital' ? 'selected' : '' }}>Layanan Pelatihan & Solusi Aktama Digital</option>
                                <option value="Pertanyaan / Kerjasama Lainnya" {{ old('subject') == 'Pertanyaan / Kerjasama Lainnya' ? 'selected' : '' }}>Pertanyaan / Kerjasama Lainnya</option>
                            </select>
                            @error('subject')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">
                                Isi Pesan & Rincian Agenda <span class="text-rose-400">*</span>
                            </label>
                            <textarea id="message" name="message" rows="5" placeholder="Tuliskan estimasi tanggal acara, institusi penyelenggara, tujuan kegiatan, atau pokok bahasan yang ingin didiskusikan..." required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-white/10 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 @error('message') border-rose-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full py-3.5 px-6 rounded-xl font-semibold text-white bg-gradient-to-r from-blue-600 to-cyan-500 shadow-xl shadow-blue-500/25 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            <span>Kirimkan Formulir Sekarang</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

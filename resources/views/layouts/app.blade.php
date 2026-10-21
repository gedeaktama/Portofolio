<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'Gede Erik Aktama, S.Pd., M.Pd. | Personal Portfolio')</title>
    <meta name="description" content="@yield('meta_description', 'Website portofolio resmi Gede Erik Aktama, S.Pd., M.Pd. - Dosen Sistem Komputer UNIPAR, Fasilitator Nasional KKA Kemdikdasmen, dan CEO Aktama Digital.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Gede Erik Aktama, Dosen Sistem Komputer, Universitas Parna Raya, Fasilitator Nasional KKA, Kecerdasan Artifisial, Aktama Digital, Manado')">
    <meta name="author" content="Gede Erik Aktama, S.Pd., M.Pd.">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Gede Erik Aktama, S.Pd., M.Pd. | Personal Portfolio')">
    <meta property="og:description" content="@yield('meta_description', 'Website portofolio resmi Gede Erik Aktama, S.Pd., M.Pd. - Dosen Sistem Komputer UNIPAR, Fasilitator Nasional KKA Kemdikdasmen, dan CEO Aktama Digital.')">
    <meta property="og:image" content="@yield('og_image', asset('images/profile.png'))">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Gede Erik Aktama, S.Pd., M.Pd. | Personal Portfolio')">
    <meta name="twitter:description" content="@yield('meta_description', 'Website portofolio resmi Gede Erik Aktama, S.Pd., M.Pd. - Dosen Sistem Komputer UNIPAR, Fasilitator Nasional KKA Kemdikdasmen, dan CEO Aktama Digital.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/profile.png'))">

    <!-- Structured Data JSON-LD (Schema.org Person) -->
    <script type="application/ld+json">
    {
      "{{ '@' }}context": "https://schema.org",
      "{{ '@' }}type": "Person",
      "name": "Gede Erik Aktama, S.Pd., M.Pd.",
      "jobTitle": "Dosen Sistem Komputer & Fasilitator Nasional KKA",
      "worksFor": {
        "{{ '@' }}type": "CollegeOrUniversity",
        "name": "Universitas Parna Raya"
      },
      "alumniOf": "Universitas Parna Raya",
      "url": "{{ url('/') }}",
      "address": {
        "{{ '@' }}type": "PostalAddress",
        "addressLocality": "Manado",
        "addressRegion": "Sulawesi Utara",
        "addressCountry": "ID"
      }
    }
    </script>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='25' fill='%232563eb'/><text x='50%' y='63%' font-size='50' font-weight='800' fill='white' font-family='sans-serif' text-anchor='middle'>GE</text></svg>">

    <!-- Vite Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070c18] text-slate-200 antialiased selection:bg-blue-600 selection:text-white flex flex-col min-h-screen relative overflow-x-hidden" x-data="{ mobileMenu: false }">

    <!-- Ambient Grid & Glow Background -->
    <div class="fixed inset-0 pointer-events-none z-0 opacity-40" style="background-image: radial-gradient(circle at 15% 15%, rgba(37,99,235,0.12) 0%, transparent 45%), radial-gradient(circle at 85% 35%, rgba(6,182,212,0.10) 0%, transparent 45%), radial-gradient(circle at 50% 85%, rgba(79,70,229,0.08) 0%, transparent 50%);"></div>

    <!-- ==========================================================================
         TOP NAVIGATION BAR
         ========================================================================== -->
    <header class="sticky top-0 z-50 glass-panel border-b border-white/10 backdrop-blur-md transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3.5 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center font-extrabold text-white text-xl shadow-lg shadow-blue-500/30 group-hover:scale-105 transition-transform duration-300">
                        GE
                    </div>
                    <div class="flex flex-col">
                        <span class="text-base font-bold text-white tracking-tight group-hover:text-cyan-400 transition-colors">Gede Erik Aktama</span>
                        <span class="text-xs font-semibold text-cyan-400 uppercase tracking-wider">S.Pd., M.Pd.</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profile') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('profile') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Profil
                    </a>
                    <a href="{{ route('publications') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('publications*') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Publikasi
                    </a>
                    <a href="{{ route('research.community') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('research.community') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Riset & PKM
                    </a>
                    <a href="{{ route('projects') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('projects*') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Proyek
                    </a>
                    <a href="{{ route('academic') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('academic') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        UNIPAR & RPL
                    </a>
                    <a href="{{ route('trainings') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('trainings') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Pelatihan
                    </a>
                    <a href="{{ route('ventures') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('ventures') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Aktama Digital
                    </a>
                    <a href="{{ route('blog') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('blog*') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Blog
                    </a>
                    <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-white bg-blue-600/20 text-blue-400 border border-blue-500/30' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Kontak
                    </a>
                </nav>

                <!-- Action Button & Admin Portal Link -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ url('/admin') }}" class="text-xs px-3 py-1.5 rounded-lg border border-white/10 text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        Admin Portal
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-blue-600 to-cyan-500 text-white shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:-translate-y-0.5 transition-all duration-300">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>Kolaborasi</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenu = !mobileMenu" type="button" class="lg:hidden p-2.5 rounded-xl bg-white/5 border border-white/10 text-slate-300 hover:text-white focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden border-t border-white/10 bg-[#0c1427]/95 backdrop-blur-xl px-4 pt-3 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Beranda</a>
            <a href="{{ route('profile') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Profil</a>
            <a href="{{ route('publications') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Publikasi Ilmiah</a>
            <a href="{{ route('research.community') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Penelitian & PKM</a>
            <a href="{{ route('projects') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Proyek Teknologi</a>
            <a href="{{ route('academic') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Akademik & RPL</a>
            <a href="{{ route('trainings') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Pelatihan & Seminar</a>
            <a href="{{ route('ventures') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Aktama Digital & Music</a>
            <a href="{{ route('blog') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Blog & Artikel</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium text-slate-200 hover:bg-white/10">Kontak</a>
            <div class="pt-4 flex flex-col gap-2">
                <a href="{{ route('contact') }}" class="w-full text-center py-2.5 px-4 rounded-xl bg-blue-600 text-white font-semibold shadow-md">Hubungi Saya</a>
                <a href="{{ url('/admin') }}" class="w-full text-center py-2 px-4 rounded-xl border border-white/10 text-slate-300 font-medium">Dashboard Admin</a>
            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4 z-40 relative">
        @if (session('success'))
            <div class="p-4 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 flex items-center justify-between shadow-lg">
                <div class="flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white">✕</button>
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 rounded-xl bg-red-500/15 border border-red-500/30 text-red-300 flex items-center justify-between shadow-lg">
                <div class="flex items-center gap-3">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-400"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-white">✕</button>
            </div>
        @endif
    </div>

    <!-- ==========================================================================
         MAIN CONTENT INJECTION
         ========================================================================== -->
    <main class="flex-grow z-10 relative">
        @yield('content')
    </main>

    <!-- ==========================================================================
         FOOTER
         ========================================================================== -->
    <footer class="border-t border-white/10 bg-[#050811] text-slate-400 py-12 z-10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-10 border-b border-white/5">
                <!-- Col 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-cyan-500 flex items-center justify-center font-extrabold text-white text-lg">
                            GE
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-white">Gede Erik Aktama</h4>
                            <p class="text-xs text-cyan-400 font-medium">S.Pd., M.Pd.</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Dosen Program Studi Sistem Komputer Universitas Parna Raya (UNIPAR) Manado, Fasilitator Nasional KKA Kemdikdasmen, dan CEO PT Aktama Digital Antika.
                    </p>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div class="space-y-3">
                    <h5 class="text-sm font-semibold text-white uppercase tracking-wider">Navigasi Utama</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('profile') }}" class="hover:text-cyan-400 transition-colors">Profil & Karir</a></li>
                        <li><a href="{{ route('publications') }}" class="hover:text-cyan-400 transition-colors">Publikasi SINTA</a></li>
                        <li><a href="{{ route('research.community') }}" class="hover:text-cyan-400 transition-colors">Riset & PKM Woloan</a></li>
                        <li><a href="{{ route('projects') }}" class="hover:text-cyan-400 transition-colors">Katalog Proyek AI & IoT</a></li>
                        <li><a href="{{ route('academic') }}" class="hover:text-cyan-400 transition-colors">Akademik UNIPAR & RPL</a></li>
                    </ul>
                </div>

                <!-- Col 3: Ekosistem & Afiliasi -->
                <div class="space-y-3">
                    <h5 class="text-sm font-semibold text-white uppercase tracking-wider">Afiliasi & Brand</h5>
                    <ul class="space-y-2 text-sm">
                        <li><a href="https://www.parnaraya.ac.id" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 transition-colors flex items-center gap-1.5"><span>Universitas Parna Raya</span><i data-lucide="external-link" class="w-3.5 h-3.5"></i></a></li>
                        <li><a href="https://woloanjaya.com/" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-400 transition-colors flex items-center gap-1.5"><span>Mitra PKM Woloan Jaya</span><i data-lucide="external-link" class="w-3.5 h-3.5"></i></a></li>
                        <li><a href="{{ route('ventures') }}" class="hover:text-cyan-400 transition-colors">Aktama Digital (Pelatihan TI)</a></li>
                        <li><a href="{{ route('ventures') }}" class="hover:text-cyan-400 transition-colors">Aktama Music (Karya Multimedia)</a></li>
                    </ul>
                </div>

                <!-- Col 4: Lokasi & Kontak -->
                <div class="space-y-3">
                    <h5 class="text-sm font-semibold text-white uppercase tracking-wider">Kontak & Lokasi</h5>
                    <p class="text-sm text-slate-400 flex items-start gap-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                        <span>Manado, Sulawesi Utara, Indonesia</span>
                    </p>
                    <p class="text-sm text-slate-400 flex items-start gap-2">
                        <i data-lucide="mail" class="w-4 h-4 text-cyan-400 shrink-0 mt-0.5"></i>
                        <span>erikaktama@parnaraya.ac.id</span>
                    </p>
                    <div class="pt-2 flex items-center gap-2">
                        <a href="{{ url('/admin') }}" class="text-xs px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-slate-300 hover:text-white hover:border-blue-500/40 transition-all flex items-center gap-1.5">
                            <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                            <span>Admin Portal</span>
                        </a>
                        <a href="{{ route('sitemap') }}" class="text-xs px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-slate-300 hover:text-white transition-all">
                            Sitemap XML
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>© {{ date('Y') }} Gede Erik Aktama, S.Pd., M.Pd. Seluruh Hak Cipta Dilindungi.</p>
                <p>Dibangun dengan Laravel, Filament, Blade, dan Tailwind CSS • Manado, Sulawesi Utara</p>
            </div>
        </div>
    </footer>

</body>
</html>

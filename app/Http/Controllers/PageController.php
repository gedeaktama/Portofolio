<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\CommunityService;
use App\Models\Education;
use App\Models\Experience;
use App\Models\PortfolioProject;
use App\Models\Profile;
use App\Models\ProjectCategory;
use App\Models\Publication;
use App\Models\ResearchProject;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Tag;
use App\Models\Training;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    /**
     * Beranda (Home)
     */
    public function home()
    {
        $profile = Profile::where('is_active', true)->first();
        $skills = Skill::orderBy('order')->get();
        $publications = Publication::published()->take(3)->get();
        $researchProjects = ResearchProject::featured()->take(2)->get();
        $communityServices = CommunityService::featured()->take(2)->get();
        $projects = PortfolioProject::featured()->with('category')->take(3)->get();
        $trainings = Training::featured()->take(3)->get();
        $posts = BlogPost::published()->with(['category', 'author'])->take(2)->get();
        $socialLinks = SocialLink::active()->get();

        return view('pages.home', compact(
            'profile', 'skills', 'publications', 'researchProjects',
            'communityServices', 'projects', 'trainings', 'posts', 'socialLinks'
        ));
    }

    /**
     * Profil Lengkap
     */
    public function profile()
    {
        $profile = Profile::where('is_active', true)->first();
        $educations = Education::visible()->get();
        $experiences = Experience::visible()->get();
        $skills = Skill::orderBy('order')->get()->groupBy('category');
        $socialLinks = SocialLink::active()->get();

        return view('pages.profile', compact(
            'profile', 'educations', 'experiences', 'skills', 'socialLinks'
        ));
    }

    /**
     * Publikasi Ilmiah
     */
    public function publications(Request $request)
    {
        $query = Publication::published();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('authors', 'like', "%{$search}%")
                  ->orWhere('keywords', 'like', "%{$search}%")
                  ->orWhere('journal_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->get('category'));
        }

        if ($request->filled('year')) {
            $query->where('publication_year', $request->get('year'));
        }

        if ($request->get('sort') === 'oldest') {
            $query->reorder()->orderBy('publication_year')->orderBy('order');
        }

        $publications = $query->paginate(9)->withQueryString();
        $categories = Publication::select('category')->distinct()->pluck('category');
        $years = Publication::select('publication_year')->distinct()->orderByDesc('publication_year')->pluck('publication_year');

        return view('pages.publications', compact('publications', 'categories', 'years'));
    }

    /**
     * Detail Publikasi Ilmiah
     */
    public function publicationDetail(string $slug)
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();
        $relatedPublications = Publication::published()
            ->where('id', '!=', $publication->id)
            ->where('category', $publication->category)
            ->take(3)
            ->get();

        return view('pages.publication-detail', compact('publication', 'relatedPublications'));
    }

    /**
     * Penelitian & Pengabdian Masyarakat (PKM)
     */
    public function researchAndCommunity()
    {
        $researchProjects = ResearchProject::orderByDesc('year')->orderBy('order')->get();
        $communityServices = CommunityService::orderByDesc('year')->orderBy('order')->get();

        return view('pages.research-community', compact('researchProjects', 'communityServices'));
    }

    /**
     * Katalog Proyek Teknologi
     */
    public function projects(Request $request)
    {
        $query = PortfolioProject::with('category')->orderBy('order');

        if ($request->filled('category')) {
            $catSlug = $request->get('category');
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug);
            });
        }

        $projects = $query->paginate(9)->withQueryString();
        $categories = ProjectCategory::orderBy('order')->get();

        return view('pages.projects', compact('projects', 'categories'));
    }

    /**
     * Detail Proyek Teknologi
     */
    public function projectDetail(string $slug)
    {
        $project = PortfolioProject::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProjects = PortfolioProject::where('id', '!=', $project->id)
            ->where('project_category_id', $project->project_category_id)
            ->take(3)
            ->get();

        return view('pages.project-detail', compact('project', 'relatedProjects'));
    }

    /**
     * Akademik & Pendidikan (UNIPAR & RPL)
     */
    public function academic()
    {
        $profile = Profile::where('is_active', true)->first();
        return view('pages.academic', compact('profile'));
    }

    /**
     * Pelatihan dan Seminar
     */
    public function trainings()
    {
        $trainings = Training::orderByDesc('event_date')->orderBy('order')->paginate(9);
        return view('pages.trainings', compact('trainings'));
    }

    /**
     * Aktama Digital & Aktama Music (Ventures)
     */
    public function ventures()
    {
        return view('pages.ventures');
    }

    /**
     * Blog & Artikel
     */
    public function blog(Request $request)
    {
        $query = BlogPost::published()->with(['category', 'author', 'tags']);

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $catSlug = $request->get('category');
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug);
            });
        }

        if ($request->filled('tag')) {
            $tagSlug = $request->get('tag');
            $query->whereHas('tags', function ($q) use ($tagSlug) {
                $q->where('slug', $tagSlug);
            });
        }

        $posts = $query->paginate(6)->withQueryString();
        $categories = BlogCategory::withCount('posts')->get();
        $tags = Tag::all();
        $featuredPosts = BlogPost::published()->where('is_featured', true)->take(3)->get();

        return view('pages.blog', compact('posts', 'categories', 'tags', 'featuredPosts'));
    }

    /**
     * Detail Artikel Blog
     */
    public function blogDetail(string $slug)
    {
        $post = BlogPost::published()->with(['category', 'author', 'tags'])->where('slug', $slug)->firstOrFail();
        $post->increment('views_count');

        $relatedPosts = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->where('blog_category_id', $post->blog_category_id)
            ->take(3)
            ->get();

        return view('pages.blog-detail', compact('post', 'relatedPosts'));
    }

    /**
     * Halaman Kontak
     */
    public function contact()
    {
        $profile = Profile::where('is_active', true)->first();
        $socialLinks = SocialLink::active()->get();
        return view('pages.contact', compact('profile', 'socialLinks'));
    }

    /**
     * Submit Formulir Kontak
     */
    public function submitContact(Request $request)
    {
        // Rate Limiter: max 5 submissions per minute per IP
        $ip = $request->ip();
        $key = 'contact-form:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Terlalu banyak permintaan. Silakan tunggu {$seconds} detik sebelum mengirim pesan kembali.");
        }

        RateLimiter::hit($key, 60);

        // Honeypot anti-spam check
        if ($request->filled('website_url_hp')) {
            return back()->with('success', 'Pesan Anda telah berhasil dikirim.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10|max:3000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'subject.required' => 'Subjek permohonan wajib diisi.',
            'message.required' => 'Isi pesan wajib diisi.',
            'message.min' => 'Pesan minimal terdiri dari 10 karakter.',
        ]);

        $validated['ip_address'] = $ip;
        ContactMessage::create($validated);

        return back()->with('success', 'Terima kasih! Pesan dan permohonan kolaborasi Anda telah kami terima dan akan segera ditindaklanjuti.');
    }

    /**
     * Dynamic Sitemap XML
     */
    public function sitemap()
    {
        $baseUrl = url('/');
        $publications = Publication::published()->get();
        $projects = PortfolioProject::all();
        $posts = BlogPost::published()->get();

        $content = view('pages.sitemap', compact('baseUrl', 'publications', 'projects', 'posts'))->render();
        return Response::make($content, 200, ['Content-Type' => 'application/xml']);
    }

    /**
     * Dynamic Robots.txt
     */
    public function robots()
    {
        $sitemapUrl = url('/sitemap.xml');
        $content = "User-agent: *\nAllow: /\nDisallow: /admin/\nDisallow: /admin/*\n\nSitemap: {$sitemapUrl}\n";
        return Response::make($content, 200, ['Content-Type' => 'text/plain']);
    }
}

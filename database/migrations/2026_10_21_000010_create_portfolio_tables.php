<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Profiles table
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('full_name')->default('Gede Erik Aktama, S.Pd., M.Pd.');
            $table->string('nickname')->nullable()->default('Erik');
            $table->string('title_prefix')->nullable();
            $table->string('title_suffix')->default('S.Pd., M.Pd.');
            $table->string('primary_role')->default('Dosen Program Studi Sistem Komputer, Universitas Parna Raya');
            $table->string('secondary_role')->default('Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA) Kemdikdasmen');
            $table->string('tertiary_role')->default('Ketua Program Studi Sistem Komputer');
            $table->string('business_role')->default('CEO PT Aktama Digital Antika');
            $table->string('tagline')->default('Akademisi, Inovator Teknologi, dan Penggerak Transformasi Digital.');
            $table->text('short_bio')->nullable();
            $table->longText('full_bio')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('cv_file_url')->nullable();
            $table->string('location')->default('Manado, Sulawesi Utara, Indonesia');
            $table->string('email')->default('erikaktama@parnaraya.ac.id');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Educations table
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('degree');
            $table->string('institution');
            $table->string('field_of_study')->nullable();
            $table->string('start_year');
            $table->string('end_year')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        // 3. Experiences table
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('organization');
            $table->string('category')->default('academic'); // academic, national, industry, organization
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        // 4. Skills table
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('ai_data'); // ai_data, systems_iot, web_software, academic_curriculum, digital_marketing
            $table->integer('proficiency')->default(90);
            $table->string('icon')->nullable();
            $table->string('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });

        // 5. Publications table
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('authors')->default('Gede Erik Aktama');
            $table->boolean('is_first_author')->default(false);
            $table->integer('publication_year')->default(2023);
            $table->string('journal_name');
            $table->string('indexing_status')->default('SINTA'); // SINTA 4, SINTA 5, etc.
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('pages')->nullable();
            $table->string('doi')->nullable();
            $table->string('url')->nullable();
            $table->text('abstract')->nullable();
            $table->string('keywords')->nullable();
            $table->string('category')->default('Computer Vision & AI');
            $table->string('file_path')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 6. Research Projects table
        Schema::create('research_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('research'); // research, academic_initiative
            $table->string('year')->default('2024');
            $table->string('role')->default('Ketua Peneliti');
            $table->string('funding_source')->nullable();
            $table->string('partner_institution')->nullable();
            $table->text('summary');
            $table->text('output_results')->nullable();
            $table->string('image_url')->nullable();
            $table->string('document_url')->nullable();
            $table->string('status')->default('completed'); // completed, in_progress, planned
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 7. Community Services (PKM) table
        Schema::create('community_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('location')->default('Sulawesi Utara');
            $table->string('partner')->nullable();
            $table->string('partner_website')->nullable();
            $table->string('year')->default('2024');
            $table->string('role')->default('Ketua Pelaksana PKM');
            $table->text('description');
            $table->text('outcomes')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 8. Project Categories table
        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 9. Portfolio Projects table
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('problem_statement')->nullable();
            $table->text('solution_description');
            $table->json('technologies')->nullable();
            $table->text('key_features')->nullable();
            $table->string('image_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('status')->default('completed'); // completed, active, prototype
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 10. Trainings table
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('theme')->nullable();
            $table->string('organizer');
            $table->string('role')->default('Pemateri'); // Pemateri, Fasilitator, Instruktur, Peserta
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('slides_url')->nullable();
            $table->string('certificate_url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 11. Blog Categories table
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // 12. Tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 13. Blog Posts table
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->integer('reading_time_minutes')->default(5);
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('status')->default('published'); // draft, scheduled, published
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        // 14. Blog Post Tag pivot
        Schema::create('blog_post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // 15. Media table
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_path');
            $table->string('file_type')->default('image');
            $table->integer('file_size')->nullable();
            $table->string('caption')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });

        // 16. Social Links table
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->string('label')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 17. Contact Messages table
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('ip_address')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamp('replied_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        // 18. Site Settings table
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->string('type')->default('text'); // text, textarea, boolean, json, image
            $table->string('group')->default('general'); // general, seo, contact, branding
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('social_links');
        Schema::dropIfExists('media');
        Schema::dropIfExists('blog_post_tag');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('portfolio_projects');
        Schema::dropIfExists('project_categories');
        Schema::dropIfExists('community_services');
        Schema::dropIfExists('research_projects');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('profiles');
    }
};

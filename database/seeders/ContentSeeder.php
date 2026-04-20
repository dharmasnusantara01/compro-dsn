<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Partner;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Cloud Solutions', 'icon' => '☁️', 'short_desc' => 'Migrasi dan manajemen infrastruktur cloud yang aman dan skalabel di AWS, GCP, dan Azure.', 'order' => 1, 'is_featured' => true],
            ['title' => 'Managed IT Services', 'icon' => '🖥️', 'short_desc' => 'Pengelolaan infrastruktur IT secara menyeluruh dengan dukungan tim profesional 24/7.', 'order' => 2, 'is_featured' => true],
            ['title' => 'Cybersecurity', 'icon' => '🔒', 'short_desc' => 'Perlindungan sistem dan data bisnis Anda dari ancaman siber terkini.', 'order' => 3, 'is_featured' => true],
            ['title' => 'Software Development', 'icon' => '⚡', 'short_desc' => 'Pengembangan aplikasi web dan mobile custom sesuai kebutuhan spesifik bisnis Anda.', 'order' => 4, 'is_featured' => true],
            ['title' => 'Data & Analytics', 'icon' => '📊', 'short_desc' => 'Transformasi data mentah menjadi insight bisnis yang actionable untuk pengambilan keputusan.', 'order' => 5, 'is_featured' => false],
            ['title' => 'IT Consulting', 'icon' => '💡', 'short_desc' => 'Konsultasi strategis untuk membantu Anda merancang roadmap transformasi digital yang tepat.', 'order' => 6, 'is_featured' => false],
        ];

        foreach ($services as $data) {
            Service::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['slug' => Str::slug($data['title']), 'is_active' => true])
            );
        }

        $caseStudies = [
            ['title' => 'Transformasi Cloud untuk Perusahaan Manufaktur', 'client' => 'PT Maju Bersama', 'category' => 'Cloud Solutions', 'results' => 'Pengurangan biaya infrastruktur 40%, uptime 99.9%', 'is_featured' => true],
            ['title' => 'Pengembangan ERP Custom untuk Distributor Nasional', 'client' => 'CV Nusantara Jaya', 'category' => 'Software Development', 'results' => 'Efisiensi operasional meningkat 60%', 'is_featured' => true],
            ['title' => 'Implementasi Zero-Trust Security Architecture', 'client' => 'Bank Merdeka', 'category' => 'Cybersecurity', 'results' => 'Zero security incidents dalam 12 bulan', 'is_featured' => true],
        ];

        foreach ($caseStudies as $data) {
            CaseStudy::firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                array_merge($data, ['slug' => Str::slug($data['title']), 'is_active' => true, 'date' => now()->subMonths(rand(1, 18))])
            );
        }

        $testimonials = [
            ['author' => 'Budi Santoso', 'role' => 'CTO', 'company' => 'PT Maju Bersama', 'quote' => 'DSN berhasil memigrasikan seluruh infrastruktur kami ke cloud dengan zero downtime. Profesionalisme dan keahlian tim mereka sangat luar biasa.', 'is_featured' => true, 'order' => 1],
            ['author' => 'Sari Dewi', 'role' => 'CEO', 'company' => 'CV Nusantara Jaya', 'quote' => 'Sistem ERP yang dibangun DSN benar-benar mengubah cara kami bekerja. ROI-nya terlihat dalam 3 bulan pertama.', 'is_featured' => true, 'order' => 2],
            ['author' => 'Ahmad Fauzi', 'role' => 'IT Manager', 'company' => 'Bank Merdeka', 'quote' => 'Keamanan siber adalah prioritas kami. DSN mengimplementasikan solusi yang tidak hanya aman tapi juga mudah dioperasikan tim internal.', 'is_featured' => true, 'order' => 3],
        ];

        foreach ($testimonials as $data) {
            Testimonial::firstOrCreate(['author' => $data['author']], array_merge($data, ['is_active' => true]));
        }

        $team = [
            ['name' => 'Reza Pratama', 'role' => 'CEO & Founder', 'bio' => 'Visioner dengan 15 tahun pengalaman di industri IT Indonesia.', 'order' => 1],
            ['name' => 'Diana Kusuma', 'role' => 'CTO', 'bio' => 'Cloud architect bersertifikat AWS & Google Cloud.', 'order' => 2],
            ['name' => 'Hendra Wijaya', 'role' => 'Head of Security', 'bio' => 'CISSP certified dengan keahlian in enterprise cybersecurity.', 'order' => 3],
            ['name' => 'Maya Sari', 'role' => 'Lead Developer', 'bio' => 'Full-stack developer dengan passion untuk clean code.', 'order' => 4],
        ];

        foreach ($team as $data) {
            TeamMember::firstOrCreate(['name' => $data['name']], array_merge($data, ['is_active' => true]));
        }

        $partners = [
            ['name' => 'AWS', 'order' => 1],
            ['name' => 'Google Cloud', 'order' => 2],
            ['name' => 'Microsoft Azure', 'order' => 3],
            ['name' => 'Cisco', 'order' => 4],
            ['name' => 'VMware', 'order' => 5],
            ['name' => 'Fortinet', 'order' => 6],
        ];

        foreach ($partners as $data) {
            Partner::firstOrCreate(['name' => $data['name']], array_merge($data, ['is_active' => true]));
        }
    }
}

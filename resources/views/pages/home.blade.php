@extends('layouts.app')

@php
    $seoTitle       = 'Solusi Teknologi Informasi Terpercaya';
    $seoDescription = 'Dharma Sentosa Nusantara — mitra strategis transformasi digital bisnis Anda. Cloud infrastructure, managed IT, cybersecurity, dan software development.';
@endphp

@section('content')

{{-- ─── HERO ───────────────────────────────────────────────────────────────── --}}
{{-- Solid navy — no texture, no glow, no blur. Weight comes from typography. --}}
<section style="background:var(--color-navy-900);padding:5rem 0 4.5rem;">
    <div class="container-box">
        <div class="grid lg:grid-cols-12 gap-12 xl:gap-20 items-center">

            {{-- ── Copy — 7 columns ── --}}
            <div class="lg:col-span-7">

                <p style="font-family:var(--font-display);font-size:0.82rem;font-weight:500;color:rgba(255,255,255,0.35);margin-bottom:1.75rem;letter-spacing:0.01em;">
                    Dipercaya {{ config('dsn.clients_count') }}+ perusahaan di Indonesia
                </p>

                <h1 style="font-size:clamp(2.6rem,4vw,3.75rem);font-weight:800;line-height:1.07;letter-spacing:-0.035em;color:#fff;margin-bottom:1.5rem;">
                    Masalah IT yang sama<br>
                    muncul terus? <span style="color:var(--color-terra-400);">Itu<br>bisa dihentikan.</span>
                </h1>

                <p style="font-size:1.05rem;line-height:1.85;color:rgba(255,255,255,0.5);max-width:28rem;margin-bottom:2.5rem;">
                    Kami masuk, audit kondisi sistem Anda, dan tangani akar masalahnya — bukan tambal sulam yang sama setiap bulan. SLA tertulis, engineer nyata yang angkat telepon.
                </p>

                <div class="flex flex-wrap items-center gap-3 mb-14">
                    <a href="{{ route('contact') }}" class="btn-cta" style="font-size:0.95rem;padding:0.8rem 1.75rem;">
                        Jadwalkan Sesi Audit Gratis
                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                    </a>
                    <a href="{{ route('portfolio.index') }}"
                       style="display:inline-flex;align-items:center;gap:0.35rem;font-family:var(--font-display);font-size:0.875rem;font-weight:500;color:rgba(255,255,255,0.4);transition:color 0.15s;"
                       onmouseover="this.style.color='rgba(255,255,255,0.75)'"
                       onmouseout="this.style.color='rgba(255,255,255,0.4)'">
                        Lihat studi kasus
                        <svg width="12" height="12" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M2 7h10M8 3l4 4-4 4"/></svg>
                    </a>
                </div>

                {{-- Stats — thin white separator --}}
                <div class="flex flex-wrap gap-8" style="padding-top:1.5rem;border-top:1px solid rgba(255,255,255,0.1);">
                    @php
                        $heroStats = [
                            ['value' => config('dsn.clients_count') . '+', 'label' => 'Klien aktif'],
                            ['value' => config('dsn.projects_count') . '+', 'label' => 'Proyek selesai'],
                            ['value' => '9+',                               'label' => 'Tahun beroperasi'],
                            ['value' => '99.9%',                            'label' => 'SLA uptime'],
                        ];
                    @endphp
                    @foreach($heroStats as $s)
                    <div>
                        <div class="stat-number" style="font-size:1.6rem;color:#fff;line-height:1;">{{ $s['value'] }}</div>
                        <div style="font-size:0.74rem;color:rgba(255,255,255,0.3);margin-top:3px;">{{ $s['label'] }}</div>
                    </div>
                    @endforeach
                </div>

            </div>

            {{-- ── Right panel: monitoring dashboard mockup ── --}}
            <div class="lg:col-span-5 hidden lg:block">

                {{-- Browser chrome frame --}}
                <div style="border-radius:12px;overflow:hidden;border:1px solid rgba(255,255,255,0.1);box-shadow:0 32px 64px rgba(0,0,0,0.5);">

                    {{-- Window top bar --}}
                    <div style="background:#1A2742;padding:0.55rem 0.875rem;display:flex;align-items:center;gap:0.6rem;border-bottom:1px solid rgba(255,255,255,0.06);">
                        <div style="display:flex;gap:5px;flex-shrink:0;">
                            <div style="width:10px;height:10px;border-radius:50%;background:#FF5F57;"></div>
                            <div style="width:10px;height:10px;border-radius:50%;background:#FEBC2E;"></div>
                            <div style="width:10px;height:10px;border-radius:50%;background:#28C840;"></div>
                        </div>
                        <div style="flex:1;background:rgba(0,0,0,0.3);border-radius:4px;padding:0.22rem 0.6rem;font-family:var(--font-sans);font-size:0.62rem;color:rgba(255,255,255,0.25);">monitor.dsn.co.id/dashboard</div>
                    </div>

                    {{-- Dashboard body --}}
                    <div style="background:#0D1829;padding:0.875rem;">

                        {{-- Status bar --}}
                        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:0.75rem;padding-bottom:0.75rem;border-bottom:1px solid rgba(255,255,255,0.05);">
                            <div style="display:flex;align-items:center;gap:0.4rem;">
                                <div style="width:6px;height:6px;border-radius:50%;background:#22C55E;"></div>
                                <span style="font-family:var(--font-display);font-size:0.7rem;font-weight:600;color:rgba(255,255,255,0.65);">Semua sistem operasional</span>
                            </div>
                            <span style="font-size:0.6rem;color:rgba(255,255,255,0.22);">diperbarui 2 mnt lalu</span>
                        </div>

                        {{-- Metric cards --}}
                        @php
                            $dashMetrics = [
                                ['label' => 'Uptime',    'value' => '99.94%', 'sub' => '26 bln berturut', 'color' => '#22C55E'],
                                ['label' => 'Response',  'value' => '142ms',  'sub' => '↓ 18ms kemarin',  'color' => '#60A5FA'],
                                ['label' => 'Insiden',   'value' => '0',      'sub' => '47 hr clear',     'color' => '#A3E635'],
                            ];
                        @endphp
                        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:0.45rem;margin-bottom:0.75rem;">
                            @foreach($dashMetrics as $m)
                            <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);border-radius:7px;padding:0.55rem 0.6rem;">
                                <div style="font-size:0.58rem;color:rgba(255,255,255,0.3);font-family:var(--font-display);letter-spacing:0.06em;text-transform:uppercase;margin-bottom:0.25rem;">{{ $m['label'] }}</div>
                                <div style="font-family:var(--font-numeric);font-size:1rem;font-weight:700;color:{{ $m['color'] }};line-height:1;">{{ $m['value'] }}</div>
                                <div style="font-size:0.57rem;color:rgba(255,255,255,0.22);margin-top:3px;">{{ $m['sub'] }}</div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Sparkline chart --}}
                        <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);border-radius:7px;padding:0.65rem 0.7rem;margin-bottom:0.75rem;">
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.45rem;">
                                <span style="font-size:0.6rem;color:rgba(255,255,255,0.3);font-family:var(--font-display);">Response Time · 7 hari terakhir</span>
                                <span style="font-size:0.6rem;color:#60A5FA;font-family:var(--font-numeric);">avg 138ms</span>
                            </div>
                            <svg viewBox="0 0 220 36" style="width:100%;display:block;" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="cg" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#3B7EC4" stop-opacity="0.25"/>
                                        <stop offset="100%" stop-color="#3B7EC4" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <path d="M0,26 C18,22 32,24 55,19 C74,15 90,20 110,17 C130,14 150,16 170,13 C185,11 200,14 220,11"
                                      fill="none" stroke="#3B7EC4" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M0,26 C18,22 32,24 55,19 C74,15 90,20 110,17 C130,14 150,16 170,13 C185,11 200,14 220,11 L220,36 L0,36Z"
                                      fill="url(#cg)"/>
                                {{-- Data point dots --}}
                                <circle cx="55"  cy="19" r="2.5" fill="#3B7EC4"/>
                                <circle cx="110" cy="17" r="2.5" fill="#3B7EC4"/>
                                <circle cx="170" cy="13" r="2.5" fill="#3B7EC4"/>
                                <circle cx="220" cy="11" r="3"   fill="#60A5FA"/>
                            </svg>
                        </div>

                        {{-- Service status rows --}}
                        @php
                            $statusRows = [
                                ['name' => 'Core Infrastructure',  'uptime' => '100%',  'ok' => true],
                                ['name' => 'Cloud Gateway (AWS)',   'uptime' => '99.9%', 'ok' => true],
                                ['name' => 'Security / Firewall',  'uptime' => '100%',  'ok' => true],
                                ['name' => 'Backup & Recovery',    'uptime' => '100%',  'ok' => true],
                            ];
                        @endphp
                        <div style="display:flex;flex-direction:column;gap:0.28rem;">
                            @foreach($statusRows as $row)
                            <div style="display:flex;align-items:center;justify-content:space-between;padding:0.35rem 0.45rem;border-radius:5px;background:rgba(255,255,255,0.02);">
                                <div style="display:flex;align-items:center;gap:0.4rem;">
                                    <div style="width:5px;height:5px;border-radius:50%;background:#22C55E;flex-shrink:0;"></div>
                                    <span style="font-size:0.67rem;color:rgba(255,255,255,0.45);">{{ $row['name'] }}</span>
                                </div>
                                <div style="display:flex;align-items:center;gap:0.5rem;">
                                    <span style="font-size:0.6rem;color:rgba(255,255,255,0.22);">{{ $row['uptime'] }}</span>
                                    <span style="font-size:0.6rem;color:#22C55E;font-family:var(--font-display);font-weight:600;">Operational</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

{{-- ─── PARTNER LOGOS ──────────────────────────────────────────────────────── --}}
@if($partners->count())
<div style="background:var(--color-navy-950);border-top:1px solid rgba(255,255,255,0.06);">
    <div class="container-box" style="padding-top:1.5rem;padding-bottom:1.5rem;">
        <div class="flex flex-wrap justify-center items-center gap-x-10 gap-y-4">
            <span style="font-family:var(--font-display);font-size:0.67rem;font-weight:600;letter-spacing:0.1em;text-transform:uppercase;color:rgba(255,255,255,0.2);white-space:nowrap;">Dipercaya oleh</span>
            @foreach($partners as $partner)
            <div style="opacity:0.25;transition:opacity 0.2s;" onmouseover="this.style.opacity=0.55" onmouseout="this.style.opacity=0.25">
                @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="height:19px;object-fit:contain;filter:brightness(10);">
                @else
                    <span style="font-family:var(--font-display);font-size:0.8rem;font-weight:700;letter-spacing:-0.01em;color:#fff;">{{ $partner->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- ─── SERVICES ────────────────────────────────────────────────────────────── --}}
@if($services->count())
<section style="background:var(--color-canvas);padding:5.5rem 0;">
    <div class="container-box">

        <div class="grid lg:grid-cols-12 gap-10 mb-12 fade-up items-end">
            <div class="lg:col-span-7">
                <span class="section-label">Layanan</span>
                <h2 style="font-size:clamp(1.9rem,3vw,2.5rem);margin-top:0.75rem;line-height:1.12;letter-spacing:-0.03em;">
                    Satu nomor telepon<br>untuk semua masalah IT Anda
                </h2>
            </div>
            <div class="lg:col-span-5">
                <p style="color:var(--color-ink-400);font-size:0.95rem;line-height:1.8;">
                    Banyak perusahaan punya 3–5 vendor IT yang saling melempar tanggung jawab saat ada masalah. Kami tangani semuanya — dari kabel sampai cloud — sebagai satu tim.
                </p>
            </div>
        </div>

        <div style="border:1px solid var(--color-ink-100);border-radius:14px;overflow:hidden;">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                @php
                    $col      = $loop->index % 3;
                    $row      = intdiv($loop->index, 3);
                    $totalRows = ceil($services->count() / 3);
                    $borderR  = $col < 2 ? 'border-right:1px solid var(--color-ink-100);' : '';
                    $borderB  = $row < $totalRows - 1 ? 'border-bottom:1px solid var(--color-ink-100);' : '';
                @endphp
                <a href="{{ route('services.show', $service->slug) }}"
                   class="fade-up service-cell"
                   style="padding:1.75rem;display:block;background:#fff;{{ $borderR }}{{ $borderB }}transition:background 0.15s;">
                    <div class="icon-wrap mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            @switch($service->title)
                                @case('Cloud Solutions')
                                    <path stroke-width="1.6" d="M20 17.5H7.5a5 5 0 110-10 5.5 5.5 0 0110.7 1.7A4 4 0 0120 17.5z"/>
                                    @break
                                @case('Managed IT Services')
                                    <path stroke-width="1.6" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/>
                                    @break
                                @case('Cybersecurity')
                                    <path stroke-width="1.6" d="M12 3L4 7v5c0 5 3.5 9.7 8 11 4.5-1.3 8-6 8-11V7L12 3z"/>
                                    @break
                                @case('Software Development')
                                    <path stroke-width="1.6" d="M8 9l-3 3 3 3m8-6l3 3-3 3m-2-9l-2 12"/>
                                    @break
                                @case('Data & Analytics')
                                    <path stroke-width="1.6" d="M3 18v-6M7 18V9M11 18V5M15 18V9M19 18v-6"/>
                                    @break
                                @default
                                    <path stroke-width="1.6" d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                            @endswitch
                        </svg>
                    </div>
                    <h3 style="font-size:0.97rem;font-weight:700;letter-spacing:-0.015em;color:var(--color-ink-950);margin-bottom:0.4rem;">{{ $service->title }}</h3>
                    <p style="font-size:0.84rem;color:var(--color-ink-400);line-height:1.7;margin-bottom:1rem;">{{ $service->short_desc }}</p>
                    <span class="service-link" style="font-family:var(--font-display);font-size:0.78rem;font-weight:600;color:var(--color-navy-700);display:inline-flex;align-items:center;gap:3px;opacity:0;transition:opacity 0.15s;">
                        Pelajari
                        <svg width="11" height="11" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M2 7h10M8 3l4 4-4 4"/></svg>
                    </span>
                </a>
                @endforeach
            </div>
        </div>

        <div class="mt-8 fade-up">
            <a href="{{ route('services.index') }}" class="btn-ghost">Lihat semua layanan</a>
        </div>
    </div>
</section>
@endif

{{-- ─── WHY US — deep navy background, strong contrast section ────────────── --}}
<section style="background:var(--color-navy-950);padding:5.5rem 0;">
    <div class="container-box">

        <div class="max-w-2xl mb-14 fade-up">
            <h2 style="font-size:clamp(1.9rem,3vw,2.5rem);letter-spacing:-0.03em;line-height:1.12;margin-bottom:1.25rem;color:#fff;">
                Banyak yang bisa pasang server.<br>
                <span style="color:rgba(255,255,255,0.35);">Tidak banyak yang tanggung jawab hasilnya.</span>
            </h2>
            <p style="color:rgba(255,255,255,0.4);font-size:0.97rem;line-height:1.85;max-width:34rem;">
                Sejak {{ config('dsn.founded') }}, lebih dari 9 dari 10 klien kami memperpanjang kontrak — karena ketika sistem down tengah malam, ada engineer nyata yang angkat telepon.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-16 items-start">

            {{-- Differentiators --}}
            <div class="fade-up">
                @php
                    $reasons = [
                        ['num' => '01', 'title' => 'Audit dulu, proposal kemudian',
                         'body' => 'Terlalu banyak vendor kirim proposal generik tanpa pernah melihat sistem Anda. Kami selalu mulai dengan audit kondisi existing — gratis, 60 menit, tanpa presentasi produk.'],
                        ['num' => '02', 'title' => 'Penalti tertulis jika kami tidak memenuhi SLA',
                         'body' => 'Response ≤ 2 jam untuk insiden kritis ada di kontrak, bukan di slide. Jika kami gagal memenuhinya, ada kompensasi yang bisa Anda klaim — bukan sekadar permintaan maaf.'],
                        ['num' => '03', 'title' => 'Anda yang pegang semua akses, selamanya',
                         'body' => 'Semua kredensial, dokumentasi sistem, dan akses server — milik Anda. Jika suatu hari Anda putuskan pindah vendor, kami bantu proses transisinya. Tidak ada lock-in buatan.'],
                    ];
                @endphp
                @foreach($reasons as $r)
                <div style="padding:1.75rem 0;{{ !$loop->first ? 'border-top:1px solid rgba(255,255,255,0.07);' : '' }}">
                    <div style="display:flex;gap:1.5rem;align-items:flex-start;">
                        <span style="font-family:var(--font-numeric);font-size:0.72rem;font-weight:700;color:rgba(255,255,255,0.2);letter-spacing:0.05em;padding-top:4px;flex-shrink:0;min-width:1.5rem;">{{ $r['num'] }}</span>
                        <div>
                            <h3 style="font-size:{{ $loop->first ? '1.05rem' : '0.95rem' }};font-weight:700;color:#fff;letter-spacing:-0.015em;margin-bottom:0.5rem;">{{ $r['title'] }}</h3>
                            <p style="font-size:0.875rem;color:rgba(255,255,255,0.42);line-height:1.8;">{{ $r['body'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Stats cards — navy-900 on navy-950 background --}}
            <div class="grid grid-cols-2 gap-4 fade-up">
                @php
                    $bigStats = [
                        ['n' => config('dsn.clients_count') . '+', 'label' => 'Klien aktif',     'sub' => 'berbagai industri'],
                        ['n' => config('dsn.projects_count') . '+','label' => 'Proyek selesai',  'sub' => 'sejak ' . config('dsn.founded')],
                        ['n' => '99.9%',                           'label' => 'SLA uptime',      'sub' => 'rata-rata tahunan'],
                        ['n' => '< 2j',                            'label' => 'Response kritis', 'sub' => 'tertulis di kontrak'],
                    ];
                @endphp
                @foreach($bigStats as $s)
                <div style="background:var(--color-navy-900);border:1px solid rgba(255,255,255,0.07);border-radius:12px;padding:1.5rem;">
                    <div class="stat-number" style="font-size:2rem;color:#fff;line-height:1;margin-bottom:0.5rem;">{{ $s['n'] }}</div>
                    <div style="font-family:var(--font-display);font-size:0.82rem;font-weight:700;color:rgba(255,255,255,0.7);letter-spacing:-0.01em;">{{ $s['label'] }}</div>
                    <div style="font-size:0.72rem;color:rgba(255,255,255,0.25);margin-top:2px;">{{ $s['sub'] }}</div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

{{-- ─── PROCESS ─────────────────────────────────────────────────────────────── --}}
<section style="background:#fff;padding:5.5rem 0;">
    <div class="container-box">

        <div class="max-w-lg mb-14 fade-up">
            <span class="section-label">Cara Kerja</span>
            <h2 style="font-size:clamp(1.9rem,3vw,2.4rem);margin-top:0.75rem;letter-spacing:-0.03em;line-height:1.15;">
                Tidak ada kejutan<br>di tengah proyek
            </h2>
        </div>

        <div class="relative">
            <div class="hidden lg:block absolute"
                 style="top:0.65rem;left:1.75rem;right:1.75rem;height:1px;background:var(--color-ink-100);"></div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-10 relative">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Audit kondisi existing',
                         'body' => 'Kami pelajari infrastruktur Anda — hardware, jaringan, keamanan, dan workflow tim. Hasilnya laporan kondisi tertulis yang bisa Anda bawa ke internal, bukan deck presentasi kami.'],
                        ['num' => '02', 'title' => 'Proposal dengan angka nyata',
                         'body' => 'Solusi yang direkomendasikan, timeline per fase, biaya per komponen, dan klausul SLA — semua tertulis sebelum tanda tangan. Tidak ada angka yang muncul tiba-tiba di tengah jalan.'],
                        ['num' => '03', 'title' => 'Implementasi bertahap',
                         'body' => 'Tidak ada "go-live sekaligus" yang berisiko. Setiap fase ada checkpoint dan sign-off dari Anda. Engineer yang mengerjakan adalah orang yang sama dari awal sampai selesai.'],
                        ['num' => '04', 'title' => 'Support oleh orang yang kenal sistem Anda',
                         'body' => 'Tim yang sama yang membangun sistem Anda yang menjawab saat ada masalah — bukan agen L1 yang baca dari script. Monitoring 24/7, eskalasi dalam hitungan menit.'],
                    ];
                @endphp
                @foreach($steps as $i => $step)
                <div class="fade-up" style="transition-delay:{{ $i * 80 }}ms;">
                    <div style="display:flex;align-items:center;gap:0.6rem;margin-bottom:1.25rem;">
                        <div style="width:20px;height:20px;border-radius:50%;background:var(--color-navy-900);border:2.5px solid #fff;box-shadow:0 0 0 1px var(--color-ink-100);flex-shrink:0;"></div>
                        <span style="font-family:var(--font-numeric);font-size:0.68rem;font-weight:700;letter-spacing:0.08em;color:var(--color-ink-200);">{{ $step['num'] }}</span>
                    </div>
                    <h3 style="font-size:1rem;font-weight:700;color:var(--color-ink-950);letter-spacing:-0.015em;margin-bottom:0.5rem;">{{ $step['title'] }}</h3>
                    <p style="font-size:0.855rem;color:var(--color-ink-400);line-height:1.8;">{{ $step['body'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ─── CASE STUDIES ────────────────────────────────────────────────────────── --}}
@if($caseStudies->count())
<section style="background:var(--color-canvas);padding:5.5rem 0;">
    <div class="container-box">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12 fade-up">
            <div>
                <span class="section-label">Studi Kasus</span>
                <h2 style="font-size:clamp(1.9rem,3vw,2.4rem);margin-top:0.6rem;letter-spacing:-0.03em;line-height:1.12;">
                    Hasil nyata, bukan sekedar slide
                </h2>
            </div>
            <a href="{{ route('portfolio.index') }}" class="btn-ghost" style="white-space:nowrap;flex-shrink:0;">Semua proyek →</a>
        </div>

        @php $featured = $caseStudies->first(); $rest = $caseStudies->skip(1); @endphp

        <div class="grid lg:grid-cols-3 gap-5">

            <a href="{{ route('portfolio.show', $featured->slug) }}"
               class="card group overflow-hidden lg:col-span-2 fade-up flex flex-col"
               style="min-height:340px;">
                <div style="background:var(--color-ink-100);overflow:hidden;flex:1;min-height:220px;position:relative;">
                    @if($featured->cover)
                    <img src="{{ asset('storage/' . $featured->cover) }}" alt="{{ $featured->title }}"
                         style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;transition:transform 0.5s cubic-bezier(0.16,1,0.3,1);"
                         class="group-hover:scale-[1.03]">
                    @else
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="var(--color-ink-200)" stroke-width="1.25" stroke-linecap="round"><path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9L13 2z"/><path d="M13 2v7h7"/></svg>
                    </div>
                    @endif
                </div>
                <div style="padding:1.5rem 1.75rem;">
                    <span style="font-family:var(--font-display);font-size:0.68rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--color-navy-700);">{{ $featured->category }}</span>
                    <h3 style="font-size:1.1rem;font-weight:700;color:var(--color-ink-950);margin-top:0.4rem;letter-spacing:-0.02em;line-height:1.35;transition:color 0.15s;" class="group-hover:text-navy-900">{{ $featured->title }}</h3>
                    <p style="font-size:0.8rem;color:var(--color-ink-400);margin-top:4px;">{{ $featured->client }}</p>
                </div>
            </a>

            <div class="flex flex-col gap-5">
                @foreach($rest->take(2) as $cs)
                <a href="{{ route('portfolio.show', $cs->slug) }}"
                   class="card group overflow-hidden fade-up flex-1"
                   style="transition-delay:{{ $loop->index * 80 + 100 }}ms;">
                    @if($cs->cover)
                    <div style="overflow:hidden;aspect-ratio:16/7;">
                        <img src="{{ asset('storage/' . $cs->cover) }}" alt="{{ $cs->title }}"
                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.45s cubic-bezier(0.16,1,0.3,1);"
                             class="group-hover:scale-[1.04]">
                    </div>
                    @endif
                    <div style="padding:1.25rem 1.5rem;">
                        <span style="font-family:var(--font-display);font-size:0.68rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:var(--color-navy-700);">{{ $cs->category }}</span>
                        <h3 style="font-size:0.93rem;font-weight:700;color:var(--color-ink-950);margin-top:0.35rem;letter-spacing:-0.015em;line-height:1.35;transition:color 0.15s;" class="group-hover:text-navy-900">{{ $cs->title }}</h3>
                        <p style="font-size:0.75rem;color:var(--color-ink-400);margin-top:2px;">{{ $cs->client }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- ─── TESTIMONIALS ────────────────────────────────────────────────────────── --}}
@if($testimonials->count())
<section style="background:#fff;padding:5.5rem 0;">
    <div class="container-box">

        @php $primary = $testimonials->first(); $secondary = $testimonials->skip(1)->take(2); @endphp

        <div class="fade-up mb-8" style="padding:2.5rem 2.75rem;background:var(--color-canvas);border-radius:14px;border:1px solid var(--color-ink-100);">
            <div class="grid lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-9">
                    <div style="font-family:Georgia,'Times New Roman',serif;font-size:3rem;line-height:0.7;color:var(--color-ink-100);margin-bottom:1rem;user-select:none;">"</div>
                    <p style="font-size:clamp(1rem,1.8vw,1.2rem);line-height:1.8;color:var(--color-ink-800);font-style:italic;letter-spacing:-0.01em;">{{ $primary->quote }}</p>
                </div>
                <div class="lg:col-span-3 flex lg:flex-col lg:items-start items-center gap-3 lg:pt-2">
                    @if($primary->photo)
                    <img src="{{ asset('storage/' . $primary->photo) }}" alt="{{ $primary->author }}"
                         style="width:48px;height:48px;border-radius:50%;object-fit:cover;flex-shrink:0;">
                    @else
                    <div style="width:48px;height:48px;border-radius:50%;background:var(--color-navy-900);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="font-family:var(--font-display);font-size:1rem;font-weight:700;color:#fff;">{{ strtoupper(substr($primary->author, 0, 1)) }}</span>
                    </div>
                    @endif
                    <div>
                        <div style="font-family:var(--font-display);font-size:0.88rem;font-weight:700;color:var(--color-ink-950);letter-spacing:-0.01em;">{{ $primary->author }}</div>
                        <div style="font-size:0.77rem;color:var(--color-ink-400);margin-top:2px;">{{ $primary->role }}</div>
                        <div style="font-size:0.77rem;color:var(--color-ink-200);">{{ $primary->company }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if($secondary->count())
        <div class="grid md:grid-cols-2 gap-5">
            @foreach($secondary as $t)
            <div class="fade-up" style="transition-delay:{{ $loop->index * 100 }}ms;padding:1.5rem 1.75rem;background:var(--color-canvas);border-radius:12px;border:1px solid var(--color-ink-100);">
                <div style="font-family:Georgia,'Times New Roman',serif;font-size:2.25rem;line-height:0.75;color:var(--color-ink-100);margin-bottom:0.75rem;user-select:none;">"</div>
                <p style="font-size:0.9rem;line-height:1.8;color:var(--color-ink-600);font-style:italic;margin-bottom:1.25rem;">{{ $t->quote }}</p>
                <div style="display:flex;align-items:center;gap:0.65rem;padding-top:0.875rem;border-top:1px solid var(--color-ink-100);">
                    @if($t->photo)
                    <img src="{{ asset('storage/' . $t->photo) }}" alt="{{ $t->author }}" style="width:32px;height:32px;border-radius:50%;object-fit:cover;">
                    @else
                    <div style="width:32px;height:32px;border-radius:50%;background:var(--color-ink-100);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <span style="font-family:var(--font-display);font-size:0.72rem;font-weight:700;color:var(--color-navy-900);">{{ strtoupper(substr($t->author, 0, 1)) }}</span>
                    </div>
                    @endif
                    <div>
                        <div style="font-family:var(--font-display);font-size:0.82rem;font-weight:700;color:var(--color-ink-950);letter-spacing:-0.01em;">{{ $t->author }}</div>
                        <div style="font-size:0.72rem;color:var(--color-ink-400);">{{ $t->role }}, {{ $t->company }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>
@endif

{{-- ─── CTA — deepest navy, closing the page with weight ─────────────────── --}}
<section style="background:var(--color-navy-950);">
    <div class="container-box" style="padding-top:5rem;padding-bottom:5rem;">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-10">

            <div style="max-width:32rem;">
                <span class="section-label" style="color:rgba(255,255,255,0.25);">Mulai hari ini</span>
                <h2 style="font-size:clamp(1.75rem,2.5vw,2.2rem);font-weight:800;color:#fff;letter-spacing:-0.035em;line-height:1.18;margin-top:0.75rem;margin-bottom:0.875rem;">
                    Ceritakan kondisi IT Anda.<br>
                    <span style="color:rgba(255,255,255,0.35);font-weight:600;">Kami dengarkan dulu — gratis.</span>
                </h2>
                <p style="font-size:0.92rem;color:rgba(255,255,255,0.35);line-height:1.8;">
                    60 menit, tanpa presentasi produk. Kami jawab satu pertanyaan: apa yang paling perlu diperbaiki di infrastruktur Anda sekarang — dan berapa estimasi biayanya jika dibiarkan.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 shrink-0">
                <a href="{{ route('contact') }}" class="btn-cta" style="font-size:0.95rem;padding:0.875rem 2rem;white-space:nowrap;">
                    Jadwalkan Sesi Audit
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                </a>
                <a href="tel:{{ str_replace([' ','-'], '', config('dsn.phone')) }}"
                   style="display:inline-flex;align-items:center;gap:0.5rem;font-family:var(--font-display);font-size:0.875rem;font-weight:500;color:rgba(255,255,255,0.4);padding:0.875rem 1.5rem;border-radius:8px;border:1px solid rgba(255,255,255,0.1);transition:all 0.15s;white-space:nowrap;"
                   onmouseover="this.style.borderColor='rgba(255,255,255,0.25)';this.style.color='rgba(255,255,255,0.75)'"
                   onmouseout="this.style.borderColor='rgba(255,255,255,0.1)';this.style.color='rgba(255,255,255,0.4)'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.8 19.8 0 01-8.63-3.07A19.5 19.5 0 013.07 11a19.8 19.8 0 01-3.07-8.67A2 2 0 012 .18h3a2 2 0 012 1.72 12.8 12.8 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 8a16 16 0 006.86 6.86l1.18-1.16a2 2 0 012.11-.45 12.8 12.8 0 002.81.7A2 2 0 0122 16.92z"/></svg>
                    {{ config('dsn.phone') }}
                </a>
            </div>

        </div>
    </div>
</section>

@push('styles')
<style>
    .service-cell:hover { background: var(--color-canvas) !important; }
    .service-cell:hover .service-link { opacity: 1 !important; }
</style>
@endpush

@endsection

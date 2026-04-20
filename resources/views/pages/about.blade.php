@extends('layouts.app')

@php
    $seoTitle = 'Tentang Kami';
    $seoDescription = 'Mengenal lebih dekat Dharma Sentosa Nusantara — tim IT profesional berpengalaman yang berkomitmen memberikan solusi teknologi terbaik.';
@endphp

@section('content')

{{-- Page Hero --}}
<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box text-center">
        <span class="section-label" style="color:#4A85B5;">Tentang Kami</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-4" style="color:#fff;font-family:var(--font-display);">Mengenal {{ config('dsn.name') }}</h1>
        <p class="max-w-2xl mx-auto" style="color:#C4C0B9;">Kami adalah perusahaan IT solutions yang berdedikasi untuk membantu bisnis Anda berkembang melalui teknologi yang tepat dan inovatif.</p>
    </div>
</section>

{{-- Vision Mission --}}
<section class="section-padding bg-white">
    <div class="container-box">
        <div class="grid md:grid-cols-2 gap-8 mb-20">
            <div class="card p-8 fade-up" style="border-top:3px solid #1C3A56;">
                <div class="icon-wrap mb-5">
                    <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#2B5880;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Visi</h3>
                <p style="color:#474341;">Menjadi perusahaan IT solutions terdepan di Indonesia yang mendorong transformasi digital berkelanjutan bagi bisnis-bisnis Indonesia.</p>
            </div>
            <div class="card p-8 fade-up" style="border-top:3px solid #C35D27;">
                <div class="icon-wrap mb-5" style="background:#FAF0E8;">
                    <svg width="22" height="22" fill="none" stroke="#C35D27" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Misi</h3>
                <ul class="space-y-2.5 text-sm" style="color:#474341;">
                    @foreach(['Menghadirkan solusi IT berkualitas tinggi dengan harga kompetitif','Membangun kemitraan jangka panjang berbasis kepercayaan','Terus berinovasi mengikuti perkembangan teknologi global','Memberdayakan sumber daya manusia IT terbaik Indonesia'] as $item)
                    <li class="flex gap-2.5 items-start">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="mt-0.5 shrink-0"><circle cx="8" cy="8" r="8" fill="#E8F5F3"/><path d="M5 8l2 2 4-4" stroke="#176457" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- Story --}}
        <div class="max-w-3xl mx-auto text-center mb-20 fade-up">
            <span class="section-label">Cerita Kami</span>
            <h2 class="text-3xl font-bold mt-3 mb-5" style="font-family:var(--font-display);color:#18161A;">Perjalanan Panjang Membangun Kepercayaan</h2>
            <p class="leading-relaxed" style="color:#474341;">Berdiri sejak {{ config('dsn.founded') }}, {{ config('dsn.name') }} telah melayani ratusan klien dari berbagai industri. Berawal dari tim kecil yang bersemangat, kini kami telah berkembang menjadi perusahaan dengan lebih dari {{ config('dsn.team_count') }} tenaga profesional bersertifikat. Kepercayaan klien adalah fondasi dari setiap langkah yang kami ambil.</p>
        </div>

        {{-- Values --}}
        <div class="fade-up">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold" style="font-family:var(--font-display);color:#18161A;">Nilai-Nilai Kami</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-1" style="background:#EDEBE5;border-radius:16px;overflow:hidden;">
                @php
                    $values = [
                        ['svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>', 'title' => 'Integritas', 'desc' => 'Jujur dan transparan dalam setiap proses kerja.'],
                        ['svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M13 10V3L4 14h7v7l9-11h-7z"/>', 'title' => 'Inovasi', 'desc' => 'Selalu mencari solusi terbaik dan terkini.'],
                        ['svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>', 'title' => 'Kemitraan', 'desc' => 'Bersama klien, bukan hanya untuk klien.'],
                        ['svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>', 'title' => 'Keunggulan', 'desc' => 'Standar kualitas tidak pernah dikompromikan.'],
                    ];
                @endphp
                @foreach($values as $val)
                <div class="text-center p-8 bg-white">
                    <div class="icon-wrap mx-auto mb-4">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#2B5880;">{!! $val['svg'] !!}</svg>
                    </div>
                    <h3 class="font-bold mb-2" style="font-family:var(--font-display);color:#18161A;">{{ $val['title'] }}</h3>
                    <p class="text-sm" style="color:#7A7671;">{{ $val['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Team --}}
@if($team->count())
<section class="section-padding" style="background:#F5F4F0;">
    <div class="container-box">
        <div class="text-center mb-12 fade-up">
            <span class="section-label">Tim Kami</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3" style="font-family:var(--font-display);color:#18161A;">Bertemu dengan Para Ahli</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($team as $member)
            <div class="card p-6 text-center fade-up" style="transition-delay: {{ $loop->index * 60 }}ms">
                @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-4">
                @else
                <div class="w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center" style="background:#D4E6F5;">
                    <span class="font-bold text-2xl" style="color:#1C3A56;font-family:var(--font-display);">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                </div>
                @endif
                <h3 class="font-bold" style="font-family:var(--font-display);color:#18161A;">{{ $member->name }}</h3>
                <p class="text-sm mt-1" style="color:#2B5880;">{{ $member->role }}</p>
                @if($member->bio)
                <p class="text-xs mt-2 leading-relaxed" style="color:#7A7671;">{{ Str::limit($member->bio, 80) }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="section-padding" style="background:#1C3A56;">
    <div class="container-box text-center fade-up">
        <h2 class="text-3xl font-bold mb-4" style="color:#fff;font-family:var(--font-display);">Mari Berkolaborasi</h2>
        <p class="mb-8" style="color:#C4C0B9;">Jadilah bagian dari 150+ bisnis yang telah mempercayakan kebutuhan IT mereka kepada kami.</p>
        <a href="{{ route('contact') }}" class="btn-cta">Hubungi Kami Sekarang</a>
    </div>
</section>

@endsection

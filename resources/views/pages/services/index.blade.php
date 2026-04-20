@extends('layouts.app')

@php
    $seoTitle = 'Layanan IT';
    $seoDescription = 'Layanan IT lengkap dari Dharma Sentosa Nusantara: Cloud Solutions, Managed IT, Cybersecurity, Software Development, dan lebih banyak lagi.';
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box text-center">
        <span class="section-label" style="color:#4A85B5;">Layanan</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-4" style="color:#fff;font-family:var(--font-display);">Layanan IT Profesional</h1>
        <p class="max-w-2xl mx-auto" style="color:#C4C0B9;">Solusi teknologi komprehensif yang dirancang untuk mendorong efisiensi dan pertumbuhan bisnis Anda.</p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        @if($services->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-1" style="background:#EDEBE5;border-radius:16px;overflow:hidden;">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="bg-white p-8 group fade-up" style="transition-delay: {{ $loop->index * 60 }}ms;transition:border-color 0.15s,box-shadow 0.15s;">
                @if($service->icon)
                <div class="icon-wrap mb-5 group-hover:shadow-sm transition-shadow">
                    <span class="text-2xl">{{ $service->icon }}</span>
                </div>
                @endif
                <h3 class="text-lg font-bold mb-2.5 group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $service->title }}</h3>
                <p class="text-sm leading-relaxed mb-5" style="color:#7A7671;">{{ $service->short_desc }}</p>
                <div class="flex items-center gap-1.5 text-sm font-semibold" style="color:#2B5880;">
                    Pelajari Lebih Lanjut
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-center py-20" style="color:#7A7671;">Layanan belum tersedia.</p>
        @endif
    </div>
</section>

<section class="section-padding" style="background:#1C3A56;">
    <div class="container-box text-center fade-up">
        <h2 class="text-3xl font-bold mb-4" style="color:#fff;font-family:var(--font-display);">Tidak Menemukan yang Anda Cari?</h2>
        <p class="mb-8" style="color:#C4C0B9;">Konsultasikan kebutuhan spesifik Anda dengan tim ahli kami.</p>
        <a href="{{ route('contact') }}" class="btn-cta">Hubungi Kami</a>
    </div>
</section>

@endsection

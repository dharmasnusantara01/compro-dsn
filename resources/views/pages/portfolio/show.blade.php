@extends('layouts.app')

@php
    $seoTitle = $caseStudy->seo_title ?? $caseStudy->title;
    $seoDescription = $caseStudy->seo_description ?? "Case study: {$caseStudy->title} untuk {$caseStudy->client}";
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box">
        <nav class="flex items-center gap-2 text-sm mb-6" style="color:#7A7671;">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('portfolio.index') }}" class="hover:text-white transition-colors">Portfolio</a>
            <span>/</span>
            <span class="text-white">{{ $caseStudy->title }}</span>
        </nav>
        <div class="max-w-3xl">
            <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full mb-4" style="background:rgba(255,255,255,0.12);color:#D4E6F5;font-family:var(--font-display);">{{ $caseStudy->category }}</span>
            <h1 class="text-4xl md:text-5xl font-bold mb-4" style="color:#fff;font-family:var(--font-display);">{{ $caseStudy->title }}</h1>
            <div class="flex gap-6 text-sm" style="color:#7A7671;">
                <span>Klien: <span class="text-white">{{ $caseStudy->client }}</span></span>
                @if($caseStudy->date)
                <span>Tahun: <span class="text-white">{{ $caseStudy->date->format('Y') }}</span></span>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                @if($caseStudy->cover)
                <img src="{{ asset('storage/' . $caseStudy->cover) }}" alt="{{ $caseStudy->title }}"
                     class="w-full rounded-2xl mb-8 aspect-video object-cover">
                @endif
                @if($caseStudy->content)
                <div class="prose max-w-none">
                    {!! $caseStudy->content !!}
                </div>
                @endif
                @if($caseStudy->results)
                <div class="mt-8 p-6 rounded-2xl" style="background:#E8F5F3;border:1px solid #22897A22;">
                    <h3 class="font-bold mb-3 flex items-center gap-2.5" style="font-family:var(--font-display);color:#176457;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        Hasil yang Dicapai
                    </h3>
                    <p style="color:#2E2B2F;">{{ $caseStudy->results }}</p>
                </div>
                @endif
            </div>
            <div>
                <div class="card p-6 sticky top-24">
                    <h3 class="font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Proyek Serupa untuk Bisnis Anda?</h3>
                    <p class="text-sm mb-5" style="color:#7A7671;">Ceritakan kebutuhan Anda dan kami akan merancang solusi terbaik.</p>
                    <a href="{{ route('contact') }}" class="btn-cta w-full justify-center">Diskusikan Proyek</a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($related->count())
<section class="section-padding" style="background:#F5F4F0;">
    <div class="container-box">
        <h2 class="text-2xl font-bold mb-8" style="font-family:var(--font-display);color:#18161A;">Proyek Lainnya</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $item)
            <a href="{{ route('portfolio.show', $item->slug) }}" class="card group overflow-hidden">
                @if($item->cover)
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @endif
                <div class="p-5">
                    <span class="text-xs font-semibold uppercase tracking-wide" style="color:#2B5880;font-family:var(--font-display);">{{ $item->category }}</span>
                    <h3 class="font-bold mt-1 group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $item->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

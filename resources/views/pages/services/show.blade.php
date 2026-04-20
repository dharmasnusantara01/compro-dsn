@extends('layouts.app')

@php
    $seoTitle = $service->seo_title ?? $service->title;
    $seoDescription = $service->seo_description ?? $service->short_desc;
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box">
        <nav class="flex items-center gap-2 text-sm mb-6" style="color:#7A7671;">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Layanan</a>
            <span>/</span>
            <span class="text-white">{{ $service->title }}</span>
        </nav>
        <div class="max-w-3xl">
            @if($service->icon)
            <div class="icon-wrap mb-6" style="background:rgba(255,255,255,0.1);">
                <span class="text-2xl">{{ $service->icon }}</span>
            </div>
            @endif
            <h1 class="text-4xl md:text-5xl font-bold mb-4" style="color:#fff;font-family:var(--font-display);">{{ $service->title }}</h1>
            <p class="text-xl" style="color:#C4C0B9;">{{ $service->short_desc }}</p>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                     class="w-full rounded-2xl mb-8 object-cover aspect-video">
                @endif
                @if($service->content)
                <div class="prose max-w-none" style="--tw-prose-headings:var(--font-display);">
                    {!! $service->content !!}
                </div>
                @endif
            </div>
            <div>
                <div class="card p-6 sticky top-24">
                    <h3 class="font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Tertarik dengan layanan ini?</h3>
                    <p class="text-sm mb-5" style="color:#7A7671;">Dapatkan konsultasi gratis dari tim ahli kami untuk mengetahui solusi terbaik bagi bisnis Anda.</p>
                    <a href="{{ route('contact') }}" class="btn-cta w-full justify-center">Konsultasi Sekarang</a>
                    <a href="tel:{{ config('dsn.phone') }}" class="btn-ghost w-full justify-center mt-3 text-sm">
                        {{ config('dsn.phone') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($related->count())
<section class="section-padding" style="background:#F5F4F0;">
    <div class="container-box">
        <h2 class="text-2xl font-bold mb-8" style="font-family:var(--font-display);color:#18161A;">Layanan Lainnya</h2>
        <div class="grid sm:grid-cols-3 gap-6">
            @foreach($related as $item)
            <a href="{{ route('services.show', $item->slug) }}" class="card p-6 group">
                <h3 class="font-bold mb-2 group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $item->title }}</h3>
                <p class="text-sm" style="color:#7A7671;">{{ Str::limit($item->short_desc, 80) }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

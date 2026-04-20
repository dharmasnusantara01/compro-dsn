@extends('layouts.app')

@php
    $seoTitle = $post->seo_title ?? $post->title;
    $seoDescription = $post->seo_description ?? $post->excerpt;
    $ogType = 'article';
    $ogImage = $post->cover ? asset('storage/' . $post->cover) : null;
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box">
        <nav class="flex items-center gap-2 text-sm mb-6" style="color:#7A7671;">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
            <span>/</span>
            <span class="text-white">{{ Str::limit($post->title, 40) }}</span>
        </nav>
        <div class="max-w-3xl">
            @if($post->category)
            <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full mb-4" style="background:rgba(255,255,255,0.12);color:#D4E6F5;font-family:var(--font-display);">{{ $post->category }}</span>
            @endif
            <h1 class="text-3xl md:text-4xl font-bold mb-4" style="color:#fff;font-family:var(--font-display);">{{ $post->title }}</h1>
            <div class="flex items-center gap-4 text-sm" style="color:#7A7671;">
                <span>Oleh <span class="text-white">{{ $post->author?->name }}</span></span>
                <span>{{ $post->published_at->format('d F Y') }}</span>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        <div class="grid lg:grid-cols-3 gap-12">
            <article class="lg:col-span-2">
                @if($post->cover)
                <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}"
                     class="w-full rounded-2xl mb-8 aspect-video object-cover">
                @endif
                @if($post->excerpt)
                <p class="text-lg font-medium leading-relaxed mb-8 pb-8" style="color:#474341;border-bottom:1px solid #EDEBE5;">{{ $post->excerpt }}</p>
                @endif
                @if($post->content)
                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
                @endif
            </article>
            <aside class="space-y-6">
                <div class="card p-6">
                    <h3 class="font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Tentang Penulis</h3>
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background:#D4E6F5;">
                            <span class="font-bold" style="color:#1C3A56;">{{ strtoupper(substr($post->author?->name ?? 'A', 0, 1)) }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-sm" style="color:#18161A;">{{ $post->author?->name }}</div>
                            <div class="text-xs" style="color:#7A7671;">Tim DSN</div>
                        </div>
                    </div>
                </div>
                <div class="card p-6">
                    <h3 class="font-bold mb-3" style="font-family:var(--font-display);color:#18161A;">Butuh Bantuan IT?</h3>
                    <p class="text-sm mb-4" style="color:#7A7671;">Konsultasikan kebutuhan teknologi Anda dengan tim kami secara gratis.</p>
                    <a href="{{ route('contact') }}" class="btn-cta w-full justify-center text-sm">Konsultasi Gratis</a>
                </div>
            </aside>
        </div>
    </div>
</section>

@if($related->count())
<section class="section-padding" style="background:#F5F4F0;">
    <div class="container-box">
        <h2 class="text-2xl font-bold mb-8" style="font-family:var(--font-display);color:#18161A;">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $item)
            <a href="{{ route('blog.show', $item->slug) }}" class="card group overflow-hidden">
                @if($item->cover)
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @endif
                <div class="p-5">
                    <h3 class="font-bold group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $item->title }}</h3>
                    <p class="text-xs mt-1" style="color:#C4C0B9;">{{ $item->published_at->format('d M Y') }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

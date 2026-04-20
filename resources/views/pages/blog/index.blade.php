@extends('layouts.app')

@php
    $seoTitle = 'Blog & Insights';
    $seoDescription = 'Artikel dan insight terbaru seputar teknologi informasi, cloud, cybersecurity, dan transformasi digital dari tim Dharma Sentosa Nusantara.';
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box text-center">
        <span class="section-label" style="color:#4A85B5;">Blog</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-4" style="color:#fff;font-family:var(--font-display);">Insights & Artikel</h1>
        <p class="max-w-2xl mx-auto" style="color:#C4C0B9;">Tips, tren, dan pengetahuan seputar teknologi informasi dari para ahli kami.</p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <a href="{{ route('blog.show', $post->slug) }}" class="card group overflow-hidden fade-up" style="transition-delay: {{ $loop->index * 60 }}ms">
                @if($post->cover)
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @else
                <div class="aspect-video flex items-center justify-center" style="background:#EBF4FA;">
                    <svg width="40" height="40" fill="none" stroke="#4A85B5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                @endif
                <div class="p-6">
                    @if($post->category)
                    <span class="text-xs font-semibold uppercase tracking-wide" style="color:#2B5880;font-family:var(--font-display);">{{ $post->category }}</span>
                    @endif
                    <h3 class="font-bold text-lg mt-1 mb-2 group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $post->title }}</h3>
                    @if($post->excerpt)
                    <p class="text-sm leading-relaxed" style="color:#7A7671;">{{ Str::limit($post->excerpt, 100) }}</p>
                    @endif
                    <div class="mt-4 flex items-center justify-between text-xs" style="color:#C4C0B9;">
                        <span>{{ $post->author?->name }}</span>
                        <span>{{ $post->published_at->format('d M Y') }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
        @else
        <p class="text-center py-20" style="color:#7A7671;">Belum ada artikel yang diterbitkan.</p>
        @endif
    </div>
</section>

@endsection

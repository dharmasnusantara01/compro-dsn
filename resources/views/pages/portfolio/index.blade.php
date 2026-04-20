@extends('layouts.app')

@php
    $seoTitle = 'Portfolio';
    $seoDescription = 'Portofolio proyek-proyek IT terbaik yang telah dikerjakan oleh Dharma Sentosa Nusantara untuk berbagai klien.';
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box text-center">
        <span class="section-label" style="color:#4A85B5;">Portfolio</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-4" style="color:#fff;font-family:var(--font-display);">Proyek-Proyek Kami</h1>
        <p class="max-w-2xl mx-auto" style="color:#C4C0B9;">Setiap proyek adalah bukti komitmen kami terhadap kualitas dan kepuasan klien.</p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        @if($categories->count())
        <div class="flex flex-wrap gap-2 mb-10 justify-center">
            <span class="px-4 py-1.5 rounded-full text-white text-sm font-medium cursor-pointer" style="background:#1C3A56;font-family:var(--font-display);">Semua</span>
            @foreach($categories as $cat)
            <span class="px-4 py-1.5 rounded-full text-sm font-medium cursor-pointer transition-colors" style="background:#EDEBE5;color:#474341;font-family:var(--font-display);">{{ $cat }}</span>
            @endforeach
        </div>
        @endif

        @if($caseStudies->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($caseStudies as $cs)
            <a href="{{ route('portfolio.show', $cs->slug) }}" class="card group overflow-hidden fade-up" style="transition-delay: {{ $loop->index * 60 }}ms">
                @if($cs->cover)
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $cs->cover) }}" alt="{{ $cs->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                @else
                <div class="aspect-video flex items-center justify-center" style="background:#EBF4FA;">
                    <svg width="40" height="40" fill="none" stroke="#4A85B5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.25" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                </div>
                @endif
                <div class="p-6">
                    <span class="text-xs font-semibold uppercase tracking-wide" style="color:#2B5880;font-family:var(--font-display);">{{ $cs->category }}</span>
                    <h3 class="font-bold text-lg mt-1 mb-1 group-hover:text-navy-900 transition-colors" style="font-family:var(--font-display);color:#18161A;">{{ $cs->title }}</h3>
                    <p class="text-sm" style="color:#7A7671;">{{ $cs->client }}</p>
                    @if($cs->date)
                    <p class="text-xs mt-1" style="color:#C4C0B9;">{{ $cs->date->format('M Y') }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $caseStudies->links() }}
        </div>
        @else
        <p class="text-center py-20" style="color:#7A7671;">Belum ada proyek yang ditampilkan.</p>
        @endif
    </div>
</section>

@endsection

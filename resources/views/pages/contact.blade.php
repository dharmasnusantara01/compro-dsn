@extends('layouts.app')

@php
    $seoTitle = 'Kontak';
    $seoDescription = 'Hubungi Dharma Sentosa Nusantara untuk konsultasi IT gratis. Kami siap membantu transformasi digital bisnis Anda.';
@endphp

@section('content')

<section class="text-white py-20" style="background:#1C3A56;">
    <div class="container-box text-center">
        <span class="section-label" style="color:#4A85B5;">Kontak</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 mb-4" style="color:#fff;font-family:var(--font-display);">Hubungi Kami</h1>
        <p class="max-w-2xl mx-auto" style="color:#C4C0B9;">Tim kami siap menjawab setiap pertanyaan dan membantu Anda menemukan solusi IT terbaik.</p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-box">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Contact Info --}}
            <div class="space-y-6 fade-up">
                <div>
                    <h2 class="text-2xl font-bold mb-6" style="font-family:var(--font-display);color:#18161A;">Informasi Kontak</h2>
                </div>
                @php
                    $contacts = [
                        [
                            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                            'label' => 'Email',
                            'value' => config('dsn.email'),
                            'href' => 'mailto:' . config('dsn.email'),
                        ],
                        [
                            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
                            'label' => 'Telepon',
                            'value' => config('dsn.phone'),
                            'href' => 'tel:' . config('dsn.phone'),
                        ],
                        [
                            'svg' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
                            'label' => 'Alamat',
                            'value' => config('dsn.address'),
                            'href' => null,
                        ],
                    ];
                @endphp
                @foreach($contacts as $contact)
                <div class="flex gap-4">
                    <div class="icon-wrap shrink-0">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color:#2B5880;">{!! $contact['svg'] !!}</svg>
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wide mb-0.5" style="color:#C4C0B9;font-family:var(--font-display);">{{ $contact['label'] }}</div>
                        @if($contact['href'])
                        <a href="{{ $contact['href'] }}" class="transition-colors hover:text-navy-900" style="color:#2E2B2F;">{{ $contact['value'] }}</a>
                        @else
                        <p style="color:#2E2B2F;">{{ $contact['value'] }}</p>
                        @endif
                    </div>
                </div>
                @endforeach

                <div class="pt-4">
                    <p class="text-xs font-semibold uppercase tracking-wide mb-3" style="color:#C4C0B9;font-family:var(--font-display);">Ikuti Kami</p>
                    <div class="flex gap-2.5">
                        @if(config('dsn.socials.linkedin'))
                        <a href="{{ config('dsn.socials.linkedin') }}" target="_blank" class="icon-wrap transition-colors hover:shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" style="color:#2B5880;"><path d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14m-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                        </a>
                        @endif
                        @if(config('dsn.socials.instagram'))
                        <a href="{{ config('dsn.socials.instagram') }}" target="_blank" class="icon-wrap transition-colors hover:shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" style="color:#2B5880;"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2 fade-up">
                @if(session('success'))
                <div class="rounded-xl p-4 mb-6 flex items-start gap-3" style="background:#E8F5F3;border:1px solid #22897A44;">
                    <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="#176457" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p style="color:#176457;">{{ session('success') }}</p>
                </div>
                @endif

                <div class="card p-8">
                    <h2 class="text-xl font-bold mb-6" style="font-family:var(--font-display);color:#18161A;">Kirim Pesan</h2>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="text" name="honeypot" class="hidden" tabindex="-1" autocomplete="off">

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium mb-1.5" style="color:#474341;">Nama Lengkap <span style="color:#C35D27;">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="w-full rounded-xl px-4 py-3 text-sm transition-all outline-none @error('name') border-red-400 @enderror"
                                       style="border:1px solid #DDD9D2;color:#18161A;background:#fff;"
                                       onfocus="this.style.borderColor='#1C3A56';this.style.boxShadow='0 0 0 3px rgba(28,58,86,0.08)'"
                                       onblur="this.style.borderColor='#DDD9D2';this.style.boxShadow='none'"
                                       placeholder="Nama Anda">
                                @error('name') <p class="text-xs mt-1" style="color:#C35D27;">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5" style="color:#474341;">Email <span style="color:#C35D27;">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="w-full rounded-xl px-4 py-3 text-sm transition-all outline-none @error('email') border-red-400 @enderror"
                                       style="border:1px solid #DDD9D2;color:#18161A;background:#fff;"
                                       onfocus="this.style.borderColor='#1C3A56';this.style.boxShadow='0 0 0 3px rgba(28,58,86,0.08)'"
                                       onblur="this.style.borderColor='#DDD9D2';this.style.boxShadow='none'"
                                       placeholder="email@perusahaan.com">
                                @error('email') <p class="text-xs mt-1" style="color:#C35D27;">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium mb-1.5" style="color:#474341;">Nomor Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="w-full rounded-xl px-4 py-3 text-sm transition-all outline-none"
                                       style="border:1px solid #DDD9D2;color:#18161A;background:#fff;"
                                       onfocus="this.style.borderColor='#1C3A56';this.style.boxShadow='0 0 0 3px rgba(28,58,86,0.08)'"
                                       onblur="this.style.borderColor='#DDD9D2';this.style.boxShadow='none'"
                                       placeholder="+62 ...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5" style="color:#474341;">Subjek</label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                       class="w-full rounded-xl px-4 py-3 text-sm transition-all outline-none"
                                       style="border:1px solid #DDD9D2;color:#18161A;background:#fff;"
                                       onfocus="this.style.borderColor='#1C3A56';this.style.boxShadow='0 0 0 3px rgba(28,58,86,0.08)'"
                                       onblur="this.style.borderColor='#DDD9D2';this.style.boxShadow='none'"
                                       placeholder="Topik pertanyaan Anda">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1.5" style="color:#474341;">Pesan <span style="color:#C35D27;">*</span></label>
                            <textarea name="message" rows="5"
                                      class="w-full rounded-xl px-4 py-3 text-sm transition-all outline-none resize-none @error('message') border-red-400 @enderror"
                                      style="border:1px solid #DDD9D2;color:#18161A;background:#fff;"
                                      onfocus="this.style.borderColor='#1C3A56';this.style.boxShadow='0 0 0 3px rgba(28,58,86,0.08)'"
                                      onblur="this.style.borderColor='#DDD9D2';this.style.boxShadow='none'"
                                      placeholder="Ceritakan kebutuhan IT Anda...">{{ old('message') }}</textarea>
                            @error('message') <p class="text-xs mt-1" style="color:#C35D27;">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="btn-cta w-full justify-center text-base py-3.5">
                            Kirim Pesan
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

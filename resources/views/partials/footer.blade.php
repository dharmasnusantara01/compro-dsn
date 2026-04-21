<footer style="background:#0D1F30;" class="text-ink-200">
    <div class="container-box py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

            {{-- Brand --}}
            <div class="lg:col-span-1">
                <div class="flex items-center gap-2.5 mb-5">
                    <img src="{{ asset('images/logo_dsn.png') }}" alt="DSN Logo" class="h-10">
                    <div>
                        <div style="font-family:var(--font-display);font-weight:700;font-size:0.9rem;letter-spacing:-0.02em;color:#fff;line-height:1.1;">DSN</div>
                        <div style="font-family:var(--font-sans);font-size:0.65rem;letter-spacing:0.04em;color:#7A7671;line-height:1;">Dharma Sentosa Nusantara</div>
                    </div>
                </div>
                <p class="text-sm leading-relaxed mb-5" style="color:#7A7671;">{{ config('dsn.tagline') }}</p>
                <div class="flex gap-2.5">
                    @if(config('dsn.socials.linkedin'))
                    <a href="{{ config('dsn.socials.linkedin') }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors"
                       style="background:rgba(74,133,181,0.15);" onmouseover="this.style.background='rgba(74,133,181,0.3)'" onmouseout="this.style.background='rgba(74,133,181,0.15)'">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14m-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                    </a>
                    @endif
                    @if(config('dsn.socials.instagram'))
                    <a href="{{ config('dsn.socials.instagram') }}" target="_blank" rel="noopener"
                       class="w-8 h-8 rounded-lg flex items-center justify-center transition-colors"
                       style="background:rgba(74,133,181,0.15);" onmouseover="this.style.background='rgba(74,133,181,0.3)'" onmouseout="this.style.background='rgba(74,133,181,0.15)'">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Layanan --}}
            <div>
                <h4 class="text-white font-semibold mb-4" style="font-family:var(--font-display);font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;">Layanan</h4>
                <ul class="space-y-2.5 text-sm" style="color:#7A7671;">
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">Cloud Solutions</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">Managed IT Services</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">Cybersecurity</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">Software Development</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">Data & Analytics</a></li>
                    <li><a href="{{ route('services.index') }}" class="transition-colors hover:text-white">IT Consulting</a></li>
                </ul>
            </div>

            {{-- Perusahaan --}}
            <div>
                <h4 class="text-white font-semibold mb-4" style="font-family:var(--font-display);font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;">Perusahaan</h4>
                <ul class="space-y-2.5 text-sm" style="color:#7A7671;">
                    <li><a href="{{ route('about') }}" class="transition-colors hover:text-white">Tentang Kami</a></li>
                    <li><a href="{{ route('portfolio.index') }}" class="transition-colors hover:text-white">Portfolio</a></li>
                    <li><a href="{{ route('blog.index') }}" class="transition-colors hover:text-white">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="transition-colors hover:text-white">Kontak</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-white font-semibold mb-4" style="font-family:var(--font-display);font-size:0.82rem;letter-spacing:0.08em;text-transform:uppercase;">Hubungi Kami</h4>
                <ul class="space-y-3.5 text-sm" style="color:#7A7671;">
                    <li class="flex gap-2.5 items-start">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="#4A85B5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>{{ config('dsn.email') }}</span>
                    </li>
                    <li class="flex gap-2.5 items-start">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="#4A85B5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ config('dsn.phone') }}</span>
                    </li>
                    <li class="flex gap-2.5 items-start">
                        <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="#4A85B5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>{{ config('dsn.address') }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs" style="border-top:1px solid rgba(255,255,255,0.07);color:#474341;">
            <p>© {{ date('Y') }} {{ config('dsn.name') }}. Hak cipta dilindungi.</p>
            <p>Berdiri sejak {{ config('dsn.founded') }}</p>
        </div>
    </div>
</footer>

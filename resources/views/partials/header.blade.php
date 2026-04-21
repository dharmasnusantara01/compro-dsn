<header id="main-nav" class="fixed top-0 inset-x-0 z-50 bg-white/96 backdrop-blur-sm border-b border-[#EDEBE5] transition-shadow duration-200">
    <div class="container-box">
        <div class="flex items-center justify-between h-15" style="height:60px;">

            {{-- Logo mark + wordmark --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group" aria-label="{{ config('dsn.name') }}">
                {{--
                    Logo concept: Three nodes in a subtle triangular formation connected
                    by thin lines — referencing network topology (IT), and the three
                    words Dharma · Sentosa · Nusantara. Simple enough to work at 16px.
                --}}
               <img src="{{ asset('images/logo_dsn.png') }}" alt="DSN Logo" class="h-20">
                
                <div>
                    <div style="font-family:var(--font-display);font-weight:700;font-size:0.9rem;letter-spacing:-0.02em;color:#1C3A56;line-height:1.1;">
                        DSN
                    </div>
                    <div style="font-family:var(--font-sans);font-size:0.65rem;letter-spacing:0.04em;color:#7A7671;line-height:1;">
                        Dharma Sentosa Nusantara
                    </div>
                </div>
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden md:flex items-center gap-0.5" aria-label="Main navigation">
                @php
                    $links = [
                        ['route' => 'home',           'label' => 'Beranda'],
                        ['route' => 'about',          'label' => 'Tentang Kami'],
                        ['route' => 'services.index', 'label' => 'Layanan'],
                        ['route' => 'portfolio.index','label' => 'Portfolio'],
                        ['route' => 'blog.index',     'label' => 'Blog'],
                    ];
                @endphp
                @foreach($links as $link)
                    @php $base = rtrim($link['route'], '.index'); @endphp
                    <a href="{{ route($link['route']) }}"
                       class="nav-link {{ request()->routeIs($base . '*') ? 'active' : '' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Right actions --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('contact') }}"
                   class="hidden md:inline-flex btn-cta text-sm">
                    Konsultasi Gratis
                </a>
                <button id="nav-toggle"
                        class="md:hidden p-2 rounded-lg text-[#474341] hover:bg-[#EDEBE5] transition-colors"
                        aria-label="Open menu" aria-expanded="false">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round">
                        <line x1="3" y1="6"  x2="17" y2="6"/>
                        <line x1="3" y1="10" x2="17" y2="10"/>
                        <line x1="3" y1="14" x2="17" y2="14"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="nav-menu" class="hidden md:hidden pb-5 border-t border-[#EDEBE5] pt-4">
            @foreach($links as $link)
                @php $base = rtrim($link['route'], '.index'); @endphp
                <a href="{{ route($link['route']) }}"
                   class="nav-link block mb-0.5 {{ request()->routeIs($base . '*') ? 'active' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="mt-4 pt-4 border-t border-[#EDEBE5]">
                <a href="{{ route('contact') }}" class="btn-cta w-full justify-center text-sm">
                    Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</header>
{{-- Spacer for fixed header --}}
<div style="height:60px;"></div>

<title>{{ isset($seoTitle) ? $seoTitle . ' — ' : '' }}{{ config('dsn.name') }}</title>
<meta name="description" content="{{ $seoDescription ?? config('dsn.tagline') }}">
<meta name="keywords" content="{{ $seoKeywords ?? 'IT solutions, cloud, managed services, cybersecurity, software development, Jakarta' }}">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $ogType ?? 'website' }}">
<meta property="og:title" content="{{ $seoTitle ?? config('dsn.name') }}">
<meta property="og:description" content="{{ $seoDescription ?? config('dsn.tagline') }}">
<meta property="og:url" content="{{ url()->current() }}">
@if(isset($ogImage))
<meta property="og:image" content="{{ $ogImage }}">
@endif

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle ?? config('dsn.name') }}">
<meta name="twitter:description" content="{{ $seoDescription ?? config('dsn.tagline') }}">

{{-- Canonical --}}
<link rel="canonical" href="{{ url()->current() }}">

{{-- JSON-LD Organization --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Organization",
    "name": "{{ config('dsn.name') }}",
    "url": "{{ config('app.url') }}",
    "email": "{{ config('dsn.email') }}",
    "telephone": "{{ config('dsn.phone') }}",
    "address": {
        "@@type": "PostalAddress",
        "streetAddress": "{{ config('dsn.address') }}"
    }
}
</script>

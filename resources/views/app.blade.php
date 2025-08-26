<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Dynamic Meta Title & Description --}}
    <title>{{ $page['props']['metaTitle'] ?? 'QSSPL | Quality Services & Solutions Pvt Ltd' }}</title>
    <meta name="description" content="{{ $page['props']['metaDescription'] ?? 'QSSPL provides expert third-party sampling, preparation, and coal analysis for major industries. Trusted since 1999 for inspection, testing & certification services in mining, minerals, engineering, and consumer goods.' }}">
    
    {{-- Primary Keywords for SEO --}}
    <meta name="keywords" content="third party inspection India, coal sampling, mineral testing, quality assurance, product certification, lab testing services, QSSPL, Quality Services & Solutions">
    
    {{-- Open Graph / Social Share --}}
    <meta property="og:title" content="{{ $page['props']['metaTitle'] ?? 'QSSPL | Quality Services & Solutions Pvt Ltd' }}">
    <meta property="og:description" content="{{ $page['props']['metaDescription'] ?? 'Quality, compliance, and trust since 1999. Experts in inspection, sampling, and lab analysis.' }}">
    <meta property="og:image" content="{{ asset('images/logo_2.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page['props']['metaTitle'] ?? 'QSSPL | Quality Services & Solutions Pvt Ltd' }}">
    <meta name="twitter:description" content="{{ $page['props']['metaDescription'] ?? 'Trusted inspection, sampling, and testing since 1999.' }}">
    <meta name="twitter:image" content="{{ asset('images/logo_2.png') }}">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Manifest & Icons --}}
    <link rel="manifest" href="/manifest.json">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    {{-- Fonts & Styles --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    {{-- Scripts --}}
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased">
    @inertia

    {{-- Service Worker Registration --}}
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(registration => console.log('Service Worker registered:', registration))
                    .catch(error => console.error('Service Worker registration failed:', error));
            });
        }
    </script>
</body>
</html>

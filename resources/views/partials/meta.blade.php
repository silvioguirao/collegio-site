@php
    $metaTitle = $title ?? ($meta_title ?? config('app.name'));
    $metaDescription = $meta_description ?? ($metaDescription ?? config('app.name'));
    $canonical = $canonical ?? url()->current();
    $image = $image ?? config('institution.logo') ?? asset('logo.svg');
    $ogType = $og_type ?? (isset($post) ? 'article' : 'website');
@endphp
<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<link rel="canonical" href="{{ $canonical }}">

<!-- Open Graph -->
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:site_name" content="{{ config('institution.name', config('app.name')) }}">
<meta property="og:image" content="{{ $image }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $metaTitle }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $image }}">

@include('partials.jsonld')

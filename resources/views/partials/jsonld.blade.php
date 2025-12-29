@php
    // Organization JSON-LD
    $org = seo_organization();
    $jsonld = [$org];
    if (isset($post) && is_array($post)) {
        $jsonld[] = seo_article($post);
    }
@endphp
@foreach($jsonld as $item)
    <script type="application/ld+json">{!! json_encode($item, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}</script>
@endforeach

<?php

use Illuminate\Support\Facades\URL;

if (! function_exists('seo_organization')) {
    function seo_organization(): array
    {
        $i = config('institution');
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $i['name'] ?? config('app.name'),
            'url' => $i['url'] ?? URL::to('/'),
            'logo' => url($i['logo'] ?? '/logo.svg'),
            'contactPoint' => [
                ['@type' => 'ContactPoint', 'telephone' => $i['phone'] ?? '', 'contactType' => 'customer service', 'areaServed' => 'BR', 'availableLanguage' => ['pt-BR']],
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $i['address'] ?? '',
                'addressCountry' => 'BR',
            ],
        ];
    }
}

if (! function_exists('seo_article')) {
    function seo_article(array $post): array
    {
        $org = seo_organization();
        $image = $post['image'] ?? ($org['logo'] ?? url('/logo.svg'));
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post['title'] ?? null,
            'author' => ['@type' => 'Person', 'name' => $post['author'] ?? config('app.name')],
            'datePublished' => isset($post['published_at']) ? (string)\Illuminate\Support\Carbon::parse($post['published_at'])->toIso8601String() : null,
            'image' => [$image],
            'publisher' => ['@type' => 'Organization', 'name' => $org['name'], 'logo' => ['@type'=>'ImageObject','url'=>$org['logo']]],
            'description' => $post['excerpt'] ?? substr($post['body'] ?? '',0,160),
        ];
    }
}

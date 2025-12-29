@props(['title','subtitle'=>null,'image'=>null,'alt'=>null,'ctaText'=>null,'ctaUrl'=>null])
<section role="region" aria-label="{{ $title }}" class="relative bg-gradient-to-r from-blue-50 to-white overflow-hidden rounded-lg">
    <div class="max-w-6xl mx-auto px-4 py-16 md:py-24 flex flex-col md:flex-row items-center gap-8">
        <div class="flex-1">
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight text-gray-900">{{ $title }}</h1>
            @if($subtitle)
                <p class="mt-4 text-lg text-gray-600">{{ $subtitle }}</p>
            @endif
            @if($ctaUrl)
                <a href="{{ $ctaUrl }}" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200" aria-label="{{ $ctaText ?? 'Saiba mais' }}">{{ $ctaText ?? 'Saiba mais' }}</a>
            @endif
        </div>
        @if($image)
            <div class="w-full md:w-1/2">
                <img src="{{ $image }}" alt="{{ $alt ?? '' }}" class="w-full h-auto rounded-md shadow-sm object-cover" loading="lazy" srcset="{{ $image }} 600w, {{ $image }} 1200w" sizes="(max-width: 768px) 100vw, 50vw">
            </div>
        @endif
    </div>
</section>

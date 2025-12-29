@props(['title','years'=>null,'excerpt'=>null,'url'=>null])
<article {{ $attributes->merge(['class' => 'border rounded-lg p-4 bg-white hover:shadow-lg focus-within:shadow-lg transition-shadow']) }}>
    <div class="flex flex-col h-full">
        <div>
            <h3 class="text-xl font-semibold">
                @if($url)
                    <a href="{{ $url }}" class="hover:underline focus:outline-none focus:ring-2 focus:ring-blue-200">{{ $title }}</a>
                @else
                    {{ $title }}
                @endif
            </h3>
            @if($years)
                <p class="text-sm text-gray-600">{{ $years }}</p>
            @endif
        </div>
        @if($excerpt)
            <p class="mt-3 text-gray-700 flex-1">{{ $excerpt }}</p>
        @endif
        @if($url)
            <div class="mt-4">
                <a href="{{ $url }}" class="text-blue-600 hover:text-blue-800 focus:underline" aria-label="Saiba mais sobre {{ $title }}">Saiba mais →</a>
            </div>
        @endif
    </div>
</article>

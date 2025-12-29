@props(['title' => null, 'image' => null, 'alt' => null])
<article {{ $attributes->merge(['class' => 'border rounded-lg bg-white shadow-sm overflow-hidden']) }}>
    @if($image)
        <img src="{{ $image }}" alt="{{ $alt ?? '' }}" class="w-full h-48 object-cover">
        <div class="p-4">
    @else
        <div class="p-4">
    @endif
        @if($title)
            <h3 class="text-lg font-semibold mb-2">{{ $title }}</h3>
        @endif
        <div class="text-sm text-gray-700">{{ $slot }}</div>
    </div>
</article>

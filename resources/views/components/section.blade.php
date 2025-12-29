@props(['title' => null, 'id' => null])
<section {{ $attributes->merge(['class' => 'my-8']) }} id="{{ $id }}">
    @if($title)
        <header class="mb-4">
            <h2 class="text-2xl font-bold">{{ $title }}</h2>
        </header>
    @endif
    <div class="space-y-4">{{ $slot }}</div>
</section>

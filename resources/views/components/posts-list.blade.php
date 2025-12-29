@props(['posts' => []])
<ul {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @foreach($posts as $post)
        <li class="border rounded-lg p-4 flex gap-4 items-start">
            <div class="w-28 h-18 bg-gray-100 rounded overflow-hidden flex-shrink-0">
                @php $img = $post['image'] ?? '/img/news-placeholder.png' @endphp
                <img src="{{ $img }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover" loading="lazy" srcset="{{ $img }} 320w, {{ $img }} 640w" sizes="(max-width: 640px) 320px, 200px">
            </div>
            <div class="flex-1">
                <h4 class="text-lg font-semibold"><a href="/noticias/{{ $post['slug'] }}" class="hover:underline">{{ $post['title'] }}</a></h4>
                <p class="text-sm text-gray-600">{{ $post['excerpt'] ?? '' }}</p>
                <div class="mt-2 text-xs text-gray-500">{{ isset($post['published_at']) ? (\Illuminate\Support\Carbon::parse($post['published_at'])->format('d/m/Y')) : '' }}</div>
            </div>
        </li>
    @endforeach
</ul>

@props(['items' => []])
<nav aria-label="Breadcrumb" class="text-sm text-gray-600 mb-4">
    <ol class="flex gap-2 items-center">
        @foreach($items as $i => $item)
            <li class="flex items-center">
                @if(isset($item['url']))
                    <a href="{{ $item['url'] }}" class="hover:underline">{{ $item['label'] }}</a>
                @else
                    <span aria-current="page">{{ $item['label'] }}</span>
                @endif
                @if($i < count($items)-1)
                    <span class="mx-2">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

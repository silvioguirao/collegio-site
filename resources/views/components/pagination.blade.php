@props(['paginator' => null])
@if($paginator && $paginator instanceof \Illuminate\Contracts\Pagination\Paginator)
    <nav role="navigation" aria-label="Navegação de páginas" class="flex items-center justify-between">
        <div class="text-sm text-gray-600">Mostrando {{ $paginator->firstItem() ?? 0 }}–{{ $paginator->lastItem() ?? 0 }} de {{ $paginator->total() ?? 0 }}</div>
        <div class="inline-flex items-center gap-2">
            @if(method_exists($paginator,'onFirstPage') && $paginator->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded" aria-disabled="true">Anterior</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 bg-white border rounded hover:bg-gray-50">Anterior</a>
            @endif

            @for($i = 1; $i <= ($paginator->lastPage() ?? 1); $i++)
                <a href="{{ $paginator->url($i) }}" class="px-3 py-1 border rounded {{ ($paginator->currentPage() == $i) ? 'bg-blue-600 text-white' : 'bg-white' }}">{{ $i }}</a>
            @endfor

            @if(method_exists($paginator,'hasMorePages') && $paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 bg-white border rounded hover:bg-gray-50">Próxima</a>
            @else
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded" aria-disabled="true">Próxima</span>
            @endif
        </div>
    </nav>
@endif

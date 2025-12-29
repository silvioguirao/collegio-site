@props(['type' => 'info'])
@php
    $colors = [
        'info' => 'bg-blue-50 text-blue-700 border-blue-200',
        'success' => 'bg-green-50 text-green-700 border-green-200',
        'danger' => 'bg-red-50 text-red-700 border-red-200',
    ];
    $classes = $colors[$type] ?? $colors['info'];
@endphp
<div {{ $attributes->merge(['class' => 'p-3 rounded border '.$classes]) }} role="status">
    {{ $slot }}
</div>

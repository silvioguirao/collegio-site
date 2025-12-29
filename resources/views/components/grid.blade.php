@props(['cols' => '3', 'gap' => '6'])
@php
    $colsClass = match($cols) {
        '2' => 'md:grid-cols-2',
        '3' => 'md:grid-cols-3',
        '4' => 'md:grid-cols-4',
        default => 'md:grid-cols-3'
    };
    $gapClass = 'gap-'.$gap;
@endphp
<div {{ $attributes->merge(['class' => "grid grid-cols-1 sm:grid-cols-2 {$colsClass} {$gapClass}"]) }}>
    {{ $slot }}
</div>

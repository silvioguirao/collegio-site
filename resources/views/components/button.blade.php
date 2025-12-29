@props(['type' => 'button', 'class' => ''])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none '.$class]) }}>
    {{ $slot }}
</button>

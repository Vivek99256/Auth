@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 border-b-2 border-indigo-500 text-sm font-semibold text-indigo-700 bg-indigo-50 rounded-md shadow-sm hover:bg-indigo-100 transition duration-300 ease-in-out'
            : 'inline-flex items-center px-3 py-2 border-b-2 border-transparent text-sm font-medium text-gray-600 hover:text-indigo-700 hover:border-indigo-400 hover:bg-gray-100 rounded-md transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

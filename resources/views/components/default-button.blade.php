@props(['text'])

<button {{ $attributes->merge(['class' => 'inline-block rounded bg-gray-300 px-8 py-2 text-sm font-medium text-gray transition hover:shadow-xl focus:outline-none focus:ring active:bg-gray-300']) }}>
    {{ $slot ?? $text }}
</button>
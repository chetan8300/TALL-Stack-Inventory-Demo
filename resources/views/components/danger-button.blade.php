@props(['text'])

<button {{ $attributes->merge(['class' => 'inline-block rounded bg-red-500 px-4 py-2 text-sm font-medium text-white transition hover:shadow-xl focus:outline-none focus:ring active:bg-red-500']) }}>
    {{ $slot ?? $text }}
</button>
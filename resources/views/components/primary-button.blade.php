@props(['text'])

<button {{ $attributes->merge(['class' => 'inline-block rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition hover:shadow-xl focus:outline-none focus:ring active:bg-indigo-500']) }}>
  {{ $slot ?? $text }}
</button>
@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm']) !!} />
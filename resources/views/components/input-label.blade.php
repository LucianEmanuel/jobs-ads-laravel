@props(['value'])

<label {{ $attributes->merge(['class' => 'inline-block text-lg mb-2']) }}>
    {{ $value ?? $slot }}
</label>

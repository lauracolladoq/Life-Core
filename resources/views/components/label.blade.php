@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-black']) }}>
    {{ $value ?? $slot }}
</label>

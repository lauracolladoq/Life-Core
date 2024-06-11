@props(['value'])

<label {{ $attributes->merge(['class' => 'block']) }}>
    {{ $value ?? $slot }}
</label>

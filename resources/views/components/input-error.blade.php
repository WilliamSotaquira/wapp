@props(['for'])

@error($for)
    <span {{ $attributes->merge(['class' => 'text-sm text-red-500']) }}>{{ $message }}</span>
@enderror

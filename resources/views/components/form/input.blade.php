@props([
    'id',
    'name',
    'type',
    'value'
])

<div class="mb-2">
    <label for="{{ $id }}" class="form-label fs-4">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" class="form-control" id="{{ $id }}" name="{{ $name }}" value="{{ old($name) ?? ($value ?? '') }}">
    @error($name)
    <span class="fw-6 text-danger">{{ $message }}</span>
    @enderror
</div>

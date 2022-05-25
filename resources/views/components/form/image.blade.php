@props([
    'id',
    'name',
    'type',
])

<div class="mb-2">
    <label for="{{ $id }}" class="form-label fs-4">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" accept="image/png, image/jpeg" class="form-control" id="{{ $id }}" name="{{ $name }}" value="{{ old($name) }}">
    @error($name)
    <span class="fw-6 text-danger">{{ $message }}</span>
    @enderror
</div>

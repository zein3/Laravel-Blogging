@props([
    'id',
    'name',
])

<div class="mb-2">
    <label for="{{ $id }}" class="form-label fs-4">
        {{ $slot }}
    </label>
    <textarea class="form-control" id="{{ $id }}" name="{{ $name }}">{{ old($name) }}</textarea>
    @error($name)
    <span class="fw-6 text-danger">{{ $message }}</span>
    @enderror
</div>
